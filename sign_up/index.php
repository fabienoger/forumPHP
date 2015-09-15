<?php
  require("../includes/config.php");
?>
    <main class="container-fluid">
      <div class="page-header align-center">
        <h1>Registration</h1>
      </div>
      <div class="row">
        <div class="login col-md-6 col-md-offset-3">
          <?php
            if (isset($_SESSION["sign_up_info"]))
            {
              echo $_SESSION["sign_up_info"];
              $_SESSION["sign_up_info"] = "";
            }
          ?>
          <form action="sign_up.php" method="POST">
            <div class="form-group">
              <label for="first_name">First name :</label>
              <input type="text" class="form-control" id="first_name" name="first_name" />
            </div>
            <div class="form-group">
              <label for="last_name">Last name :</label>
              <input type="text" class="form-control" id="last_name" name="last_name" />
            </div>
            <div class="form-group">
              <label for="email">Email :</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="contact@forumphp.com"/>
            </div>
            <div class="form-group">
              <label for="password">Password :</label>
              <input type="password" class="form-control" id="password" name="password" />
            </div>
            <div class="form-group">
              <label for="confirm_password">Confirm password :</label>
              <input type="password" class="form-control" id="confirm_password" name="confirm_password" />
            </div>
            <input type="submit" class="btn btn-success" />
          </form>
        </div>
      </div>
    </main>
  </body>
</html>
