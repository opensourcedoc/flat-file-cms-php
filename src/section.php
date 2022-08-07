<?php

use League\CommonMark\GithubFlavoredMarkdownConverter;

function readSection ($uri)
{
    require_once "_utils.php";
    require_once "const.php";

    $sep = DIRECTORY_SEPARATOR;
    $rootDirectory = __DIR__ . $sep . "..";

    $indexPath = $rootDirectory . $sep
        . SITE_CONTENT . $sep
        . str_replace("/", $sep, $uri)
        . $sep . SECTION_INDEX;

    $section = array();

    if (file_exists($indexPath)) {
        # Fetch the raw content.
        $rawContent = file_get_contents($indexPath);

        # Get a title from the top heading of a post.
        if (preg_match("/^# (.+)/", $rawContent, $matches)) {
            $section[SECTION_TITLE] = $matches[1];

            # Remove a <h1>-level title from the content.
            # Here we assume there is only one <h1> title per document.
            $rawContent = preg_replace("/^# (.+)/", "", $rawContent);
        }
        # Convert a URI path to a title.
        else {
            $a = parseURI($uri);
            $t = $a[array_key_last($a)];

            $section[SECTION_TITLE] = implode(" ",
                array_map(function ($elem) {
                    return ucfirst($elem);
                }, explode("-",
                    strtolower($t))));
        }
    }
    # Convert a URI path to a title.
    else {
        $a = parseURI($uri);
        $t = $a[array_key_last($a)];

        $section[SECTION_TITLE] = implode(" ",
            array_map(function ($elem) {
                return ucfirst($elem);
            }, explode("-",
                strtolower($t))));
    }

    return $section;
}