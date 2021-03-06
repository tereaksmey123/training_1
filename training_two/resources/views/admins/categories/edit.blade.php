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
    <br /><br />
    Created By: {{ optional($category->createdBy)->name}} <br>
    @ ??
    Updated By: {{ optional($category->updatedBy)->name }}
    
    <br />
    <br />
    <form action="{{ route('categories.update', $category->id) }}" method="post">
        @csrf 
        @method('PUT')
        <label for="">Name</label>
        <input type="text" name="name" value="{{ old('name') ?? $category->name }}">

        {{ $errors->first('name') }}

        <button type="submit">Submit</button>
    </form>
    Product <br>
    @forelse($category->products as $row)
        {{ $row->id }} {{ $row->name }}
    @empty
    empty
    @endforelse

</body>
</html>