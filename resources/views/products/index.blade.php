<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
</head>
<body>
    <h1>This is the home page.</h1><br><br><br>

    @if(count($products)>0)
    <ul>
        @foreach ($products as $product)
        <li>{{$product->name}}</li>
        {{-- <a href="{{route('product.destroy', $product->id)}}">Edit</a>&nbsp; --}}
        <a href="product/{{$product->product_id}}/edit">Edit</a>
        <form action="{{ url('/product', ['id' => $product->product_id]) }}" method="post">
            <input class="btn btn-sm btn-danger" type="submit" value="Delete" />
            <input type="hidden" name="_method" value="delete" />
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
          </form>
        @endforeach
    </ul>
    @endif

    <a href="{{route('product.create')}}">Add New Product</a>
</body>
</html>