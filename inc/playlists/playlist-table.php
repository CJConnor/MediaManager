<div class="row">

    <div class="col-sm-12">

        <!-- Table Start -->
        <table class="table">
            <tbody>
            <?php

                // Query database for the users playlists
                $db->query("SELECT id FROM playlist WHERE uid = :id ");
                $db->bind(":id", $_SESSION['uid']);
                $db->execute();

                if ($db->rowCount() > 0) :

                    // Loop through playlists
                    foreach ($db->resultSet() as $row) :

                        // Instantiate playlist object
                        $playlist = new Playlist(['id' => $row->id])
                        ?>
                        <tr>
                            <td><?=$playlist->getName()?><td>
                            <td><?=$playlist->getMediaCount()?></td>
                            <td>
                                <button class="btn btn-sm btn-basic" onclick="view('<?=$playlist->getId()?>')">View</button>
                                <button class="btn btn-sm btn-danger" onclick="deletePlaylist('<?=$playlist->getId()?>')">Delete</button>
                            </td>
                        </tr>
                        <?php
                    endforeach;
            ?>

            </tbody>
        </table>
        <!-- Playlist end -->

        <?php else : ?>

            No playlists could be found.
            <br />
            Add some by clicking <button class="btn btn-sm btn-primary" onclick="addPlaylist();">Here!</button>
        <?php endif; ?>

    </div>

</div>