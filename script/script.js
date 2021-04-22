$(function() {

    $("#irarriba a").on("click", function(e) {
        e.preventDefault();
        $("html, body").animate({
            scrollTop: 0
        }, 1000);
    });

    $("#myemailform").validate({
        rules: {
            nombre: {
                required: true,
            },
            correo: {
                required: true,

            },
            // sexo: {
            //     required: true,

            // },
            // id_area: {
            //     required: true,

            // },
            // boletin: {
            //     required: true,

            // },
            descripcion: {
                required: true,

            }
        },
        messages: {
            nombre: {
                required: "Campo nombre requerido *"
            },
            correo: {
                required: "Campo correo requerido *"
            },
            message: {
                required: "Campo nombre requerido *"
            },
            // sexo: {
            //     required: "Campo nombre requerido *"
            // },
            // id_area: {
            //     required: "Campo nombre requerido *"
            // },
            rol_id_s: {
                required: "Campo nombre requerido *"
            },
            descripcion: {
                required: "Campo descripción requerido *"
            },
        }
    });
});

function funciones_clic(dato) {
    editarDato(dato);
    cosultarRoles(dato);
}

function editarDato(dato) {
    $(document).ready(function() {
        $.ajax({
            beforeSend: function() {
                $('#precarga').css('display', 'block');
                $('#precarga').html('<img src="../img/ajax-loaders.gif"/>');
            },
            type: "GET",
            url: 'db/consultarempleado.php?id_empleado=' + dato,
            //data: data,
            success: function(msj) {
                let data = JSON.parse(msj);
                console.log(data)
                    //msj.foreach(nombre => console.log(nombre))
                $('#precarga').css('display', 'none');
                //$('#respuesta').css('display','block');
                $('#id_empleado').val(data.id_empleado);
                $('#id_empleado_edit').val(data.id_empleado);
                $('#nombres').val(data.nombre);
                $('#correos').val(data.correo);
                // $('#sexo').val(data.sexo);
                $("input[name=sexo]").each(function(index) {
                    if ($(this).val() == data.sexo) {
                        //console.log('yes')
                        $('input[name=sexo][value=' + $(this).val() + ']').prop("checked", true);
                    }
                    //console.log($(this).val());
                });


                $("#areas option").each(function() {
                    //console.log($(this).val());
                    if ($(this).val() == data.id_area) {
                        //console.log('yes')
                        $('#areas option[value=' + $(this).val() + ']').attr('selected', true)
                    }
                });

                $('#boletin').val(data.boletin);
                $("input[name=boletin]").each(function(index) {
                    if ($(this).val() == data.boletin) {
                        //console.log('yes')
                        $('input[name=boletin][value=' + $(this).val() + ']').prop("checked", true);
                    }
                    //console.log($(this).val());
                });


                $('#descripcions').val(data.nombre);
                //$("#vereditar-sedes").on("submit", actualizarsede);
            },
            error: function(jqXHR, estado, error) {
                alert("Problemas En El Servidor");
            }
        });
    });
}


function cosultarRoles(dato) {
    $(document).ready(function() {
        $.ajax({
            beforeSend: function() {
                $('#precarga').css('display', 'block');
                $('#precarga').html('<img src="../img/ajax-loaders.gif"/>');
            },
            type: "GET",
            url: 'db/consultarrol.php?id_empleado=' + dato,
            //data: data,
            success: function(msj) {
                let data = JSON.parse(msj);
                console.log(data);
                for (let i = 0; i < data.length; i++) {
                    $("input[name='rol_id[]']").each(function(index) {
                        if ($(this).val() == (data[i].rol_id)) {
                            //console.log('yes')
                            $('input[name="rol_id[]"][value=' + $(this).val() + ']').prop("checked", true);
                        }
                        //console.log($(this).val());
                    });
                }
            },
            error: function(jqXHR, estado, error) {
                alert("Problemas En El Servidor");
            }
        });
    });
}

function eliminarDato(dato) {
    $.ajax({
        beforeSend: function() {
            $('#precarga').css('display', 'block');
            $('#precarga').html('<img src="../img/ajax-loaders.gif"/>');
        },
        type: "GET",
        url: 'db/eliminarempleado.php?id_empleado=' + dato,
        //data: data,
        success: function(msj) {
            let data = JSON.parse(msj);
            //console.log(data.nombre)
            //msj.foreach(nombre => console.log(nombre))
            $('#precarga').css('display', 'none');
            //$('#respuesta').css('display','block');
            //$("#vereditar-sedes").on("submit", actualizarsede);
        },
        error: function(jqXHR, estado, error) {
            alert("Problemas En El Servidor");
        }
    });
}