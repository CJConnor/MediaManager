<?php
    session_start();

    include_once '../../inc/includes.php';

    // Collect post variables
    $id = filter_var($_POST['id'], FILTER_SANITIZE_STRING);
    $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    $category = filter_var($_POST['category'], FILTER_SANITIZE_STRING);
    $comment = filter_var($_POST['comment'], FILTER_SANITIZE_STRING);

    $upload = 1;

    // Instantiate the old and new media file object
    $old_media = new MediaFile(['id' => $id]);
    $mediaFile = new MediaFile(['id' => $id]);

    // If both a media file and a image file are being uploaded
    if ($_FILES['mediaFile']['size'] > 0 && $_FILES['imageFile']['size'] > 0) :

        // New file names
        $mediaFile->setFilename(strtotime('now') . "_" . rand(100, 999));
        $mediaFile->setImageFile(strtotime('now') . "_" . rand(100, 999));

        // If both giles uploaded successfully, delete the old ones
        if ($mediaFile->uploadMediaFile($_FILES['mediaFile'])[0] == 1 && $mediaFile->uploadImageFile($_FILES['imageFile'])[0] == 1) :
            unlink('../../_assets/uploads/media/' . $old_media->getFilename());
            unlink('../../_assets/uploads/images/' . $old_media->getImageFile());
            $upload = 1;
        else :
            $upload = 0;
        endif;

    // If only a media file is being uploaded
    elseif ($_FILES['mediaFile']['size'] > 0) :

        // New filename
        $mediaFile->setFilename(strtotime('now') . "_" . rand(100, 999));

        // If media file is uploaded delete the old one
        if ($mediaFile->uploadMediaFile($_FILES['mediaFile'])[0] == 1) :
            unlink('../../_assets/uploads/media/' . $old_media->getFilename());
            $upload = 1;
        else :
            $upload = 0;
        endif;

    // If only a image file is being uploaded
    elseif ($_FILES['imageFile']['size'] > 0) :

        // New image file name
        $mediaFile->setImageFile(strtotime('now') . "_" . rand(100, 999));

        // If image file uploaded successfully then delete the old one
        if ($mediaFile->uploadImageFile($_FILES['imageFile'])[0] == 1) :
            unlink('../../_assets/uploads/images/' . $old_media->getImageFile());
            $upload = 1;
        else :
            $upload = 0;
        endif;

    endif;

    // If upload is still set to 1
    if ($upload == 1) :

        $mediaFile->setName($name);
        $mediaFile->setComment($comment);
        $mediaFile->setCategory($category);

        $id = $mediaFile->save();

    // If upload is not set to 1 then display an error
    else :
        header("Location: ../../edit-media?id=" . $_POST['id'] . "&error=1");
    endif;


// Redirect back to home page
header("Location: ../../home");