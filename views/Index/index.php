<?php $this->loadFragment("head");
// if (ini_get("session.use_cookies")) {
//   $params = session_get_cookie_params();
//   setcookie(
//     session_name(),
//     '',
//     time() - 42000,
//     $params["path"],
//     $params["domain"],
//     $params["secure"],
//     $params["httponly"]
//   );
// }
session_destroy() 
?>
<?php
//  require_once BUSINESS.'users_bl.php';

?>
<body class="signin-background">
  <div class="text-center card" style="width: 28%;">
      <form action="<?php
      $users_bl = new Users_bl();
      $users_bl->login()?>" method="POST" class="form-signin">
        <span class="mb-3 h3">The best <br> ROL GAME</span>
        <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" id="inputEmail" class="form-control" name="username" placeholder="Email address" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" class="form-control" name="password" placeholder="Password" required>
        <span class="mt-5 mb-5 text-muted">If you don't have an account.
        <a href="<?php echo URL ?>signup">Create it here</a>
        </span>
        <button class="btn btn-lg btn-primary btn-block mt-3" type="submit">Sign in</button>
        <p class="mt-5 mb-3 text-muted">&copy; 2020</p>
    </form>
  </div>
</body>
</html>