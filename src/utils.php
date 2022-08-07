<?php

function isHome ($uri)
{
    return "/" === $uri;
}

function isSection ($uri)
{
    require_once "const.php";

    $sep = DIRECTORY_SEPARATOR;
    $rootDirectory = __DIR__ . $sep . "..";
    $content = $rootDirectory . $sep . SITE_CONTENT;

    $path = $content . $sep . str_replace("/", $sep, $uri);

    return is_dir($path);
}

function isPost ($uri)
{
    require_once "const.php";
    require_once "_utils.php";

    $path = getPath($uri, ".md");

    return file_exists($path);
}
