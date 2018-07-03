<?php
$dsn = "mysql:host=127.0.0.1;port=3306;dbname=light-tips;charset=UTF8;";
$username = 'root';
$password = 'admin';

$pdo = new PDO($dsn, $username, $password);

$sql = 'SELECT * FROM `comments` WHERE `postID` = :id ORDER BY `parentId`, `datetime`';

$stmt = $pdo->prepare($sql);

$stmt->setFetchMode(PDO::FETCH_OBJ);

$stmt->execute([':id' => 1]);

$result = $stmt->fetchAll();

$comments = [];

foreach ($result as $comment) {
    $comments[$comment->parentID][] = $comment;
}


function showComments(array $comments, $n)
{
    if (isset($comments[$n])) {
        foreach ($comments[$n] as $comment) {
            echo str_repeat('-', $n) . $comment->comment . PHP_EOL;
            showComments($comments, $comment->id);
        }
    }

    return;
}

showComments($comments, 0);