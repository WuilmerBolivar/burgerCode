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
                <h1><strong>Carrito de compras</strong></h1>

				<a class="btn btn-default" href="#"><span class="glyphicon glyphicon-file"></span> Nuevo pedido</a>
				<a class="btn btn-default" href="#"><span class="glyphicon glyphicon-floppy-disk"></span> Guardar pedido</a>
				<a class="btn btn-default" href="#"><span class="glyphicon glyphicon-envelope"></span> Enviar por correo</a>



                    <br/>  <br/>
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>Nombre</th>
                      <th>Cantidad</th>
                      <th>Precio unitario</th>
                      <th>Precio total</th>
                    </tr>
                  </thead>

                  <tbody>
                      <?php
                        require 'admin/database.php';
                        $db = Database::connect();
                        $statement = $db->query('SELECT items.id, items.name, items.description, items.price, categories.name AS category FROM items LEFT JOIN categories ON items.category = categories.id ORDER BY items.id DESC');
                        while($item = $statement->fetch()) 
                        {
                            echo '<tr>';
                            echo '<td>'. $item['name'] . '</td>';
                            echo '<td>'. $item['cantidad'] . '</td>';
                            echo '<td>'. number_format($item['price'], 2, '.', '') . '</td>';
                            echo '<td>'. $item['preciot'] . '</td>';
                            echo '</tr>';

                        }
                        Database::disconnect();
                      ?>
                  </tbody>
                            <tr>
                            <td> <?php echo "<h4>Total a pagar</h4>" . '<td></td>' . '<td></td>' . '<td>' . $item['totalcoste'] . '</td>';?></td>
                            </tr>
                </table>

                    <div class="form-actions">
                      <a class="btn btn-primary" href="index.php"><span class="glyphicon glyphicon-arrow-left"></span> Regresar</a>
                    </div>
            </div>
        </div>
    </body>
</html>
