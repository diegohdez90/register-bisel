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

if (!empty($_GET['optica'])){
     $optic = $_GET['optica'];
}
else 
    header("Location:index.html");

    include 'connection.php';
    $my_sql_conn =  new mysqli($servername,$user,$pwd,$db);
?>
<body>
  <div class="container">
    <div class="jumbotron">
        <div class="container-fluid">
            <div class="row"><h3>Registra tus pedidos</h3></div>
            <form class="form-horizontal" role="form" action="register-bisel.php" method="post" enctype="multipart/form-data">
              <input type="hidden" class="form-control" name="opticaid" value="<?php echo $optic; ?>">
              <div class="form-group">
                <label class="control-label col-sm-2" for="email">Folio</label>
                <div class="col-sm-10">
                  <input name="folio" type="text" class="form-control" id="Folio" placeholder="Folio">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-2">Armazon</label>
                <div class="col-sm-10">
                  <select class="form-control" name="armazon">
                      <option value="">Selecciona Tipo de Armazon</option>
                      <?php
                          $thequery = $my_sql_conn->query("select * from armazon");
                          while($rs = $thequery->fetch_array(MYSQLI_ASSOC)){
                      ?>
                          <option value="<?php echo $rs['id'];?>"><?php echo $rs['tipo']; ?></option>
                      <?php
                          }
                      ?>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-2">Mica</label>
                <div class="col-sm-10">
                  <select class="form-control" name="mica">
                      <option value="">Selecciona Tipo de Mica</option>
                      <?php
                          $thequery = $my_sql_conn->query("select * from mica");
                          while($rs = $thequery->fetch_array(MYSQLI_ASSOC)){
                      ?>
                          <option value="<?php echo $rs['id'];?>"><?php echo $rs['tipo']; ?></option>
                      <?php
                          }
                      ?>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-2">Material</label>
                <div class="col-sm-10">
                  <select class="form-control" name="material">
                      <option value="">Selecciona Tipo de Material</option>
                      <?php
                          $thequery = $my_sql_conn->query("select * from material");
                          while($rs = $thequery->fetch_array(MYSQLI_ASSOC)){
                      ?>
                          <option value="<?php echo $rs['id'];?>"><?php echo $rs['tipo']; ?></option>
                      <?php
                          }
                      ?>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-2">Tratamiento</label>
                <div class="col-sm-10">
                  <select class="form-control" name="tratamiento">
                      <option value="">Selecciona Tipo de Tratamiento</option>
                      <?php
                          $thequery = $my_sql_conn->query("select * from tratamiento");
                          while($rs = $thequery->fetch_array(MYSQLI_ASSOC)){
                      ?>
                          <option value="<?php echo $rs['id'];?>"><?php echo $rs['tipo']; ?></option>
                      <?php
                          }
                      ?>
                  </select>
                </div>
              </div>              
              <div class="form-group">
                <label class="control-label col-sm-2">Tipo</label>
                <div class="col-sm-10">
                  <select class="form-control" name="tipo">
                      <option value="">Selecciona Tipo</option>
                      <?php
                          $thequery = $my_sql_conn->query("select * from tipo");
                          while($rs = $thequery->fetch_array(MYSQLI_ASSOC)){
                      ?>
                          <option value="<?php echo $rs['id'];?>"><?php echo $rs['nombre']; ?></option>
                      <?php
                          }
                      ?>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-2">Tecnico</label>
                <div class="col-sm-10">
                  <select class="form-control" name="tecnico">
                      <option value="">Selecciona Tecnico</option>
                      <?php
                          $thequery = $my_sql_conn->query("select * from Tecnico where status='Disponible'");
                          while($rs = $thequery->fetch_array(MYSQLI_ASSOC)){
                      ?>
                          <option value="<?php echo $rs['id'];?>"><?php echo $rs['nombre']." ".$rs['apellidos']; ?></option>
                      <?php
                          }
                      ?>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-2" for="comment">Descripcion:</label>
                <div class="col-sm-10">
                  <textarea name="descripcion" class="form-control" rows="5" id="comment"></textarea>
                </div>
              </div>
              <div class="form-group"> 
                <div class="col-sm-offset-2 col-sm-10">
                  <button type="submit" class="btn btn-default">Submit</button>
                </div>
              </div>
            </form>
        </div>
    </div>
  </div>
    
</body>

