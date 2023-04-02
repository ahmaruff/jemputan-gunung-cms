@extends('admin.blog.post.post-template')

@section('head')
    @parent
    <title>{{ $post->title }}</title>
@endsection

@section('style')
    <style>
        .info-list {
            display: flex;
            flex-direction: row;
            flex-wrap: nowrap;
            justify-content: flex-start;
            align-items: stretch;
            align-content: stretch;
        }
        
        .button-list > button:nth-child(2) {
            margin-left: 20px;
        }
    </style>
@endsection

@section('content')
    <div class="ql-container">
        <h1>{{ $post->title }}</h1>
        <div class="row">
            <h6 class="two columns">{{ $post->date }}</h6>
            <h6 class="two columns"> <em><strong>{{ $post->category->category }}</strong></em> </h6>
            <a href="{{route('blog.home')}}" class="two columns button u-pull-right">Back</a>
        </div>
        <hr style="margin:0;">
        <div class="ql-editor">
            {!! $post->content_html !!}
        </div>
    </div>
@endsection

@section('script')
    {{-- overwrite template, not initialize quill js --}}
@endsection