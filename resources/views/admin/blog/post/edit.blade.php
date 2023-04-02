@extends('admin.blog.post.post-template')

@section('head')
@parent
    <title>Edit Blog Post</title>
    <script>
        /*to prevent Firefox FOUC, this must be here*/
        let FF_FOUC_FIX;
      </script>
@endsection

@section('style')
<style>
    .button-list {
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
<div id="deltadata" data-delta="{{$post->content_delta}}" onchange="myfunc()"></div>
<div class="row">
    <div class="ten columns">
        <h3>Edit Blog Post</h3>
    </div>
    <div class="two columns">
        <a href="{{route('blog.home')}}" class="button">Back</a>
    </div>
</div>
<hr>
<div id="form-container" class="container">
    <form action="{{route('post.update', $post->id)}}" method="post">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="six columns">
              <label for="date">Date</label>
              <input class="u-full-width" type="date" name="date" value="{{$post->date}}" required>
            </div>
            <div class="six columns">
              <label for="category">Category</label>
              <select class="u-full-width" name="category_id" required>
                <option value="{{$post->category->id}}">{{ $post->category->category }}</option>
                @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{ $category->category }}</option>
                @endforeach
              </select>
            </div>
        </div>
        {{-- judul --}}
        <label for="title">Judul</label>
        <input class="u-full-width" type="text" name="title" placeholder="judul blog" value="{{$post->title}}" required>
        {{-- quill content --}}
        <label for="">Content</label>
        <input type="hidden" name="content_delta">
        <input type="hidden" name="content_html">
        <div id="editor-container" style="min-height:470px; margin-bottom: 20px;">
        </div>
        <div class="button-list">
            <button type="submit" class="button" name="draft" value="true">Save to Draft</button>
            <button type="submit" class="button-primary" name="draft" value="false">Publish</button>
        </div>
    </form>
</div>
@endsection

@push('other-script')
<script>
    var dataDelta = document.querySelector('#deltadata');
    // console.log("p", dataDelta.dataset.delta); 

    var toolbarOptions = [
        [
            { 'header': [2, 3, 4, 5, 6, false] },
            'bold', 'italic', 'underline', 'strike', 'blockquote', 'code-block',
            { 'list': 'ordered'}, { 'list': 'bullet' },
            { 'align': [] }, 'clean'
        ],
    ];
    
    var quill = new Quill('#editor-container', {
        modules: {
            toolbar: toolbarOptions,
        },
        placeholder: 'Write your blog post...',
        theme: 'snow'
    });

    quill.setContents(JSON.parse(dataDelta.dataset.delta));

    var form = document.querySelector('form');
    form.onsubmit = function() {
        // Populate hidden form on submit
        var content_delta = document.querySelector('input[name=content_delta]');
        content_delta.value = JSON.stringify(quill.getContents());

        console.log("Submitted", content_delta);

        var content_html = document.querySelector('input[name=content_html]');

        content_html.value = quill.root.innerHTML;

        // No back end to actually submit to!
        // alert('Open the console to see the submit data!')
        // return false;
    };
</script>    
@endpush
