<?php
session_start();
$errors = [];

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Validate location
  if (empty($_POST['location'])) {
    $errors[] = 'Location is required';
  } else {
    $location = $_POST['location'];
    if (!preg_match('/^[a-zA-Z\s]+$/', $location)) {
      $errors[] = 'Location can only contain letters and spaces';
    }
  }

  // Validate age
  if (empty($_POST['age'])) {
    $errors[] = 'Age is required';
  } else {
    $age = $_POST['age'];
    if (!is_numeric($age)) {
      $errors[] = 'Age must be a number';
    }
  }

  // Validate university
  if (empty($_POST['university'])) {
    $errors[] = 'University is required';
  } else {
    $university = $_POST['university'];
    if (!preg_match('/^[a-zA-Z\s]+$/', $university)) {
      $errors[] = 'University can only contain letters and spaces';
    }
  }

  // If there are no errors, save data to session and redirect to success.php
  if (empty($errors)) {
    $_SESSION['location'] = $location;
    $_SESSION['age'] = $age;
    $_SESSION['university'] = $university;
    header('Location: success.php');
    exit;
  }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>page1</title>
  <link rel="stylesheet" type="text/css" href="pages.css">
</head>
<body>
  <?php if (!empty($errors)): ?>
    <ul>
      <?php foreach ($errors as $error): ?>
        <li><?= $error ?></li>
      <?php endforeach ?>
    </ul>
  <?php endif ?>
  <form method="POST" action="">
    <div class="container">
        <p>Enter these deatils too..</p><br>
        <label>Location:</label>
        <input type="text" name="location" value="<?= $_POST['location'] ?? '' ?>"><br><br>
        <label>Age:</label>
        <input type="text" name="age" value="<?= $_POST['age'] ?? '' ?>"><br><br>
        <label>University:</label>
        <input type="text" name="university" value="<?= $_POST['university'] ?? '' ?>"><br><br>
        <input type="submit" value="Submit">
    </div>
  </form>
</body>
</html>
