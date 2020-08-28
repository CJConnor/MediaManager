<?php include_once "inc/head.php"; ?>
<title>Media Manager</title>
<body>
    <?php include_once "inc/navbar.php"; ?>
    <div class="container">

        <!-- Welcome Message -->
        <div class="card text-center shadow-sm my-2 bg-dark">
            <div class="card-text text-white py-4">
                <h2 class="my-4">Welcome to the Media Manager!</h2>
            </div>
        </div>

        <div class="card shadow my-5 mx-auto text-center">
            <h3 class="my-auto">Your Media</h3>
            <br />
            <button class="btn btn-md btn-primary col-sm-2 align-self-center" onclick="addMedia();">Add Media</button>

            <hr>

            <?php include_once 'inc/home/media-table.php' ?>

        </div>

        <?php include_once 'inc/home/player-modal.php' ?>

    </div>

    <?php include_once "inc/footer.php";  ?>

    <script type="text/javascript" src="_assets/js/home.js"></script>
</body>
</html>
