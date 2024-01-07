@extends('layouts.master')

@section('title', 'Income | ')
@section('content')
    @include('partials.header')
    @include('partials.sidebar')
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-edit"></i> Update Income</h1>
                <p>Update Income</p>
            </div>
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
                <li class="breadcrumb-item">Forms</li>
                <li class="breadcrumb-item"><a href="#">Update Income</a></li>
            </ul>
        </div>


        <div class="row">
            <div class="clearix"></div>
            <div class="col-md-12">
                <div class="tile">
                    <h3 class="tile-title">Income Update</h3>
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
                        <form  method="POST" action="{{route('income.update',$incomeedit->id)}}">
                            @csrf
                            @method('PUT')
                            <div class="row">

                                <div class="col-xs-6 col-sm-6">
                                    <div class="form-group col-md-6">
                                        <label class="control-label">Income Name</label>
                                        <select name="name" class="form-control">
                                            <option name="name" value="{{$incomeedit->name}}">{{$incomeedit->name}}</option>
                                            @foreach($incomeitemedit as $incomeItem)
                                                <option name="name" value="{{$incomeItem->name}}">{{$incomeItem->name}} </option>
                                            @endforeach
                                        </select>
                                        @error('income_item_id')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label class="control-label">Particular</label>
                                        <input name="particular"  class="form-control "  value="{{ $incomeedit->particular}}" type="text" >
                                        @error('particular')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6">
                                    <div class="form-group col-md-6">
                                        <label class="control-label">Qty</label>
                                        <input name="qty"  class="form-control"  value="{{ $incomeedit->qty}}" type="text" >
                                        @error('qty')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label class="control-label">Price</label>
                                        <input name="amount"  class="form-control"  value="{{ $incomeedit->amount}}" type="text" >
                                        @error('amount')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                              </div>

                            <div class="form-group col-md-4 align-self-end">
                                <button class="btn btn-success" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update</button>
                            </div>
                        </form>
                    </div>
                </div>


            </div>
        </div>







    </main>

@endsection
@push('js')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
    <script src="{{asset('/')}}js/multifield/jquery.multifield.min.js"></script>





@endpush



