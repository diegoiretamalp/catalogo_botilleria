<script>
    // Variables globales
    let page = 1;
    let nextPage = 1;
    let perPage = 10;
    let texto = '';
    let count = 1;
    let preLoadBool = false;
    let loadedResults = [];
    let data_p = [];
    // Función principal que se ejecuta al cargar el documento
    $(document).ready(function() {
        // Variables para la paginación
        paginar(1, 10);
        createPagination(1, 1);
    });

    function paginar(page, perPage) {
        let url = '<?= base_url('productos/paginar-feed') ?>'; // Reemplaza con tu URL
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
        let html = `
                    <div class="col-lg-4 col-md-6">
                        <div class="single-product card">
                            <img class="img-fluid" src="${img}" alt="">
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

        // Agregar enlaces para cada página
        for (var i = 1; i <= totalPages; i++) {
            if (i === currentPage) {
                paginationContainer.append('<a href="#" class="active">' + i + '</a>');
            } else {
                paginationContainer.append('<a href="#">' + i + '</a>');
            }
        }

        // Agregar punto suspensivo si hay más páginas
        // if (totalPages > 6) {
        //     paginationContainer.append('<a href="#" class="dot-dot"><i class="fas fa-ellipsis-h" aria-hidden="true"></i></a>');
        // }

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
        if(!isNaN(clickedPage)){
            page = clickedPage;
        }
        
        paginar(page);
        createPagination(page, data_p.total_paginas);
    });
</script>