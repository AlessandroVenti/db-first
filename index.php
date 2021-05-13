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

               $connection = createConnection();
               $stanzeSql = getStanzeTable();

               $prepareConnection = $connection -> prepare($stanzeSql);
               $prepareConnection -> execute();
               $prepareConnection -> bind_result($roomNumber, $roomId);

               while( $prepareConnection -> fetch() ) {

                    if ( $roomId ) {

                         echo '<a href="/roomStats.php?id=' . $roomId . '">' . $roomNumber . '</a><br>';
                    }

               }

               closeConnection($connection, $prepareConnection);

          ?>

     </div>

</body>

</html>