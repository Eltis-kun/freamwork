<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
    <meta content="charset=utf-8">
    <title>My Freamwork</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

    <!-- Syntax Highlighter -->
    <link href="/css/shCore.css" rel="stylesheet" type="text/css" />
    <link href="/css/shThemeDefault.css" rel="stylesheet" type="text/css" />
    <!-- Demo CSS -->
    <link rel="stylesheet" href="/css/demo.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="/css/flexslider.css" type="text/css" media="screen" />

    <!-- Modernizr -->
    <script src="/js/modernizr.js"></script>

</head>
<body class="loading">

<div id="container" class="cf">
<?php if (isset($data) & !empty($data)) {  ?>
    <div id="main" role="main">
        <section class="slider">
            <div class="flexslider">

                <ul class="slides">
                    <?php foreach ($data as $value) {?>
                    <?php echo '<li><img src="/'.$value['img'].'" /></li>'; ?>
                    <?php  } ?>
                </ul>


            </div>
        </section>
    </div>
    <?php } ?>
</div>

<!-- jQuery -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="js/libs/jquery-1.7.min.js">\x3C/script>')</script>

<!-- FlexSlider -->
<script defer src="/js/jquery.flexslider.js"></script>

<script type="text/javascript">
    $(function(){
        SyntaxHighlighter.all();
    });
    $(window).load(function(){
        $('.flexslider').flexslider({
            animation: "slide",
            start: function(slider){
                $('body').removeClass('loading');
            }
        });
    });
</script>


<!-- Syntax Highlighter -->
<script type="text/javascript" src="/js/shCore.js"></script>
<script type="text/javascript" src="/js/shBrushXml.js"></script>
<script type="text/javascript" src="/js/shBrushJScript.js"></script>

<!-- Optional FlexSlider Additions -->
<script src="/js/jquery.easing.js"></script>
<script src="/js/jquery.mousewheel.js"></script>
<script defer src="/js/demo.js"></script>

</body>
</html>