<?php


if (!empty($_POST)) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $options = [
        'cost' => 12,
    ];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT, $options);

    $conn = new PDO('mysql:host=localhost;dbname=todo_db', "root", "root");
    $query = $conn->prepare("insert into users (firstname, lastname, email, password) values (:firstname, :lastname, :email, :password)");
    $query->bindValue(":firstname", $firstname);
    $query->bindValue(":lastname", $lastname);
    $query->bindValue(":email", $email);
    $query->bindValue(":password", $password);
    $query->execute();
}
