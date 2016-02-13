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

    include 'connection.php';
    $my_sql_conn =  new mysqli($servername,$user,$pwd,$db);
?>
<body>
  <div class="container">
    <div class="jumbotron">
        <div class="container-fluid">
            <div class="row"><h3>Registra tus pedidos</h3></div>
            <div class="row">
                <h4>Ciudades de <?php echo $edo; ?></h4>
                <form class="form-horizontal" role="form" action="selectOptic.php" method="get">
                  <div class="form-group">
                    <div class="form-group">
                      <input type="hidden" class="form-control" name="estado" value="<?php echo $edo; ?>">
                    </div>
                    <label class="control-label col-sm-2" for="email">Ciudad</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="ciudad">
                            <option value="">Selecciona tu ciudad</option>
                            <?php
                                $thequery = $my_sql_conn->query("select ciudad from ciudades where Estado='$edo'");
                                while($rs = $thequery->fetch_array(MYSQLI_ASSOC)){
                            ?>
                                <option value="<?php echo $rs['ciudad'];?>"><?php echo $rs['ciudad']; ?></option>
                            <?php
                                }
                            ?>
                        </select>
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
  </div>
    
</body>

