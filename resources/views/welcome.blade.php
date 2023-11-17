<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <title>Add to Cart Button</title>
</head>
<body>

<div class="container mt-5">
  @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

    @foreach ($a as $list)
    <div class="product">
        <h2>{{$list->name}}</h2>
      <p>{{$list->price}}</p>
      
      <!-- Add to Cart Button -->
      <a href="{{url('adtocart/' . $list->id)}}">
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addToCartModal">
        Add to Cart
      </button>
    </a>
      </div>
    @endforeach
  

</div>

<!-- Bootstrap JS and Popper.js -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
