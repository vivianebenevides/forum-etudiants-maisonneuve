@extends('layouts.app')
@section('title', 'Article')
@section('titleHeader', 'Article')
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
          .btn-custom-modifier.btn-primary:hover {
              background-color: navy; 
              color: white;
              border: white;
          }
          .btn-custom-danger.btn-primary:hover {
              background-color: black;
              color: white;
              border: white;
          }
          .btn-custom-modifier {
              background-color: #40B1C0;
              color: white;
              border: white;
          }
          .btn-custom-danger {
              background-color: red;
              color: white;
              border: red;
          }
        </style>    
        <div class="row mt-5">
            <div class="col-12">
                <a href="{{route('forum.index')}}" class="btn btn-custom btn-primary btn-sm">@lang('lang.text_return')</a>
                <hr>
                <h2 class='display-6 mt-5' >
                  @if(session('locale') == 'fr')
                    {{$forumPost->title_fr}}
                  @elseif(session('locale') == 'en')
                    {{$forumPost->title_en}}
                  @elseif(session('locale') == '')
                    {{$forumPost->title_en}}
                  @endif
                </h2>
                <p>
                  @if(session('locale') == 'fr')
                    {!! $forumPost->body_fr !!}
                  @elseif(session('locale') == 'en')
                    {!! $forumPost->body_en !!}
                  @elseif(session('locale') == '')
                    {!! $forumPost->body_en !!}
                  @endif
                </p>
                <p><strong>@lang('lang.text_author') :</strong> {{ $forumPost->forumHasUser->name }}</p>  
                <p><strong>@lang('lang.text_category') :</strong> {{ $forumPost->forumHasCategory?->category }}</p>   
            </div>
            <hr>
        </div>
        @if ($forumPost->user_id == Auth::user()->id) 
        <div class="row">
            <div class="col-4">
                <a href="{{route('forum.edit', $forumPost->id)}}" class="btn btn-custom-modifier btn-primary">@lang('lang.text_edit')</a>
            </div>
            <div class="col-4">
                <button type="button" class="btn btn-custom-danger btn-primary" data-bs-toggle="modal" data-bs-target="#modalDelete">
                @lang('lang.text_delete')
                </button>
            </div>
        @endif
        </div>

<!-- Modal -->
<div class="modal fade" id="modalDelete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">@lang('lang.text_title_modal')</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        @lang('lang.text_delete_modal')
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">@lang('lang.text_close')</button>
        <form method="post">
        @csrf
        @method('delete')
        <input type="submit" value="@lang('lang.text_delete')" class="btn btn-danger">
        </form>
      </div>
    </div>
  </div>
</div>
@endsection