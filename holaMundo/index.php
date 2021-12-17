<!DOCTYPE html>
<html>
<body>

  <?php
$colors = array("red", "green", "blue", "yellow");

foreach ($colors as $value) {
  echo "$value <br>";
}

for($i=0;$i<count($colors);$i++){
    $value=$colors[$i];
    echo "$value <br>";
}
?> 
</body>
</html>