<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>@yield('title', 'Admin Dashboard')</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="/css/vendor.bundle.addons.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="//cdn.materialdesignicons.com/3.5.95/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">

  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="/css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />
</head>

<body>
  <div class="container-scroller">
    <!-- partial:../../partials/_navbar.html -->
    <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">

      <div class="navbar-menu-wrapper d-flex align-items-center">

        <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item dropdown d-none d-xl-inline-block">
                <a class="nav-link" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                    <span class="profile-text">Hello, {{ Auth::user()->name }}</span>
                    {{-- <i class="icon-user"></i>
                    <i class="icon-double-angle-down"></i> --}}
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                    </a>
                    
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:../../partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="{{url('home')}}">
              <i class="menu-icon mdi mdi-television"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="menu-icon mdi mdi-table"></i>
              <span class="menu-title">Tables</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="{{url('admin/supplier')}}">Supplier</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{url('admin/stock')}}">Stock</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{url('admin/orders')}}">Orders</a>
                </li>
                {{-- <li class="nav-item">
                  <a class="nav-link" href="../../pages/ui-features/typography.html">User</a>
                </li> --}}
              </ul>
            </div>
          </li>
        </ul>
      </nav>

      @yield('content')

        <!-- content-wrapper ends -->

        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->

  {{-- <script src="../../vendors/js/vendor.bundle.base.js"></script>
  <script src="../../vendors/js/vendor.bundle.addons.js"></script> --}}

  <!-- endinject -->
  <!-- Plugin js for this page-->
  <!-- End plugin js for this page-->
  <!-- inject:js -->

  {{-- <script src="../../js/off-canvas.js"></script>
  <script src="../../js/misc.js"></script> --}}

  <!-- endinject -->
  <!-- Custom js for this page-->
  <!-- End custom js for this page-->

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script>
  //Edit Supplier Modal
  $('#editSupplier').on('show.bs.modal', function(event){

    var button = $(event.relatedTarget)
    var name = button.data('name')
    var address = button.data('address')
    var contact = button.data('contact')
    var email = button.data('email')
    var supplier_id = button.data('supplier_id')

    var modal = $(this)
    modal.find('.modal-body #name').val(name);
    modal.find('.modal-body #address').val(address);
    modal.find('.modal-body #contact').val(contact);
    modal.find('.modal-body #email').val(email);
    modal.find('.modal-body #supplier_id').val(supplier_id);
  })

  //Edit Stock Modal (Fix This Function)
  $('#editStock').on('show.bs.modal', function(event){

  var button = $(event.relatedTarget)
  var item_ID = button.data('item_id')
  var item_name = button.data('item_name')
  var item_price = button.data('item_price')
  var item_quantity = button.data('item_quantity')
  var supplier_id = button.data('supplier_id')
  var stock_id = button.data('id')

  var modal = $(this)
  modal.find('.modal-body #item_ID').val(item_ID);
  modal.find('.modal-body #item_name').val(item_name);
  modal.find('.modal-body #item_price').val(item_price);
  modal.find('.modal-body #item_quantity').val(item_quantity);
  modal.find('.modal-body #supplier_id').val(supplier_id);
  modal.find('.modal-body #stock_id').val(stock_id);
  })

  //Edit Oder Modal
  $('#editOrder').on('show.bs.modal', function(event){

  var button = $(event.relatedTarget)
  var name = button.data('name')
  var customer_ID = button.data('customer_ID')
  var location = button.data('location')
  var outForDelivery = button.data('outForDelivery')
  var delivered = button.data('delivered')
  var order_id = button.data('order_id')

  var modal = $(this)
  modal.find('.modal-body #name').val(name);
  modal.find('.modal-body #customer_IDcustomer_IDcustomer_IDcustomer_ID').val(customer_ID);
  modal.find('.modal-body #location').val(location);
  modal.find('.modal-body #outForDelivery').val(outForDelivery);
  if(outForDelivery == 0){
    modal.find('.modal-body #outForDelivery').prop('checked', false); 
  }else{
    modal.find('.modal-body #outForDelivery').prop('checked', true);
  }
  if(delivered == 0){ 
    modal.find('.modal-body #delivered').prop('checked', false); 
  }else{
    modal.find('.modal-body #delivered').prop('checked', true);
  }
  //modal.find('.modal-body #outForDelivery').prop('checked', true);
  //modal.find('.modal-body #delivered').val(delivered);
  modal.find('.modal-body #order_id').val(order_id);
  })

  //Delete Supplier Modal
  $('#deleteSupplier').on('show.bs.modal', function(event){
    var button = $(event.relatedTarget)
    var supplier_id = button.data('supplier_id')

    var modal = $(this)
    modal.find('.modal-body #supplier_id').val(supplier_id);
  })

  //Delete Stock Modal
  $('#deleteStock').on('show.bs.modal', function(event){
    var button = $(event.relatedTarget)
    var stock_id = button.data('stock_id')

    var modal = $(this)
    modal.find('.modal-body #stock_id').val(stock_id);
  })

  //Delete Order
  $('#deleteOrder').on('show.bs.modal', function(event){
    var button = $(event.relatedTarget)
    var order_id = button.data('order_id')

    var modal = $(this)
    modal.find('.modal-body #order_id').val(order_id);
  })

  //DataTable
  $(document).ready( function () {
      $('#laravel_datatable').DataTable();
  }); 


</script>



</body>

</html>