<?php
header("Content-Type: text/html;charset=utf-8");
include_once('db/database_utilities.php');

$area = get_area();
$rol = get_rol_empleado();
$empleado = get_empleado();
$id = get_id();
$empleado_one = get_empleado_one();


?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link rel="stylesheet" href="css/style.css">
    <!-- Bootstrap CSS -->
    <!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"> </script> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
        integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">


    <title>Nexura</title>
</head>

<body>

    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-md-10 p-4">
                <div class="pt-4 pb-4">
                    <h1 class="h2">Crear Empleado</h1>
                </div>
                <div class="alert alert-info"> los campos con (*) son obligatorios</div>
                <form action="db/database_utilities.php" name="myemailform" id="myemailform" method="POST"
                    accept-charset="UTF-8">
                    <div class="form-group row">
                        <div class="col-8">
                            <?php while ($id_e = $id->fetch_assoc()) { ?>
                            <input type="hidden" class="form-control" id="id_empleado" name="id_empleado"
                                aria-describedby="emailHelp" value="
                                <?php if(isset($_POST['id_empleado']) && $_POST['id_empleado']!=""){
                                    echo("1");
                                 }else{

                                echo utf8_encode(utf8_decode($id_e['id_empleado'])+ 1);
                                }  ?>">
                            <?php } ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-3">
                            <label for="nombre">Nombre completo *</label>
                        </div>
                        <div class="col-8">
                            <input type="text" class="form-control" id="nombre" name="nombre"
                                aria-describedby="emailHelp" placeholder="Nombre completo del empleado" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-3">
                            <label for="correo">Correo Electronico *</label>
                        </div>
                        <div class="col-8">
                            <input type="email" class="form-control" id="correo" name="correo"
                                aria-describedby="emailHelp" placeholder="Correo Electronico" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-3">
                            <label for="sexo">Sexo *</label>
                        </div>
                        <div class="col-8">
                            <div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="sexo" id="inlineRadio1"
                                        value="M">
                                    <label class="form-check-label" for="inlineRadio1" required>Masculino</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="sexo" id="inlineRadio2"
                                        value="F">
                                    <label class="form-check-label" for="inlineRadio2">Femenino</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-3">
                            <label class="" for="area">Área *</label>
                        </div>
                        <div class="col-8">
                            <select class="custom-select " id="id_area" name="id_area">
                                <option selected>Selecione</option>
                                <?php while ($name_area = $area->fetch_assoc()) { ?>
                                <option value="<?php echo utf8_decode($name_area['id_area']);  ?>">
                                    <?php echo utf8_encode(utf8_decode($name_area['nombre'])); ?>
                                </option>

                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-3">
                            <label for="descripcion">Descripción *</label>
                        </div>
                        <div class="col-8">
                            <textarea type="text" class="form-control" id="descripcion" name="descripcion"
                                aria-describedby="emailHelp" placeholder="Descripcíon de la experiencia del empleado"
                                required> </textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-3">
                            <label for=""></label>
                        </div>
                        <div class="col-8">
                            <div class="d-block">
                                <div class="form-check form-check-inline col-12 mt-0">
                                    <input class="form-check-input" type="checkbox" name="boletin" id="inlineRadio1"
                                        value="1">
                                    <label class="form-check-label" for="inlineRadio1" id="boletin">
                                        Deseo recibir boletín informativo

                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-3">
                            <label for="id_area">Roles *</label>
                        </div>
                        <div class="col-8">
                            <div class="d-block">
                                <?php while ($name_rol = $rol->fetch_assoc()) { ?>
                                <div class="form-check form-check-inline col-12 mt-0">

                                    <input class="form-check-input " type="checkbox" name="rol_id[]"
                                        id="inlineRadio1 rol_id"
                                        value="<?php echo utf8_decode($name_rol['id_rol']);  ?>">


                                    <label class="form-check-label"
                                        for="inlineRadio1"><?php echo utf8_encode(utf8_decode($name_rol['nombre'])); ?>
                                    </label>
                                </div>

                                <?php } ?>

                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary " id="clic">Guardar</button>
                    </div>
                </form>
            </div>

        </div>

        <div class="container">
            <div class="row justify-content-cente">
                <div class="col-md-12 p-4">
                    <div class="pt-4 pb-4 ">
                        <h1 class="h2">Lista de empleados</h1>
                    </div>
                    <div class="pt-4 pb-4 d-flex flex-row-reverse">

                        <div id="irarriba"><a href="#" class="btn btn-primary btn-lg active" id="crear-btn"
                                role="button" aria-pressed="true"><i class="fas fa-user-plus"></i> Crear</a></div>

                    </div>
                    <div>
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Nombre</th>
                                <th scope="col">Email</th>
                                <th scope="col">Sexo</th>
                                <th scope="col">Área</th>
                                <th scope="col">Boletin</th>
                                <th scope="col">Editar</th>
                                <th scope="col">Eliminar</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php while ($datos = $empleado->fetch_assoc()) { ?>
                            <tr>
                                <td><?php echo utf8_encode(utf8_decode($datos['nombre']));  ?></td>
                                <td><?php echo utf8_encode(utf8_decode($datos['correo']));  ?></td>
                                <td>
                                    <?php if( ($datos['sexo']) === "M") {
                                     echo ("Masculino");
                                }else{
                                    echo ("Fenenino");
                                }
                               ?>
                                </td>

                                <td>
                                    <?php if( ($datos['id_area']) === "1") {
                                     echo ("Administración");
                                }else if( ($datos['id_area']) === "2"){
                                    echo ("Contabilidad");
                                }else if( ($datos['id_area']) === "3"){
                                    echo ("Recursos Humanos");
                                }else if( ($datos['id_area']) === "4"){
                                    echo ("Servicios generales");
                                }else if( ($datos['id_area']) === "5"){
                                    echo ("Digital / Ingeniería");
                                }else if( ($datos['id_area']) === "6"){
                                    echo ("Arquitectura");
                                }
                               ?>

                                </td>

                                <td>
                                    <?php if( ($datos['boletin']) === "1") {
                                     echo ("Si");
                                }else{
                                    echo ("No");
                                }
                               ?>
                                </td>
                                <td>
                                    <a href="#editEmployeeModal" class="" data-toggle="modal" id="click"
                                        data-id="<?= $datos['id_empleado'] ?>"
                                        onclick="funciones_clic('<?= $datos['id_empleado'] ?>');"><i
                                            class="far fa-edit"></i> <span></span></a>

                                </td>
                                <td>
                                    <a href="#deleteEmployeeModal" data-id="<?= $datos['id_empleado'] ?>"
                                        onclick="eliminarDato('<?= $datos['id_empleado'] ?>');" class=" edit"
                                        data-toggle="modal"><i class="far fa-trash-alt" data-toggle="tooltip" title=""
                                            data-original-title="Edit"></i></a>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- Edit Modal HTML -->

        <div id="editEmployeeModal" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog"
            aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">


                    <form class="m-4" action="db/edit.php" name="myemailform" id="myemailform" method="POST"
                        accept-charset="UTF-8">
                        <div class="form-group row">
                            <div class="col-8">
                                <input type="hidden" class="form-control" id="id_empleado_edit" name="id_empleado"
                                    aria-describedby="emailHelp">
                            </div>
                        </div>


                        <div class="form-group row">
                            <div class="col-3">
                                <label for="exampleInputEmail1">Nombre completo *</label>
                                <div class="content"></div>

                            </div>
                            <div class="col-8">
                                <input type="text" class="form-control" id="nombres" name="nombre"
                                    value="<?php echo utf8_encode(utf8_decode($datos['nombre']));  ?>"
                                    aria-describedby="emailHelp" placeholder="Nombre completo del empleado" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-3">
                                <label for="exampleInputEmail1">Correo Electronico *</label>
                            </div>
                            <div class="col-8">
                                <input type="email" class="form-control" id="correos" name="correo"
                                    aria-describedby="emailHelp" placeholder="Correo Electronico" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-3">
                                <label for="sexo">Sexo *</label>
                            </div>
                            <div class="col-8">
                                <div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="sexo" id="inlineRadio1"
                                            value="M">
                                        <label class="form-check-label" for="inlineRadio1" required>Masculino</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="sexo" id="inlineRadio2"
                                            value="F">
                                        <label class="form-check-label" for="inlineRadio2">Femenino</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-3">
                                <label class="" for="area">Área</label>
                            </div>
                            <div class="col-8">
                                <select class="custom-select " id="areas" name="id_area">
                                    <option selected>Selecione</option>
                                    <option value="1">administración</option>
                                    <option value="2">Contabilidad</option>
                                    <option value="3">Recursos Humanos</option>
                                    <option value="4">Servicios generales</option>
                                    <option value="5">Digital / Ingeniería</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-3">
                                <label for="exampleInputEmail1">Descripción *</label>
                            </div>
                            <div class="col-8">
                                <textarea type="text" class="form-control" id="descripcions" name="descripcion"
                                    aria-describedby="emailHelp"
                                    placeholder="Descripcíon de la experiencia del empleado" required> </textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-3">
                                <label></label>
                            </div>
                            <div class="col-8">
                                <div class="d-block">
                                    <div class="form-check form-check-inline col-12 mt-0">
                                        <input class="form-check-input" type="checkbox" name="boletin" id="inlineRadio1"
                                            value="1">
                                        <label class="form-check-label" for="inlineRadio1">
                                            Deseo recibir boletín informativo

                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-3">
                                <label for="exampleInputEmail1">Roles *</label>
                            </div>
                            <div class="col-8">
                                <div class="d-block">
                                    <div class="form-check form-check-inline col-12 mt-2">
                                        <input class="form-check-input" type="checkbox" name="rol_id[]"
                                            id="inlineRadio2 rol_id" value="1">
                                        <label class="form-check-label" for="inlineRadio2">Profesional de poryectos -
                                            Desarrollador</label>
                                    </div>
                                    <div class="form-check form-check-inline col-12 mt-2">
                                        <input class="form-check-input" type="checkbox" name="rol_id[]"
                                            id="inlineRadio3 rol_id" value="2">
                                        <label class="form-check-label" for="inlineRadio3">Gerente
                                            estratégico</label>
                                    </div>
                                    <div class="form-check form-check-inline col-12 mt-2">
                                        <input class="form-check-input" type="checkbox" name="rol_id[]"
                                            id="inlineRadio4 rol_id" value="3">
                                        <label class="form-check-label" for="inlineRadio4">Auxiliar
                                            administrativo</label>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="modal-footer">
                            <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
                            <input type="submit" class="btn btn-info" value="Guardar">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Delete Modal HTML -->
        <div id="deleteEmployeeModal" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form>
                        <div class="modal-header">
                            <h4 class="modal-title">Eliminar empleado</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        </div>
                        <div class="modal-body">
                            <p>Esta seguro que desea eliminar el registro</p>

                        </div>
                        <div class="modal-footer">
                            <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
                            <input type="submit" class="btn btn-danger" value="Eliminar">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script> -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>

    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src='https://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.js'></script>
    <script src="script/script.js"></script>
</body>

</html>