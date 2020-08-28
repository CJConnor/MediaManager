<div class="row">

    <div class="col-sm-12">

        <!-- Table Start -->
        <table class="table">
            <tbody>
            <?php

                // Build table rows from database
                $db->query("SELECT id FROM category WHERE uid = :id ");
                $db->bind(":id", $_SESSION['uid']);
                $db->execute();

                if ($db->rowCount() > 0) :

                foreach ($db->resultSet() as $row) :
                    $category = new Category(['id' => $row->id])
                    ?>
                    <tr>
                        <td><?=$category->getName()?><td>
                        <td>
                            <button class="btn btn-sm btn-basic" onclick="editCategory('<?=$category->getId()?>')">Edit</button>
                            <button class="btn btn-sm btn-danger" onclick="deleteCategory('<?=$category->getId()?>')">Delete</button>
                        </td>
                    </tr>
                <?php
                endforeach;
            ?>

            </tbody>
        </table>
        <!-- Table end -->

        <?php else : ?>
            No categories could be found.
            <br />
            Add some by clicking <button class="btn btn-sm btn-primary" onclick="addCategory();">Here!</button>
        <?php endif; ?>

    </div>

</div>