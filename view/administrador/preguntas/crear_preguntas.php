<?php
require '../../../model/Conexion.php';
//print_r($_SESSION);
if( !(isset($_SESSION["ingresar"]) and $_SESSION["ingresar"]=="yes") and $_SESSION["id_rol"]!=1 )
{
	header("Location: ".Conexion::ruta().Conexion::path()."Login");exit();
}
?> 
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset= "UTF-8"/>
		<link rel="stylesheet" href="<?php echo Conexion::ruta()?>public/css/vida.css">
		<link href="<?php echo Conexion::ruta()?>public/css/bootstrap.min.css" rel="stylesheet"/>
		<title>..:: Crear Pregunta | Administrador | <?php echo $_SESSION["nombre"] ?> ::..</title>
		<link href="<?php echo Conexion::ruta()?>public/css/jquery-ui.min.css" rel="stylesheet"/>
		<link href="<?php echo Conexion::ruta()?>public/jtable/themes/lightcolor/red/jtable.min.css" rel="stylesheet" type="text/css" />
	</head>
	<body >
		<img src="<?php echo Conexion::ruta()?>public/img/logo_unisinu.png" lang="center">
		<div id="contenido">
			<header>
				<?php include '../menu.php'; ?>
			</header>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-md-2"></div>
				<div class="col-md-8">
					<div id="PersonTableContainer"></div>
				</div>
				<div class="col-md-2"></div>
			</div>
		</div>
		<script type="text/javascript" src="<?php echo Conexion::ruta()?>public/js/jquery.js"></script>	
		<!-- Include jTable script file. -->
		<script type="text/javascript" src="<?php echo Conexion::ruta()?>public/js/jquery-ui.min.js"></script> 
		<script src="<?php echo Conexion::ruta()?>public/jtable/jquery.jtable.min.js" type="text/javascript"></script>
		<script type="text/javascript" src="<?php echo Conexion::ruta()?>public/js/administrador.js"></script>
		<script type="text/javascript">
		    $(document).ready(function () {
		        $('#PersonTableContainer').jtable({
		            title: 'Agregar Pregunta...',
		            paging: true, //Enable paging
		            pageSize: 10, //Set page size (default: 10)
		            sorting: true, //Enable sorting
		            defaultSorting: 'pregunta',
		            openChildAsAccordion: true,
		            actions: {
		                listAction: 'ListarPreguntasJson',
		                createAction: 'InsertPreguntaJson',
		                updateAction: '/GettingStarted/UpdatePerson',
		                deleteAction: '/GettingStarted/DeletePerson'
		            },
		            fields: {
		                id_pregunta: {
		                    key: true,
		                    create: false,
		                    edit: false,
		                    list: false
		                },

		                //CHILD TABLE DEFINITION FOR "PHONE NUMBERS"
		                Phones: {
		                    title: '',
		                    width: '5%',
		                    sorting: false,
		                    edit: false,
		                    create: false,
		                    display: function (preguntaData) {
		                        //Create an image that will be used to open child table
		                        var $img = $('<img src="Options" title="Opciones" />');
		                        //Open child table when user clicks the image
		                        $img.click(function () {
		                            $('#PersonTableContainer').jtable('openChildTable',
		                                    $img.closest('tr'),
		                                    {
		                                        title: preguntaData.record.pregunta + ' - OPCIONES',
		                                        actions: {
		                                            listAction: '/Demo/PhoneList?StudentId=' + preguntaData.record.StudentId,
		                                            deleteAction: '/Demo/DeletePhone',
		                                            updateAction: '/Demo/UpdatePhone',
		                                            createAction: '/Demo/CreatePhone'
		                                        },
		                                        fields: {
		                                            id_pregunta: {
		                                                type: 'hidden',
		                                                defaultValue: preguntaData.record.StudentId
		                                            },
		                                            id_opcion: {
		                                                key: true,
		                                                create: false,
		                                                edit: false,
		                                                list: false
		                                            },
		                                            opcion: {
		                                                title: 'Opcion',
		                                                width: '30%',
		                                                options: { '1': 'Home phone', '2': 'Office phone', '3': 'Cell phone' }
		                                            },
		                                            tipo_opcion: {
		                                                title: 'Tipo opcion',
		                                                width: '30%'
		                                            }
		                                        }
		                                    }, function (data) { //opened handler
		                                        data.childTable.jtable('load');
		                                    });
		                        });
		                        //Return image to show on the person row
		                        return $img;
		                    }
		                },
		                 //CHILD TABLE DEFINITION FOR "EXAMS"
		                Exams: {
		                    title: '',
		                    width: '5%',
		                    sorting: false,
		                    edit: false,
		                    create: false,
		                    display: function (studentData) {
		                        //Create an image that will be used to open child table
		                        var $img = $('<img src="Option" title="Sub opciones" />');
		                        //Open child table when user clicks the image
		                        $img.click(function () {
		                            $('#PersonTableContainer').jtable('openChildTable',
		                                    $img.closest('tr'), //Parent row
		                                    {
		                                    title: studentData.record.Name + ' - Exam Results',
		                                    actions: {
		                                        listAction: '/Demo/ExamList?StudentId=' + studentData.record.StudentId,
		                                        deleteAction: '/Demo/DeleteExam',
		                                        updateAction: '/Demo/UpdateExam',
		                                        createAction: '/Demo/CreateExam'
		                                    },
		                                    fields: {
		                                        StudentId: {
		                                            type: 'hidden',
		                                            defaultValue: studentData.record.StudentId
		                                        },
		                                        StudentExamId: {
		                                            key: true,
		                                            create: false,
		                                            edit: false,
		                                            list: false
		                                        },
		                                        CourseName: {
		                                            title: 'Course name',
		                                            width: '40%'
		                                        },
		                                        ExamDate: {
		                                            title: 'Exam date',
		                                            width: '30%',
		                                            type: 'date',
		                                            displayFormat: 'yy-mm-dd'
		                                        },
		                                        Degree: {
		                                            title: 'Degree',
		                                            width: '10%',
		                                            options: ["AA", "BA", "BB", "CB", "CC", "DC", "DD", "FF"]
		                                        }
		                                    }
		                                }, function (data) { //opened handler
		                                    data.childTable.jtable('load');
		                                });
		                        });
		                        //Return image to show on the person row
		                        return $img;
		                    }
		                },
		                id_categorias: {
		                    title: 'Categoria',
		                    width: '12%',
		                    inputClass: 'form-control',
		                    options: 'ListarCategoriaJson'
		                },
		                pregunta: {
		                    title: 'Pregunta',
		                    width: '15%',
		                    inputClass: 'form-control'
		                },
		                graficar: {
		                    title: 'Graficar',
		                    width: '12%',
		                    inputClass: 'form-control',
		                    options: {
		                    	'null': 'SELECCIONE', 'si': 'SI', 'no': 'NO'
		                    }
		                }
		            }
		        });
		         $('#PersonTableContainer').jtable('load');

		    });
		</script>
	</body>
</html>