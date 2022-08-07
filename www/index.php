<?php

# Set the root directory.
$sep = DIRECTORY_SEPARATOR;
$rootDirectory = __DIR__ . $sep . "..";

# Load third-party package(s).
require_once $rootDirectory . $sep . "vendor" . $sep . "autoload.php";
# Load the internal library.
require_once $rootDirectory . $sep . "src" . $sep . "autoload.php";

# Load the site setting(s).
require_once $rootDirectory . $sep . "setting.php";


# Receive a URI from a HTTP client, e.g. a browser.
$uri = filter_input(INPUT_SERVER, "REQUEST_URI", FILTER_SANITIZE_URL);

# Respond to the home page.
if (isHome($uri)) {
    $GLOBALS[SECTIONS] = getSections($uri);
    $GLOBALS[POSTS] = getPosts($uri);

    loadHome();
}
# Respond to a section.
else if (isSection($uri)) {
    $GLOBALS[CURRENT_SECTION] = readSection($uri);
    $GLOBALS[SECTIONS] = getSections($uri);
    $GLOBALS[POSTS] = getPosts($uri);

    loadSection();
}
# Respond to a post.
else if (isPost($uri)) {
    $GLOBALS[CURRENT_POST] = readPost($uri);

    loadPost();
}
# HTTP 404.
else {
    $GLOBALS[CURRENT_POST] = errorPage(
        404,
        "Page Not Found",
        "This page is not on the site. "
          . "Visit <a href='/'>home</a> instead.");

    loadPost();
}
