<script>
    function ValidaCampos(texto, id, tipo = 'texto', obligatorio = true, msg = "Campo Obligatorio") {
        const $campo = $('#' + id);

        const limpiarCampo = (color, mensaje) => {
            $campo.css('border-color', color);
            $("#invalid_" + id).text(mensaje);
            if (color == 'green') {
                return 1;
            } else {
                return 0;
            }
        };

        const campoValido = () => {
            return limpiarCampo('green', '');
        };

        const textoValido = (minLength, mensaje) => {
            texto = texto.trim();
            return texto.length >= minLength ? campoValido() : limpiarCampo('red', mensaje);
        };

        const validarNumero = () => {
            texto = formatNumber(texto);
            return texto !== '' ? campoValido() : limpiarCampo('red', msg);
        };

        const validarCelular = () => {
            $("#" + id).val(soloNumeros(texto));
            let cel = formatCelular(texto);
            return cel !== false ? campoValido() : limpiarCampo('red', 'N° Incorrecto. Ej: +569XXXXXXXX');
        };

        // Agrega más funciones de validación según sea necesario

        if ($campo.length) {
            if (texto !== '') {
                console.log('-------------------');
                console.log(texto);
                switch (tipo) {
                    case 'text_min2':
                    case 'texto_min':
                        return textoValido(2, 'El largo Mínimo de 2 Caracteres');
                        break;

                    case 'texto_min_descripcion':
                        return textoValido(3, 'El largo Mínimo de 3 Caracteres');
                        break;

                    case 'moneda':
                        return textoValido(2, 'El valor mínimo debe ser 0');
                        break;

                    case 'numero':
                        let valida = validarNumero()
                        if (valida == 0) {
                            $campo.val('');
                        }
                        return valida;
                        break;

                    case 'celular':
                        return validarCelular();
                        break;

                    case 'select':
                        if (texto > 0) {
                            return campoValido();
                        } else {
                            return limpiarCampo('red', msg);
                        }
                        break;
                    case 'select2text':
                        if (texto !== '') {
                            return campoValido();
                        } else {
                            return limpiarCampo('red', msg);
                        }
                        break;
                    case 'checkbox':
                        let respuesta = cuentaCheckbox(1, msg);
                        return respuesta;
                        break;
                    case 'email':
                        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                        return emailRegex.test(texto) ? campoValido() : limpiarCampo('red', 'Correo electrónico inválido');
                        break;

                    case 'password':
                        // Validar la fortaleza de la contraseña según tus criterios
                        const strongPasswordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/;
                        return strongPasswordRegex.test(texto) ? campoValido() : limpiarCampo('red', 'Contraseña débil');
                        break;

                    case 'fecha':
                        // Utiliza una expresión regular para validar el formato de fecha (ejemplo: yyyy/mm/dd)
                        const fechaRegex = /^\d{4}-\d{2}-\d{2}$/;
                        // const fechaRegex = /^\d{4}\/\d{2}\/\d{2}$/;
                        console.log('FECHA');
                        console.log(texto);
                        console.log('FECHA');
                        if (fechaRegex.test(texto)) {
                            return campoValido();
                        } else {
                            return limpiarCampo('red', 'Formato de fecha inválido (yyyy/mm/dd)');
                        }
                        break;


                    case 'url':
                        // Puedes utilizar una expresión regular para validar el formato de URL
                        const urlRegex = /^(http|https):\/\/[\w\-]+(\.[\w\-]+)+([\w\-\.,@?^=%&:/~\+#]*[\w\-\@?^=%&/~\+#])?$/;
                        return urlRegex.test(texto) ? campoValido() : limpiarCampo('red', 'URL inválida');
                        break;

                    case 'hora':
                        // Puedes utilizar una expresión regular para validar el formato de hora (ejemplo: hh:mm)
                        const horaRegex = /^(0[0-9]|1[0-9]|2[0-3]):[0-5][0-9]$/;
                        return horaRegex.test(texto) ? campoValido() : limpiarCampo('red', 'Formato de hora inválido (hh:mm)');
                        break;

                    case 'color':
                        // Puedes utilizar una expresión regular para validar el formato de color hexadecimal
                        const colorRegex = /^#([A-Fa-f0-9]{6}|[A-Fa-f0-9]{3})$/;
                        return colorRegex.test(texto) ? campoValido() : limpiarCampo('red', 'Formato de color inválido');
                        break;

                    default:
                        return textoValido(1, msg);
                }
            } else {
                return (obligatorio == false) ? campoValido() : limpiarCampo('red', msg);
            }
        } else {
            toastr["error"](`No existe ID de Campo ${id}`, "Error de Validación");
            return 0;
        }
    }

    function formatNumber(costo) {
        costo = costo.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ".")
        costo = "" + costo;
        return costo;
    }

    function GetDataAjax(url, method, data) {
        return $.ajax({
                url: url,
                method: method,
                // headers: {
                //     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                // },
                data: {
                    data: data
                },
                dataType: 'json',
            })
            .then(function(resp) {
                return resp;
            })
            .fail(function(jqXHR, textStatus, errorThrown) {
                console.error('Error en la petición AJAX:', textStatus, errorThrown);
                throw new Error('Error en la petición AJAX');
            });
    }
</script>