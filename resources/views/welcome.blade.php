<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <div class="row">
        <div class="card col-4" style="width: 18rem;">
            <div class="card-body">
              <h5 class="card-title">Admin</h5>
              <h6 class="card-subtitle mb-2 text-muted">Go to Admin Page</h6>
              <a href="{{ route('login','admin') }}" class="card-link">Admin Login</a>
              <a href="{{ route('register','admin') }}" class="card-link">Admin Register</a>
            </div>
          </div>
          <div class="card col-4" style="width: 18rem;">
            <div class="card-body">
              <h5 class="card-title">Teacher</h5>
              <h6 class="card-subtitle mb-2 text-muted">Go to Teacher Page</h6>
              <a href="{{ route('login','teacher') }}" class="card-link">Teacher Login</a>
              <a href="{{ route('register','teacher') }}" class="card-link">Teacher Register</a>
            </div>
          </div>
          <div class="card col-4" style="width: 18rem;">
            <div class="card-body">
              <h5 class="card-title">Student</h5>
              <h6 class="card-subtitle mb-2 text-muted">Go to Student Page</h6>
              <a href="{{ route('login','student') }}" class="card-link">Student Login</a>
              <a href="{{ route('register','student') }}" class="card-link">Student Register</a>
            </div>
          </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
    </script>
</body>

</html>
