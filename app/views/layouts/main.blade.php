<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Nitesh Blog</title>

    {{ HTML::style('packages/bootstrap/css/bootstrap.min.css') }}
    {{ HTML::style('packages/bootstrap/css/newCss.css') }}


</head>
<body>
@yield('content')
@yield('scripts')
</body>
</html>