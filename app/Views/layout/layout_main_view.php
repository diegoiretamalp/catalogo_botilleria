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

    <link rel="stylesheet" href="<?= ASSETS_CSS ?>linearicons.css">
    <!-- <link rel="stylesheet" href="<?= ASSETS_CSS ?>font-awesome.min.css"> -->
    <link rel="stylesheet" href="<?= ASSETS_CSS ?>themify-icons.css">
    <link rel="stylesheet" href="<?= ASSETS_CSS ?>bootstrap.css">
    <link rel="stylesheet" href="<?= ASSETS_CSS ?>owl.carousel.css">
    <link rel="stylesheet" href="<?= ASSETS_CSS ?>nice-select.css">
    <link rel="stylesheet" href="<?= ASSETS_CSS ?>nouislider.min.css">
    <link rel="stylesheet" href="<?= ASSETS_CSS ?>ion.rangeSlider.css">
    <link rel="stylesheet" href="<?= ASSETS_CSS ?>ion.rangeSlider.skinFlat.css">
    <link rel="stylesheet" href="<?= ASSETS_CSS ?>magnific-popup.css">
    <link rel="stylesheet" href="<?= ASSETS_CSS ?>main.css">
    <link rel="stylesheet" href="<?= ASSETS_CSS ?>datatables.min.css">
    <link rel="stylesheet" href="<?= ASSETS_PLUGINS ?>fontawesome-free/css/all.min.css">

    <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css"> -->
</head>

<body style="
background: radial-gradient(circle, transparent 20%, #ffffff 20%, #ffffff 80%, transparent 80%, transparent) 0% 0% / 20px 20px, radial-gradient(circle, transparent 20%, #ffffff 20%, #ffffff 80%, transparent 80%, transparent) 10px 10px / 20px 20px, linear-gradient(#ffba00 1px, transparent 1px) 0px -0.5px / 10px 10px, linear-gradient(90deg, #ffba00 1px, #ffffff 1px) -0.5px 0px / 10px 10px #ffffff;
background-size: 10px 10px, 10px 10px, 5px 5px, 5px 5px;
background-color: #ffffff;
">
    <?php
    echo  $this->include('layout/topnav_view');

    if (isset($main_view)) {
        echo  $this->include($main_view);
    }
    echo  $this->include('layout/footer_view');
    ?>


    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <!-- <script src="<?= ASSETS_JS ?>jquery-3.5.1.min.js"></script> -->
    <script src="<?= ASSETS_JS ?>jquery.ajaxchimp.min.js"></script>
    <script src="<?= ASSETS_JS ?>jquery-ui.min.js"> </script>
    <script src="<?= ASSETS_JS ?>datatables.min.js"></script>
    <!-- <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="<?= ASSETS_JS ?>vendor/bootstrap.min.js"></script>
    <script src="<?= ASSETS_JS ?>jquery.nice-select.min.js"></script>
    <script src="<?= ASSETS_JS ?>jquery.sticky.js"></script>
    <script src="<?= ASSETS_JS ?>nouislider.min.js"></script>
    <script src="<?= ASSETS_JS ?>jquery.magnific-popup.min.js"></script>
    <script src="<?= ASSETS_JS ?>owl.carousel.min.js"></script>
    <!--gmaps Js-->
    <?php
    if (isset($js_content)) {
        foreach ($js_content as $js) {
            echo  $this->include($js);
        }
    }
    ?>

    <script>
        $(document).ready(function() {
            // let table = new DataTable('#myTable');
            $('#table-productos').DataTable({
                scrollCollapse: true,
                autoWidth: true,
                responsive: true,
                searching: true,
                bPaginate: true,
                bInfo: true,
                columnDefs: [{
                    targets: "datatable-nosort",
                    orderable: false,
                }],
                order: [
                    [0, 'desc']
                ],
                pageLength: 10, // Establece el número de registros por página
                lengthChange: false,
                "language": {
                    "info": "",
                    search: "Buscar",
                    searchPlaceholder: "Ingrese una o más letras",
                    paginate: {
                        next: '<i class="fa fa-chevron-right"></i>',
                        previous: '<i class="fa fa-chevron-left"></i>'
                    },
                    "sZeroRecords": "No existen registros a mostrar",
                    "sInfoEmpty": "Mostrando 0 al 0 de 0 registros",
                    "sInfoFiltered": "(filtrado de _MAX_ registros totales)",
                    "sLengthMenu": "Mostrar _MENU_ Registros",
                },
            });
        });
    </script>

    <script src="<?= ASSETS_JS ?>gmaps.min.js"></script>
    <script src="<?= ASSETS_JS ?>main.js"></script>
</body>

</html>