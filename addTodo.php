<?php
include_once(__DIR__ . "/classes/Db.php");
include_once(__DIR__ . "/classes/List.php");
include_once(__DIR__ . "/classes/Todo.php");

session_start();

if (isset($_SESSION['email'])) {
    //user is logged in
} else {
    //not logged in
    header("Location: login.php");
}

if (!empty($_POST)) {
    $todoItem = new Todo();
    $todoItem->setName($_POST['todoName']);
    $todoItem->setDesc($_POST['todoDesc']);
    $todoItem->setDur($_POST['todoDur']);
    $todoItem->setDeadline($_POST['todoDead']);
    $todoItem->setList_id($_SESSION['id']);
    $todoItem->setUser_id($_SESSION['id']);
    $todoItem->setList_id($_POST['listDropdown']);

    $todoItem->todoSave();
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
    <title>Add a Todo</title>
</head>

<body class="spacingBody">
    <h3 class="mb-3">Create a new todo:</h3>
    <form action="" method="POST">
        <div class="mb-3">
            <input id="todoName" type="name" placeholder="Name the todo" name="todoName">
        </div>
        <div class="mb-3">
            <input id="todoDesc" type="text" placeholder="Describe the todo" name="todoDesc">
        </div>
        <div class="mb-3">
            <input id="todoDur" type="number" placeholder="how long will it take" name="todoDur">
        </div>
        <div class="mb-3">
            <input id="todoDead" type="date" placeholder="Pick a deadline" name="todoDead">
        </div>
        <div class="mb-3">
            <h3>Select a list</h3>
            <select name="listDropdown" id="listDropdown">
                <?php foreach ($listAll as $li) : ?>
                    <option value="<?php echo $li['id'] ?>"><?php echo $li['name'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div>
            <a href="index.php"><button type="submit" class="btn btnCustom">Add new Todo</button></a>
        </div>
    </form>
</body>

</html>