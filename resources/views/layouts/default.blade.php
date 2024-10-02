<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'demo app')</title>

    <!-- This is where additional styles specific to pages can go -->
    @stack('styles')

    <style>
        #text {
            height: 25px;
            border-radius: 5px;
            padding: 4px;
            border: solid thin #aaa;
            width: 100%;
            box-shadow: inset 2px 2px 5px rgb(219, 199, 219);
        }

        #button {
            padding: 10px;
            width: 100px;
            color: white;
            background-color: plum;
            border: none;
            border-radius: 4px;
        }

        #box {
            background-color: white;
            margin: auto;
            width: 300px;
            padding: 20px;
        }

        .title {
            font-size: 40px;
            margin: 10px;
            color: black;
            font-weight: 700;
            text-align: center;
        }
    </style>

</head>
<body>
@yield('content')
</body>
</html>
