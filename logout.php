<?php
/*  File name: logout.php
 *  Author: Marc Anderson
 *  Website Name: Marc Anderson's Porfolio Site
 *  File decription: This page logs the user out
 */
  // If the user is logged in, delete the session vars to log them out
  session_start();
  if (isset($_SESSION['user_id'])) {
    // Delete the session vars by clearing the $_SESSION array
    $_SESSION = array();

    // Delete the session cookie by setting its expiration to an hour ago (3600)
    if (isset($_COOKIE[session_name()])) {
      setcookie(session_name(), '', time() - 3600);
    }
    session_unset();
    // Destroy the session
    session_destroy();
  }

  // Expire cookies by setting their expirations to an hour in the past (3600)
  setcookie('user_id', '', time() - 3600);
  setcookie('username', '', time() - 3600);
  setcookie('first_name', '', time() - 3600);
  setcookie('last_name', '', time() - 3600);
  setcookie('permission', '', time() - 3600);

  // Redirect to the home page
  $home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/index.php';
  header('Location: ' . $home_url);
?>