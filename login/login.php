<?php
  require("../includes/config.php");
  if (empty($_POST["email"]) || empty($_POST["password"]))
  {
    $_SESSION["login_info"] = '<p class="alert alert-danger">Vous devez remplir tous les champs.</p>';
    header('Location: index.php');
  }
  else
  {
    if (preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $_POST["email"]))
    {
      $email = $_POST["email"];
      $password = sha1($_POST["password"]);
      $req = $bdd->prepare('SELECT * FROM membres WHERE email = :email');
      $req->execute(array('email' => $email));
      $data = $req->fetch();
      $req->closeCursor();
      if ($data["password"] == $password)
      {
        $_SESSION["user_id"] = $data["id"];
        $_SESSION['login_success'] = "<p class='alert alert-success'>Vous êtes maintenant connecté.</p>";
        header('Location: /forumPHP');
      }
      else
      {
        $_SESSION["login_info"] = '<p class="alert alert-danger">Email ou mot de passe incorrect.</p>';
        header('Location: index.php');
      }
    }
    else
    {
      $_SESSION["login_info"] = '<p class="alert alert-danger">Vous devez entrez une adresse email valide.</p>';
      header('Location: index.php');
    }
  }
?>
