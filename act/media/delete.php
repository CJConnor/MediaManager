<?php
    session_start();

    include_once '../../inc/includes.php';

    // Collect media id
    $id = $_GET['id'];

    // Instantiate media object
    $mediaFile = new MediaFile(['id' => $id]);

    // Delete Image
    if (file_exists('../../_assets/uploads/images/' . $mediaFile->getImageFile())) :
        unlink('../../_assets/uploads/images/' . $mediaFile->getImageFile());
    endif;

    // Delete File
    if (file_exists('../../_assets/uploads/media/' . $mediaFile->getFilename())) :
        unlink('../../_assets/uploads/media/' . $mediaFile->getFilename());
    endif;

    // Delete media file from database
    $db->query("DELETE FROM media_file WHERE id = :id LIMIT 1");
    $db->bind(":id", $id);
    $db->execute();

    // Remove media file id from users list
    for ($i = 0; $i < count($user_media); $i++) :
        if ($user_media[$i] == $id) :
            unset($user_media[$i]);
        endif;
    endfor;

    // Turn user_media array back into a string for entry into the database
    $user_media = implode(',', $user_media);

    $user->newOrder($user_media);
    $user->save();

    // Redirect back to home page
    header("Location: ../../home");