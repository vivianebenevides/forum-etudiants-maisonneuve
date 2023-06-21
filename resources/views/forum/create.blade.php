@extends('layouts.app')
@section('title', trans('lang.text_title_form_add'))
@section('titleHeader', trans('lang.text_title_form_add'))
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
                    <div class="card-body">
                        <label for="title_en">English Title </label>
                        <input type="text" id="title_en" name="title_en" 
                        class="form-control">
                        @if ($errors->has('title_en'))
                            <div class="text-danger mt-2">
                                {{$errors->first('title_en')}}
                            </div>
                        @endif
                        <br>
                        <label for="title_fr">Titre Français</label>
                        <input type="text" id="title_fr" name="title_fr" 
                        class="form-control">
                        @if ($errors->has('title_fr'))
                            <div class="text-danger mt-2">
                                {{$errors->first('title_fr')}}
                            </div>
                        @endif
                        <br>
                        <label for="article_en">English Article</label>
                        <textarea name="body_en" id="article_en"class="form-control"></textarea>
                        @if ($errors->has('body_en'))
                            <div class="text-danger mt-2">
                                {{$errors->first('body_en')}}
                            </div>
                        @endif
                        <br>
                        <label for="article_fr">Article Français</label>
                        <textarea name="body_fr" id="article_fr"class="form-control"></textarea>
                        @if ($errors->has('body_fr'))
                            <div class="text-danger mt-2">
                                {{$errors->first('body_fr')}}
                            </div>
                        @endif
                        <br>
                        <label for="category">Categories</label>
                        <select name="category_id" id="category" class="form-control">
                            @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->category }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="card-footer text-center">
                        <input type="submit" class="btn btn-custom btn-primary" value="@lang('lang.text_save')">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection