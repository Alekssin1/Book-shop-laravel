<?php
session_start();

$username = "";
$usersurname = "";
$email    = "";
$errors = array();

$db = mysqli_connect("127.0.0.1", 'root', 'root', 'books', 3309);

if (isset($_POST['reg_user'])) {
    // receive all input values from the form
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $usersurname = mysqli_real_escape_string($db, $_POST['usersurname']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
    $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);


    if (empty($username)) { array_push($errors, "Name is required"); }
    if (empty($usersurname)) { array_push($errors, "Surname is required"); }
    if (empty($email)) { array_push($errors, "Email is required"); }
    if (empty($password_1)) { array_push($errors, "Password is required"); }
    if ($password_1 != $password_2) {
        array_push($errors, "The two passwords do not match");
    }

    $user_check_query = "SELECT * FROM registration WHERE username='$username' AND usersurname='$usersurname' OR email='$email' LIMIT 1";
    $result = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($result);

    if ($user) {
        if ($user['email'] === $email) {
            array_push($errors, "email already exists");
        }
    }

    if (count($errors) == 0) {
        $password = md5($password_1);
        $query = "INSERT INTO registration (username, usersurname, email, password)
  			  VALUES('$username', '$usersurname', '$email', '$password')";
        mysqli_query($db, $query);
        $_SESSION['username'] = $username;
        $_SESSION['usersurname'] = $usersurname;
        $_SESSION['success'] = "You are now logged in";
        header('location: index.blade.php');
    }
}

if (isset($_POST['login_user'])) {
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    if (empty($email)) {
        array_push($errors, "Email is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }

    if (count($errors) == 0) {
        $password = md5($password);
        $query = "SELECT * FROM registration WHERE email='$email' AND password='$password'";
        $results = mysqli_query($db, $query);
        if (mysqli_num_rows($results) == 1) {
            $_SESSION['username'] = $username;
            $_SESSION['usersurname'] = $usersurname;
            $_SESSION['success'] = "Ти ввійшов в аккаунт";
            header('location: index.blade.php');
        }else {
            array_push($errors, "Wrong email/password combination");
        }
    }
}

?>
