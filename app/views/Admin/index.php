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
        <?php include('main.php') ?>
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