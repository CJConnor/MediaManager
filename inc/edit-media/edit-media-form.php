<?php

    $id = $_GET['id'];

    // If the media id belongs to the user
    if (in_array($id, $user_media)) :

        // Instantiate media object
        $media = new MediaFile(['id' => $id]);
        ?>

        <div class="row">
            <div class="card shadow my-5 mx-auto col-sm-12 p-3">

                <!-- Form Start -->
                <form action="act/media/edit_media.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" id="id" value="<?=$media->getId()?>">
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" placeholder="Enter media name" id="name" name="name" value="<?=$media->getName();?>">
                    </div>
                    <div class="form-group">
                        <label for="mediaFile">Media File:</label>
                        <input type="file" class="form-control" id="mediaFile" name="mediaFile">
                    </div>
                    <div class="form-group">
                        <label for="imageFile">Image File:</label>
                        <input type="file" class="form-control" id="imageFile" name="imageFile">
                    </div>
                    <div class="form-group">
                        <label for="category">Category:</label>
                        <select name="category" id="category" class="form-control">
                            <?php
                                // Build options from database
                                $db->query("SELECT * FROM category WHERE uid = :uid ");
                                $db->bind(':uid', $_SESSION['uid']);
                                $db->execute();

                                if ($db->rowCount() > 0) :
                                    try {
                                        foreach ($db->resultSet() as $row) :
                                            $selected = $media->getCategory() == $row->id ? "selected" : "";
                                            echo "<option " . $selected . " value='" . $row->id . "'>" . $row->name . "</option>";
                                        endforeach;
                                    } catch (Exception $e) {}
                                endif;
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="comment">Comment:</label>
                        <textarea class="form-control" rows="5" id="comment" name="comment"><?=$media->getComment();?></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
                <!-- Form End -->

            </div>
        </div>
<?php else: ?>
        <div class="row">

            <div class="card shadow my-5 mx-auto col-sm-12 p-3 text-center">
                <h5>Media could not be found</h5>
            </div>

        </div>
<?php endif; ?>
