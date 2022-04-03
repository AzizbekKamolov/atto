@extends('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Population cards</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">@lang('global.home')</a></li>
                        <li class="breadcrumb-item active">@lang('cruds.permission.title')</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Cards</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">
                                <i class="fas fa-filter"></i>
                                FILTR
                            </button>

                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form action="{{ route('populationIndex') }}" method="get">
                                            @csrf
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Filtr</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label>Card number</label>
                                                    <input type="text" name="card_number" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label>Account</label>
                                                    <input type="text" name="account" class="form-control">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button class="btn btn-primary">Filtration</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <a href="{{ route('populationIndex') }}" class="btn bg-gradient-yellow">CLEAR</a>

                            @can('permission.add')
                                <a href="{{ route('populationCreate') }}" class="btn btn-outline-success">
                                    <span class="fas fa-plus-circle"></span>
                                    @lang('global.add')
                                </a>
                            @endcan
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <!-- Data table -->
                        <table id="dataTable" class="table table-bordered table-striped dataTable dtr-inline table-responsive-lg" role="grid" aria-describedby="dataTable_info">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Card number</th>
                                <th>Expire</th>
                                <th>Owner</th>
                                <th>Account</th>
                                <th>Balance</th>
                                <th>Status</th>
                                <th>State</th>
                                <th>Transaction</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($populations as $population)
                                <tr>
                                    <td><span class="text-center btn-outline-dark">{{ $population->id }}</span></td>
                                    <td><span class="text-center btn-outline-dark">{{ $population->card_number }}</span></td>
                                    <td><span class="text-center btn-outline-dark">{{ $population->expire }}</span></td>
                                    <td><span class="text-center btn-outline-dark">{{ $population->client->name.' '.$population->client->sure_name }}</span></td>
                                    <td><span class="text-center btn-outline-dark">{{ $population->account }}</span></td>
                                    <td><span class="text-center btn-outline-dark">{{ $population->balance }}</span></td>
                                    <td><span class="text-center btn-outline-dark">{{ \App\Helpers\StatusHelpers::toMake($population->status) }}</span></td>
                                    <td><span class="text-center btn-outline-dark">{{ \App\Helpers\StateHelpers::toMake($population->state) }}</span></td>
                                   <td>
                                       <form action="" method="post">
                                           @csrf
                                           <div class="btn-group">
                                               <a href="{{ route('populationShow', $population->id) }}" type="button" class="btn btn-success btn-sm ml-2">View</a>
                                           @can('permission.edit')
                                                   <a href="{{ route('populationEdit', ['id' => $population->id]) }}" type="button" class="btn btn-info btn-xs ml-2"> Edit  </a>
                                            @endcan
                                                   <a href="{{ route('populationDelete', ['id' => $population->id]) }}" type="button" class="btn btn-danger btn-sm ml-2" onclick="if (confirm('Вы уверены?')) {this.form.submit()}"> Delete</a>
                                           </div>
                                       </form>
                                   </td>
                                </tr>
                            @endforeach
                            </tbody>

                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
@endsection
{{--                                    <td>{{ $permission->title }}</td>--}}
{{--                                    <td>--}}
{{--                                        @foreach($permission->roles as $role)--}}
{{--                                            <span class="badge badge-success">{{ $role->name }} </span>--}}
{{--                                        @endforeach--}}
{{--                                    </td>--}}
{{--                                    <td class="text-center">--}}
{{--                                        @can('permission.delete')--}}
{{--                                            <form action="{{ route('permissionDestroy',$permission->id) }}" method="post">--}}
{{--                                                @csrf--}}
{{--                                                <div class="btn-group">--}}
{{--                                                    @can('permission.edit')--}}
{{--                                                        <a href="{{ route('permissionEdit',$permission->id) }}" type="button" class="btn btn-info btn-sm"> @lang('global.edit')</a>--}}
{{--                                                    @endcan--}}
{{--                                                    <input name="_method" type="hidden" value="DELETE">--}}
{{--                                                    <button type="button" class="btn btn-danger btn-sm" onclick="if (confirm('Вы уверены?')) {this.form.submit()}"> @lang('global.delete')</button>--}}
{{--                                                </div>--}}
{{--                                            </form>--}}
{{--                                        @endcan--}}
