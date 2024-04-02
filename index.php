<?php

include "./crud.php";

session_start();

$crud = new Crud();
// $crud->create();

$memo = $crud->read_memo();

if(isset($_SESSION['status'])){
    $msg = $_SESSION['status'];
    unset($_SESSION['status']);
}else{
    $msg = false;
}


// $crud->update();
// $crud->delete();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADVENT_MEMO | WELCOME</title>
    <link rel="stylesheet" href="./src/style.css">
</head>

<body>
    <div class="container">
        <div id="backdrop"></div>
        <div id="spinner-container">
            <div class="spinner"></div>
        </div>

        <div id="popupMessage" class="popup-message">
            <span data-msg="<?= $msg ?>" id="popupText"></span>
        </div>


        <nav>
            <div class="nav-header">
                <h1 class="brand"><span>ADVENT</span>memo</h1>
                <p>/home </p>
            </div>
            <div class="profile">
                <a href="#">
                    <img src="" alt="">
                </a>
            </div>
        </nav>
        <main>
            <div class="header">
                <h2>LIST OF MEMORIES</h2>
                <div class="action">
                    <a href="./create_memo.php"><button class="add">ADD</button></a>
                </div>
            </div>

            <?php if (empty($memo)) : ?>
                <h4 class="header">No Memories found</h4>
            <?php endif; ?>

            <?php foreach ($memo as $value) : ?>

                <div class="card">
                    <div class="main">
                        <div class="photo">
                            <img src="<?= $value['photo'] ?>" alt="">
                        </div>
                        <div class="content">
                            <h3 class="title"><?= $value['title']; ?></h3>
                            <p><?= $value['place'] ?> </p>
                            <div class="description"><?= $value['description'] ?></div>
                        </div>
                    </div>

                    <div class="action">
                        <button class="edit">EDIT</button>
                        <button onclick="getId(<?= $value['id']; ?>)" id="delete_memo" class="delete">DELETE</button>
                    </div>
                </div>
            <?php endforeach; ?>

        </main>
        <footer class="card">
            <p>copy@<?= date("Y") ?> DEVELOPED BY ABDUL</p>
        </footer>
    </div>


    <script src="script.js"></script>
</body>

</html>