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

                <form action="/admin/posts/store" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <div class="col-sm-1"><label for="">Name</label></div>
                        <div class="col-sm-5">
                            <input type="text" name="name" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-1"><label for="">Image</label></div>
                        <div class="col-sm-5">
                            <input type="file" name="img" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-1"><label for="">URL</label></div>
                        <div class="col-sm-5">
                            <input type="text" name="url" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-1"><label for="">Status</label></div>
                        <div class="col-sm-5">
                            <input type="text" name="status" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-1"><label for="">ID in List</label></div>
                        <div class="col-sm-5">
                            <input type="text" name="id_list" class="form-control" required>
                        </div>
                    </div>
                    <button class="btn btn-info" type="submit">Save</button>
                </form>
            </div>
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