@extends('layouts.master')

@section('title', 'Add Purchase | ')
@section('content')
    @include('partials.header')
    @include('partials.sidebar')
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-edit"></i>Add New Purchase</h1>
            </div>
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
                <li class="breadcrumb-item">Purchase</li>
                <li class="breadcrumb-item"><a href="#">Add Purchase</a></li>
            </ul>
        </div>
        @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif
        <div class="">
            <a class="btn btn-primary" href="{{route('purchase.index')}}"><i class="fa fa-edit"></i> Manage Purchase</a>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                Add Purchase Item
              </button>
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                Add Supplier
              </button>

        </div>

        <div class="row mt-2">

            <div class="clearix"></div>
            <div class="col-md-12">
                <div class="tile">
                    <h3 class="tile-title">Purchase</h3>
                    <div class="tile-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form method="POST" action="{{route('purchase.store')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label class="control-label">Purchase Item Name</label>
                                    <select name="name" class="form-control">
                                        <option>Select Item Name</option>
                                        @foreach($purchaseitems as $purchaseit)
                                            <option name="name" value="{{$purchaseit->name}}">{{$purchaseit->name}} </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group col-md-6">
                                    <label class="control-label">Supplier Name</label>
                                    <select name="suppliername" class="form-control">
                                        <option>Select Supplier Name</option>
                                        @foreach($suppliers as $supplier)
                                            <option name="suppliername" value="{{$supplier->name}}">{{$supplier->name}} </option>
                                        @endforeach
                                    </select>
                                </div>
                            <div class="form-group col-md-6">
                                <label class="control-label">Particular</label>
                                <input name="particular" class="form-control @error('particular') is-invalid @enderror" type="text" placeholder="Enter  particular">
                                @error('particular')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label class="control-label">Qty</label>
                                <input name="qty" class="form-control @error('qty') is-invalid @enderror" type="text" placeholder="Enter qty">
                                @error('qty')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label class="control-label">Price</label>
                                <input name="amount" class="form-control @error('amount') is-invalid @enderror" type="text" placeholder="Enter amount">
                                @error('amount')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-4 align-self-end">
                                <button class="btn btn-success" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Add Supplier</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>

     </main>
      {{-- model --}}
      <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form method="POST" action="{{route('purchaseitem.storeitem')}}" enctype="multipart/form-data">
                @csrf
            <div class="modal-body">
                <div class="bank-inner-details">
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group">
                                <label>Item Name</label>
                                <input name="name" class="form-control @error('name') is-invalid @enderror" type="text" placeholder="Product Name">
                            </div>
                        </div>


                    </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            </form>
          </div>
        </div>
      </div>



      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">Supplier</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form method="POST" action="{{route('supplier.store')}}" enctype="multipart/form-data">
                @csrf
            <div class="modal-body">
                <div class="bank-inner-details">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label class="control-label">Supplier</label>
                            <input name="name" class="form-control @error('name') is-invalid @enderror" type="text" placeholder="Supplier Name">
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label class="control-label">Mobile</label>
                            <input name="mobile" class="form-control @error('mobile') is-invalid @enderror" type="text" placeholder="Enter Supplier mobile">
                            @error('mobile')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group col-md-6">
                            <label class="control-label">Address</label>
                            <input name="address" class="form-control @error('address') is-invalid @enderror" type="text" placeholder="Enter Supplier address">
                            @error('address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group col-md-6">
                            <label class="control-label">Supplier Details</label>
                            <input name="details" class="form-control @error('details') is-invalid @enderror" type="text" placeholder="Supplier Details">
                            @error('details')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            </form>
          </div>
        </div>
      </div>
@endsection



