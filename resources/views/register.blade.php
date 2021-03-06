<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</head>
<body>

    <form class="form-horizontal" action='{{ route($role.'.create') }}' method="POST">
        @csrf
      <fieldset>
        <div id="legend">
          <legend class="">{{ ucFirst($role) }} Register</legend>
        </div>
        <div class="control-group">
          <!-- Username -->
          <label class="control-label"  for="username">Username</label>
          <div class="controls">
            <input type="text" id="username" name="username" placeholder="" class="input-xlarge">
            <p class="help-block">Username can contain any letters or numbers, without spaces</p>
          </div>
        </div>

        <div class="control-group">
          <!-- E-mail -->
          <label class="control-label" for="email">E-mail</label>
          <div class="controls">
            <input type="text" id="email" name="email" placeholder="" class="input-xlarge">
            <p class="help-block">Please provide your E-mail</p>
            @error('email')
                {{ $message }}
            @enderror
          </div>
        </div>

        <div class="control-group">
          <!-- Password-->
          <label class="control-label" for="password">Password</label>
          <div class="controls">
            <input type="password" id="password" name="password" placeholder="" class="input-xlarge">
            <p class="help-block">Password should be at least 4 characters</p>
            @error('password')
                {{ $message }}
            @enderror
          </div>
        </div>

        <div class="control-group">
          <!-- Password -->
          <label class="control-label"  for="password_confirm">Password (Confirm)</label>
          <div class="controls">
            <input type="password" id="password_confirm" name="password_confirm" placeholder="" class="input-xlarge">
            <p class="help-block">Please confirm password</p>
            @error('password_confirm')
                {{ $message }}
            @enderror
          </div>
        </div>

        <div class="control-group">
          <!-- Button -->
          <div class="controls">
            <button class="btn btn-success">Register</button>
          </div>
        </div>
      </fieldset>
    </form>


</body>
</html>
