<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <title>ForumPHP</title>
    <link rel="stylesheet" href="/forumPHP/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="/forumPHP/css/style.css">
  </head>
  <body>
    <header class="navbar navbar-inverse">
      <span class="navbar-brand">ForumPHP</span>
      <ul class="menu pull-right">
        <?php
          if (isset($_SESSION["user_id"]))
          {
            ?>
              <li><a href="/forumPHP">Home</a></li>
              <li><a href="/forumPHP/logout">Log Out</a></li>
            <?php
          }
          else
          {
            ?>
                <li><a href="/forumPHP/login">Log In</a></li>
                <li><a href="/forumPHP/sign_up">Sign Up</a></li>
            <?php
          }
        ?>
      </ul>
    </header>
