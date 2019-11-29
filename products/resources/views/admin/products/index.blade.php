
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 text-center">
            <h1><a href="{{ route('basic.change-language') }}?set_lang=en">EN</a></h1>
            <h1><a href="{{ route('basic.change-language') }}?set_lang=km">KM</a></h1>
            {!!  trans('flexi.name') !!}
            {!! session('set_lang') !!}
        </div>
    </div>
</div>

    
@endsection