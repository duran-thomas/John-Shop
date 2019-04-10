@extends('layouts.dashboard')

@section('title')
  Supplier
@endsection

@section('content')

<div class="main-panel">
  <div class="content-wrapper">
      <div class="card">
        <div class="card-body">
          <h3 class="card-title">Supplier Table</h3>
          <div class="table">
              <table class="table col-md" id="laravel_datatable">
                  <thead class="thead-primary">
                    <tr class="table-primary">
                      <th scope="col">ID</th>
                      <th scope="col">Name</th>
                      <th scope="col">Address</th>
                      <th scope="col">Contact</th>
                      <th scope="col">Email</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($supplier as $supplier)
                        <tr>
                          <td>{{$supplier->id}}</td>
                          <td>{{$supplier->name}}</td>
                          <td>{{$supplier->address}}</td>
                          <td>{{$supplier->contact}}</td>
                          <td>{{$supplier->email}}</td>
                          <td>
                          <button class="edit-modal btn btn-primary" data-toggle="modal" data-target="#editSupplier"
                          data-name="{{$supplier->name}}" data-address="{{$supplier->address}}" data-contact="{{$supplier->contact}}" data-email="{{$supplier->email}}", data-supplier_id="{{$supplier->id}}">
                              <span><i class="mdi mdi-comment-text-outline"></i></span> Edit
                          </button>
                          <button class="delete-modal btn btn-danger" data-toggle="modal" data-target="#deleteSupplier" data-supplier_id="{{$supplier->id}}">
                              <span><i class="mdi mdi-delete"></i></span> Delete
                          </button>
                          </td>
                        </tr>
                    @endforeach
                  </tbody>
                </table>
                <!-- Button trigger modal -->
                <br>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#newSupplier">
                  Add New Supplier
                </button>
                  
                  <!-- Create Modal -->
                  <div class="modal fade" id="newSupplier" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Add New Supplier</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <form method="POST" action="{{route('supplier.store')}}">
                            @csrf
                            <div class="modal-body">
                            @include('layouts.supplierForm')
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
                  <div class="modal fade" id="editSupplier" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Supplier</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <form action="{{route('supplier.update', 'id')}}" method="post">
                              @method('patch')
                              @csrf
                              <div class="modal-body">
                                <input type="hidden" name="supplier_id" value="" id="supplier_id">
                                @include('layouts.supplierForm')
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
                  <div class="modal fade" id="deleteSupplier" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title text-center" id="exampleModalLabel">Confirm Delete</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <form action="{{route('supplier.destroy', 'id')}}" method="post">
                              @method('delete')
                              @csrf
                              <div class="modal-body">
                                <p class="text-center">Are you sure you want to delete this record?</p>
                                <input type="hidden" name="supplier_id" value="" id="supplier_id">
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
          </div>
        </div>
      </div>
      
      
  </div>
</div>


@endsection
