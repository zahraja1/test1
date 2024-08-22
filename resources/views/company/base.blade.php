@extends('template.base')

@section('title', 'company')

@section('content')

<!-- Header -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Company Data</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Company Data</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<!-- End Header -->

<!-- Main Content -->

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">

                        <!-- Tombol Add Data di sebelah kanan -->
                        <a href="{{route('form.create.company')}}" class="btn btn-primary btn-md">Add Data</a>
                    </div>

                    <div class="card-body table-responsive p-0">
                        <!-- Alert Create -->
                        @if(Session::get('Create'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ Session::get('create')}}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif
                        <!-- End Alert Create -->

                        <!-- Alert Delete -->
                        @if(Session::get('delete'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ Session::get('delete')}}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif
                        <!-- End Alert Delete -->

                        <!-- Alert Update -->
                        @if(Session::get('update'))
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            {{ Session::get('update')}}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif
                        <!-- End Alert Update -->

                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Logo</th>
                                    <th>Website</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($company as $row)
                                <tr>
                                    <td>{{$row->name}}</td>
                                    <td>{{$row->email}}</td>
                                    <td>
                                        <img src="{{ asset('storage/'.$row->logo) }}" alt="{{ $row->name }}" width="50" height="50">
                                    </td>
                                    <td>
                                        <a href="{{$row->website}}">website</a>
                                    </td>

                                    <td>
                                        <a href="{{route('edit.form.company', $row->id)}}" class="btn btn-secondary">Edit</a>
                                        <a href="{{ route('delete.company', $row->id)}}" class="btn btn-danger" data-toggle="modal" data-target="#delete{{$row->id}}">Delete</a>
                                        <a href="{{ route('detail.company', $row->id)}}" class="btn btn-danger" data-toggle="modal" data-target="#detail{{$row->id}}">Detail</a>
                                       
                                    </td>

                                    @include('company.delete')
                                    @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Main Content -->
@endsection