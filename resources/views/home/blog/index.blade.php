<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @dump($categories)
    @dump($posts)

    @foreach ($categories as $category)
        <a href="{{route('blog.category', $category->slug)}}">{{ $category->category }}</a> \\
    @endforeach
    <hr>
    @foreach ($posts as $post)
        <a href="/blog/{{$post->category->slug.'/'.$post->id.'/'.$post->slug}}">{{ $post->title }}</a>
        <br>
        <a href="{{route('blog.show', [$post->category->slug, $post->id, $post->slug])}}">{{ $post->title }}</a>
    @endforeach
</body>
</html>