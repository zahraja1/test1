@extends('template.base')

@section('title', 'Employee Form')

@section('content')
<!-- Header -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Employee Form</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active"><a href="#">Employee Data</a></li>
                    <li class="breadcrumb-item active">Employee Form</li>
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
                    <form action="{{ route('create.employe') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="firstName">First Name</label>
                                <input type="text" name="firstName" class="form-control @error('firstName') is-invalid @enderror" id="firstName" placeholder="First Name">
                                @error('firstName')
                                <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="lastName">Last Name</label>
                                <input type="text" name="lastName" class="form-control @error('lastName') is-invalid @enderror" id="lastName" placeholder="Last Name">
                                @error('lastName')
                                <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="company_id">Company</label>
                                <select name="company_id" class="form-control @error('company_id') is-invalid @enderror" id="company_id">
                                    <option value="">Select Company</option>
                                    @foreach($company as $row) <!-- Iterate with $companies and use $company for each item -->
                                    <option value="{{ $row->id }}" {{ old('company_id') == $row->id ? 'selected' : '' }}>
                                        {{ $row->company}}
                                    </option>
                                    @endforeach
                                </select>
                                @error('company_id')
                                <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Email">
                                @error('email')
                                <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" id="phone" placeholder="Phone">
                                @error('phone')
                                <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Main Content -->
@endsection