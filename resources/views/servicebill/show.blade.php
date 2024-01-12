@extends('layouts.master')

@section('title', 'ServiceBill | ')
@section('content')
    @include('partials.header')
    @include('partials.sidebar')
    <Style>
        /* bootstrap.css */
* {
   font-size: 16px;
   line-height: 1.428;
}

/* style.css */
* {
   font-size: 16px;
   line-height: 2;
}


    </Style>
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-file-text-o"></i> ServiceBill</h1>
                <p>A Printable ServiceBill Format</p>
            </div>
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
                <li class="breadcrumb-item"><a href="#">ServiceBill</a></li>
            </ul>
        </div>

        <div class="row " style="margin-left:20px">
            <div class="col-md-9">
                <div class="tile">
                    <section class="invoice">
                      <br>
                      <br><br>
                      <div class="mx-auto" style="width: 200px;">
                        <h1 class="text-right ">BILL/INVOICE </h1>
                      </div>

                        <div class="row mb-4">
                            <div class="col-8">

                                <br>
                                <h6 class="text-left">Date:  {{ $showservicebills->date }}</h6>
                                <h6 class="text-left">Ref: {{ $showservicebills->ref }}</h6>
                            </div>
                        </div>


                        <div class="row invoice-info">
                            <div class="col-4">To
                                <address>The President/Secretary /Owner’s<br>{{ $showservicebills->project->name}}<br>{{ $showservicebills->project->address }}<br>

                            </div>

                            <br>
                            <br><br><br>
                        </div>
                        <div class="row invoice-info">
                            <div class="col-8">
                                <address><strong>Subject: Bill for the servicing of  {{ $showservicebills->project->unit }} Unit Passenger Lift. </strong>
                                    <br> <br><br>
                                    <strong>Dear Sir,</strong>

                            </div>
                        </div>

                        <div class="row invoice-info">
                            <div class="col-11">
                          <p>As per agreement issued on {{ $showservicebills->project->agreement_date }} , payment of the outstanding amount is about to become
                                        due  for the  month of  {{ $showservicebills->bill_month }} Please make necessary arrangements to clear the bill as below.
                            </p>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-12 table-responsive table-bordered ">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th style="text-align: center">ITEM/PRODUCT</th>
                                        <th style="text-align: center">UNIT</th>
                                        <th style="text-align: center" >PER MONTH</th>
                                        <th style="text-align: center">TOTAL AMOUNT</th>
                                     </tr>
                                    </thead>
                                    <tbody>


                                    <tr>
                                        <td>Passenger Lift</td>
                                        <td style="text-align: center">{{ $showservicebills->project->unit }} </td>
                                        <td style="text-align: center">{{ $showservicebills->project->s_charge }} </td>
                                        <td style="text-align: center"> {{ $showservicebills->project->s_charge }}</td>

                                     </tr>

                                    </tbody>

                                </table>
                            </div>
                        </div>
                        <br>
                        <div class="row invoice-info">
                            <div class="col-12">
                          <p>In Word: Three Thousand Only.</p>
                        </div>
                        </div>
                        <div class="row invoice-info">
                            <div class="col-12">
                          <p>You are therefore requested to kindly make the payment at your earliest convenience.</p>
                          <br>
                          <p>Thanking You,</p>
                          <br><br>
                        </div>
                        </div>
                        <div class="col-6">
                            <h2 class="page-header"><i class=""><img width="140 px" class="app-sidebar__user-avatar" src="{{ URL::to('/assets/images/user/signeture.png') }}" > </i> </h2>
                        </div>

<br><br>

                        <div class="row invoice-info">
                            <div class="col-12">
                            <p>Firoz Ahmed <br>
                               CEO<br>
                               GenTec
                            </p>
                        </div>
                        </div>


                        <div class="row d-print-none mt-2">
                            <div class="col-12 text-right"><a class="btn btn-primary" href="javascript:void(0);" onclick="printInvoice();"><i class="fa fa-print"></i> Print</a></div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </main>


    <script>
    function printInvoice() {
        window.print();
    }
    </script>

@endsection
@push('js')
@endpush





