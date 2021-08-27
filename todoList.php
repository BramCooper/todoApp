<?php
include_once(__DIR__ . "/classes/Db.php");
include_once(__DIR__ . "/classes/List.php");
include_once(__DIR__ . "/classes/Todo.php");

session_start();

if (isset($_SESSION['email'])) {
    //user is logged in
    echo "Welcome " . $_SESSION['email'];
} else {
    //not logged in
    header("Location: login.php");
}

if (!empty($_GET)) {
    $listItem = new listClass();
    $listItem->setId($_GET['list']);
    $list_id = $listItem->getId();
    $todo = new Todo();
    $todos = $todo->getAllTodos($list_id);
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
    <title>Todo list</title>
</head>

<body>
    <header class="mb-3">
        <a href="logout.php" class="btn btnLogout">Log out</a>
    </header>
    <h1>Todo list: <?php echo $listItem['name'] ?></h1>

    <a href="#" onclick="window.location.href='addTodo.php';">
        <div>
            <h3>add a new todo</h3>
        </div>
    </a>

    <?php foreach ($todos as $to) : ?>
        <div id="divTodo">
            <div>
                <h3><?php echo $to['name'] ?></h3>
            </div>
            </a>

            <form action="" method="POST">
                <input id="delete" class="btn btnDel" type="submit" data-listid="<?php echo $to['id'] ?>" value="Delete" name="delete">
            </form>
        </div>
    <?php endforeach; ?>
</body>

</html>