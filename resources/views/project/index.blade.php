

@extends('layouts.master')

@section('titel', 'Invoice | ')
@section('content')
    @include('partials.header')
    @include('partials.sidebar')

    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-th-list"></i> Project Table</h1>
            </div>
            <ul class="app-breadcrumb breadcrumb side">
                <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
                <li class="breadcrumb-item">Project</li>
                <li class="breadcrumb-item active"><a href="#">Invoice Table</a></li>
            </ul>
        </div>
        <div class="">
            <a class="btn btn-primary" href="{{route('project.create')}}"><i class="fa fa-plus"></i> Create New Project</a>
        </div>

        <div class="row mt-2">
            <div class="col-md-12">
                <div class="tile">
                    <div class="tile-body">
                        <table class="table table-hover table-bordered" id="sampleTable">
                            <thead>
                            <tr>
                                <th>SL.NO.</th>
                                <th>Project Name </th>
                                <th>Mobile </th>
                                <th>Email </th>
                                <th>Address </th>
                                <th>Unit </th>
                                <th>Floor </th>
                                <th>Service Charge </th>
                                <th>Details </th>
                                <th>Status </th>
                                <th>Action</th>
                            </tr>
                            </thead>
                             <tbody>
                                <?php $i = 0?>
                             @foreach($projectlist as $project)
                             <?php $i++ ?>
                                 <tr>
                                     <td>{{$i}}</td>
                                     <td>{{$project->name}}</td>
                                     <td>{{$project->mobile}}</td>
                                     <td>{{$project->email}}</td>
                                     <td>{{$project->address}}</td>
                                     <td>{{$project->unit}}</td>
                                     <td>{{$project->floor}}</td>
                                     <td>{{$project->s_charge}}</td>
                                     <td>{{$project->details}}</td>
                                     <td>{{ $project->status==1  ? 'Active' : 'Inactive'}}</td>
                                     <td>
                                         <a class="btn btn-primary btn-sm" href="{{route('project.show', $project->id)}}"><i class="fa fa-eye" ></i></a>
                                         <a class="btn btn-info btn-sm" href="{{route('project.edit', $project->id)}}"><i class="fa fa-edit" ></i></a>

                                         <button class="btn btn-danger btn-sm waves-effect" type="submit" onclick="deleteTag({{ $project->id }})">
                                             <i class="fa fa-trash"></i>
                                         </button>
                                         <form id="delete-form-{{ $project->id }}" action="{{ route('project.destroy',$project->id) }}" method="POST" style="display: none;">
                                             @csrf
                                             @method('DELETE')
                                         </form>
                                     </td>
                                 </tr>
                             @endforeach
                            </tbody>
                        </table>
                        {{ $projectlist->links() }}
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

