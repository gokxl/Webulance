<!DOCTYPE html>
<html>

<head>
  <title>Login page</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="./assets/css/main.css" />
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <!-- Popper JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>

<body>
  <!-- <form name="loginForm" method="post">
      <h2 class="text-center">Sign In</h2>
      <div class="form-group">
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text">
              <span class="fa fa-user"></span>
            </span>
          </div>
          <input
            type="text"
            name="uid"
            id="uid"
            class="form-control"
            placeholder="PatName"
            required="required"
          />
        </div>
      </div>
      <div class="form-group">
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text">
              <i class="fa fa-lock"></i>
            </span>
          </div>
          <input
            type="password"
            name="pwd"
            id="pwd"
            class="form-control"
            placeholder="Password"
            required="required"
          />
        </div>
      </div>
      <div class="form-group">
        <button
          type="submit"
          name="login"
          class="btn btn-primary btn-block"
          onclick="return loginSubmit();"
        >
          Log in
        </button>
      </div>
      <div class="bottom-action clearfix">
        <label class="float-left form-check-label"
          ><input type="checkbox" name="isadmin" id="isadmin" /> Login as
          Hospital-Service</label
        >
        <a href="#" class="float-right">Forgot Password?</a>
      </div>
    </form>
    <p class="text-center small">
      Don't have an account! <a href="addRegistration.php">Sign up here</a>.
    </p> -->
  <section class="left-pane">
    <img src="./assets/vectors/location.svg" alt="Il 1" height="300" />
    <div class="banner">
      <h1 class="main-heading">Webulance</h1>
      <p>
        Get help <span class="highlight">instantly</span>,
        <span class="highlight sec">anywhere</span>
      </p>
    </div>
  </section>
  <section class="right-pane">
    <form class="card" name="loginForm" method="POST">
      <h2>Login</h2>
      <h6>Please enter your credentials</h6>
      <input type="text" name="uid" id="uid" class="form-control" placeholder="Username" required="required" />
      <input type="password" name="pwd" id="pwd" class="form-control" placeholder="Password" required="required" />
      <div>
        <input type="checkbox" name="isadmin" id="isadmin" /><label for="isadmin">
          Login as service provider
        </label>
      </div>
      <button type="submit" name = "login" onclick="return loginSubmit();">Login</button>
      <h6>
        Don't have an account?
        <a href="./addRegistration.php">Create account</a>
      </h6>
    </form>
  </section>
  <script language="Javascript">
    function loginSubmit() {
      const cb = document.getElementById('isadmin')
      if (cb.checked == true) {
        document.loginForm.action = 'hospitalIndex.php'
      } else {
        document.loginForm.action = 'patientsIndex.php'
      }
      document.loginForm.submit()
      return true
    }
  </script>
</body>

</html>