<script>
    // Variables globales
    let page = 1;
    let nextPage = 1;
    let perPage = 12;
    let texto = '';
    let count = 1;
    let preLoadBool = false;
    let loadedResults = [];
    let data_p = [];
    let url_categoria = '<?= !empty($url_categoria) ? $url_categoria : '' ?>'
    // Función principal que se ejecuta al cargar el documento
    $(document).ready(function() {
        // Variables para la paginación
        $('#perPage').change(function() {
            perPage = $(this).val();
            paginar(1, perPage);
        });
        paginar(1, 9);
        createPagination(1, 1);
    });

    function paginar(page, perPage) {
        let url = '<?= base_url('productos/paginar-procate/') ?>' + url_categoria; // Reemplaza con tu URL
        let data = {
            page: page,
            perPage: perPage,
        };
        GetDataAjax(url, 'post', data)
            .then(function(data) {
                data_p = data.data;
                console.log('data_p');
                console.log(data_p);
                console.log('data_p');
                let prod;
                let div = $('#list-products');
                div.empty(); // Limpiar contenido existente
                data.data.data.forEach(element => {
                    prod = createProduct(element);
                    div.append(prod); // Corregir aquí
                });
                createPagination(page, data_p.total_paginas); // Llamar a createPagination después de recibir los datos
            })
            .catch(function(error) {
                console.log(error);
            })
            .always(function() {
                $('#preload-spinner').css('display', 'none');
            });
    }

    function createProduct(data) {
        let img = '<?= ASSETS_IMG ?>' + data.imagen;
        console.log(img);
        console.log(data.imagen);
        if (data.imagen != undefined) {
            img = `<img class="img-fluid" src="${img}" alt="">`;
        } else {
            img = '<?= ASSETS_IMG ?>no-product.png';
            img = `<img class="img-fluid" src="${img}" alt="">`;
            // img = '<i class="fas fa-box-open" style="font-size:22px"></i>'
        }
        let html = `
                    <div class="col-lg-4 col-md-6">
                        <div class="single-product card text-center">
                            ${img}
                            <div class="product-details text-center">
                                <h6>${data.nombre}</h6>
                                <div class="price">
                                    <h6>$${data.precio}</h6>
                                    <!-- <h6 class="l-through">$210.00</h6> -->
                                </div>
                                <div class="prd-bottom text-center mb-2">
                                    <a href="#" class="genric-btn success small">Agregar a Carrito</a>
                                </div>
                            </div>
                        </div>
                    </div>
        
        `;
        return html;
    }

    function createPagination(currentPage, totalPages) {
        var paginationContainer = $('.pagination');
        paginationContainer.empty(); // Limpiar contenido existente

        // Agregar flecha de izquierda
        paginationContainer.append('<a href="#" class="prev-arrow"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>');

        // Definir el rango de páginas a mostrar
        var startPage = Math.max(1, currentPage - 2);
        var endPage = Math.min(totalPages, startPage + 9);

        // Agregar enlaces para cada página
        for (var i = startPage; i <= endPage; i++) {
            if (i === currentPage) {
                paginationContainer.append('<a href="#" class="active">' + i + '</a>');
            } else {
                paginationContainer.append('<a href="#">' + i + '</a>');
            }
        }

        // Agregar punto suspensivo si hay más páginas antes del final
        if (endPage < totalPages - 1) {
            paginationContainer.append('<span class="dot-dot">...</span>');
        }

        // Agregar enlaces para las últimas dos páginas
        for (var i = Math.max(totalPages - 1, 1); i <= totalPages; i++) {
            paginationContainer.append('<a href="#">' + i + '</a>');
        }

        // Agregar flecha de derecha
        paginationContainer.append('<a href="#" class="next-arrow"><i class="fas fa-arrow-right" style="color: black;"></i></a>');
    }


    // Llamada inicial para crear la paginación con los datos
    createPagination(1, data_p.total_paginas);

    // Evento de clic para cambiar la página (simula la respuesta AJAX)
    $('.pagination').on('click', 'a', function(e) {
        e.preventDefault();

        // Aquí simularías una llamada AJAX para obtener los datos de la nueva página
        // y luego llamarías a createPagination con los nuevos datos
        var clickedPage = parseInt($(this).text(), 10);
        console.log(clickedPage);
        if (!isNaN(clickedPage)) {
            page = clickedPage;
        }

        paginar(page, perPage);
        createPagination(page, data_p.total_paginas);
    });
</script>