<div class="row">

    <div class="col-sm-12">

        <?php if (count($user_media) > 1) : ?>

            <!-- Tracks media count for saving the state -->
            <input type="hidden" id="mediaCount" value="<?=count($user_media)?>" />

            <!-- Table Start -->
            <table class="table">
                <tbody>
                    <?php

                        // Builds table rows
                        $i = 0;
                        foreach ($user_media as $media) :
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
                                    <button class="btn btn-sm btn-basic" onclick="play('<?=$media->getId()?>')">Play</button>
                                    <button class="btn btn-sm btn-primary" onclick="window.location.href = 'edit-media?id=<?=$media->getId()?>'">Edit</button>
                                    <button class="btn btn-sm btn-danger" onclick="deleteMedia('<?=$media->getId()?>');">Delete</button>
                                </td>
                            </tr>
                            <?php
                        endforeach;
                    ?>
                </tbody>
            </table>

        <?php else : ?>

            No media could be found.
            <br />
            Add some by clicking <button class="btn btn-sm btn-primary" onclick="addMedia();">Here!</button>
        <?php endif; ?>

    </div>

</div>