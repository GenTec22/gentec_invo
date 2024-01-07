@extends('layouts.master')

@section('title', 'Invoice | ')
@section('content')
    @include('partials.header')
    @include('partials.sidebar')
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-file-text-o"></i> Project</h1>
                <p>Individual Project Details</p>
            </div>
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
                <li class="breadcrumb-item"><a href="#">Project</a></li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <section class="invoice">
                        <div class="row mb-4">
                            <div class="col-6">
                                <h2 class="page-header"><i class="fa fa-globe"></i> Project Details</h2>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-12 table-responsive">


                                <table class="table table-striped">
                                    <tbody>
                                      <tr>
                                        <th>Project Name</th>
                                        <td>{{$projectshow->name}}</td>
                                      </tr>
                                      <tr>
                                        <th>Project Address</th>
                                        <td>{{$projectshow->address}}</td>
                                      </tr>
                                      <tr>
                                        <th>Phone number</th>
                                        <td>{{$projectshow->mobile}}</td>
                                      </tr>
                                      <tr>
                                        <th>Email</th>
                                        <td>{{$projectshow->email}}</td>
                                      </tr>
                                      <tr>
                                        <th>Unit</th>
                                        <td>{{$projectshow->unit}}</td>
                                      </tr>
                                      <tr>
                                        <th>Floor</th>
                                        <td>{{$projectshow->floor}}</td>
                                      </tr>
                                      <tr>
                                        <th>Service Charge</th>
                                        <td>{{$projectshow->s_charge}}</td>
                                      </tr>
                                      <tr>
                                        <th>agreement_date</th>
                                        <td>{{$projectshow->agreement_date}}</td>
                                      </tr>
                                      <tr>
                                        <th>Details</th>
                                        <td>{{$projectshow->details}}</td>
                                      </tr>
                                      <tr>
                                        <th>Status</th>
                                        <td>{{$projectshow->status}}</td>
                                      </tr>
                                    </tbody>
                                  </table>
                            </div>
                        </div>
                        <div class="row d-print-none mt-2">
                            <div class="col-12 text-right"><a class="btn btn-primary" href="{{route('project.index')}}" target=""><i class="fa fa-arrow-left"></i> Back</a></div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </main>

@endsection
@push('js')
@endpush






