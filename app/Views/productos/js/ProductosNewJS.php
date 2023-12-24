<script>
    $(document).ready(function() {
        $('#nombre').keyup(function() {
            ValidaCampos($('#nombre').val(), 'nombre', 'texto_min');
        });
        $('#descripcion').keyup(function() {
            ValidaCampos($('#descripcion').val(), 'descripcion', 'texto_min_descripcion', false);
        });
        $('#precio').keyup(function() {
            ValidaCampos($('#precio').val(), 'precio', 'numero');
        });
        $('#stock').keyup(function() {
            ValidaCampos($('#stock').val(), 'stock', 'numero', false);
        });
        $('#codigo').keyup(function() {
            ValidaCampos($('#codigo').val(), 'codigo', 'texto_min');
        });
        $('#select_categoria').change(function() {
            ValidaCampos($('#select_categoria').val(), 'categoria_id', 'select');
        });
        $('#btn_submit').click(function() {
            console.log($('#nombre').val());
            let nombre_valida = ValidaCampos($('#nombre').val(), 'nombre', 'texto_min');
            let descripcion_valida = ValidaCampos($('#descripcion').val(), 'descripcion', 'texto_min_descripcion', false);
            let precio_valida = ValidaCampos($('#precio').val(), 'precio', 'numero');
            let stock_valida = ValidaCampos($('#stock').val(), 'stock', 'numero', false);
            let codigo_valida = ValidaCampos($('#codigo').val(), 'codigo', 'texto_min');
            let categoria_id_valida = ValidaCampos($('#select_categoria').val(), 'categoria_id', 'select');
            if (nombre_valida == 1 && descripcion_valida == 1 && precio_valida == 1 && stock_valida == 1 && codigo_valida == 1 &&
                categoria_id_valida == 1) {
                $('#formulario').submit();
            } else {
                alert('error');
            }
        });
    });
</script>