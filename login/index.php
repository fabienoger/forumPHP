<?php
  require("../includes/config.php");
  if (isset($_SESSION["user_id"]))
    header('Location: /forumPHP');
?>
    <main class="container-fluid">
      <div class="page-header align-center">
        <h1>Connection</h1>
      </div>
      <div class="row">
        <div class="login col-md-6 col-md-offset-3">
          <?php
            if (isset($_SESSION["login_info"]))
            {
              echo $_SESSION["login_info"];
              $_SESSION["login_info"] = "";
            }
          ?>
          <form action="login.php" method="POST">
            <div class="form-group">
              <label for="email">Email :</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="contact@forumphp.com"/>
            </div>
            <div class="form-group">
              <label for="password">Password :</label>
              <input type="password" class="form-control" id="password" name="password" />
            </div>
            <input type="submit" class="btn btn-success" value="Log me"/>
            <span class="no-account pull-right"><a href="/forumPHP/sign_up">Sign Up</a> if you don't have account.</span>
          </form>
        </div>
      </div>
    </main>
  </body>
</html>
