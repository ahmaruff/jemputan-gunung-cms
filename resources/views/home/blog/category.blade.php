<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @dump($posts)

    @foreach ($posts as $post)
        <a href="{{route('blog.show', [$post->category->slug, $post->id, $post->slug])}}">{{ $post->title }}</a>
        <hr>
    @endforeach
</body>
</html>