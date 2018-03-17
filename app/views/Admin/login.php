<!DOCTYPE html>
<html>
<?php include('layout/head.php'); ?>
<body class="login-bg">
<div class="page-content container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-wrapper">
                <div class="box">
                    <div class="content-wrap">
                        <form action="/admin/login" method="post">
                            <h6>Sign In</h6>
                            <div class="form-group">
                                <input class="form-control" name="login" type="text"
                                       placeholder="Login" required>
                            </div>
                            <div class="form-group <?php if (isset($data['errMsg'])) {
                                echo ' has-error';
                            } ?>">
                                <input class="form-control" name="password"
                                       type="password"
                                       placeholder="Password" required>
                                <?php if (isset($data['errMsg'])) { ?>
                                    <span class="help-block">
                                            <strong><?php echo $data['errMsg']; ?></strong>
                                        </span>
                                <?php } ?>
                            </div>


                            <div class="action">
                                <button class="btn btn-primary signup" type="submit">
                                    Login
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="/js/admin/jquery.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="/js/admin/bootstrap.min.js"></script>
<script src="/js/admin/custom.js"></script>
</body>
</html>