<?php include_once "inc/head.php"; ?>
<title>Playlists</title>
<body>
    <?php include_once "inc/navbar.php"; ?>
    <div class="container">

        <div class="card shadow my-5 mx-auto text-center">
            <h3 class="my-auto">Your Playlists </h3>
            <br />
            <button class="btn btn-md btn-primary col-sm-2 align-self-center" onclick="addPlaylist();">Add Playlist</button>

            <hr>

            <?php include_once 'inc/playlists/playlist-table.php'; ?>

        </div>

    </div>

    <?php include_once "inc/footer.php";  ?>

    <script type="text/javascript" src="_assets/js/playlists.js"></script>
</body>
</html>
