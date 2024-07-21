<?php
require_once ("connection.php");

function addFeedback($param) {
    global $DB_Task;

    $DB_Task -> query("INSERT INTO Feedbacks(FIO, Address, Phone, Email) 
    VALUE ('{$param['FIO']}', '{$param['Address']}', '{$param['Phone']}','{$param['Email']}')");
}

function getAllFeedbacks() {
    global $DB_Task;

    $feedbacks = $DB_Task -> query("SELECT * FROM Feedbacks") -> fetchAll();

    return $feedbacks;
}

function getAllNews() {
    global $DB_Task;

    $DB_Task->query("SET lc_time_names = 'ru_RU'");
    $news = $DB_Task -> query("SELECT Title, Text, DATE_FORMAT(Publication_date	, '%d %M %Y') AS Date FROM News") -> fetchAll();

    return $news;
}

function getLastNewsByCount($count) {
    global $DB_Task;

    $DB_Task->query("SET lc_time_names = 'ru_RU'");
    $news = $DB_Task -> query("SELECT Title, Text, DATE_FORMAT(Publication_date	, '%d %M %Y') AS Date FROM News ORDER BY Publication_date DESC LIMIT $count") -> fetchAll();

    return $news;
}
?>