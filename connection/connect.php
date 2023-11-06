<?php
  try {
    // Open new connection, allow catching of exceptions
    $con = mysqli_connect('localhost', 'root', '', 'authentication');
    
  } catch (PDOException $e) {
    echo 'PDO exception thrown: '.$e->getMessage();

    // Redirect user to a oops-page

  }
?>