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

        <!--        <div class="col-md-10">-->
        <!--            <div class="row">-->
        <!--                <div class="col-md-1">-->
        <!--                    <b>ID</b>-->
        <!--                </div>-->
        <!--                <div class="col-md-2">-->
        <!--                    <b>Name</b>-->
        <!--                </div>-->
        <!--                <div class="col-md-2">-->
        <!--                    <b>Image</b>-->
        <!--                </div>-->
        <!--                <div class="col-md-2">-->
        <!--                    <b>Url</b>-->
        <!--                </div>-->
        <!--                <div class="col-md-2">-->
        <!--                    <b>Status</b>-->
        <!--                </div>-->
        <!--                <div class="col-md-1">-->
        <!--                    <b>ID in List</b>-->
        <!--                </div>-->
        <!--            </div>-->
        <!--            --><?php //if ($data['posts'][0]) { ?>
        <!--                --><?php //foreach ($data['posts'] as $post) { ?>
        <!--                    <div class="row">-->
        <!--                        <div class="col-md-1">-->
        <!--                            <span>-->
        <?php //echo $post['id']; ?><!--</span>-->
        <!--                        </div>-->
        <!--                        <div class="col-md-2">-->
        <!--                            <span>-->
        <?php //echo $post['name']; ?><!--</span>-->
        <!--                        </div>-->
        <!--                        <div class="col-md-2">-->
        <!--                            <span>-->
        <?php //echo $post['img']; ?><!--</span>-->
        <!--                        </div>-->
        <!--                        <div class="col-md-2">-->
        <!--                            <span>-->
        <?php //echo $post['url']; ?><!--</span>-->
        <!--                        </div>-->
        <!--                        <div class="col-md-2">-->
        <!--                            <span>-->
        <?php //echo $post['status']; ?><!--</span>-->
        <!--                        </div>-->
        <!--                        <div class="col-md-1">-->
        <!--                            <span>-->
        <?php //echo $post['id_list']; ?><!--</span>-->
        <!--                        </div>-->
        <!--                        <div class="col-md-1">-->
        <!--                        <span>-->
        <!--                            <a href="/admin/posts/create/">Edit</a>-->
        <!--                        </span>-->
        <!--                        </div>-->
        <!--                        <div class="col-md-1">-->
        <!--                        <span>-->
        <?php if ($data['posts'][0]) { ?>
        <?php foreach ($data['posts'] as $post) { ?>
        <div id="main" role="main">
            <section class="slider">
                <div class="flexslider">
                    <ul class="slides">
                        <?php echo '<li><img src="'.$post['img'].'" /></li>'; ?>
                    </ul>
                </div>
            </section>
            <form action="/admin/posts/delete/" method="post" name="delete_post">
                <input type="submit" value="Delete">
                <input type="hidden" name="id"
                       value="<?php echo($post['id']); ?>">
            </form>
            <form action="/admin/posts/edit/" method="post"
                  name="redaction_post">
                <input type="submit" value="Edit">
                <input type="hidden" name="id"
                       value="<?php echo($post['id']); ?>">
            </form>


            </span>
        </div>
    </div>
    <?php } ?>
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
<script src="js/admin//jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="js/admin/jquery.min.js">\x3C/script>')</script>

<!-- FlexSlider -->
<script defer src="js/admin/jquery.flexslider.js"></script>

<script type="text/javascript">
    $(function () {
        SyntaxHighlighter.all();
    });
    $(window).load(function () {
        $('.flexslider').flexslider({
            animation: "slide",
            start: function (slider) {
                $('body').removeClass('loading');
            }
        });
    });
</script>

<script type="text/javascript" src="js/admin/shCore.js"></script>
<script type="text/javascript" src="js/admin/shBrushXml.js"></script>
<script type="text/javascript" src="js/admin/shBrushJScript.js"></script>

<!-- Optional FlexSlider Additions -->
<script src="js/admin/jquery.easing.js"></script>
<script src="js/admin/jquery.mousewheel.js"></script>
</body>
</html>