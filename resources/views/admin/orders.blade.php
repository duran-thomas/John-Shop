@extends('layouts.dashboard')

@section('title')
    Orders
@endsection

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">Orders Table</h3>
                    <div class="table">
                        <table class="table col-md" id="laravel_datatable">
                            <thead class="thead-primary">
                                <tr class="table-primary">
                                    <th scope="col" class="text-center">ID</th>
                                    <th scope="col" class="text-center">Name</th>
                                    <th scope="col" class="text-center">Student ID</th>
                                    <th scope="col" class="text-center">Location</th>
                                    <th scope="col" class="text-center">Items Ordered</th>
                                    <th scope="col" class="text-center">Status</th>                 
                                    <th scope="col" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $orders)
                                    <tr>
                                        <td class="text-center">{{$orders->id}}</td>
                                        <td class="text-center">{{$orders->name}}</td>
                                        <td class="text-center">{{$orders->customer_ID}}</td>
                                        <td class="text-center">{{$orders->location}}</td>
                                        <td class="text-center">
                                            <button class="btn btn-secondary" data-toggle="modal" data-target="#viewOrder">
                                                <span><i class="mdi  mdi-note-multiple-outline"></i></span> View
                                            </button>
                                        </td>
                                        <td class="text-center">
                                            @if($orders->outForDelivery==0 && $orders->delivered==0)
                                                <span class="badge badge-danger">Processing</span>
                                            @elseif($orders->outForDelivery==1 && $orders->delivered==0)
                                            <span class="badge badge-warning">Out For Delivery</span>
                                            @elseif($orders->outForDelivery==1 && $orders->delivered==1)
                                            <span class="badge badge-success">Delivered</span>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                        <button class="edit-modal btn btn-primary" data-toggle="modal" data-target="#editOrder"
                                        data-order_id="{{$orders->id}}" data-name="{{$orders->name}}" data-customer_ID="{{$orders->customer_ID}}" data-location="{{$orders->location}}" data-outForDelivery="{{$orders->outForDelivery}}" data-delivered="{{$orders->delivered}}">
                                        <span><i class="mdi mdi-comment-text-outline"></i></span> Edit
                                        </button>
                                        <button class="delete-modal btn btn-danger" data-toggle="modal" data-target="#deleteOrder" data-order_id="{{$orders->id}}">
                                        <span><i class="mdi mdi-delete"></i></span> Delete
                                        </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="modal fade" id="editOrder" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Edit Stock</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <form action="{{route('orders.update', 'id')}}" method="post">
                                @method('patch')
                                @csrf
                                <div class="modal-body">
                                    <input type="hidden" name="order_id" value="" id="order_id">
                                    <div class="form-group">
                                        <label for="name" class="form-lable">Name:</label>
                                        <input class="form-control" type="text" name="name" id="name">
                                    </div>
                                    <div class="form-group">
                                        <label for="customer_ID" class="form-lable">Student ID:</label>
                                        <input class="form-control" type="text" name="customer_ID" id="customer_ID">
                                    </div>
                                    <div class="form-group">
                                        <label for="location" class="form-lable">Location:</label>
                                        <input class="form-control" type="text" name="location" id="location">
                                    </div>
                                    Status Section Of Modal
                                    <div class="row">
                                        <div class="form-group col-6">
                                                <label for="outForDelivery" class="form-lable">Out For Delivery:</label>
                                                @if($orders->outForDelivery==0)
                                                    <input class="form-control" type="checkbox" name="outForDelivery" id="outForDelivery" >
                                                @elseif($orders->outForDelivery==1)
                                                    <input class="form-control" type="checkbox" name="outForDelivery" id="outForDelivery">
                                                @endif    
                                        </div>
                                        <div class="form-group col-6">
                                                <label for="delivered" class="form-lable">Delivered:</label>
                                                @if($orders->delivered==0)
                                                    <input class="form-control" type="checkbox" name="delivered" id="delivered" >
                                                @elseif($orders->delivered==1)
                                                    <input class="form-control" type="checkbox" name="delivered" id="delivered" checked>
                                                @endif    
                                        </div>
                                    </div>

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
                    
                      <div class="modal fade" id="deleteOrder" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title text-center" id="exampleModalLabel">Confirm Delete</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <form action="{{route('orders.destroy', 'id')}}" method="post">
                                    @method('delete')
                                    @csrf
                                    <div class="modal-body">
                                      <p class="text-center">Are you sure you want to delete this record?</p>
                                      <input type="hidden" name="order_id" value="" id="order_id">
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

                          {{-- View Orders Modal --}}
                          <div class="modal fade" id="viewOrder" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title text-center" id="exampleModalLabel">View Orders</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <form >
                                        


                                    </form>
                                  </div>
                                </div>
                              </div>

                </div>
            </div>
        </div>
    </div>
@endsection