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
      if ($link)
        $link=mysqli_connect("localhost","username","password","locadora");
        return($link);
      return(FALSE);
   }
?>
