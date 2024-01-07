@extends('layouts.master')

@section('title', 'Project | ')
@section('content')
    @include('partials.header')
    @include('partials.sidebar')
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-edit"></i> Add Project</h1>
            </div>
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
                <li class="breadcrumb-item">Project</li>
                <li class="breadcrumb-item"><a href="#">Add Project</a></li>
            </ul>
        </div>


         <div class="row">
             <div class="clearix"></div>
            <div class="col-md-12">
                <div class="tile">
                    <h3 class="tile-title">Project</h3>
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
                        <form  method="POST" action="{{route('project.store')}}">
                            @csrf
                            <div class="row">
                                <div class="col-md-4">
                                  <div class="form-group">
                                    <label for="field1">Project Name:</label>
                                    <input type="text" class="form-control" id="field1" name="name">
                                  </div>
                                </div>
                                <div class="col-md-4">
                                  <div class="form-group">
                                    <label for="field2">Phone number:</label>
                                    <input type="text" class="form-control" id="field2" name="mobile">
                                  </div>
                                </div>
                                <div class="col-md-4">
                                  <div class="form-group">
                                    <label for="field3">Address:</label>
                                    <input type="text" class="form-control" id="field3" name="address">
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-4">
                                  <div class="form-group">
                                    <label for="field1">Email:</label>
                                    <input type="email" class="form-control" id="field1" name="email">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                  </div>
                                </div>
                                <div class="col-md-4">
                                  <div class="form-group">
                                    <label for="field2">Unit:</label>
                                    <input type="text" class="form-control" id="field2" name="unit">
                                  </div>
                                </div>
                                <div class="col-md-4">
                                  <div class="form-group">
                                    <label for="field3">Floor:</label>
                                    <input type="text" class="form-control" id="field3" name="floor">
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-4">
                                  <div class="form-group">
                                    <label for="field1">Service Charge:</label>
                                    <input type="text" class="form-control" id="field1" name="s_charge">
                                  </div>
                                </div>
                                <div class="col-md-4">
                                  <div class="form-group">
                                    <label for="field2">Agreement Date:</label>
                                    <input type="date" class="form-control" value="<?php echo date('Y-m-d')?>" name="agreement_date">
                                  </div>
                                </div>
                                <div class="col-md-4">
                                  <div class="form-group">
                                    <label for="field3">Details:</label>
                                    <input type="text" class="form-control" id="field3" name="details">
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



