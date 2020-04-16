<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Product</title>
</head>
<body>
    <h1>Add Product Page</h1>
    <form action="{{route('product.store')}}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}

        <input type="text" name="name" placeholder="Enter Name here"><br><br>
        <input type="number" name="price" placeholder="Enter Price here"><br><br>
        <input type="text" name="description" placeholder="description here"><br><br>

        {{-- <input type="submit" value="Add"> --}}
        <button type="submit" class="btn btn-primary">Add Product</button>

    </form>
</body>
</html>