@extends('template.base')

@section('title', 'Company')

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
                        <a href="{{ route('index.company') }}" class="btn btn-primary btn-md">Back</a>
                    </div>

                    <div class="card-body table-responsive p-0">
                        <!-- Alert Create -->
                        @if(Session::has('create'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ Session::get('create') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Logo</th>
                                    <th>Website</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $company->name }}</td>
                                    <td>{{ $company->email }}</td>
                                    <td>
                                        <img src="{{ asset('storage/'.$company->logo) }}" alt="{{ $company->name }}" width="50" height="50">
                                    </td>
                                    <td>
                                        <a href="{{$company->website}}">website</a>
                                    </td>
                                </tr>
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
