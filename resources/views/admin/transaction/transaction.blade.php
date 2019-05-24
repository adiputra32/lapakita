@extends('admin.master-admin')

@section ('title', 'Transaction List')
    
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

            
            </div>
          
            <div class="card-body">
                <!-- Modal -->   
               </div>
                <div class="table-responsive">
                    <table id="add-row" class="display table table-striped table-hover" >
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Timeout</th>
                                <th>Sub Total</th>
                                <th>Shipping Cost</th>
                                <th>Total</th>
                                <th>Status</th>
                                <th style="width: 10%">Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Timeout</th>
                                <th>Sub Total</th>
                                <th>Shipping Cost</th>
                                <th>Total</th>
                                <th>Status</th>
                                <th style="width: 10%">Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                        @if ($transactions->isEmpty())
                            <tr>
                                <td colspan="7"><center><h3>Tidak ada data!</h3></center></td>
                            </tr>
                        @else
                            @foreach ($transactions as $trans)
                            <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$trans->timeout}}</td>
                                    <td>{{$trans->sub_total}}</td>
                                    <td>{{$trans->shipping_cost}}</td>
                                    <td>{{$trans->total}}</td>
                                    <td>{{$trans->status}}</td>
                                    <td>
                                        <div class="form-button-action">
                                            <button type="button" data-target="#transUpdate" data-toggle="modal" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task" data-idtransaction="{{$trans->id}}" data-timeout="{{$trans->timeout}}" data-subtotal="{{$trans->sub_total}}" data-shipping="{{$trans->shipping_cost}}" data-total="{{$trans->total}}" data-address="{{$trans->address}}" data-regency="{{$trans->regency}}" data-province="{{$trans->province}}" data-user="{{$trans->user_id}}" data-status="{{$trans->status}}" data-payment="{{$trans->proof_of_payment}}" data-courier="{{$trans->courier_id}}">
                                                <i class="fa fa-edit"></i>
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

    Modal Update
     <div class="modal fade" id="transUpdate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                        <h5 class="modal-title">
                                <span class="fw-mediumbold">
                                Update</span> 
                                <span class="fw-light">
                                    Transaction
                                </span>
                            </h5>
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                </div>
                <div class="modal-body">
                    <form id="demo-form" class="form-horizontal mb-lg" novalidate="novalidate" method="POST" action="{{route('transaction.update','do-update')}}">
                        @method('PUT')
                        @csrf
                        <input type="hidden" name="idtransaction" id="idtransaction">
                        <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group form-group-default">
                                        <label>Timeout</label>
                                        <input id="timeout" type="text" class="form-control"  name="timeout" disabled >
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group form-group-default">
                                        <label>Address</label>
                                        <input id="address" type="text" class="form-control" name="address"  disabled >
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group form-group-default">
                                        <label>Regency</label>
                                        <input id="regency" type="text" class="form-control" name="regency" cols="30" rows="10" >
                                    </div>
                                </div>
                            </div>
                           
                            <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group form-group-default">
                                            <label>Province</label>
                                            <input id="province" type="text" class="form-control"  name="province" disabled >
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group form-group-default">
                                            <label>Sub Total</label>
                                            <input id="subtotal" type="number" class="form-control" name="subtotal" disabled >
                                        </div>
                                    </div>
                            </div>

                            <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group form-group-default">
                                            <label>Shipping Cost</label>
                                            <input id="shipping" type="number" class="form-control" name="shipping" disabled >
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group form-group-default">
                                            <label>Total</label>
                                            <input id="total" type="number" class="form-control"  name="total" disabled >
                                        </div>
                                    </div>
                            </div>

                            <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group form-group-default">
                                            <label>Payment</label>
                                            <input id="payment" type="text" class="form-control"name="payment" disabled >
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group form-group-default">
                                            <label>Courier</label>
                                            <input id="courier" type="number" class="form-control" name="courier" disabled >
                                        </div>
                                    </div>
                            </div>

                            <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group form-group-default">
                                            <label>User</label>
                                            <input id="user" type="number" class="form-control"  name="user" disabled >
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group form-group-default">
                                            <label>Status</label>
                                            <select class="custom-select" name="status">
                                                    <option disabled selected>Status</option>
                                                    
                                                        <option value="delivered" <?php if($trans->status=="delivered") echo 'selected="selected"'; ?>>Delivered</option>
                                                        <option value="expired" <?php if($trans->status=="expired") echo 'selected="selected"'; ?>>Expired</option>
                                                        <option value="success" <?php if($trans->status=="success") echo 'selected="selected"'; ?>>Success</option>
                                                        <option value="unverified" <?php if($trans->status=="unverified") echo 'selected="selected"'; ?>>Unverified</option>
                                                        <option value="verified" <?php if($trans->status=="verified") echo 'selected="selected"'; ?>>Verified</option>
                                                    
                                            </select>
                                        </div>
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
    </div>
        
    

@endsection