@extends('layouts.app')
@section('title', trans('lang.text_registration'))
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
                        @lang('lang.text_registration')
                        </h3>
                        <div class="card-body">
                            @if(session('success'))
                                <div class="alert alert-success">
                                    {{session('success')}}
                                </div>
                            @endif
                            <form action="{{route('user.store')}}" method="post">
                                @csrf
                                <div class="form-group mb-3">
                                        <input type="text" placeholder="@lang('lang.text_name')" class="form-control"
                                        name="name" value="{{old('name')}}">
                                        @if ($errors->has('name'))
                                            <div class="text-danger mt-2">
                                                {{$errors->first('name')}}
                                            </div>
                                        @endif
                                </div>
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

                                <div class="form-group mb-3">
                                        <input type="text" placeholder="@lang('lang.text_address')" class="form-control" name="adresse" value="{{old('adresse')}}">
                                        @if ($errors->has('adresse'))
                                            <div class="text-danger mt-2">
                                                {{$errors->first('adresse')}}
                                            </div>
                                        @endif
                                </div>

                                <div class="form-group mb-3">
                                        <label for="ville">@lang('lang.text_city')</label>
                                        <select name="ville_id" id="ville" class="form-control">
                                            @foreach($villes as $ville)
                                            <option value="{{ $ville->id }}">{{ $ville->nom }}</option>
                                            @endforeach
                                        </select>
                                </div>

                                <div class="form-group mb-3">
                                        <input type="text" placeholder="Phone" class="form-control" name="phone" value="{{old('phone')}}">
                                        @if ($errors->has('phone'))
                                            <div class="text-danger mt-2">
                                                {{$errors->first('phone')}}
                                            </div>
                                        @endif
                                </div>

                                <div class="form-group mb-3">
                                        <label for="date_de_naissance">@lang('lang.text_date_birth')</label>
                                        <input type="date" placeholder="Date de naissance" class="form-control" name="date_de_naissance" value="{{old('date-de-naissance')}}">
                                        @if ($errors->has('date-de-naissance'))
                                            <div class="text-danger mt-2">
                                                {{$errors->first('date-de-naissance')}}
                                            </div>
                                        @endif
                                </div>
                                
                                <div class="d-grid mx-auto">
                                    <input type="submit" value="@lang('lang.text_save')" class="btn btn-custom btn-primary btn-block">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection