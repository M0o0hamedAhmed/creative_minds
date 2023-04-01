@extends('layouts.master')

@section('title')
    Edit
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
                <h4 class="mb-0"> {{trans('main.Grades')}}</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="#" class="default-color">{{trans('main.main_page')}}</a>
                    </li>
                    <li class="breadcrumb-item active">{{trans('main.Grades')}}</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <!-- main body -->
    <div class="modal-body">
        <!-- add_form -->
        <form id="myFormAdd" method="POST" action="{{route('users.update',$user->id)}}">
            @csrf
            {{ method_field('PATCH') }}
            <div class="row">
                <div class="col">
                    <label for="Name"
                           class="mr-sm-2"> UserName
                        :</label>
                    <input id="Name" type="text" name="user_name" class="form-control" value="{{$user->user_name}}">
                </div>
                <div class="col">
                    <label for="Name_en"
                           class="mr-sm-2">mobile_number
                        :</label>
                    <input type="number" class="form-control" name="mobile_number" value="{{$user->mobile_number}}" required >
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

    <!-- row closed -->
@endsection
@section('js')


@endsection
