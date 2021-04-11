<!DOCTYPE html>
<html>
  <head>
    <title>Webulance</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="./assets/css/main.css" />
  </head>
  <body>
    <section class="left-pane">
      <img src="./assets/vectors/location.svg" alt="Il 1" height="300" />
      <div class="banner">
        <h1 class="main-heading">Webulance</h1>
        <p>
          Get help <span class="highlight">instantly</span>,
          <span class="highlight sec">anywhere</span>
        </p>
      </div>
      <button type="submit" name="login" onclick="return loginSubmit();">
        Login
      </button>
      <h6 class="footer">
        Don't have an account?
        <a href="./addRegistration.php">Create account</a>
      </h6>
    </form>
  </section>
  <script language="Javascript">
    const loginSubmit = () => {
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