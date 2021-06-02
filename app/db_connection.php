    <?php
    function OpenCon()
     {
     $dbhost = "docker-php-playground-db";
     $dbuser = "root";
     $dbpass = "1234";
     $db = "practice";
     $conn = new \mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
     
     return $conn;
     }
     
    function CloseCon($conn)
     {
     $conn -> close();
     }
       
    ?>