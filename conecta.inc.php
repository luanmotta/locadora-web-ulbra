<?php
   function conecta_bd()
   {
      
	   //  $link=mysqli_connect("localhost","root","","locadora");
      

      /*
      Development:
      */
      $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "locadora";
      $link=mysqli_connect($servername, $username, $password, $dbname);
        if ($link)
        return($link);
      return(FALSE);
   }
?>
