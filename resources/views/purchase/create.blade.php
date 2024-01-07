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
                <li class="breadcrumb-item">Purchase/li>
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
            <a class="btn btn-primary" href="{{route('purchaseitem.getitem')}}"><i class="fa fa-edit"></i> Add Purchase Item</a>
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
                                <button class="btn btn-success" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Add Purchase</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>

     </main>
@endsection
@push('js')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
     <script src="{{asset('/')}}js/multifield/jquery.multifield.min.js"></script>






@endpush



