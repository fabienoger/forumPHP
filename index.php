<?php
  require("includes/config.php");
?>
    <main class="container-fluid home-page">
      <div class="page-header">
        <h1>Forum PHP</h1>
      </div>
      <div class="row">
        <div class="col-md-6 list-user">
          <div class="row row-user">
            <div class="col-md-6">
              <strong>Name</strong>
            </div>
            <div class="col-md-6">
              <strong>Email</strong>
            </div>
          </div>
            <?php
              $users = $bdd->query('SELECT * FROM membres');
              while ($donnees = $users->fetch())
              {
                echo "<div class='row row-user'>";
                echo "<div class='col-md-6'>" . $donnees['name'] . " " . $donnees['last_name'] . "</div>";
                echo "<div class='col-md-6'>" . $donnees['email'] . "</div>";
                echo "</div>";
              }
            ?>
        </div>
        <div class="col-md-6">

        </div>
      </div>
    </main>
  </body>
</html>
