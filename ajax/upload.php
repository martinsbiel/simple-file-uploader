<?php
    require_once '../config.php';
    require_once '../classes/File.php';

    // check if the file is set
    $file = (isset($_FILES['file'])) ? $_FILES['file'] : null;
    $fileName = (isset($_FILES['file'])) ? $_FILES['file']['name'] : null;
    $fileTempname = (isset($_FILES['file'])) ? $_FILES['file']['tmp_name'] : null;
    $fileSize = (isset($_FILES['file'])) ? $_FILES['file']['size'] : null;

    $upload = new File();

    if(!empty($fileName)){
        if($upload->checkExtension($upload->getFileExtension($fileName), $allowedExtensions)){
            echo '<div class="alert alert-danger" role="alert">Extension not allowed.</div>';
        }elseif($upload->checkSize($fileSize, $allowedSize)){
            echo '<div class="alert alert-danger" role="alert">The file is too big.</div>';
        } else {
            $newFileName = $upload->changeFileName($upload->getFileExtension($fileName));

            $upload->uploadFile($fileTempname, $newFileName, $folder);

            echo '<div class="input-group">
                    <input id="copylink-target" type="text" class="form-control" value="' . $_SERVER['SERVER_NAME'] . '/u/' . $newFileName . '" readonly>
                    <button data-clipboard-target="#copylink-target" class="btn btn-secondary copylink" type="button">Copy</button>
                </div>';
        }
    } else {
        echo '<div class="alert alert-danger" role="alert">Error, select a file.</div>';
    }