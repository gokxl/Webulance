<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Add Registration</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="./assets/css/register.css" />
  </head>
  <body>
    <!-- <form action="./insertRegistration.php" method="post">
      <h2 class="text-center">Registration Form</h2>
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6">
            <div class="form-group">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <span class="fa fa-user"></span>
                  </span>
                </div>
                <input
                  type="text"
                  name="pname"
                  id="pname"
                  class="form-control"
                  placeholder="patients Name"
                  required="required"
                />
              </div>
            </div>
          </div>
          <div class="col-sm-3">
            <div class="form-group">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="fa fa-list-ol"></i>
                  </span>
                </div>
                <input
                  type="number"
                  name="page"
                  id="page"
                  class="form-control"
                  placeholder="patients Age"
                  required="required"
                />
              </div>
            </div>
          </div>
          <div class="col-sm-3">
            <div class="form-group">
              <select
                class="form-control"
                id="pgender"
                name="pgender"
                placeholder="Select Gender"
              >
                <option>m</option>
                <option>f</option>
                <option>t</option>
              </select>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-6">
            <div class="form-group">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <span class="fa fa-envelope"></span>
                  </span>
                </div>
                <input
                  type="email"
                  name="pemail"
                  id="pemail"
                  class="form-control"
                  placeholder="patients Email"
                  required="required"
                />
              </div>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <span class="fa fa-mobile"></span>
                  </span>
                </div>
                <input
                  type="tel"
                  name="pphone"
                  id="pphone"
                  class="form-control"
                  placeholder="patients Mobile Number"
                  required="required"
                />
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-6">
            <div class="form-group">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <span class="fa fa-user"></span>
                  </span>
                </div>
                <input
                  type="text"
                  name="puser"
                  id="puser"
                  class="form-control"
                  placeholder="patients PatName"
                  required="required"
                />
              </div>
            </div>
          </div>
          <div class="col-sm-3">
            <div class="form-group">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="fa fa-lock"></i>
                  </span>
                </div>
                <input
                  type="password"
                  name="ppwd"
                  id="ppwd"
                  class="form-control"
                  placeholder="Password"
                  required="required"
                />
              </div>
            </div>
          </div>
          <div class="col-sm-3">
            <div class="form-group">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="fa fa-lock"></i>
                  </span>
                </div>
                <input
                  type="password"
                  name="ppwd1"
                  id="ppwd1"
                  class="form-control"
                  placeholder="Confirm Password"
                  required="required"
                />
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="form-group">
        <button type="submit" name="register" class="btn btn-primary btn-block">
          Register
        </button>
      </div>
    </form> -->
    <form action="./insertRegistration.php" method="post" class='card'>
      <h2 class='header'>Sign Up as a Patient</h2>
      <h6 class="info">Please enter your details</h6>
      <input
        type="text"
        name="pname"
        id="pname"
        placeholder="Full Name"
        required
      />
      <div class='grp'>
      <input type="number" name="page" id="page" placeholder="Age" required />
      <select id="pgender" name="pgender">
        <option value="m">Male</option>
        <option value="f">Female</option>
        <option value="t">Others</option>
      </select>
      </div>
      <input
        type="email"
        name="pemail"
        id="pemail"
        placeholder="Email Address"
        required
      />
      <input
        type="number"
        name="pphone"
        id="pphone"
        placeholder="Mobile Number"
        required
      />
      <input
        type="text"
        name="puser"
        id="puser"
        placeholder="Username"
        required
      />
      <input
        type="password"
        name="ppwd"
        id="ppwd"
        class="form-control"
        placeholder="Password"
        required
      />
      <input
        type="password"
        name="ppwd1"
        id="ppwd1"
        placeholder="Confirm Password"
        required
      />
      <button type="submit" name="register">Register</button>
    </form>
  </body>
</html>
