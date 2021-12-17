<table border=1>
<?php
for($i=1;$i<=10;$i++){
  $resultado=$i*5;
  if(($i%2)==0){  //el numero es par
    echo("<tr style='background-color: #d0d0d0'><td>$i * 5</td><td>$resultado</td></tr>");    
  }
  else{ //el numero es impar
      echo("<tr><td>$i * 5</td><td>$resultado</td></tr>");
  }
 }
?>
</table>
