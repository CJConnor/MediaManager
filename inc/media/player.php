<?php

    session_start();

    include_once '../includes.php';

    $id = filter_var($_POST['id'], FILTER_SANITIZE_STRING);

    $media = new MediaFile(['id' => $id]);

?>

<div class="modal-dialog">
    <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
            <h4 class="modal-title"><?=$media->getName()?></h4>
            <button type="button" class="close" onclick="closePlayer()">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body text-center">
            <?php
                $ext = strtolower(pathinfo($media->getFilename(),PATHINFO_EXTENSION));
                if (in_array($ext, MediaFile::$audioFileTypes)) :
                    ?>

                    <div class="row pb-4">

                        <div class="col-sm-2"></div>

                        <div class="col-sm-8 align-self-center">
                            <img class="img-fluid rounded" src="_assets/uploads/images/<?=$media->getImageFile()?>" />
                        </div>

                        <div class="col-sm-2"></div>

                    </div>

                    <div class="row">

                        <div class="col-sm-12">

                            <audio controls>
                                <source src="_assets/uploads/media/<?=$media->getFilename()?>">
                            </audio>

                        </div>

                    </div>
                    <?php

                elseif (in_array($ext, MediaFile::$videoFileTypes)) :
                    ?>
                    <div class="row">
                        <div class="col-sm-12">
                            <video controls>
                                <source src="_assets/uploads/media/<?=$media->getFilename()?>">
                            </video>
                        </div>
                    </div>
                    <?php
                endif;

            ?>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
            <button type="button" class="btn btn-danger" onclick="closePlayer()">Close</button>
        </div>

    </div>
</div>
