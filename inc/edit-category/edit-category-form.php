<?php
    // Instantiate category object
    $category = new Category(['id' => $_GET['id']]);
?>

<div class="row">
    <div class="card shadow my-5 mx-auto col-sm-12 p-3">

        <!-- Form Start -->
        <form action="act/category/edit_category.php" method="post">
            <input type="hidden" name="id" id="id" value="<?=$_GET['id']?>" />
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" placeholder="Enter playlist name" id="name" name="name" value="<?=$category->getName()?>">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        <!-- Form End -->

    </div>
</div>