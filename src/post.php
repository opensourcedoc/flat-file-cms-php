<?php

use League\CommonMark\GithubFlavoredMarkdownConverter;

function readPost ($uri)
{
    require_once "_utils.php";
    require_once "const.php";
    require_once "page.php";

    $path = getPath($uri, ".md");

    $post = null;

    # Some post is available.
    if (file_exists($path)) {
        # Fetch the raw content.
        $rawContent = file_get_contents($path);

        $post = array();

        # Get a title from the top heading of a post.
        if (preg_match("/^# (.+)/", $rawContent, $matches)) {
            $post[POST_TITLE] = $matches[1];

            # Remove a <h1>-level title from the content.
            # Here we assume there is only one <h1> title per document.
            $rawContent = preg_replace("/^# (.+)/", "", $rawContent);
        }
        # Convert a URI path to a title.
        else {
            $a = parseURI($uri);
            $t = $a[array_key_last($a)];

            $post[POST_TITLE] = implode(" ",
                array_map(function ($elem) {
                    return ucfirst($elem);
                }, explode("-",
                    strtolower($t))));
        }

        # Create a GitHub-flavored Markdown converter object.
        $converter = new GithubFlavoredMarkdownConverter([]);

        # Convert the raw content into corresponding HTML.
        $post[POST_CONTENT] = $converter->convert($rawContent);

        # HTTP 200 OK.
        $post[POST_STATUS] = 200;
    }
    # No available post. Return HTTP 404.
    else {
        $post = errorPage(
            404,
            "Page Not Found",
            "This page is not on the site. "
              . "Visit <a href='/'>home</a> instead.");
    }

    return $post;
}