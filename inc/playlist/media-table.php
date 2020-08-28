<div class="row">

    <div class="col-sm-12">

        <?php

            // Instantiate playlist object
            $playlist_id = $_GET['id'];
            $playlist = new Playlist(['id' => $playlist_id]);

            if ($playlist->getMediaCount() > 0) : ?>

                <input type="hidden" id="id" value="<?=$playlist_id?>" />
                <input type="hidden" id="mediaCount" value="<?=$playlist->getMediaCount()?>" />

                <!-- Table Start -->
                <table class="table">
                    <tbody>
                        <?php
                        $i = 0;
                        // Loop through the media in the playlist
                        foreach ($playlist->getMedia() as $media) :

                            // Instantiate the Media File and Category objects
                            $media = new MediaFile(['id' => $media]);
                            $category = new Category(['id' => $media->getCategory()])
                            ?>
                            <tr>
                                <td>
                                    <input type="hidden" class="medias" id="<?=$i++?>" value="<?=$media->getId()?>" />
                                </td>
                                <td>
                                    <img class="img-thumbnail" width="32" src="_assets/uploads/images/<?=$media->getImageFile()?>"/>
                                </td>
                                <td><?=$media->getName()?></td>
                                <td><?=$category->getName()?></td>
                                <td>
                                    <button class="btn btn-sm btn-primary" onclick="window.location.href = 'edit-media?id=<?=$media->getId()?>'">Edit</button>
                                </td>
                            </tr>
                        <?php endforeach;  ?>
                    </tbody>
                </table>
                <!-- Table End -->

        <?php else : ?>

            No media could be found.
            <br />
            Add some by clicking <button class="btn btn-sm btn-primary" onclick="addMedia();">Here!</button>
        <?php endif; ?>

    </div>

</div>