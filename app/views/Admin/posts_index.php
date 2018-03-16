<!DOCTYPE html>
<html>
<?php include('layout/head.php'); ?>
<body>
<div class="header">
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <!-- Logo -->
                <div class="logo">
                    <h1><a href="/admin/">Admin panel</a></h1>
                </div>
            </div>
            <div class="col-md-2">
                <div class="navbar navbar-inverse" role="banner">
                    <nav class="collapse navbar-collapse bs-navbar-collapse navbar-right"
                         role="navigation">
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="page-content">
    <div class="row">
        <?php include('layout/navigation.php') ?>

        <div class="col-md-10">
            <div class="row">
                <div class="col-md-1">
                    <b>ID</b>
                </div>
                <div class="col-md-2">
                    <b>Name</b>
                </div>
                <div class="col-md-2">
                    <b>Image</b>
                </div>
                <div class="col-md-2">
                    <b>Url</b>
                </div>
                <div class="col-md-2">
                    <b>Status</b>
                </div>
                <div class="col-md-1">
                    <b>ID in List</b>
                </div>
            </div>

            <?php foreach ($data['posts'] as $post) { ?>
                <div class="row">
                    <div class="col-md-1">
                        <span><?php echo $post['id']; ?></span>
                    </div>
                    <div class="col-md-2">
                        <span><?php echo $post['name']; ?></span>
                    </div>
                    <div class="col-md-2">
                        <span><?php echo $post['img']; ?></span>
                    </div>
                    <div class="col-md-2">
                        <span><?php echo $post['url']; ?></span>
                    </div>
                    <div class="col-md-2">
                        <span><?php echo $post['status']; ?></span>
                    </div>
                    <div class="col-md-1">
                        <span><?php echo $post['id_list']; ?></span>
                    </div>
                    <div class="col-md-1">
                        <span>
                            <a href="<?php //todo link to edit ?>">Edit</a>
                        </span>
                    </div>
                    <div class="col-md-1">
                        <span>
                            <a href="<?php //todo link to delete ?>">Delete</a>
                        </span>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>

<?php include('layout/footer.php') ?>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="/js/admin/jquery.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="/js/admin/bootstrap.min.js"></script>
<script src="/js/admin/custom.js"></script>
</body>
</html>