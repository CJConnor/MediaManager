<?php include_once "inc/head.php"; ?>
<title>Categories</title>
<body>
    <?php include_once "inc/navbar.php"; ?>
    <div class="container">

        <div class="card shadow my-5 mx-auto text-center">
            <h3 class="my-auto">Your Categories </h3>
            <br />
            <button class="btn btn-md btn-primary col-sm-2 align-self-center" onclick="addCategory();">Add Category</button>

            <hr>

            <?php include_once 'inc/categories/category-table.php'?>

        </div>

    </div>

    <?php include_once "inc/footer.php";  ?>

    <script type="text/javascript" src="_assets/js/categories.js"></script>

</body>
</html>
