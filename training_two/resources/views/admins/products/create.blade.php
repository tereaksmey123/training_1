<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
   

    @include('admins.comp.alert')
    seesion:: {{ session('set_lang') }}
    <form action="{{ route('products.store') }}" method="post">
        @csrf 

        <label for="">{!! trans('flexi.name') !!}</label>
        <input type="text" name="name">
        <label for="">{!! trans('flexi.price') !!}</label>
        <input type="text" name="price">
        <button type="submit">{!! trans('flexi.submit') !!}</button>
    </form>

</body>
</html>