<?php

    // Instantiate playlist object
    $playlist = new Playlist(['id' => $_GET['id']]);

?>

<div class="row">
    <div class="card shadow my-5 mx-auto col-sm-12 p-3">

        <!-- Form Start -->
        <form action="act/playlist/edit_playlist.php" method="post">
            <input type="hidden" name="id" id="id" value="<?=$_GET['id']?>" />
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" placeholder="Enter playlist name" id="name" name="name" value="<?=$playlist->getName()?>">
            </div>
            <h5>Select Your Media:</h5>
            <?php

                // Build media list

                $i = 0;

                foreach ($user_media as $media) :

                    $media = new MediaFile(['id' => $media]);

                    ?>

                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="checkbox" <?=in_array($media->getId(), $playlist->getMedia()) ? "checked" : "" ?> class="form-check-input" name="media[]" value="<?=$media->getId()?>"><?=$media->getName()?>
                        </label>
                    </div>

                    <?php

                endforeach;

            ?>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

        <!-- Form End -->

    </div>
</div>