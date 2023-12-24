<div class="container" style="padding-top: 11%; min-height: 100vh;">
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title text-center">
                        <h3>Formulario de Nuevo Producto</h3>
                    </div>
                </div>
                <div class="card-body">
                    <form action="<?= base_url('admin/productos/nuevo') ?>" id="formulario" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="form-group">
                                    <label for="nombre">Nombre</label>
                                    <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Ingrese nombre...">
                                    <span id="invalid_nombre" class="text-danger"></span>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="form-group">
                                    <label for="descripcion">Descripcion</label>
                                    <input type="text" name="descripcion" id="descripcion" class="form-control" placeholder="Ingrese Descripcion...">
                                    <span id="invalid_descripcion" class="text-danger"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="form-group">
                                    <label for="precio">Precio</label>
                                    <input type="text" name="precio" id="precio" class="form-control" placeholder="Ingrese precio...">
                                    <span id="invalid_precio" class="text-danger"></span>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="form-group">
                                    <label for="stock">Stock</label>
                                    <input type="text" name="stock" id="stock" class="form-control" placeholder="Ingrese stock...">
                                    <span id="invalid_stock" class="text-danger"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="form-group">
                                    <label for="codigo">Codigo</label>
                                    <input type="text" name="codigo" id="codigo" class="form-control" placeholder="Ingrese codigo...">
                                    <span id="invalid_codigo" class="text-danger"></span>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="form-group">
                                    <label for="stock">Categoria</label>
                                    <div class="form-select" style="border: 1px solid #ced4da;" id="categoria_id">
                                        <select style="border: 3px;" name="categoria_id" id="select_categoria">
                                            <option value="0">Seleccionar</option>
                                            <?php if (!empty($categorias)) : ?>
                                                <?php foreach ($categorias as $categoria) : ?>
                                                    <option value="<?= $categoria->id ?>"><?= !empty($categoria->nombre) ? $categoria->nombre : 'Sin Información' ?></option>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        </select>
                                    </div>
                                    <span id="invalid_categoria_id" class="text-danger"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row d-flex justify-content-center">
                            <div class="col-md-4 text-center">
                                <label for="image">Imagen</label>
                                <div class="form-group">
                                    <!-- Muestra la imagen actual si existe -->
                                    <label for="image" id="upload-button">
                                        <span class="genric-btn success medium">
                                            <i class="fas fa-upload" style="font-size: 18px"></i> Subir Archivo
                                        </span>
                                    </label>
                                    <input type="file" style="display: none" name="image" id="image" accept="image/*">
                                </div>
                            </div>
                        </div>

                        <div class="row d-flex justify-content-center">
                            <div class="col-md-4 text-center">
                                <label for="image_prev">Previsualización</label>
                                <div class="form-group">
                                    <img class="bg-secondary bg-gradient" style="--bs-bg-opacity: .5;" width="260" height="250" id="image_prev" alt="">
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-xl-12 text-right">
                                <a href="<?= base_url('admin/productos/listado') ?>" class="genric-btn info medium"><i class="fa fa-arrow-circle-left" style="font-size: 15px;" aria-hidden="true"></i> Volver a Listado</a>
                                <button id="btn_submit" class="genric-btn success medium" type="button"><i class="fa fa-save" style="font-size: 15px;"></i> Guardar Producto</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>