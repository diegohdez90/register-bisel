<?php

include 'connection.php';
$my_sql_conn =  new mysqli($servername,$user,$pwd,$db);

	$folio = $_POST['folio'];
	$armazon = $_POST['armazon'];
	$mica = $_POST['mica'];
	$material = $_POST['material'];
	$tratamiento = $_POST['tratamiento'];
	$tipo = $_POST['tipo'];
	$tecnico = $_POST['tecnico'];
	$id = $_POST['opticaid'];
	$fecha = date("Y-m-d");
	$descripcion = $_POST['descripcion'];

if(empty($folio) || empty($armazon) || empty($mica) || empty($material) || empty($tratamiento) || empty($tipo) || empty($tecnico) || empty($descripcion)){
	header("Location:sindatos.html");		

	echo "Vacios";
	echo "<br>";
	echo "Optica ".$id;
	echo "<br>";
	echo "Folio ".$folio;
	echo "<br>";
	echo "Mica ".$mica;
	echo "<br>";
	echo "Armazon ".$armazon;
	echo "<br>";
	echo "Material ".$material;
	echo "<br>";
	echo "Tratamiento ".$tratamiento;
	echo "<br>";
	echo "Tipo ".$tipo;
	echo "<br>";
	echo "Tecnico ".$tecnico;
	echo "<br>";
	echo "Fecha ".$fecha;
	echo "<br>";
	echo "Descripcion ".$descripcion;
	echo "<br>";

}
else{



	$insert = $my_sql_conn->query("INSERT INTO trabajo(folio,fecha,descripcion,optica_id,mica_id,material_id,armazon_id,tratamiento_id,tipo_id,tecnico_id) VALUES('$folio','$fecha','$descripcion','$id','$mica','$material','$armazon','$tratamiento','$tipo','$tecnico')");
	if ($insert) {
		$my_sql_conn->close();
/*		echo "Insertado correctamente";
		echo "<br>";
		echo "Optica ".$id;
		echo "<br>";
		echo "Folio ".$folio;
		echo "<br>";
		echo "Mica ".$mica;
		echo "<br>";
		echo "Armazon ".$armazon;
		echo "<br>";
		echo "Material ".$material;
		echo "<br>";
		echo "Tratamiento ".$tratamiento;
		echo "<br>";
		echo "Tipo ".$tipo;
		echo "<br>";
		echo "Tecnico ".$tecnico;
		echo "<br>";
		echo "Fecha ".$fecha;
		echo "<br>";
		echo "Descripcion ".$descripcion;
		echo "<br>";
*/
		header("Location:index.html");
	}
	else{
		$my_sql_conn->close();
		echo "Error al insertar";
		echo "<br>";
		echo "Optica ".$id;
		echo "<br>";
		echo "Folio ".$folio;
		echo "<br>";
		echo "Mica ".$mica;
		echo "<br>";
		echo "Armazon ".$armazon;
		echo "<br>";
		echo "Material ".$material;
		echo "<br>";
		echo "Tratamiento ".$tratamiento;
		echo "<br>";
		echo "Tipo ".$tipo;
		echo "<br>";
		echo "Tecnico ".$tecnico;
		echo "<br>";
		echo "Fecha ".$fecha;
		echo "<br>";
		echo "Descripcion ".$descripcion;
		echo "<br>";

		header("Location:error.html");		
	}

}

?>