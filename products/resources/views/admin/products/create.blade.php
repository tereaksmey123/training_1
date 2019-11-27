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
            <form action="{{ route('products.store') }}" method="post">
                @csrf
                <div class="form-group col-md-12">
                    <label for="">{!! trans('flexi.name') !!}</label>
                    <input type="text" name="name" value="{{ old('name') ?? '' }}">
                </div>
                
                <div class="form-group col-md-12">
                    <label for="">{!! trans('flexi.price') !!}</label>
                    <input type="text" name="price" value="{{ old('price') ?? '' }}">
                </div>

                <div class="form-group col-md-12">
                    <label for="">{!! trans('flexi.category') !!}</label>
                    <select name="category_id" id="" class="form-control">
                        @foreach($categories as $c)
                            <option value="{{ $c->id }}">{{ $c->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group col-md-12">
                    <label for="">{!! trans('flexi.loan_type') !!}</label>
                    <select name="loan_type_id" id="" class="form-control">
                        @foreach($loanTypes as $c)
                            <option value="{{ $c->id }}">{{ $c->name }}</option>
                        @endforeach
                    </select>
                </div>
                    
                   

                <div class="col-md-12">
                    <button class="btn btn-success">{!! trans('flexi.submit') !!}</button>
                </div>
            </form>

        </div>
    </div>
</div>
    
@endsection