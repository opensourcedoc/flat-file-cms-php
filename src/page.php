<?php

function getSections ($uri)
{
    $sep = DIRECTORY_SEPARATOR;
    $rootDirectory = __DIR__ . $sep . "..";

    $directory = $rootDirectory . $sep
        . SITE_CONTENT . $sep
        . str_replace("/", $sep, $uri);

    $links = array();

    $files = scandir($directory, SCANDIR_SORT_ASCENDING);
    foreach ($files as $file) {
        # Skip private directories and files.
        if ("." == substr($file, 0, 1)) {
            continue;
        }

        $path = $directory . "/" . $file;
        if (is_dir($path)) {
            $section = null;

            # Get top section(s).
            if ("/" === $uri) {
                $section = readSection("/" . $file);
                $section[LINK_PATH] = "/" . $file . "/";
            }
            # Get subsection(s) of a section.
            else {
                $section = readSection($uri . $file);
                $section[LINK_PATH] = $uri . $file . "/";
            }

            array_push($links, $section);
        }
    }

    return $links;
}

function getPosts ($uri)
{
    $sep = DIRECTORY_SEPARATOR;
    $rootDirectory = __DIR__ . $sep . "..";

    $directory = $rootDirectory . $sep
        . SITE_CONTENT . $sep
        . str_replace("/", $sep, $uri);

    $links = array();
    
    $files = scandir($directory, SCANDIR_SORT_ASCENDING);
    foreach ($files as $file) {
        # Skip private files.
        if ("." == substr($file, 0, 1)) {
            continue;
        }
        else if ("_" == substr($file, 0, 1)) {
            continue;
        }

        $path = $directory . $file;
        if (is_file($path)) {
            $link = array();

            $origPath = $uri . pathinfo($file, PATHINFO_FILENAME) . "/";
            $link[LINK_PATH] = $origPath;

            $post = readPost($origPath);

            foreach ($post as $key => $value) {
                $link[$key] = $value;
            }

            array_push($links, $link);
        }
    }

    return $links;
}

function errorPage ($status, $title, $content)
{
    require_once "const.php";

    $sep = DIRECTORY_SEPARATOR;
    $rootDirectory = __DIR__ . $sep . "..";

    $post = array();

    $post[POST_TITLE] = $title;
    $post[POST_DESCRIPTION] = $title;
    $post[POST_AUTHOR] = SITE_AUTHOR;
    $post[POST_CONTENT] = $content;
    $post[POST_STATUS] = $status;

    return $post;
}