<!DOCTYPE html>
<html lang="en" class="light-style customizer-hide" dir="ltr" data-theme="theme-default" data-assets-path="../assets/"
  data-template="vertical-menu-template-free">

<head>
  <meta charset="utf-8" />
  <meta name="viewport"
    content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

  <title>Admin Login</title>

  <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/logo/logo.png') }}" />

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;500;600;700&display=swap"
    rel="stylesheet" />

  <!-- Core CSS -->
  <link rel="stylesheet" href="{{ asset('admin_css/assets/vendor/fonts/boxicons.css') }}" />
  <link rel="stylesheet" href="{{ asset('admin_css/assets/vendor/css/core.css') }}" />
  <link rel="stylesheet" href="{{ asset('admin_css/assets/vendor/css/theme-default.css') }}" />

  <script src="{{ asset('admin_css/assets/vendor/js/helpers.js') }}"></script>
  <script src="{{ asset('admin_css/assets/js/config.js') }}"></script>

  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Public Sans', sans-serif;
      overflow-x: hidden;
      background: #f5f7fb;
    }

    .login-wrapper {
      min-height: 100vh;
      display: flex;
    }

    .input-group {
      position: relative;
      display: flex;
      flex-wrap: wrap;
      align-items: stretch;
      width: 100%;
      border: 1px solid #225178;
      border-radius: 10px;
    }

    .input-group:focus-within {
      box-shadow: 0 0 0.25rem 0.05rem rgba(105, 108, 255, 0.1);
      border: none;
    }

    /* LEFT SIDE */

    .login-left {
      width: 55%;
      position: relative;
      background: url('{{ asset("assets/img/login-school.jpg") }}');
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
    }

    .login-left::before {
      content: "";
      position: absolute;
      inset: 0;
      background: linear-gradient(135deg,
          rgba(0, 50, 120, 0.75),
          rgba(0, 0, 0, 0.55));
    }

    .school-info {
      position: absolute;
      z-index: 2;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      text-align: center;
      color: white;
      width: 80%;
    }

    .school-info img {
      width: 120px;
      margin-bottom: 25px;
      background: rgba(255, 255, 255, 0.15);
      padding: 12px;
      border-radius: 50%;
    }

    .school-info h1 {
      font-size: 48px;
      font-weight: 700;
      color: #fff;
      margin-bottom: 15px;
    }

    .school-info p {
      font-size: 18px;
      line-height: 30px;
      color: rgba(255, 255, 255, .9);
    }

    /* RIGHT SIDE */

    .login-right {
      width: 45%;
      display: flex;
      justify-content: center;
      align-items: center;
      background: #cedbe5;
      padding: 40px;
    }

    .login-card {
      width: 100%;
      max-width: 500px;
      height: auto;
    }

    .logo-area {
      text-align: center;
      margin-bottom: 25px;
    }

    .logo-area img {
      width: 90px;
      margin-bottom: 15px;
    }

    .logo-area h2 {
      font-size: 30px;
      font-weight: 700;
      color: #566a7f;
    }

    .welcome-text {
      text-align: center;
      color: #697a8d;
      margin-bottom: 35px;
    }

    .form-label {
      font-weight: 600;
      color: #566a7f;
    }

    .form-control {
      height: 52px;
      border-radius: 10px;
      border: 1px solid #d9dee3;
    }

    .form-control:focus {
      box-shadow: none;
      border-color: #696cff;
    }

    .input-group-text {
      border-radius: 0 10px 10px 0;
      cursor: pointer;
    }

    .btn-login {
      height: 52px;
      border-radius: 10px;
      font-size: 16px;
      font-weight: 600;
      background: #225178;
      border: none;
      transition: .3s;
    }

    .btn-login:hover {
      background: #2d628d;
    }

    .copyright {
      text-align: center;
      margin-top: 25px;
      color: #a1acb8;
      font-size: 13px;
    }

    @media(max-width:991px) {

      .login-left {
        display: none;
      }

      .login-right {
        width: 100%;
      }
    }
  </style>
</head>

<body>

  <div class="login-wrapper">

    <!-- LEFT SECTION -->

    <div class="login-left">

      <div class="school-info">

        <img src="{{ asset('assets/img/logo/logo.png') }}" alt="Logo">

        <h1>Divine Child School</h1>

        <p>
          Nurturing Knowledge, Character & Excellence.<br>
          Empowering Students For A Bright Future.
        </p>

      </div>

    </div>

    <!-- RIGHT SECTION -->

    <div class="login-right">

      <div class="login-card">

        <div class="logo-area">

          <img src="{{ asset('assets/img/logo/logo.png') }}" alt="Logo">

          <h2>Admin Login</h2>

        </div>

        <p class="welcome-text">
          Welcome Back! Please login to your account.
        </p>

        <form method="POST" action="{{ route('login') }}">
          @csrf

          <div class="mb-3">
            <label class="form-label">
              Email Address
            </label>

            <input type="email" name="email" value="{{ old('email') }}"
              class="form-control @error('email') is-invalid @enderror" placeholder="Enter your email" required style="
              border: 1px solid #225178;
              ">

            @error('email')
              <span class="invalid-feedback d-block">
                {{ $message }}
              </span>
            @enderror
          </div>

          <div class="mb-4">
            <label class="form-label">
              Password
            </label>

            <div class="input-group">

              <input type="password" id="password" name="password"
                class="form-control @error('password') is-invalid @enderror" placeholder="Enter password" required>

              <span class="input-group-text" onclick="togglePassword()">
                <i class='bx bx-hide' id="eyeIcon"></i>
              </span>

            </div>

            @error('password')
              <span class="invalid-feedback d-block">
                {{ $message }}
              </span>
            @enderror
          </div>

          <button type="submit" class="btn btn-primary btn-login w-100">
            Login
          </button>

        </form>

        <div class="copyright">
          © {{ date('Y') }} Divine Child School
        </div>

      </div>

    </div>

  </div>

  <!-- Core JS -->

  <script src="{{ asset('admin_css/assets/vendor/libs/jquery/jquery.js') }}"></script>
  <script src="{{ asset('admin_css/assets/vendor/libs/popper/popper.js') }}"></script>
  <script src="{{ asset('admin_css/assets/vendor/js/bootstrap.js') }}"></script>

  <script>
    function togglePassword() {

      let password = document.getElementById('password');
      let icon = document.getElementById('eyeIcon');

      if (password.type === "password") {
        password.type = "text";
        icon.classList.remove('bx-hide');
        icon.classList.add('bx-show');
      } else {
        password.type = "password";
        icon.classList.remove('bx-show');
        icon.classList.add('bx-hide');
      }
    }
  </script>

</body>

</html>