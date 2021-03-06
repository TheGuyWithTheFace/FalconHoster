<?php
session_start();
if( !isset($_SESSION["user_id"]) ) {
	// generate id to identify this particular user
	$_SESSION["user_id"] = uniqid();
	// good enough!
}
?>
<!DOCTYPE html>
<html>
	<head>
        <link rel="icon" href="lib/favicon.png">
        <link rel="stylesheet" href="lib/dropzone.css">
        <link rel="stylesheet" href="lib/styles.css">
		<title>FalconHoster | Upload File</title>
	</head>
	<body>
        <?php
        if( isset($_SESSION["has_folder"]) ) {
            // display link to user folder if user already has files
            echo "<a id='folderLink' href='./userFiles.php'>View uploaded files</a>";
        }
        ?>

        <form enctype="multipart/form-data" action="upload.php" id="dropzonearea" class="dropzone" method="POST">
           <h1>Upload a File</h1>
            <div class="fallback"> <!--Fallback for browsers that don't support dropzone or Javascript-->
            <input name="uploadedFile" type="file" dropzone="copy"/>
            <br />
            <input type="submit" value="Upload" />
            </div>
        </form>
        <script src="lib/dropzone.js"></script>
        <script>
            Dropzone.options.dropzonearea = {
                paramName: "uploadedFile",
                init: function() {
                    this.on("addedfile", function(file) {
                        if( !document.getElementById("folderLink") ) {
                            var link = document.createElement("a");
                            link.setAttribute("href", "./userFiles.php");
                            link.setAttribute("id", "folderLink")
                            link.innerHTML = "View uploaded files";
                            document.body.appendChild(link);
                        }
                    });
                }
            };
        </script>
	</body>
</html>
