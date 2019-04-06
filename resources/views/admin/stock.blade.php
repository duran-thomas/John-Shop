@extends('layouts.dashboard')

@section('title')
  Stock
@endsection

@section('content')
<div class="main-panel">
        <div class="content-wrapper">
            <div class="card">
              <div class="card-body">
    <h3 class="card-title">Stock Table</h3>
    <div class="table">
    <table class="table col-md">
        <thead class="thead-primary">
        <tr class="table-primary">
            <th scope="col">ID</th>
            <th scope="col">Code</th>
            <th scope="col">Name</th>
            <th scope="col">Price</th>           
            <th scope="col">Quantity</th>           
            <th scope="col">Supplier</th>           
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($stock as $stock)
            <tr>
                <td>{{$stock->id}}</td>
                <td>{{$stock->item_ID}}</td>
                <td>{{$stock->item_name}}</td>
                <td>{{$stock->item_price}}</td>
                <td>{{$stock->item_quantity}}</td>
                <td>{{$stock->supplier_ID}}</td>
                <td>
                <button class="edit-modal btn btn-primary" data-toggle="modal" data-target="#editStock"
                data-item_ID="{{$stock->item_ID}}" data-item_name="{{$stock->item_name}}" data-item_price="{{$stock->item_price}}", data-item_quantity="{{$stock->item_quantity}}", data-supplier_ID="{{$stock->supplier_ID}}", data-id="{{$stock->id}}">
                <span><i class="mdi mdi-comment-text-outline"></i></span> Edit
                </button>
                <button class="delete-modal btn btn-danger" data-toggle="modal" data-target="#deleteStock" data-stock_id="{{$stock->id}}">
                <span><i class="mdi mdi-delete"></i></span> Delete
                </button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Button trigger modal -->
    <br>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#newStock">
    Add New stock
    </button>

    <!-- Create Modal -->
    <div class="modal fade" id="newStock" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Add Stock</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form method="POST" action="{{route('stock.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">

                @include('layouts.stockForm')
                  {{-- @if ($errors->any())
                    <div class="notification is-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                  @endif --}}
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                  </div>
                </div>
            </form>
          </div>
        </div>
      </div>
      <!-- Edit Modal -->
      <div class="modal fade" id="editStock" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Stock</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form action="{{route('stock.update', 'id')}}" method="post">
                  @method('patch')
                  @csrf
                  <div class="modal-body">
                    <input type="hidden" name="stock_id" value="" id="stock_id">
                    @include('layouts.stockForm',[
                        'disableStockId'=>true
                    ])
                    {{-- @if ($errors->any())
                      <div class="notification is-danger">
                          <ul>
                              @foreach ($errors->all() as $error)
                                  <li>{{ $error }}</li>
                              @endforeach
                          </ul>
                      </div>
                    @endif --}}
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                    
                  </div>
              </form>
            </div>
          </div>
        </div>
        <!-- Delete Modal -->
      <div class="modal fade" id="deleteStock" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title text-center" id="exampleModalLabel">Confirm Delete</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form action="{{route('stock.destroy', 'id')}}" method="post">
                  @method('delete')
                  @csrf
                  <div class="modal-body">
                    <p class="text-center">Are you sure you want to delete this record?</p>
                    <input type="hidden" name="stock_id" value="" id="stock_id">
                    {{-- @if ($errors->any())
                      <div class="notification is-danger">
                          <ul>
                              @foreach ($errors->all() as $error)
                                  <li>{{ $error }}</li>
                              @endforeach
                          </ul>
                      </div>
                    @endif --}}
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger">Confirm</button>
                    </div>
                    
                  </div>
              </form>
            </div>
          </div>
        </div>

@endsection
