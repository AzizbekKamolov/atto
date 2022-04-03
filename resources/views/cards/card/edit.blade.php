@extends('layouts.admin')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Population card edit</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">@lang('global.home')</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('permissionIndex') }}">@lang('cruds.permission.title')</a></li>
                        <li class="breadcrumb-item active">@lang('global.add')</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->

    <section class="content">
        <div class="row">


            <div class="col-lg-8 offset-lg-2 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Edit</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('populationUpdate', ['id' => $population->id]) }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label>Card number</label>
                                <input type="text" name="card_number" class="form-control {{ $errors->has('name') ? "is-invalid":"" }}" value="{{ $population->card_number }}" required>
                                @if($errors->has('name') || 1)
                                    <span class="error invalid-feedback">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Expire</label>
                                <input type="text" name="expire" class="form-control" value="{{ $population->expire }}">
                            </div>
                            <div class="form-group">
                                <label>Owner</label>
                                <input type="text" name="client_id" class="form-control" value="{{ $population->client->name.' '.$population->client->sure_name }}" disabled>
                            </div>
                            <div class="form-group">
                                <label>Account</label>
                                <input type="text" name="account" class="form-control" value="{{ $population->account }}">
                            </div>
                            <div class="form-group">
                                <label>Balance</label>
                                <input type="text" name="balance" class="form-control" value="{{ $population->balance }}">
                            </div>
                            <div class="form-group">
                                <label>Status</label>
                                <input type="text" name="status" class="form-control" value="{{ $population->status }}">
                            </div>
                            <div class="form-group">
                                <label>State</label>
                                <input type="text" name="state" class="form-control" value="{{ $population->state }}">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success float-right">@lang('global.save')</button>
                                <a href="{{ route('populationIndex') }}" class="btn btn-default float-left">@lang('global.cancel')</a>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
