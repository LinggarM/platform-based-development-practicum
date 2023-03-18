<!--File : upload.php
Deskripsi : memproses upload file
-->
<html>
<head>
    <title>Uploading...</title>
</head>
<body>
    <h1>Uploading file...</h1>
    <?php
        if ($_FILES['userfile']['error'] > 0) {
            echo 'Problem: ';
            switch ($_FILES['userfile']['error']) {
                case 1: echo 'File exceeded upload_max_filesize';
                break;
                case 2: echo 'File exceeded max_file_size';
                break;
                case 3: echo 'File only partially uploaded';
                break;
                case 4: echo 'No file uploaded';
                break;
                case 6: echo 'Cannot upload file: No temp directory specified';
                break;
                case 7: echo 'Upload failed: Cannot write to disk';
                break;
            }
            exit;
        }

        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES['userfile']['name']);
        $upload_ok = 1;
        $file_type = pathinfo($target_file,PATHINFO_EXTENSION);
        // Check if file already exists
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.<br />";
            $upload_ok = 0;
        }
        // Check file size if you not use hidden input 'MAX_FILE_SIZE'
        /*if ($_FILES['userfile']['size'] > 1000000) {
        echo "Sorry, your file is too large.<br />";
        $upload_ok = 0;
        }*/
        // Allow certain file formats
        $allowed_type = array("jpg", "png", "jpeg", "gif");
        if(!in_array($file_type, $allowed_type)) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $upload_ok = 0;
        }
        // Does the file have the right MIME type?
        /*if ($_FILES['userfile']['type'] != 'text/plain'){
        echo 'Problem: file is not plain text';
        $uploadOk = 0;
        }*/
        // put the file where we'd like it
        if ($upload_ok != 0){
            if (is_uploaded_file($_FILES['userfile']['tmp_name'])){
                if (!move_uploaded_file($_FILES['userfile']['tmp_name'], $target_file)) {
                    echo 'Problem: Could not move file to destination
                    directory';
                } else {
                    echo 'File uploaded successfully<br /><br />';
                    echo 'Filename =
                    '.basename($_FILES['userfile']['name']).'<br />';
                    echo 'Size = '.$_FILES['userfile']['size'].' byte';
                }
            } else {
                echo 'Problem: Possible file upload attack. Filename: ';
                echo $_FILES['userfile']['name'];
            }
        }
    ?>
</body>
</html>