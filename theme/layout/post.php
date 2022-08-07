<?php
# The layout of a post.

$sep = DIRECTORY_SEPARATOR;
$themeDirectory = __DIR__ . $sep . "..";

require_once $themeDirectory . $sep . "src" . $sep . "utils.php";

# Get current post.
$post = $GLOBALS[CURRENT_POST];
?>

<!DOCTYPE html>
<html lang="<?php echo SITE_LANGUAGE; ?>">
    <head>
        <title><?php echo strip_tags($post[POST_TITLE]), " | ", strip_tags(SITE_NAME); ?></title>
        <meta name="author" content="<?php echo strip_tags(SITE_AUTHOR); ?>">

        <?php includePartial("header.php"); ?>
        <?php includePartial("headerForPost.php"); ?>
    </head>
    <body>
        <div class="container py-4 bg-primary text-white">
            <div class="m-4 p-5 jumbotron">
                <header>
                    <div>
                        <h1><?php echo $post[POST_TITLE]; ?></h1>
                    </div>
                </header>
            </div>
        </div>

        <div class="container">
            <main id="main-content" class="p-5">
                <?php echo $post[POST_CONTENT]; ?>
            </main>
        </div>

        <?php includePartial("library.php"); ?>
        <?php includePartial("libraryForPost.php"); ?>
    </body>
</html>

<?php http_response_code($post[POST_STATUS]); ?>