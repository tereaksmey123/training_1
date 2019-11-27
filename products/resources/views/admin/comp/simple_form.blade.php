{{-- <form action="{{ $url ?? '' }}" method="post">
    @csrf
    <div class="form-group col-md-12">
        <label for="">{!! trans('flexi.name') !!}</label>
        <input type="text" name="name" id="">
    </div>
    <div class="col-md-12">
        <button class="btn btn-success">{!! trans('flexi.submit') !!}</button>
    </div>
</form> --}}

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @include('admin.comp.alert')
        <div class="col-md-12">
            {{-- @include('admin.comp.simple_form', ['url' => route('categories.store')]) --}}
            <form action="{{ $url ?? '' }}" method="post">
                @csrf
                <div class="form-group col-md-12">
                    <label for="">{!! trans('flexi.name') !!}</label>
                    <input type="text" name="name" value="{{ old('name') ?? '' }}">
                </div>
                @if(isset($fieldActive) && $fieldActive)
                    fieldActive
                @endif
                @if($errors->first('name'))
                    <div class="text-red">{{ $errors->first('name') }}</div>
                @endif
                <div class="col-md-12">
                    <button class="btn btn-success">{!! trans('flexi.submit') !!}</button>
                </div>
            </form>

        </div>
    </div>
</div>
    
@endsection