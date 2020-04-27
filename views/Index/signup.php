<?php $this->loadFragment("head"); ?>


<body class="signin-background">
  <div class="text-center card" style="width: 25%;">
    <form action="<?php Users_bl::create() ?>" class="form-signin" method="POST">
      <h1 class="h3 mb-3 font-weight-normal">Please sign up</h1>
      <label for="inputEmail" class="sr-only">Email address</label>
      <input id="name" type="email" id="inputEmail" class="form-control" placeholder="Email address" name="username" required autofocus>
      <label for="inputPassword" class="sr-only">Password</label>
      <input id="password" type="password" id="inputPassword" class="form-control" placeholder="Password" name="password" required>
      <button class="btn btn-lg btn-primary btn-block mt-3" type="submit">Sign up</button>
      <p class="mt-5 mb-3 text-muted">&copy; 2020</p>
    </form>
  </div>
</body>


</html>