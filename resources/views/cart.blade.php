<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Shopping Cart</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome for icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>

<div class="container mt-5">
  <h2>Your Shopping Cart</h2>
  <?php $total = 0 ?>
  <!-- by this code session get all product that user chose -->
          @if(session('cart'))
              @foreach(session('cart') as $id => $details)
  
                  <?php $total += $details['price'] * $details['quantity'] ?>
  
                  <tr>
                      <td data-th="Product">
                          <div class="row">
                              <div class="col-sm-3 hidden-xs"><img src="{{ $details['photo'] }}" width="100" height="100" class="img-responsive"/></div>
                              <div class="col-sm-9">
                                  <h4 class="nomargin">{{ $details['name'] }}</h4>
                              </div>
                          </div>
                      </td>
                      <td data-th="Price">${{ $details['price'] }}</td>
                      <td data-th="Quantity">
                          <input type="number" value="{{ $details['quantity'] }}" class="form-control quantity" />
                      </td>
                      <td data-th="Subtotal" class="text-center">${{ $details['price'] * $details['quantity'] }}</td>
                      <td class="actions" data-th="">
                      <!-- this button is to update card -->
                          <button class="btn btn-info btn-sm update-cart" data-id="{{ $id }}"><i class="fa fa-refresh"></i></button>
                         <!-- this button is for update card -->
                          <button class="btn btn-danger btn-sm remove-from-cart delete" data-id="{{ $id }}"><i class="fa fa-trash-o"></i>bhh</button>
                      </td>
                  </tr>
              @endforeach
          @endif
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
