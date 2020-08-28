<?php
    session_start();

    include_once '../../inc/includes.php';

    // Collect and set post variables
    $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    $category = filter_var($_POST['category'], FILTER_SANITIZE_STRING);
    $comment = filter_var($_POST['comment'], FILTER_SANITIZE_STRING);
    $_POST['file_name'] = strtotime('now') . "_" . rand(100, 999);
    $_POST['image_file'] = strtotime('now') . "_" . rand(100, 999);

    // Instantiate new media file object
    $mediaFile = new MediaFile($_POST);

    // Upload files
    if ($mediaFile->uploadMediaFile($_FILES['mediaFile'])[0] == 1 && $mediaFile->uploadImageFile($_FILES['imageFile'])[0] == 1) :

        // Set category
        $mediaFile->setCategory($category);

        // Save media file
        $id = $mediaFile->save();

        // Add media file to users list
        $user->setMedia($id);
        $user->save();
    endif;

    // Redirect to home page
    header("Location: ../../home");