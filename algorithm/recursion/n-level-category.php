<?php
$dsn = "mysql:host=127.0.0.1;port=3306;dbname=light-tips;charset=UTF8;";
$username = 'root';
$password = 'admin';

$pdo = new PDO($dsn, $username, $password);

$sql = 'SELECT * FROM `categories` ORDER BY `parentCategory`, `sortInd`';

$result = $pdo->query($sql, PDO::FETCH_OBJ);

$categories = [];

foreach ($result as $category) {
    $categories[$category->parentCategory][] = $category;
}

function showCategoryTree($categories, $n)
{
    if (isset($categories[$n])) {
        foreach ($categories[$n] as $category) {
            echo str_repeat('-', $n) . $category->categoryName . PHP_EOL;
            showCategoryTree($categories, $category->id);
        }

    }

    return;
}

showCategoryTree($categories, 0);
