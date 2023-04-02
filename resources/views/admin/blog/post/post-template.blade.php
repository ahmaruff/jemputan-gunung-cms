<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @section('head')
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/skeleton/2.0.4/skeleton.min.css" integrity="sha512-EZLkOqwILORob+p0BXZc+Vm3RgJBOe1Iq/0fiI7r/wJgzOFZMlsqTa29UEl6v6U6gsV4uIpsNZoV32YZqrCRCQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link href="//cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    @show

    <style>
        input[type="date"] {
            height: 38px;
            padding: 6px 10px; /* The 6px vertically centers text on FF, ignored by Webkit */
            background-color: #fff;
            border: 1px solid #D1D1D1;
            border-radius: 4px;
            box-shadow: none;
            box-sizing: border-box;
            -webkit-appearance: none;
            -moz-appearance: none;
        }

        input[type="date"]:focus {
            border: 1px solid #33C3F0;
        }
    </style>

    @yield('style')
</head>
<body>
    <div class="container" style="margin-top: 5rem;">
        @yield('content')
    </div>

    @section('script')
        <script src="//cdn.quilljs.com/1.3.6/quill.min.js"></script>
    @show

    @stack('other-script')
</body>
</html>