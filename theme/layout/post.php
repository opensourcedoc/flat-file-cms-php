<?php
# The layout of a post.

# Get current post.
$post = $GLOBALS[CURRENT_POST];
?>

<!DOCTYPE html>
<html lang="<?php echo SITE_LANGUAGE; ?>">
    <head>
        <title><?php echo strip_tags($post[POST_TITLE]), " | ", strip_tags(SITE_NAME); ?></title>
        <meta name="author" content="<?php echo strip_tags(SITE_AUTHOR); ?>">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css"
            integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx"
            rel="stylesheet" crossorigin="anonymous">
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

        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"
            integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk"
            crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js"
            integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK"
            crossorigin="anonymous"></script>
    </body>
</html>

<?php http_response_code($post[POST_STATUS]); ?>