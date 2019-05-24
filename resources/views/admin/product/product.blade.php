@extends('admin.master-admin')

@section ('title', 'Product')
    
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
                    <h4 class="card-title">Product List</h4>
                    <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#addRowModal">
                        <i class="fa fa-plus"></i>
                        Add Product
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
                                           Product
                                        </span>
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p class="small">Create a new row using this form, make sure you fill them all</p>
                                    <form action="{{route('product.store')}}" method="POST" enctype="multipart/form-data"> 
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
                                                    <label>Name</label>
                                                    <input id="addName" type="text" class="form-control" placeholder="fill name" name="product_name" >
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group form-group-default">
                                                    <label>Price</label>
                                                    <input id="addPrice" type="number" class="form-control" placeholder="fill price" name="price" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group form-group-default">
                                                    <label>Description</label>
                                                    <textarea id="addDesc" type="text" class="form-control" placeholder="fill description" name="desc" cols="30" rows="10" required></textarea>
                                                </div>
                                            </div>
                                        </div>
{{-- 
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group form-group-default">
                                                    <label>Rate</label>
                                                    <input id="addRate" type="number" class="form-control" placeholder="fill Rate" name="rate">
                                                </div>
                                            </div>
                                        </div> --}}
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group form-group-default">
                                                    <label>Categories</label>
                                                    <select name="categories[]" multiple="multiple" data-plugin-multiselect="" class="col-12" >
                                                        @foreach ($categories as $category)
                                                            <option value={{ $category->id }}>{{ $category->category_name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group form-group-default">
                                                        <label>Stock</label>
                                                        <input id="addStock" type="number" class="form-control" placeholder="fill stock" name="stock" required>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group form-group-default">
                                                        <label>Weight</label>
                                                        <input id="addWeight" type="number" class="form-control" placeholder="fill weight" name="weight" required>
                                                    </div>
                                                </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group form-group-default">
                                                    <label>Gambar</label>
                                                    <input id="addImage" type="file" class="form-control" " name="image[]"  accept="image/*" multiple required>
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
                                <th>Product Name</th>
                                <th>Price</th>
                                <th>Categories</th>
                                <th>Stock</th>
                                <th>Weight</th>
                                <th>Rate</th>
                                <th>Description</th>
                                <th style="width: 10%">Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Product Name</th>
                                <th>Price</th>
                                <th>Categories</th>
                                <th>Stock</th>
                                <th>Weight</th>
                                <th>Rate</th>
                                <th>Description</th>
                                <th style="width: 10%">Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                        @if ($products->isEmpty())
                            <tr>
                                <td colspan="9"><center><h3>Tidak ada data!</h3></center></td>
                            </tr>
                        @else
                            @foreach ($products as $product)
                            <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$product->product_name}}</td>
                                    <td>{{$product->price}}</td>
                                    <td>
                                        @foreach ($product->category as $category)
                                            <ul>
                                                    <li>{{$category->category_name}}</li>
                                            </ul>
                                        @endforeach
                                    </td>
                                    <td>{{$product->stock}}</td>
                                    <td>{{$product->weight}} gram</td>
                                    <td>{{$product->product_rate}} <span><i class="fas fa-star"></i></span></td>
                                    <td>{{$product->description}}</td>
                                    <td>
                                        <div class="form-button-action">


                                        <button type="button" data-target="#modalViewImages-{{$product->id}}" data-toggle="modal" title="" class="btn btn-link btn-success">
                                                <i class="fas fa-images"></i>
                                        </button>

                                        <button type="button" data-target="#productUpdate" data-toggle="modal" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task" data-idproduct="{{$product->id}}" data-name_p="{{$product->product_name}}" data-price_p="{{$product->price}}" data-description_p="{{$product->description}}" data-rate_p="{{$product->stock}}" data-weight_p="{{$product->weight}}" data-stock_p="{{$product->stock}}">
                                                <i class="fa fa-edit"></i>
                                        </button>

                                        <button type="button" data-target="#productDelete" data-toggle="modal" title="" class="btn btn-link btn-danger" data-original-title="Remove"  data-idproduct="{{$product->id}}">
                                            <i class="fa fa-times"></i>
                                        </button>

                                        <div class="modal fade" id="modalViewImages-{{ $product->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title" id="myModalLabel">Product Images</h4>
                                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <center>
                                                                <div id="gambar" class="owl-carousel" data-plugin-carousel data-plugin-options='{ "items": 1,  "navigation": true, "pagination": false }'>
                                                                    @foreach ($product->product_image as $image)
                                                                        <a  href="{{ asset('/storage/product_image/'.$image->image_name)}}" target="_blank"> 
                                                                            <img src="{{  asset('/storage/product_image/'.$image->image_name)  }}"  class="rounded-circle" alt="logo_simple"  width="200px" height="200px">
                                                                        </a>
                                                                    @endforeach
                                                                </div>
                                                            </center>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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


 {{-- MODAL View Images --}}
        
            


    {{-- Modal Update --}}
    <div class="modal fade" id="productUpdate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                        <h5 class="modal-title">
                                <span class="fw-mediumbold">
                                Update</span> 
                                <span class="fw-light">
                                    Product
                                </span>
                            </h5>
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                </div>
                <div class="modal-body">
                    <form id="demo-form" class="form-horizontal mb-lg" novalidate="novalidate" method="POST" action="{{route('product.update','do-update')}}">
                        @method('PUT')
                        @csrf
                        <div class="row">
                                <input type="hidden" name="idProduct" id="idproduct">
                                <div class="col-sm-12">
                                    <div class="form-group form-group-default">
                                        <label>Name</label>
                                        <input id="product_name" type="text" class="form-control" placeholder="fill name" name="nama" >
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group form-group-default">
                                        <label>Price</label>
                                        <input id="price" type="number" class="form-control" placeholder="fill price" name="price" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group form-group-default">
                                        <label>Description</label>
                                        <textarea id="description" type="text" class="form-control" placeholder="fill description" name="desc" cols="30" rows="10" required></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group form-group-default">
                                            <label>Categories</label>
                                            <select class="col-sm-12" name="categories[]" multiple="multiple" data-plugin-multiselect="" required >
                                                @foreach ($categories as $category)
                                                    <option value={{ $category->id }}>*{{ $category->category_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group form-group-default">
                                                <label>Stock</label>
                                                <input id="stock" type="number" class="form-control" placeholder="fill stock" name="stock" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group form-group-default">
                                                <label>Weight</label>
                                                <input id="weight" type="number" class="form-control" placeholder="fill weight" name="weight" required>
                                            </div>
                                        </div>
                                </div>

                                <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group form-group-default">
                                                <label>Diskon</label>
                                                <input id="percentage" type="number" class="form-control" placeholder="fill percentage" name="diskon" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group form-group-default">
                                                <label>Start Date</label>
                                                <input id="start" type="date" class="form-control" placeholder="fill start date" name="start" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group form-group-default">
                                                <label>End Date</label>
                                                <input id="end" type="date" class="form-control" placeholder="fill end date" name="end" required>
                                            </div>
                                        </div>
                                </div>
                                
                                <div class="modal-footer no-bd">
                                        <button type="submit" id="addRowButton" class="btn btn-primary">Update</button>
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
   
    {{-- Modal Delete --}}
    <div class="modal fade" id="productDelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                        <h5 class="modal-title">
                                <span class="fw-mediumbold">
                                Delete</span> 
                                <span class="fw-light">
                                    Product
                                </span>
                            </h5>
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                </div>
                <div class="modal-body">
                    <form id="demo-form" class="form-horizontal mb-lg" novalidate="novalidate" method="POST" action="{{route('product.destroy','do-delete')}}">
                        @method('DELETE')
                        @csrf
                        <div class="form-group mt-lg">
                            <div class="text-center">
                                <input type="hidden" name="idproduct" id="idproduct">
                                <h5>Are you sure want to delete this product? </h5>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger">Confirm</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                </div>
            </form>
            </div>
        </div>
    </div>

@endsection