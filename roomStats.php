<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="css/style.css">
     <title> Rooms Hotel-Check</title>
</head>

<body>

     <div class="box">

          <h1>Room Database</h1>
          
          <?php

               

               require_once "data.php";
               $idRoom = $_GET['id'];


               $connection = createConnection();
               $roomStats = getRoomStats();

               $prepareConnection = $connection -> prepare($roomStats);
               $prepareConnection -> bind_param('i', $idRoom);
               $prepareConnection -> execute();
               $prepareConnection -> bind_result($roomNumber, $floor, $beds);

               $prepareConnection -> fetch();

               echo '<h2>' .  $roomNumber . ' ' . $floor . ' ' . $beds . '</h2>';

               closeConnection($connection, $prepareConnection);

          ?>

          <a href="/index.php">back</a>

     </div>

</body>

</html>