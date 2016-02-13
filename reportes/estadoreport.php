<!DOCTYPE html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <meta http-equiv="content-type" content="text/html; charset=utf-8 "/>
    <title>Biseles</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script><link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

</head>
<?php

if (!empty($_GET['estado'])){
     $edo = str_replace(' ', '', $_GET['estado']);   
}
else 
    header("Location:index.html");

    include '../connection.php';
    $my_sql_conn =  new mysqli($servername,$user,$pwd,$db);




?>
<body>
  <div class="container">
    <div class="jumbotron">
        <div class="container-fluid">
            <div class="row"><h3>Reporte tus pedidos</h3></div>
            <div class="row">
              <?php

                  $resultState = $my_sql_conn->query("SELECT id,nombre from optica where estado='$edo'");
                  $opticState = array();
                  while ($rs = $resultState->fetch_array(MYSQLI_ASSOC)) {
                    $opticState[$rs["id"]] = $rs['nombre'];
                  }
              ?>
              <table class="table">
                <thead>
                  <th>Folio</th>
                  <th>Optica</th>
                  <th>Ciudad</th>
                  <th>Fecha</th>
                  <th>Armazon</th>
                  <th>Mica</th>
                  <th>Material</th>
                  <th>Tratamiento</th>
                  <th>Tipo</th>
                  <th>Tecnico</th>
                </thead>
                <tbody>
                  <?php
                  foreach ($opticState as $key => $value) {
                    $resultBisel = $my_sql_conn->query("SELECT * from trabajos where OpticID='$key'");
                    if($resultBisel->num_rows>0){                  
                      while ( $rs = $resultBisel->fetch_array(MYSQLI_ASSOC)) {
                      echo "<tr>";
                        echo "<td>".$rs['folio']."</td>";
                        echo "<td>".$rs['Optica']."</td>";
                        echo "<td>".$rs['Ciudad']."</td>";
                        echo "<td>".$rs['fecha']."</td>";
                        echo "<td>".$rs['Armazon']."</td>";
                        echo "<td>".$rs['Mica']."</td>";
                        echo "<td>".$rs['Material']."</td>";
                        echo "<td>".$rs['Tratamiento']."</td>";
                        echo "<td>".$rs['Tipo']."</td>";
                        echo "<td>".$rs['Nombre del Tecnico']."</td>";
                      echo "</tr>";
                      }
                    }
                  }
                  ?>
                </tbody>
              </table>
            </div>
        </div>
    </div>
  </div>
    
</body>

