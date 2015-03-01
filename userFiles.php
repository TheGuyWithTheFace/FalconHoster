<?php
$page_title = "My Files";
session_start();

if( !isset($_SESSION["user_id"]) ) {
	// redirect to initial page if user doesn't have an id yet
	header('Location: index.php');
	die();
}

// get files in user directory
$dirName = "uploads/" . $_SESSION["user_id"] . '/';
$files = scandir($dirName);

// Remove '.' and '..' files
foreach($files as $index => $name) {
    if($name === '.' || $name === '..') {
        unset($files[$index]);
    }
}

?>
<!DOCTYPE html>
<html>
    <?php include 'head.php'; ?>
    <body>
        <a href="index.php">Go Back</a>
        <h1>My Files</h>
        <ul>
            <?php
                foreach($files as $fileName) {
                    echo "<li><a href='"
                        . $dirName . $fileName . "'>"
                        . "$fileName</a></li>";
                }
            ?>
        </ul>
    </body>
</html>
