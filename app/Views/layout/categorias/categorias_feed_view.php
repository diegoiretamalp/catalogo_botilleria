<div class="container" style="padding-top: 10%;">
    <div class="row">
        <!-- <div class="col-xl-3 col-lg-4 col-md-5">
        </div> -->
        <div class="col-xl-12 col-lg-8 col-md-7">
            <!-- Start Filter Bar -->
            <div class="filter-bar d-flex flex-wrap align-items-center">
                <div class="sorting mr-auto">
                    <select>
                        <option value="1">Mostrar 10</option>
                        <option value="1">Mostrar 25</option>
                        <option value="1">Mostrar 50</option>
                    </select>
                </div>
                <div class="pagination">
                    <a href="#" class="prev-arrow"><i class="fa fa-long-arrow-left" aria-hidden="true"></i></a>
                    <a href="#" class="active">1</a>
                    <a href="#">2</a>
                    <a href="#">3</a>
                    <a href="#" class="dot-dot"><i class="fa fa-ellipsis-h" aria-hidden="true"></i></a>
                    <a href="#">6</a>
                    <a href="#" class="next-arrow"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                </div>
            </div>
            <!-- End Filter Bar -->
            <!-- Start Best Seller -->
            <section class="lattest-product-area pb-40 category-list">
                <div class="row">
                    <!-- single product -->
                    <?php if (!empty($categorias)) : ?>
                        <?php foreach ($categorias as $categoria) :; ?>
                            <div class="col-lg-4 col-md-6">
                                <div class="single-product">
                                    <img class="img-fluid" src="<?= ASSETS_IMG ?>product/p1.jpg" alt="">
                                    <div class="product-details text-center">
                                        <h6><?= $categoria->nombre ?></h6>
                                        <div class="price">
                                            <h6 class="pl-3">35 Productos</h6>
                                        </div>
                                        <div class="prd-bottom">
                                            <a href="#" class="genric-btn success small">Ver Productos</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </section>
            <!-- End Best Seller -->
        </div>
    </div>
</div>