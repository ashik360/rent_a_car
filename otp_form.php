<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>OTP Verification</title>

  <!-- Bootstrap 5 stylesheet -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/css/bootstrap.min.css">

  <!-- Fontawesome 6 stylesheet -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

  <style>
    body {
      background-color: #ebecf0;
    }
    .otp-letter-input {
      max-width: 100%;
      height: 60px;
      border: 1px solid #198754;
      border-radius: 10px;
      color: #198754;
      font-size: 18px;
      text-align: center;
      font-weight: bold;
    }
    .btn {
      height: 50px;
    }
    .fa-google {
      color: #1768ef;
    }
    .fa-facebook {
      color: rgba(31, 103, 235, 0.819);
    }
    .fa-x-twitter {
      color: black;
    }
    a {
      text-decoration: none !important;
    }
  </style>
</head>
<body>
  <div class="container p-5">
    <div class="row">
      <div class="col-md-3"></div>
      <div class="col-md-5 mt-5">
        <div class="bg-white p-5 rounded-3 shadow-sm border">
          <div>
            <form action="otp_verification.php" method="POST">
              <p class="text-center text-success" style="font-size: 5.5rem">
                <i class="fa-solid fa-envelope"></i>
              </p>
              <p class="text-center h5">Please enter your email</p>
              <div class="row pt-4 pb-2">
                <div class="col-12 text-center">
                  <input required class="otp-letter-input" type="email" name="email" placeholder="Enter your email">
                </div>
              </div>
              <p class="text-center h5">Or, Continue with</p>
              <p class="text-center text-success" style="font-size: 2.5rem">
                <a href="https://accounts.google.com">
                  <i class="fa-brands fa-google"></i>
                </a>
                <a href="https://x.com/i/flow/login">
                  <i class="fa-brands fa-x-twitter"></i>
                </a>
                <a href="https://fb.com">
                  <i class="fa-brands fa-facebook"></i>
                </a>
              </p>
              <div class="row pt-3">
                <div class="col-12">
                  <button type="submit" class="btn btn-success w-100 fs-5">Continue</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
