<?php
include_once(__DIR__ . "/classes/Db.php");
include_once(__DIR__ . "/classes/List.php");

session_start();

if (isset($_SESSION['email'])) {
    //user is logged in
    echo "Welcome " . $_SESSION['email'];
} else {
    //not logged in
    header("Location: login.php");
}

if (!empty($_POST)) {
    $listItem = new listClass();
    $listItem->setName($_POST['listTitle']);
    $listItem->setUser_id($_SESSION['id']);
    $listItem->listSave();
}

$listItem = new listClass();

try {
    $listAll = $listItem->getAllLists();
} catch (Throwable $th) {
    $error = $th->getMessage();
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
    <title>Homepage</title>
</head>

<body class="spacingBody">
    <header class="mb-3">
        <a href="logout.php" class="btn btnLogout">Log out</a>
    </header>

    <h1>Here are your todo lists!</h1>
    <div>
        <form action="" method="POST">
            <input type="name" name="listTitle" placeholder="make a new list">
            <button class="btn btnCustom">Add</button>
        </form>
    </div>

    <?php foreach ($listAll as $li) : ?>
        <div id="divList">
            <a href="#" onclick="window.location='todoList.php?list=<?php echo $li['id'] ?>'">
                <div>
                    <h3><?php echo $li['name'] ?></h3>
                </div>
            </a>

            <form action="" method="POST">
                <input id="delete" class="btn btnDel" type="submit" data-listid="<?php echo $li['id'] ?>" value="Delete" name="delete">
            </form>
        </div>

    <?php endforeach; ?>


    <script src="./scripts/list.js"></script>
</body>

</html>