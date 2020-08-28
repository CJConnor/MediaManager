<div class="row">
    <div class="card shadow my-5 mx-auto col-sm-12 p-3">

        <!-- Form start -->
        <form action="act/media/add_media.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" placeholder="Enter media name" id="name" name="name">
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
                        // Build options list from the database
                        $db->query("SELECT * FROM category WHERE uid = :uid ");
                        $db->bind(':uid', $_SESSION['uid']);
                        $db->execute();

                        if ($db->rowCount() > 0) :
                            try {
                                foreach ($db->resultSet() as $row) :
                                    echo "<option value='" . $row->id . "'>" . $row->name . "</option>";
                                endforeach;
                            } catch (Exception $e) {}
                        endif;
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="comment">Comment:</label>
                <textarea class="form-control" rows="5" id="comment" name="comment"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        <!-- Form end -->

    </div>
</div>