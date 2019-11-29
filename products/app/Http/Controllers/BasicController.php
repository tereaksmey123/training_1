<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BasicController extends Controller
{
    public function changeLanguage(Request $request)
    {

        if ($request->set_lang) session(['set_lang' => $request->set_lang]);
        return redirect()->back();
    }

    public function sendMailTo()
    {
        try {
            $user = \App\User::find(1);
            \Mail::to('tereaksmey123@outlook.com')->send(new \App\Mail\NewProductMail($user));
        } catch (\Throwable $th) {
            \Log::error('BasicController -> sendMailTo'.$th);
        }

    }
}
