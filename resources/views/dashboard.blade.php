<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
 <!-- New js added for tabs -->
 <script src="{{ asset('assets/backend/libs/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('assets/backend/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/backend/libs/metismenu/metisMenu.min.js') }}"></script>
<script src="{{ asset('assets/backend/libs/simplebar/simplebar.min.js') }}"></script>
<script src="{{ asset('assets/backend/libs/node-waves/waves.min.js') }}"></script>
 <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="container">
        <h4 class="card-title">Product Tabs</h4>

        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" data-bs-toggle="tab" href="#general" role="tab">
                    <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                    <span class="d-none d-sm-block">General</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#discount" role="tab">
                    <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                    <span class="d-none d-sm-block">Discount</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#special" role="tab">
                    <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                    <span class="d-none d-sm-block">Special</span>
                </a>
            </li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content p-3 text-muted">
            <div class="tab-pane active" id="general" role="tabpanel">
                <form method="POST" action="{{ route('product.save') }}">
                    @csrf
                    <!-- General tab form fields -->
                    <input type="hidden" name="tab_name" value="General">
    <div class="form-group">
        <label for="product_name">Product Name</label>
        <input type="text" name="product_name" id="product_name" class="form-control" placeholder="Product Name">
    </div>

    <div class="form-group">
        <label for="description">Description</label>
        <textarea name="description" id="description" class="form-control" placeholder="Product Description"></textarea>
    </div>

    <div class="form-group">
        <label for="price">Price</label>
        <input type="number" name="price" id="price" class="form-control" placeholder="Price">
    </div>

    <div class="form-group">
        <label for="quantity">Quantity</label>
        <input type="number" name="quantity" id="quantity" class="form-control" placeholder="Quantity">
    </div>

    <div class="form-group">
        <label for="category">Category</label>
        <input type="text" name="category" id="category" class="form-control" placeholder="Category">
    </div>
    <button type="submit" class="btn btn-primary">Save</button>

    <!-- Add more product-related fields as needed -->
 
                </form>
            </div>

            <div class="tab-pane" id="discount" role="tabpanel">
        <div class="container">
  <div class="row my-4">
    <div class="col-l-10 max-auto">
      <div class="card shadow">
        <div class="card-header">
            <h1>Add Discount</h1>
          </div>
        <div class="card-body p-4">
        <form method="POST"  action="{{ route('discounts.store') }}" >

            <div id="show-item">
              <div class="row">
                <div class="col-md-2 mb-3">
                  <input type="text" class="form-control" placeholder="Add Quantity" name="quantity[]" >
                </div>
                <div class="col-md-2 mb-3">
                  <input type="text" class="form-control" placeholder="Add Priority" name="priority[]" >
                </div>
                <div class="col-md-2 mb-3">
                
                <input type="text" class="form-control" placeholder="Add Price" name="price[]" >
                </div>
                <div class="col-md-2 mb-3">
                
                <input type="date" class="form-control" placeholder="start date" name="start_date[]" >
                </div>
                <div class="col-md-2 mb-3">
                
                <input type="date" class="form-control" placeholder="end date" name="end_date[]" >
                </div>
                <div class="col-md-2 mb-3 d-grid">
            <button style="background-color:green" type="button" class="btn btn-success add_item_btn">Add More</button>
    </div>
              </div>
            </div>
            <div >
                <input  style="background-color:blue" type="submit" value="Save" class="btn btn-primary w-25" id="add_btn">
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

        </div>
    </div>

            <div class="tab-pane" id="special" role="tabpanel">
                <!-- Special tab content -->
            </div>
        </div>
    </div>
</x-app-layout>


<!-- jquery cdn -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js" ></script>
<!-- jquey code to add items -->
<script>
    $(document).ready(function() {
        $(".add_item_btn").click(function(e) {
  e.preventDefault();
            $("#show-item").prepend('<div class="row">' +
                '<div class="col-md-2 mb-3">' +
                '<input type="text" class="form-control" placeholder="Add Quantity" name="quantity[]" required>' +
                '</div>' +
                '<div class="col-md-2 mb-3">' +
                '<input type="text" class="form-control" placeholder="Add Priority" name="priority[]" required>' +
                '</div>' +
                '<div class="col-md-2 mb-3">' +
                '<input type="text" class="form-control" placeholder="Add Price" name="price[]" required>' +
                '</div>' +
                '<div class="col-md-2 mb-3">' +
                '<input type="date" class="form-control" placeholder="start date" name="start_date[]" required>' +
                '</div>' +
                '<div class="col-md-2 mb-3">' +
                '<input type="date" class="form-control" placeholder="end date" name="end_date[]" required>' +
                '</div>' +
                '<div class="col-md-2 mb-3 d-grid">' +
                '<button style="background-color:red" type="button" class="btn btn-success remove_item_btn">Remove</button>' +
                '</div>' +
                '</div>');
        });

// button code to remove row
$(document).on('click','.remove_item_btn', function(e){

let row_item = $(this).parent().parent();
$(row_item).remove();
});


    });
</script>
<script>
 $('#add_discount').submit( function(e){
  e.preventDefault();

  $.ajax({
    url: '{{ route('discounts.store') }}',
    method: 'POST',
    data: $(this).serialize(),
    success: function (response) {
      console.log(response);
    },
    error: function (error) {
      console.error(error);
    }
  });
});

</script>

 
 