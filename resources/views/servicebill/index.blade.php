

@extends('layouts.master')

@section('titel', 'ServiceBill | ')
@section('content')
    @include('partials.header')
    @include('partials.sidebar')

    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-th-list"></i> ServiceBill Table</h1>
            </div>
            <ul class="app-breadcrumb breadcrumb side">
                <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
                <li class="breadcrumb-item">ServiceBill</li>
                <li class="breadcrumb-item active"><a href="#">ServiceBill Table</a></li>
            </ul>
        </div>
        <div class="">
            <a class="btn btn-primary" href="{{route('project.create')}}"><i class="fa fa-plus"></i> Create New ServiceBill</a>
        </div>

        <div class="row mt-2">
            <div class="col-md-12">
                <div class="tile">
                    <div class="tile-body">
                        <table class="table table-hover table-bordered" id="sampleTable">
                            <thead>
                            <tr>
                                <th>SL.NO.</th>
                                <th>Date </th>
                                <th>ref </th>
                                <th>projects </th>
                                <th>Address </th>
                                <th>Unit </th>
                                <th>agreement </th>
                                <th>Bill For Month Of </th>
                                <th>Service Charge </th>
                                <th>Status </th>
                                <th>Action</th>
                            </tr>
                            </thead>
                             <tbody>
                                <?php $i = 0?>
                             @foreach($servicebills as $bill)
                             <?php $i++ ?>
                                 <tr>
                                     <td>{{$i}}</td>
                                     <td>{{$bill->date}}</td>
                                     <td>{{$bill->ref}}</td>
                                     <td>{{$bill->projects_id}}</td>
                                     <td>{{$bill->address}}</td>
                                     <td>{{$bill->unit}}</td>
                                     <td>{{$bill->agreement}}</td>
                                     <td>{{$bill->bill_month}}</td>
                                     <td>{{$bill->s_charge}}</td>
                                     <td>{{ $bill->status==1  ? 'paid' : 'Due'}}</td>
                                     <td>
                                         <a class="btn btn-primary btn-sm" href="{{route('servicebill.show', $bill->id)}}"><i class="fa fa-eye" ></i></a>
                                         <a class="btn btn-info btn-sm" href="{{route('servicebill.edit', $bill->id)}}"><i class="fa fa-edit" ></i></a>

                                         <button class="btn btn-danger btn-sm waves-effect" type="submit" onclick="deleteTag({{ $bill->id }})">
                                             <i class="fa fa-trash"></i>
                                         </button>
                                         <form id="delete-form-{{ $bill->id }}" action="{{ route('servicebill.destroy',$bill->id) }}" method="POST" style="display: none;">
                                             @csrf
                                             @method('DELETE')
                                         </form>
                                     </td>
                                 </tr>
                             @endforeach
                            </tbody>
                        </table>
                        {{ $servicebills->links() }}
                    </div>
                </div>
            </div>
        </div>

    </main>



@endsection

@push('js')
    <script type="text/javascript" src="{{asset('/')}}js/plugins/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="{{asset('/')}}js/plugins/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript">$('#sampleTable').DataTable();</script>
    <script src="https://unpkg.com/sweetalert2@7.19.1/dist/sweetalert2.all.js"></script>
    <script type="text/javascript">
        function deleteTag(id) {
            swal({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: false,
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    event.preventDefault();
                    document.getElementById('delete-form-'+id).submit();
                } else if (
                    // Read more about handling dismissals
                    result.dismiss === swal.DismissReason.cancel
                ) {
                    swal(
                        'Cancelled',
                        'Your data is safe :)',
                        'error'
                    )
                }
            })
        }
    </script>
@endpush
