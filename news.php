<?php
require_once("admin/query.php");

$news = getAllNews();
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <?php require_once("page-element/head.php"); ?>
    <link rel="stylesheet" href="/css/news/news.css?<?= filemtime($_SERVER['DOCUMENT_ROOT'] . '/css/news/news.css') ?>">
    <title>Всё новости</title>
</head>

<body>
    <div class="container">
        <div class="content flex__whidth-center">
            <h1 class="page__title">Все новости</h1>
            
            <?php foreach ($news as $item) {
                require("page-element/news-block.php");
            } ?>
        </div>
    </div>

    <footer>
        <?php require_once("page-element/footer.php"); ?>
    </footer>
</body>

</html>