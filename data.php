<?php
    
    function createConnection( $databaseHost = 'localhost',
                               $databaseUser = 'root',
                               $databasePassword = 'root',
                               $databaseName = 'db_hotel'
                               ) {

        $connection = new mysqli(
            $databaseHost,
            $databaseUser,
            $databasePassword,
            $databaseName
        );

        if ( $connection && $connection -> connect_error) {
            echo "Connection failed:" . $connection -> connect_error;
        }

        return $connection;

    };


    function getStanzeTable() {

        return "
            SELECT stanze.room_number, stanze.id
                FROM stanze
        ";
    }

    function getRoomStats() {

        return "
            SELECT room_number, floor, beds 
                FROM stanze
                    WHERE stanze.id = ?
        ";
    }
    

    function closeConnection($connection, $prepareConnection) {

            $connection -> close();
            $prepareConnection -> close();

    }

?>