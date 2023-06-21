@extends('layouts.app')
@section('title', trans('lang.text_title_welcome'))
@section('titleHeader', trans('lang.text_title_welcome'))
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
        <div class="row">
            <div class="col-12 text-center">
                <h3 class="pt-4 pb-4">@lang('lang.text_welcome')</h3>
                <a href="{{ route('forum.index')}}" class="btn btn-custom btn-primary btn-lg">@lang('lang.text_show_articles')</a>
            </div>
        </div>
@endsection  