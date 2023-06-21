@extends('layouts.app')
@section('title', trans('lang.text_title_welcome'))
@section('content')

    <style>
        .btn-custom {
            background-color: navy;
            color: white;
            border: navy;
        }
        .btn-custom.btn-primary:hover {
            background-color: #40B1C0; 
            color: white;
            border: white;
        }
    </style>

    <main class="login-form">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-4 pt-4">
                    <div class="card">
                        <h3 class="card-header text-center">
                        @lang('lang.text_login')
                        </h3>
                        <div class="card-body">
                        @if(session('success'))
                            <div class=
                            "alert alert-success alert-dismissible fade show" role="alert">
                            {{session('success')}}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                        @if($errors)
                            <ul>
                                @foreach($errors->all() as $error)
                                <li class='text-danger'>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif
                            <form action="{{route('login.authentication')}}" method="post">
                                @csrf
                                <div class="form-group mb-3">
                                    <input type="email" placeholder="@lang('lang.text_email')" class="form-control" name="email" value="{{old('email')}}">
                                    @if ($errors->has('email'))
                                        <div class="text-danger mt-2">
                                        {{$errors->first('email')}}
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group mb-3">
                                    <input type="password" placeholder="@lang('lang.text_password')" class="form-control" name="password">
                                    @if ($errors->has('password'))
                                        <div class="text-danger mt-2">
                                        {{$errors->first('password')}}
                                        </div>
                                    @endif
                                </div>
                                <div class="d-grid mx-auto">
                                    <input type="submit" value="@lang('lang.text_login')" class="btn btn-custom btn-primary btn-block">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection