@extends('layouts.dashboard')

@section('title', 'Admin Dashboard')



@section('content')

<div class="main-panel">
  <div class="content-wrapper">
      <div class="card">
        <div class="card-body">
          <h3 class="card-title">Supplier Table</h3>
          <div class="table">
              <table class="table col-md">
                  <thead class="thead-primary">
                    <tr class="table-primary">
                      <th scope="col">ID</th>
                      <th scope="col">Name</th>
                      <th scope="col">Address</th>
                      <th scope="col">Contact</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($supplier as $supplier)
                        <tr>
                          <td>{{$supplier->id}}</td>
                          <td>{{$supplier->name}}</td>
                          <td>{{$supplier->address}}</td>
                          <td>{{$supplier->contact}}</td>
                        </tr>
                    @endforeach
                  </tbody>
                </table>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#newSupplier">
                  Add New Supplier
                  </button>
                  
                  <!-- Modal -->
                  <div class="modal fade" id="newSupplier" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Add New Supplier</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form method="POST" action="/home">
                              {{ csrf_field() }}
                              <div class="form-group">
                                  <input type="text" class="form-control" placeholder="Name" name="name">
                                </div>
                              <div class="form-group">
                                  <input type="text" class="form-control" placeholder="Address" name="address">
                                </div>
                              <div class="form-group">
                                  <input type="text" class="form-control" placeholder="Contact" name="contact">
                                </div>
                                @if ($errors->any())
                                  <div class="notification is-danger">
                                      <ul>
                                          @foreach ($errors->all() as $error)
                                              <li>{{ $error }}</li>
                                          @endforeach
                                      </ul>
                                  </div>
                              @endif
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
          </div>
        </div>
      </div>
      
      
  </div>
</div>







{{-- 
      <!-- partial -->
      <div class="main-panel">
            <div class="content-wrapper">
              <div class="row">
                <div class="grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Supplier Table</h4>
                      <p class="card-description">
                      </p>
                      <div class="table-responsive">
                        <table class="table">
                          <thead>
                            <tr>
                              <th>Name</th>
                              <th>Address.</th>
                              <th>Contact</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td>Jacob</td>
                              <td>53275531</td>
                              <td>12 May 2017</td>
                              <td>
                                <label class="badge badge-danger">Pending</label>
                              </td>
                            </tr>
                            <tr>
                              <td>Messsy</td>
                              <td>53275532</td>
                              <td>15 May 2017</td>
                              <td>
                                <label class="badge badge-warning">In progress</label>
                              </td>
                            </tr>
                            <tr>
                              <td>John</td>
                              <td>53275533</td>
                              <td>14 May 2017</td>
                              <td>
                                <label class="badge badge-info">Fixed</label>
                              </td>
                            </tr>
                            <tr>
                              <td>Peter</td>
                              <td>53275534</td>
                              <td>16 May 2017</td>
                              <td>
                                <label class="badge badge-success">Completed</label>
                              </td>
                            </tr>
                            <tr>
                              <td>Dave</td>
                              <td>53275535</td>
                              <td>20 May 2017</td>
                              <td>
                                <label class="badge badge-warning">In progress</label>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div> --}}

@endsection
