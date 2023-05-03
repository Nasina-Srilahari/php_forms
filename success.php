<?php
session_start();
$name = $_SESSION['name'] ?? '';
?>

<!DOCTYPE html>
<html>
<head>
  <title>Success</title>
  <link rel="stylesheet" type="text/css" href="success.css">
</head>
<body>
  <h1>Successfull</h1>
  <p><h3>Thank you for filling the form, <?= $name ?>.</h3></p>
</body>
</html>
