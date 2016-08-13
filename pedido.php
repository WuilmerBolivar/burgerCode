<?php
    require 'admin/database.php';

    if(!empty($_GET['id'])) 
    {
        $id = checkInput($_GET['id']);
    }
     
    $db = Database::connect();
    $statement = $db->prepare("SELECT items.id, items.name, items.description, items.price, items.image, categories.name AS category FROM items LEFT JOIN categories ON items.category = categories.id WHERE items.id = ?");
    $statement->execute(array($id));
    $item = $statement->fetch();
    Database::disconnect();

    function checkInput($data) 
    {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Burger Menu</title>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <link href='http://fonts.googleapis.com/css?family=Holtwood+One+SC' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="css/styles.css">
    </head>
    
    <body>
        <h1 class="text-logo"><span class="glyphicon glyphicon-cutlery"></span> Burger Menu <span class="glyphicon glyphicon-cutlery"></span></h1>
         <div class="container admin">
            <div class="row">
               <div class="col-sm-6">
                    <h1><strong>Realizar pedido</strong></h1>
                    <br>
                    <form>

                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>Nombre</th>
                      <th>Precio</th>
                      <th>Cantidad</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
                           <?php echo '<tr>';?>
                           <?php echo '<td>'. $item['name'] . '</td>';?>
                           <?php echo '<td>'. number_format($item['price'], 2, '.', '') . '</td>';?>
                           <?php echo '<td>'. $item['cantidad'] . '</td>';?>
                           <?php echo '<td width=150>';?>

                           <?php echo "<a class='btn btn-default' href='pedido.php?id=". $id ."&action=add'>
									<span class='glyphicon glyphicon-plus'></span></a>";?>

                           <?php echo ' ';?>

                           <?php echo "<a class='btn btn-default' href='pedido.php?id=". $id ."&action=del'>
									<span class='glyphicon glyphicon-minus'></span></a>";?>
                           
                           <?php echo '</td>';?>
                           <?php echo '</tr>';?>

                  </tbody>
                </table>

                    </form>
                    <br>
                    <div class="form-actions">
                      <a class="btn btn-primary" href="index.php"><span class="glyphicon glyphicon-arrow-left"></span> Regresar</a>
                    </div>
                </div> 
                <div class="col-sm-4 site">
                    <div class="thumbnail">
                        <img src="<?php echo 'images/'.$item['image'];?>" alt="...">
                        <div class="price"><?php echo number_format((float)$item['price'], 2). ' Bs';?></div>
                          <div class="caption">
                            <a href="carrito.php" class="btn btn-order" role="button"><span class="glyphicon glyphicon-shopping-cart"></span> Ordenar</a>
                          </div>
                    </div>
                </div>
            </div>
        </div>   
    </body>
</html>

