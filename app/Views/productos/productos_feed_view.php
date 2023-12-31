<div class="container" style="padding-top: 10%;">
    <div class="row">
        <div class="col-xl-3 col-lg-4 col-md-5">
            <div class="sidebar-categories">
                <div class="head">Categorias</div>
                <ul class="main-categories">
                    <?php if (!empty($categorias)) : ?>
                        <li class="main-nav-list"><a href="<?= base_url('productos/feed') ?>">Todos</a></li>
                        <?php foreach ($categorias as $categoria) : ?>
                            <li class="main-nav-list"><a href="<?= base_url('productos/') . $categoria->url_categoria ?>/"><?= $categoria->nombre ?><span class="number">(13)</span></a></li>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </ul>
            </div>
            <!-- <div class="sidebar-filter mt-50">
                <div class="top-filter-head">Product Filters</div>
                <div class="common-filter">
                    <div class="head">Brands</div>
                    <form action="#">
                        <ul>
                            <li class="filter-list"><input class="pixel-radio" type="radio" id="apple" name="brand"><label for="apple">Apple<span>(29)</span></label></li>
                            <li class="filter-list"><input class="pixel-radio" type="radio" id="asus" name="brand"><label for="asus">Asus<span>(29)</span></label></li>
                            <li class="filter-list"><input class="pixel-radio" type="radio" id="gionee" name="brand"><label for="gionee">Gionee<span>(19)</span></label></li>
                            <li class="filter-list"><input class="pixel-radio" type="radio" id="micromax" name="brand"><label for="micromax">Micromax<span>(19)</span></label></li>
                            <li class="filter-list"><input class="pixel-radio" type="radio" id="samsung" name="brand"><label for="samsung">Samsung<span>(19)</span></label></li>
                        </ul>
                    </form>
                </div>

            </div> -->
        </div>
        <div class="col-xl-9 col-lg-8 col-md-7">
            <!-- Start Filter Bar -->
            <div class="filter-bar d-flex flex-wrap align-items-center">
                <div class="sorting mr-auto">
                    <select id="perPage">
                        <option value="9">Mostrar 9</option>
                        <option value="18">Mostrar 18</option>
                        <option value="30">Mostrar 30</option>
                        <option value="50">Mostrar 50</option>
                    </select>
                </div>
                <div class="pagination">
                    <!-- <a href="#" class="prev-arrow"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
                    <a href="#" class="active">1</a>
                    <a href="#">2</a>
                    <a href="#">3</a>
                    <a href="#" class="dot-dot"><i class="fas fa-ellipsis-h" aria-hidden="true"></i></a>
                    <a href="#">6</a>
                    <a href="#" class="next-arrow"><i class="fas fa-arrow-right" style="color: black;"></i></a> -->
                </div>
            </div>
            <!-- End Filter Bar -->
            <!-- Start Best Seller -->
            <section class="lattest-product-area pb-40 category-list">
                <div class="row" id="list-products">
                    
                    <?php /* if (!empty($productos)) : ?>
                        <?php foreach ($productos as $producto) :; ?>
                            <div class="col-lg-4 col-md-6">
                                <div class="single-product card">
                                    <img class="img-fluid" src="<?= ASSETS_IMG ?>product/p1.jpg" alt="">
                                    <div class="product-details text-center">
                                        <h6><?= $producto->nombre ?></h6>
                                        <div class="price">
                                            <h6>$<?= $producto->precio ?></h6>
                                            <!-- <h6 class="l-through">$210.00</h6> -->
                                        </div>
                                        <div class="prd-bottom text-center mb-2">
                                            <a href="#" class="genric-btn success small">Agregar a Carrito</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; */ ?>
                </div>
            </section>
            <!-- End Best Seller -->
        </div>
    </div>
</div>