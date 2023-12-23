<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/fav.png">
    <!-- Author Meta -->
    <meta name="author" content="CodePixar">
    <!-- Meta Description -->
    <meta name="description" content="">
    <!-- Meta Keyword -->
    <meta name="keywords" content="">
    <!-- meta character set -->
    <meta charset="UTF-8">
    <!-- Site Title -->
    <title>Catalogo Botilleria - <?= isset($title) ? $title : '' ?></title>
    <!--
		CSS
		============================================= -->
    <link rel="stylesheet" href="<?= ASSETS_CSS ?>linearicons.css">
    <link rel="stylesheet" href="<?= ASSETS_CSS ?>font-awesome.min.css">
    <link rel="stylesheet" href="<?= ASSETS_CSS ?>themify-icons.css">
    <link rel="stylesheet" href="<?= ASSETS_CSS ?>bootstrap.css">
    <link rel="stylesheet" href="<?= ASSETS_CSS ?>owl.carousel.css">
    <link rel="stylesheet" href="<?= ASSETS_CSS ?>nice-select.css">
    <link rel="stylesheet" href="<?= ASSETS_CSS ?>nouislider.min.css">
    <link rel="stylesheet" href="<?= ASSETS_CSS ?>ion.rangeSlider.css">
    <link rel="stylesheet" href="<?= ASSETS_CSS ?>ion.rangeSlider.skinFlat.css">
    <link rel="stylesheet" href="<?= ASSETS_CSS ?>magnific-popup.css">
    <link rel="stylesheet" href="<?= ASSETS_CSS ?>main.css">
</head>

<body>
    <?php
    echo  $this->include('layout/topnav_view');

    if (isset($main_view)) {
        echo  $this->include($main_view);
    }
    echo  $this->include('layout/footer_view');
    ?>


    <script src="<?= ASSETS_JS ?>vendor/jquery-2.2.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="<?= ASSETS_JS ?>vendor/bootstrap.min.js"></script>
    <script src="<?= ASSETS_JS ?>jquery.ajaxchimp.min.js"></script>
    <script src="<?= ASSETS_JS ?>jquery.nice-select.min.js"></script>
    <script src="<?= ASSETS_JS ?>jquery.sticky.js"></script>
    <script src="<?= ASSETS_JS ?>nouislider.min.js"></script>
    <script src="<?= ASSETS_JS ?>jquery.magnific-popup.min.js"></script>
    <script src="<?= ASSETS_JS ?>owl.carousel.min.js"></script>
    <!--gmaps Js-->
    <script src="<?= ASSETS_JS ?>gmaps.min.js"></script>
    <script src="<?= ASSETS_JS ?>main.js"></script>
</body>

</html>