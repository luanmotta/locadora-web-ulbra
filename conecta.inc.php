<?php
   function conecta_bd()
   {
      /*
      Production:
	    $link=mysqli_connect("localhost","root","","locadora");
      */

      /*
      Development:
      */
      $link=mysqli_connect("localhost","username","password","locadora");
      if ($link)
        return($link);
      return(FALSE);
   }
?>
