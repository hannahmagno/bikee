
<?php
session_start();
require_once("DBFunctions.php");
$db = new DBFunctions();
$errors= array();
// REGISTER USER
if (isset($_POST['reg_user'])) {
  $username = $_POST['username'];
  $name = $_POST['name'];
  $email = $_POST['email'];
  $address = $_POST['address'];
  $contact = $_POST['contact'];
  // form validation: 
  if ($_POST['password_1'] != $_POST['password_2']) {
    array_push($errors, "The two passwords do not match");
  }
  // check if username/email already exists
  $count = $db->num_rows("SELECT * FROM customers WHERE username='$username' OR email='$email'");
  if ($count != 0) { // user exists
    array_push($errors, "Username/Email already exists");
  }

  // If no errors
  if (empty($errors)) {
  	$password = md5($_POST['password_1']);//encrypt the password before saving in the database
  	$db->run_query("INSERT INTO customers  (name, username, password, email, address, contact)
    VALUES('$name', '$username', '$password',  '$email', '$address', '$contact')");
  	$_SESSION['username'] = $username;
  	header("Location: Home.php?username=$username");
  }
}

if (isset($_POST['login_user'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];
  $errors = array();
  
  	$password = md5($password);
  	$result = $db->select_query("SELECT * FROM customers WHERE username='$username' AND password='$password'");
  	if (!empty($result)) {
  	  $_SESSION['username'] = $username;
  	  $_SESSION['success'] = "You are now logged in";
  	  header("Location: Home.php?username=$username");
  	} else {
      array_push($errors, "Wrong username/password combination");
    }
  
}

?>