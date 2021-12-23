<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    @if (Session::has('success'))
        <p>{{ Session::get('success') }}</p>
    @endif
    <p>
        {{ Session::get('admin') }}
    </p>
    <h1>I am admin</h1>
    <a href="{{ route('admin.logout') }}"
        onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">
        Logout
    </a>
    <form id="frm-logout" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
        {{ csrf_field() }}
    </form>
</body>

</html>
