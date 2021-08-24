<?php
include_once(__DIR__ . "/classes/User.php");

if (!empty($_POST)) {
    try {
        $user = new User();
        $user->setFirstname($_POST["firstname"]);
        $user->setLastname($_POST["lastname"]);
        $user->setEmail($_POST["email"]);
        $user->setPassword($_POST["password"]);
        $user->passwordHash();

        $user->register();

        session_start();
        $_SESSION['email'] = $_POST['email'];
        header("location: index.php");
    } catch (\Throwable $th) {
        $error = $th->getMessage();
    }
}


?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./styles/style.css">
    <title>Document</title>
</head>

<body>

    <a class="d-flex justify-content-center btn btnCustom m-5" href="login.php">log in with existing account</a>
    <h3 class="display-6 d-flex justify-content-center">or make a new account</h3>

    <form class="col justify-content-center" action="" method="post" enctype="multipart/form-data">
        <div class="col d-flex justify-content-center m-3"><input class="form-control" type="text" name="firstname" placeholder="firstname"></div>
        <div class="col d-flex justify-content-center m-3"><input class="form-control" type="text" name="lastname" placeholder="lastname"></div>
        <div class="col d-flex justify-content-center m-3"><input class="form-control" type="email" name="email" placeholder="email"></div>
        <div class="col d-flex justify-content-center m-3"><input class="form-control" type="password" name="password" placeholder="password"></div>
        <div class="col d-flex justify-content-center m-3"><input type="submit" class="btn btnCustom" value="create account"></div>
    </form>

</body>

</html>