@extends('layouts.app')
@section('title', trans('lang.text_liste_articles'))
@section('titleHeader', 'Articles')
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
            .articles a {
                color: navy;
            }
            .articles a:hover {
                color: #40B1C0;
            }
            .no-list {
                list-style: none;
            }
        </style>
    <div>
        <div class="row">
            <div class="col-4">
                <h5>@lang('lang.text_new_article')</h5>
                <a href="{{ route('forum.create')}}" class="btn btn-custom btn-primary btn-sm">@lang('lang.text_add')</a>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>@lang('lang.text_liste_articles')</h4>
                        <p>@lang('lang.text_read_article')</p>
                    </div>
                    <div class="card-body">
                        <ul class="articles">
                        @forelse($posts as $post)
                            <li><a href="{{ route('forum.show', $post->id)}}">
                                @if(session('locale') == 'fr')
                                    {{$post->title_fr}}
                                @elseif(session('locale') == 'en')
                                    {{$post->title_en}}
                                @elseif(session('locale') == '')
                                    {{$post->title_en}}
                                @endif
                            </a></li>
                            <li class="no-list">{{ $post->ForumHasCategory->category }}</li>
                            <br>
                        @empty
                            <li class="text-danger">@lang('lang.text_no_articles')</li>
                        @endforelse
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection    