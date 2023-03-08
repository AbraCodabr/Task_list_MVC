<?php
    // Класс конфигурации базы данных
    class db
    {
        public static function connToDb() 
        {
            $connect = new mysqli('localhost', 'root', '', 'tasklist');

            return $connect;
        }   
    }

?>