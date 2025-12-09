<!DOCTYPE html>
<html lang="en">
<head>
  @include('web.head')
</head>
<body>

  <div class="login-box" id="loginBox">

    <img src="public/assets/images/icon/admin.png" alt="Admin">
    <h2>Log in to continue.</h2>
    <form method="post">
      @csrf

      <input name="userid" placeholder="Enter Email ID" required >

      <input type="password" name="password" placeholder="Enter password" required>

      <button>Login</button>
      
    </form>
    @if(session()->has('error'))
    <div class="error-box">
      <p><strong>Error:</strong> {!! session()->get('error') !!}</p>
    </div>
    @endif
  </div>

  @include('web.script')

</body>
</html>
