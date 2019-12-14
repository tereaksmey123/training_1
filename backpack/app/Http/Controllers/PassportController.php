<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User as UserMod;
use Laravel\Passport\Client;
use Illuminate\Support\Facades\Route;
use App\Http\Requests\Api\ChangePasswordRequest;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Auth;
use DB;


class PassportController extends Controller
{
    use SendsPasswordResetEmails;

    private $client;

    public function __construct()
    {
        $this->client = Client::find(2);
    }

    public function issues_passport($request,$grant_type = 'password')
    {
        $params = [
            'grant_type' => $grant_type,
            'client_id' => $this->client->id,
            'client_secret' => $this->client->secret,
            'username' => $request->email,
            'password' => $request->password,
            'scope' => '*',
            // 'theNewProvider' => 'api'
        ];
        $request->request->add($params);
        $proxy = Request::create('oauth/token','POST');

        return Route::dispatch($proxy);
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|numeric',
            'password' => 'required|min:6|confirmed',
        ]);
        $input = $request->all();
        $input['password'] = bcrypt($request->password);
        $input['status'] = 1;
        $user = UserMod::create($input);
        return $this->issues_passport($request);
    }

   public function login(Request $request)
   {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        return $this->issues_passport($request);

   }

   public function refresh(Request $request)
    {
      $request->validate(['refresh_token' => 'required']);
      return $this->issues_passport($request, 'refresh_token');
    }

    public function logout(Request $request)
    {
        $accessToken = Auth::user()->token();
        DB::table('oauth_refresh_tokens')->where('access_token_id', $accessToken->id)->update(['revoked' => true]);
        $accessToken->revoke();
        return response()->json(['access_token' => 'Logout'],204);
    }
    
    public function show() 
    { 
        $user = Auth::user(); 
        return response()->json($this->entry($user)); 
    } 

    public function update(Request $request)
    {
      $request->validate([
        'name' => 'sometimes|required|min:1',
        'email' => 'sometimes|required|email',
        'phone' => 'nullable|numeric',
      ]);
      $user = backpack_user();
      if (!$user->update($request->only([
        'name', 'phone', 'email', 'gravatar'
      ]))) return response()->json(['status' => 400, 'message' => 'Fail update information.'], 400);
      return response()->json($this->entry($user)); 
    }
    protected function entry($user)
    {
        return [
            "id" =>  $user->id,
            "name" =>  $user->name,
            "email" =>  $user->email,
            "phone" =>  $user->phone,
            "profile" =>  $user->GravatarLargeUrl,
        ];
    }
    public function changePassword(ChangePasswordRequest $request)
    {
        $user = backpack_user();
        $user->password = \Hash::make($request->new_password);
        if (!$user->save()) return response()->json(['status' => 400, 'message' => 'Fail to change password.'], 400);
        return response()->json(['status' => 200, 'message' => 'Successful change password.']);
    }
    public function resetPassword(Request $request)
    {
        $this->validateEmail($request);
		$response = $this->broker()->sendResetLink(
			$request->only('email')
		);
        $user = UserMod::where('email', $request->email)->first();
        if (!$user) {
            $validator = \Validator::make($request->all(), []);
            $validator->errors()->add('email', "your email doesn't exists..");
            return response()->json($validator->messages(), 422);
        }
		return $response == \Password::RESET_LINK_SENT
			? response()->json(['status' => 201, 'message' => 'Link has been send to your mail.'], 201)
			: response()->json(['status' => 400, 'message' => 'Fail to send reset password link.'], 400);
    }
}
