@extends('layouts.master')

@section('title', 'Service Bill | ')
@section('content')
    @include('partials.header')
    @include('partials.sidebar')
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-edit"></i> Add Service Bill </h1>
            </div>
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
                <li class="breadcrumb-item">Service Bill </li>
                <li class="breadcrumb-item"><a href="#">Add Service Bill </a></li>
            </ul>
        </div>
        @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif
        <div class="">
            <a class="btn btn-primary" href="{{route('servicebill.index')}}"><i class="fa fa-edit"></i> Manage Bill</a>
        </div>

         <div class="row mt2">
             <div class="clearix"></div>
            <div class="col-md-12">
                <div class="tile">
                    <h3 class="tile-title">Service Bill </h3>
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
                        <form  method="POST" action="{{route('servicebill.store')}}">
                            @csrf
                            <div class="row">
                                <div class="col-md-4">
                                  <div class="form-group">
                                    <label for="field1">Date:</label>
                                    <input type="date" class="form-control" value="<?php echo date('Y-m-d')?>" id="field1" name="date">
                                  </div>
                                </div>
                                <div class="col-md-4">
                                  <div class="form-group">
                                    <label for="field2">REF:</label>
                                    <input type="text" class="form-control" id="field2" name="ref">
                                  </div>
                                </div>
                                <div class="col-md-4">
                                  <div class="form-group">
                                    <label for="field3">Project:</label>
                                    <select name="project_id"id="projects" class="form-control project_id">
                                        <option>Select Project</option>
                                        @foreach($datas as $data)
                                            <option name="project_id"  id="projects" value="{{$data->id}}">{{$data->name}} </option>
                                        @endforeach
                                    </select>
                                  </div>
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-md-4">
                                  <div class="form-group">
                                    <label for="field1">Month of Bill:</label>
                                    <input type="text" class="form-control" id="field1" name="bill_month">
                                  </div>
                                </div>


                                <div class="form-group col-md-4">
                                    <label class="control-label">Status</label>
                                    <select name="status" class="form-control">
                                        <option>Select status</option>

                                            <option value="1"> active</option>
                                            <option value="2">inactive </option>

                                    </select>
                                  </div>
                              </div>

                            <div >
                                <button class="btn btn-primary" type="submit">Submit</button>
                            </div>
                     </form>
                    </div>
                </div>


                </div>
            </div>

    </main>

@endsection




