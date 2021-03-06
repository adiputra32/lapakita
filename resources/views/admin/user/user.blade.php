@extends('admin.master-admin')

@section ('title', 'User List')
    
@section('content')

<div class="row mt--2">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                
                @if (session('success'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    {{ session('success') }}
                </div>
                @endif
                @if (session('fail'))
                    <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        {{ session('fail') }}
                    </div>
                @endif
                @csrf
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                 @endif
                <div class="d-flex align-items-center">
                    <h4 class="card-title">Add Admin</h4>
                    <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#addRowModal">
                        <i class="fa fa-plus"></i>
                        Add Admin
                    </button>
                </div>
            </div>
          
            <div class="card-body">
                <!-- Modal -->
                <div class="row">
                    <div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header no-bd">
                                    <h5 class="modal-title">
                                        <span class="fw-mediumbold">
                                        Add</span> 
                                        <span class="fw-light">
                                            Admin
                                        </span>
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p class="small">Create a new row using this form, make sure you fill them all</p>
                                    <form action="{{route('user.store')}}" method="POST" enctype="multipart/form-data"> 
                                            @csrf
                                            @if ($errors->any())
                                                <div class="alert alert-danger">
                                                    <ul>
                                                        @foreach ($errors->all() as $error)
                                                            <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                             @endif
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group form-group-default">
                                                    <label>Username</label>
                                                    <input id="addName" type="text" class="form-control" placeholder="fill username" name="username">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="form-group form-group-default">
                                                        <label>Name</label>
                                                        <input id="addName" type="text" class="form-control" placeholder="fill name" name="name">
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="form-group form-group-default">
                                                        <label>Password</label>
                                                        <input id="addName" type="password" class="form-control" placeholder="fill password" name="password">
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group form-group-default">
                                                    <label>Phone</label>
                                                    <input id="addPhone" type="text" class="form-control" placeholder="fill phone" name="phone">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                    <div class="form-group form-group-default">
                                                        <label>Picture</label>
                                                        <input id="addImage" type="file" class="form-control" " name="image"  accept="image/*" required>
                                                    </div>
                                            </div> 
                                        </div>
                                        <div class="modal-footer no-bd">
                                                <button type="submit" id="addRowButton" class="btn btn-primary">Add</button>
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                        </div>
                                    </form>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
               
               </div>
                <div class="table-responsive">
                    <table id="add-row" class="display table table-striped table-hover" >
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Userame</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th style="width: 10%">Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Userame</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th style="width: 10%">Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                        @if ($admins->isEmpty())
                            <tr>
                                <td colspan="3"><center><h3>Tidak ada data!</h3></center></td>
                            </tr>
                        @else
                            @foreach ($admins as $admin)
                            <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$admin->username}}</td>
                                    <td>{{$admin->name}}</td>
                                    <td>{{$admin->phone}}</td>
                                    <td>
                                        <div class="form-button-action">
                                            <button type="button" data-target="#courierUpdate" data-toggle="modal" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task" data-mycourier="{{$admin->username}}" data-idcourier="{{$admin->id}}">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                            <button type="button" data-target="#courierDelete" data-toggle="modal" title="" class="btn btn-link btn-danger" data-original-title="Remove"  data-idcourier="{{$admin->id}}">
                                                <i class="fa fa-times"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @endif  
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Update --}}
    {{-- <div class="modal fade" id="courierUpdate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                        <h5 class="modal-title">
                                <span class="fw-mediumbold">
                                Update</span> 
                                <span class="fw-light">
                                    Courier
                                </span>
                            </h5>
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                </div>
                <div class="modal-body">
                    <form id="demo-form" class="form-horizontal mb-lg" novalidate="novalidate" method="POST" action="{{route('courier.update','do-update')}}">
                        @method('PUT')
                        @csrf
                        <div class="form-group mt-lg">
                            <div class="text-center">
                                <input type="hidden" name="idcourier" id="idcourier">
                                <input type="text" name="courier" id="courier" class="form-control" placeholder="Type courier name...">
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger">Update</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                </form>
                </div>
            </div>
        </div>
    </div> --}}
        
    {{-- Modal Delete --}}
    {{-- <div class="modal fade" id="courierDelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                        <h5 class="modal-title">
                                <span class="fw-mediumbold">
                                Delete</span> 
                                <span class="fw-light">
                                    Courier
                                </span>
                            </h5>
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                </div>
                <div class="modal-body">
                    <form id="demo-form" class="form-horizontal mb-lg" novalidate="novalidate" method="POST" action="{{route('courier.destroy','do-delete')}}">
                        @method('DELETE')
                        @csrf
                        <div class="form-group mt-lg">
                            <div class="text-center">
                                <input type="hidden" name="idcourier" id="idcourier">
                            <h5>Are you sure want to delete this courier? </h5>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger">Confirm</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                </form>
                </div>
            </div>
        </div>
    </div> --}}

@endsection