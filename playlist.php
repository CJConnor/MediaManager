<?php include_once "inc/head.php"; ?>
<title>Playlist</title>
<body>
    <?php include_once "inc/navbar.php"; ?>
    <div class="container">

        <div class="card shadow my-5 mx-auto text-center">
            <h3 class="my-auto">Playlist Media</h3>
            <br />
            <button class="btn btn-md btn-primary col-sm-2 align-self-center" onclick="editPlaylist('<?=$_GET['id']?>');">Edit Playlist</button>

            <hr>

            <?php include_once 'inc/playlist/media-table.php'; ?>

        </div>

        <?php include_once 'inc/home/player-modal.php'?>
    </div>

    <?php include_once "inc/footer.php";  ?>

    <script type="text/javascript" src="_assets/js/playlist.js"></script>
</body>
</html>
