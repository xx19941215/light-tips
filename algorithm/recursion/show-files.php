<?php

function showFiles(string $dir, array &$allFiles)
{
    $files = scandir($dir);

    foreach ($files as $key => $value) {
        $path = realpath($dir . DIRECTORY_SEPARATOR . $value);

        if (!is_dir($path)) {
            $allFiles[] = $path;
        } else if ($value != "." && $value != "..") {
            showFiles($path, $allFiles);
            $allFiles[] = $path;
        }
    }

    return;
}

$files = [];
showFiles('.', $files);

foreach ($files as $file) {
    echo $file . PHP_EOL;
}
