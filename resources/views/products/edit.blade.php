<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update Product</title>
</head>
<body>
    <h1>Update Product Page</h1>
    {{-- <form action="product/{{$product->prouct_id}}" method="PUT" enctype="multipart/form-data"> --}}
    {!! Form::open(['action' => ['ProductController@update', $product->product_id], 'method' => 'PUT', 'enctype' => 'multipart/form-data']) !!}

        {{ csrf_field() }}

        <input type="text" name="name" placeholder="Enter Name here"><br><br>
        <input type="number" name="price" placeholder="Enter Price here"><br><br>
        <input type="text" name="description" placeholder="description here"><br><br>

        <button type="submit" class="btn btn-primary">Update Product</button>
        {{Form::hidden('_method','PUT')}}
        {!! Form::close() !!}

    </form>
</body>
</html>