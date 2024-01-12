<!DOCTYPE html>
<html lang="en">
<head>
  <title>Hotel Transylvenia</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v2.1.9/css/unicons.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="style.css">
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>
<body>
<h2 style="text-align: center;">HOTEL TRANSYLVENIA</h2>
  <div class="section">
    <div class="container">
      <div class="row full-height justify-content-center">
        <div class="col-12 text-center align-self-center py-5">
          <div class="section pb-5 pt-5 pt-sm-2 text-center">
            <h6 class="mb-0 pb-3"><span>Log In </span><span>Register</span></h6>
            <input class="checkbox" type="checkbox" id="reg-log" name="reg-log" />
            <label for="reg-log"></label>
            <div class="card-3d-wrap mx-auto">
              <div class="card-3d-wrapper">
                <div class="card-front">
                  <div class="center-wrap">
                    <div class="section text-center">
                      <h4 class="mb-4 pb-3">Log In</h4>
                      
                      <form action="check_login.php" method="post" id="loginForm">
    <div class="form-group">
        <input type="email" class="form-style" placeholder="Email" name="email" id="loginEmail">
        <i class="input-icon uil uil-at"></i>
    </div>
    <div class="form-group mt-2">
        <input type="password" class="form-style" placeholder="Password" name="password" id="loginPassword">
        <i class="input-icon uil uil-lock-alt"></i>
    </div>
    <button class="btn mt-4" id="loginBtn" method="post">Login</button>
</form>

                  </div>
                </div>
                <div class="card-back">
                  <div class="center-wrap">
                    <div class="section text-center">
                      <form action="register.php" method="post" onsubmit="return validateRegistrationForm()">
                        <h4 class="mb-3 pb-3">Register</h4>
                        <div class="form-group">
                          <input type="text" class="form-style" placeholder="Full Name" name="name" id="regName">
                          <i class="input-icon uil uil-user"></i>
                        </div>
                        <div class="form-group mt-2">
                          <input type="tel" class="form-style" placeholder="Phone Number" name="phone" id="regPhone">
                          <i class="input-icon uil uil-phone"></i>
                        </div>
                        <div class="form-group mt-2">
                          <input type="email" class="form-style" placeholder="Email" name="email" id="regEmail">
                          <i class="input-icon uil uil-at"></i>
                        </div>
                        <div class="form-group mt-2">
                          <input type="password" class="form-style" placeholder="Password" name="password" id="regPassword">
                          <i class="input-icon uil uil-lock-alt"></i>
                        </div>
                        <button type="submit" class="btn mt-4" name="send">Register</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
    $(document).ready(function() {
      $("#loginBtn").click(function(e) {
        var email = $("#loginEmail").val();
        var password = $("#loginPassword").val();

        if (email === "" || password === "") {
          alert("Masukkan Email dan Password Terlebih Dahulu");
          e.preventDefault(); // prevent the form from submitting.
        }
      });
    });

    function validateRegistrationForm() {
      let regName = document.getElementById("regName").value;
      let regPhone = document.getElementById("regPhone").value;
      let regEmail = document.getElementById("regEmail").value;
      let regPassword = document.getElementById("regPassword").value;

      if (regName.trim() === "" || regPhone.trim() === "" || regEmail.trim() === "" || regPassword.trim() === "") {
        alert("Lengkapi semua kolom pada formulir pendaftaran.");
        return false;
      }

      return true;
    }
  </script>
</body>
</html>
