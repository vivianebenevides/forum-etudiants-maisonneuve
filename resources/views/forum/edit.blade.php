@extends('layouts.app')
@section('title', trans('lang.text_edit_article'))
@section('titleHeader', trans('lang.text_edit_article'))
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
    <div class="row mt-4 justify-content-center">
        <div class="col-6">
            <div class="card">
                <form method="post">
                    @csrf
                    @method('put')
                    <div class="card-body">
                        <label for="title_en">English Title</label>
                        <input type="text" id="title_en" name="title_en" 
                        class="form-control" value="{{$forumPost->title_en}}">
                        <br>
                        <label for="title_fr">Titre Français</label>
                        <input type="text" id="title_fr" name="title_fr" 
                        class="form-control" value="{{$forumPost->title_fr}}">
                        <br>
                        <label for="article_en">English Article</label>
                        <textarea name="body_en" id="article_en"class="form-control">{{$forumPost->body_en}}</textarea>
                        <br>
                        <label for="article_fr">Article Français</label>
                        <textarea name="body_fr" id="article_fr"class="form-control">{{$forumPost->body_fr}}</textarea>
                    </div>
                    <div class="card-footer text-center">
                        <input type="submit" class="btn btn-custom btn-primary" value="@lang('lang.text_save')">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection