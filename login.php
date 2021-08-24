<?php
function canLogin($email, $password)
{
    if ($email === "j@a" && $password === "12345") {
        return true;
    } else {
        return false;
    }
}

if (!empty($_POST)) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (canLogin($email, $password)) {
        session_start();
        $_SESSION["email"] = $email;
        header("Location: index.php");
    } else {
        $error = true;
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./styles/style.css">
    <title>Login Page</title>
</head>

<body>
    <img class="logoImg" src="./img/BorrowBoxFinalLogo.png" alt="BorrowBoxLogo">

    <div class="d-flex justify-content-center mt-3">
        <h3 class="text-uppercase">Log in</h3>
    </div>

    <div class="row justify-content-center align-items-center">
        <form action="" method="post" class="loginForm">
            <div class="col d-flex justify-content-center m-2"><input class="form-control" type="email" placeholder="email" name="email"></div>
            <div class="col d-flex justify-content-center m-2"><input class="form-control" type="password" placeholder="password" name="password"></div>
            <div class="col d-flex justify-content-center m-3"><input class="btn btnCustom" type="submit" name="login" value="login"></div>
        </form>
    </div>

    <div class="error">
        <p style="color:red; text-align:center">Incorrect email or password </p>
    </div>


</body>

</html>