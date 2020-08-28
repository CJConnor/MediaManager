<div class="row">
    <div class="card shadow my-5 mx-auto col-sm-12 p-3">

        <!-- Form Start -->
        <form action="act/playlist/add_playlist.php" method="post">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" placeholder="Enter playlist name" id="name" name="name">
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
                            <input type="checkbox" class="form-check-input" name="media[]" value="<?=$media->getId()?>"><?=$media->getName()?>
                        </label>
                    </div>

                    <?php

                endforeach;

            ?>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        <!-- Form end -->

    </div>
</div>