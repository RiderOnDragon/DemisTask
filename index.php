<?php
require_once("admin/query.php");

$news = getLastNewsByCount(3);
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <?php require_once("page-element/head.php"); ?>
    <link rel="stylesheet" href="/css/news/news.css?<?= filemtime($_SERVER['DOCUMENT_ROOT'] . '/css/news/news.css') ?>">
    <link rel="stylesheet" href="/css/index/index.css?<?= filemtime($_SERVER['DOCUMENT_ROOT'] . '/css/index/index.css') ?>">
    <title>Главная</title>
</head>
<body>
    <div class="container">
        <div class="content flex__whidth-center">
            <h1 class="page__title">Последние новости</h1>
            
            <?php foreach ($news as $item) {
                require("page-element/news-block.php");
            } ?>
        </div>

        <footer>
            <nav>
                <a href="news.php">Все новости</a>
                <a href="feedback.php">Обратная связь</a>
            </nav>
            <?php require_once("page-element/footer.php"); ?>
        </footer>
    </div>
</body>
</html>