@extends('layouts.master')

@section('title')
    Users
@endsection

@section('css')
    /*
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">*/

@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0"> Users</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="#" class="default-color">{{trans('main.main_page')}}</a>
                    </li>
                    <li class="breadcrumb-item active">Users</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <!-- main body -->
    <div class="row">

        <div class="col-xl-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li> {{$error}} </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <button type="button" class="button x-small " data-toggle="modal" data-target="#addModel">
                       Add User
                    </button>
                    <br><br>
                    <div class="table-responsive">
                        <table id="dataTable" class="table table-striped table-bordered p-0">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th> {{trans('grades.Name')}}</th>
                                <th> {{trans('grades.Notes')}}</th>
                                <th> {{trans('grades.Processes')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>

                                    <td>{{$loop->index+1}}</td>
                                    <td>{{$user->user_name}} </td>
                                    <td>{{$user->mobile_number}} </td>
                                    <td>
                                        <form method="POST" action="{{route('users.destroy',$user->id)}}}">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}

                                        <a class="edit btn btn-danger btn-sm"
                                            href="{{route('users.edit',$user->id)}}" type="submit">Edit</a>

                                                <button class="delete btn btn-primary btn-sm" type="submit">Delete
                                                </button>
                                        </form>
                                    </td>

                                </tr>
                            @endforeach
                            </tbody>


                        </table>
                    </div>


                    <!-- add_modal_Grade -->
                    <div class="modal fade" id="addModel" tabindex="-1" role="dialog"
                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                        id="exampleModalLabel">
                                        Add User
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <!-- add_form -->
                                    <form id="myFormAdd" method="POST" action="{{route('users.store')}}">
                                        @csrf
                                        <div class="row">
                                            <div class="col">
                                                <label for="Name"
                                                       class="mr-sm-2"> UserName
                                                    :</label>
                                                <input id="Name" type="text" name="user_name" class="form-control">
                                            </div>
                                            <div class="col">
                                                <label for="Name_en"
                                                       class="mr-sm-2">mobile_number
                                                    :</label>
                                                <input type="number" class="form-control" name="mobile_number" required>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <label for="Name"
                                                       class="mr-sm-2"> Password
                                                    :</label>
                                                <input id="Name" type="text" name="password" class="form-control">
                                            </div>
                                            <div class="col">
                                                <label for="Name_en"
                                                       class="mr-sm-2">Confirmation Password
                                                    :</label>
                                                <input type="text" class="form-control" name="password_confirmation"
                                                       required>
                                            </div>
                                        </div>
                                        <br><br>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">{{ trans('grades.Close') }}</button>
                                            <button type="submit"
                                                    class="btn btn-success">{{ trans('grades.submit') }}</button>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>


                    {{--                    Edit Model --}}

                    <div class="modal fade" id="editModal" tabindex="-1" role="dialog"
                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                        id="exampleModalLabel">
                                        User
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <!-- edit_form -->
                                    <form id="myFormEdit" method="POST">
                                        @csrf
                                        <input type="hidden" name="id" class="form-control">
                                        <div class="row">
                                            <div class="col">
                                                <label for="Name"
                                                       class="mr-sm-2">{{ trans('grades.stage_name_ar') }}
                                                    :</label>
                                                <input id="Name" type="text" name="Name" class="form-control">
                                            </div>
                                            <div class="col">
                                                <label for="Name_en"
                                                       class="mr-sm-2">{{ trans('grades.stage_name_en') }}
                                                    :</label>
                                                <input type="text" class="form-control" name="Name_en" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label
                                                for="exampleFormControlTextarea1">{{ trans('grades.Notes') }}
                                                :</label>
                                            <textarea class="form-control" name="Notes" id="exampleFormControlTextarea1"
                                                      rows="3"></textarea>
                                        </div>
                                        <br><br>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">{{ trans('grades.Close') }}</button>
                                            <button type="submit"
                                                    class="btn btn-success">{{ trans('grades.submit') }}</button>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- row closed -->
@endsection
@section('js')


@endsection
