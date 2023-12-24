<div class="container-fluid" style="padding-top: 10%;">
    <div class="row">
        <div class="col-xl-12">
            <div class="card card-body table-responsive">
                <div class="prd-bottom text-right pb-2">
                    <!-- <button type="submit" value="submit" class="primary-btn">login</button> -->

                    <a href="<?= base_url('admin/productos/nuevo') ?>" class="genric-btn primary-btn small"><i class="fa fa-plus-circle" style="font-size: 15px;" aria-hidden="true"></i> Nuevo Producto</a>
                </div>
                <table class="table" id="table-productos">
                    <thead>
                        <th>N°</th>
                        <th>IMAGEN</th>
                        <th>NOMBRE</th>
                        <th>CATEGORIA</th>
                        <th>PRECIO</th>
                        <th>STOCK</th>
                        <th class="text-center">ACCIONES</th>
                    </thead>
                    <tbody>
                        <?php if (!empty($productos)) : ?>
                            <?php foreach ($productos as $producto) : ?>
                                <tr>
                                    <td><?= !empty($producto->id) ? $producto->id : 'Sin Información' ?></td>
                                    <td><?= !empty($producto->imagen) ? $producto->imagen : 'Sin Información' ?></td>
                                    <td><?= !empty($producto->nombre) ? $producto->nombre : 'Sin Información' ?></td>
                                    <td><?= !empty($producto->nombre_categoria) ? $producto->nombre_categoria : 'Sin Información' ?></td>
                                    <td><?= !empty($producto->precio) ? $producto->precio : 'Sin Información' ?></td>
                                    <td><?= !empty($producto->stock) ? $producto->stock : 'Sin Información' ?></td>
                                    <td>
                                        <div class="prd-bottom text-center">
                                            <a href="<?= base_url('admin/productos/editar/' . $producto->id) ?>" class="genric-btn success small">Editar</a>
                                            <a href="#" class="genric-btn danger small">Eliminar</a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>