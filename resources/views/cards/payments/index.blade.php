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
                        @can('permission.add')
                            <a href="{{ route('populationCreate') }}" class="btn btn-success btn-sm float-right">
                                <span class="fas fa-plus-circle"></span>
                                @lang('global.add')
                            </a>
                        @endcan
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <!-- Data table -->
                        <table id="dataTable" class="table table-bordered table-striped dataTable dtr-inline table-responsive-lg" role="grid" aria-describedby="dataTable_info">
                            <thead>
                            <tr>
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
                                    <td><span class="text-center btn-outline-dark">{{ $population->card_number }}</span></td>
                                    <td><span class="text-center btn-outline-dark">{{ $population->expire }}</span></td>
                                    <td><span class="text-center btn-outline-dark">{{ $population->owner }}</span></td>
                                    <td><span class="text-center btn-outline-dark">{{ $population->account }}</span></td>
                                    <td><span class="text-center btn-outline-dark">{{ $population->balance }}</span></td>
                                    <td><span class="text-center btn-outline-dark">{{ $population->status }}</span></td>
                                    <td><span class="text-center btn-outline-dark">{{ $population->state }}</span></td>
                                   <td> <form action="" method="post">
                                           @csrf
                                           <div class="btn-group">
                                               <a href="{{ route('populationShow', $population->id) }}" type="button" class="btn btn-success btn-sm">View</a>
                                           @can('permission.edit')
                                                   <a href="{{ route('populationEdit', ['id' => $population->id]) }}" type="button" class="btn btn-info btn-xs"> Edit  </a>
                                               @endcan
                                                   <a href="{{ route('populationDelete', ['id' => $population->id]) }}" type="button" class="btn btn-danger btn-sm" onclick="if (confirm('Вы уверены?')) {this.form.submit()}"> Delete</a>
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
