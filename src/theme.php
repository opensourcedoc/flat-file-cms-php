<?php

function loadHome ()
{
    $sep = DIRECTORY_SEPARATOR;
    $rootDirectory = __DIR__ . $sep . "..";

    $theme = $rootDirectory . $sep . SITE_THEME;
    $layout = $theme . $sep . "layout" . $sep . "home.php";

    require $layout;
}

function loadSection ()
{
    $sep = DIRECTORY_SEPARATOR;
    $rootDirectory = __DIR__ . $sep . "..";

    $theme = $rootDirectory . $sep . SITE_THEME;
    $layout = $theme . $sep . "layout" . $sep . "section.php";

    require $layout;
}

function loadPost ()
{
    $sep = DIRECTORY_SEPARATOR;
    $rootDirectory = __DIR__ . $sep . "..";

    $theme = $rootDirectory . $sep . SITE_THEME;
    $layout = $theme . $sep . "layout" . $sep . "post.php";

    require $layout;
}