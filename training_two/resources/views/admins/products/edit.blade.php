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
    <form action="{{ route('products.update', $category->id) }}" method="post">
        @csrf 
        @method('PUT')
        <label for="">Name</label>
        <input type="text" name="name" value="{{ old('name') ?? $category->name }}">

        <label for="">Price</label>
        <input type="text" name="price" value="{{ old('name') ?? $category->price }}">


        <button type="submit">Submit</button>
    </form>

</body>
</html>