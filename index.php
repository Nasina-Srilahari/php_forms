<?php
session_start();
$errors = [];

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Validate name
  if (empty($_POST['name'])) {
    $errors[] = 'Name is required';
  } else {
    $name = $_POST['name'];
    if (!preg_match('/^[a-zA-Z\s]+$/', $name)) {
      $errors[] = 'Name can only contain letters and spaces';
    }
  }

  // Validate phone number
  if (empty($_POST['phone'])) {
    $errors[] = 'Phone number is required';
  } else {
    $phone = $_POST['phone'];
    if (!preg_match('/^[0-9]{10}$/', $phone)) {
      $errors[] = 'Phone number must be in 10 digits';
    }
    if (!is_numeric($phone)) {
        $errors[] = 'Phone number contains only numricals';
      }
  }

  // Validate email
  if (empty($_POST['email'])) {
    $errors[] = 'Email is required';
  } else {
    $email = $_POST['email'];
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $errors[] = 'Invalid email format';
    }
  }

  // If there are no errors, save data to session and redirect to page2.php
  if (empty($errors)) {
    $_SESSION['name'] = $name;
    $_SESSION['phone'] = $phone;
    $_SESSION['email'] = $email;
    header('Location: page2.php');
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
        <p>Enter the Details</p><br>
        <label>Name:</label>
        <input type="text" name="name" value="<?= $_POST['name'] ?? '' ?>"><br><br>
        <label>PhoneNumber:</label>
        <input type="text" name="phone" value="<?= $_POST['phone'] ?? '' ?>"><br><br>
        <label>Email:</label>
        <input type="email" name="email" value="<?= $_POST['email'] ?? '' ?>"><br><br>
        <input type="submit" value="Next">
      </div>
  </form>
</body>
</html>
