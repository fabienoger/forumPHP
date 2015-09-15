<?php
  require("../includes/config.php");
  if (empty($_POST["first_name"]) || empty($_POST["last_name"]) || empty($_POST["email"]) || empty($_POST["password"]) || empty($_POST["confirm_password"]))
  {
    $_SESSION["sign_up_info"] = '<p class="alert alert-danger">Vous devez remplir tous les champs.</p>';
    header('Location: index.php');
  }
  else
  {
    if (preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $_POST["email"]))
    {
      if ($_POST['password'] == $_POST['confirm_password'])
      {
        $first_name = htmlentities($_POST['first_name']);
        $first_name = addslashes($first_name);
        $last_name = htmlentities($_POST['last_name']);
        $last_name = addslashes($last_name);
        $email = htmlentities($_POST['email']);
        $email = addslashes($email);
        $password = sha1($_POST['password']);
        $check = $bdd->prepare('SELECT * FROM membres WHERE email = :email');
        $check->execute(array('email' => $email));
        $count = $check->rowCount();
        $check->closeCursor();
        if ($count == 0)
        {
          $req = $bdd->prepare('INSERT INTO membres(email, name, last_name, password) VALUES(:email, :name, :last_name, :password)');
          $req->execute(array(
            'email' => $email,
            'name' => $first_name,
            'last_name' => $last_name,
            'password' => $password
            ));
          $req->closeCursor();
          $check = $bdd->prepare('SELECT * FROM membres WHERE email = :email');
          $check->execute(array('email' => $email));
          $result = $check->fetch();
          $check->closeCursor();
          $_SESSION['user_id'] = $result['id'];
          $_SESSION['login_success'] = '<p class="alert alert-success">Vous êtes maintenant connecté.</p>';
          header('Location: /forumPHP');
        }
        else
        {
          $_SESSION["sign_up_info"] = '<p class="alert alert-danger">L\'email "'. $email .'" est déjà utilisé.</p>';
          header('Location: index.php');
        }
      }
      else
      {
        $_SESSION["sign_up_info"] = '<p class="alert alert-danger">Les mots de passes doivent êtes identiques.</p>';
        header('Location: index.php');
      }
    }
    else
    {
      $_SESSION["sign_up_info"] = '<p class="alert alert-danger">Vous devez entrez une adresse email valide.</p>';
      header('Location: index.php');
    }
  }
?>
