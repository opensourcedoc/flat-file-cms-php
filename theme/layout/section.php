<?php
# The layout of a section.

$sep = DIRECTORY_SEPARATOR;
$themeDirectory = __DIR__ . $sep . "..";

require_once $themeDirectory . $sep . "src" . $sep . "utils.php";

# Get current section.
$section = $GLOBALS[CURRENT_SECTION];
# Get the sections under this section.
$sections = $GLOBALS[SECTIONS];
# Get the posts under this section.
$posts = $GLOBALS[POSTS];
# The status of a section is always HTTP 200 OK.
$status = 200;
?>

<!DOCTYPE html>
<html lang="<?php echo SITE_LANGUAGE; ?>">
    <head>
        <title><?php echo strip_tags($section[SECTION_TITLE]), " | ", strip_tags(SITE_NAME); ?></title>
        <meta name="author" content="<?php echo strip_tags(SITE_AUTHOR); ?>">

        <?php includePartial("header.php"); ?>
    </head>
    <body>
        <div class="container py-4 bg-primary text-white">
            <div class="m-4 p-5 jumbotron">
                <header>
                    <div>
                        <h1><?php echo $section[SECTION_TITLE]; ?></h1>
                    </div>
                </header>
            </div>
        </div>

        <div class="container">
            <main id="main-content" class="p-5">
                <?php
                    # Show a fallback message if no any subsection and post.
                    if ((!isset($sections) && !isset($posts))
                        || ((isset($sections) && 0 == count($sections))
                            && (isset($posts) && 0 == count($posts))))
                    {
                        echo "<p>No content available yet.</p>";
                    }
                ?>

                <?php
                    if (isset($posts) && count($posts) > 0) {
                        echo "<h2>Articles</h2>";

                        echo "<ul>";
                        foreach ($posts as $post) {
                            echo "<li>";
                            echo "<article>";
                            echo "<h3 style='display: inline;'>" . $post[POST_TITLE] . "</h3>";

                            echo "<a "
                                . "href=\"" . $post[LINK_PATH] . "\">"
                                . "Read More"
                                . "</a>";

                            echo "</article>";
                            echo "</li>";
                        }
                        echo "</ul>";
                    }
                ?>

                <?php
                    if (isset($sections) && count($sections) > 0) {
                        foreach ($sections as $section) {
                            echo "<h2>";

                            echo "<a "
                                . "href=\"" . $section[LINK_PATH] . "\">"
                                . $section[SECTION_TITLE]
                                . "</a>";

                            echo "</h2>";
                        }
                    }
                ?>
            </main>
        </div>

        <?php includePartial("library.php"); ?>
    </body>
</html>

<?php http_response_code($status); ?>