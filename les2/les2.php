<?php

$price = 200;

if($price >= 150){
    $price = 1.19;
} elseif ($price <= 55){
    $price *= 1.11;
} else {
    $price *= 1.16;
}

echo '$'.$price;


echo "<table>";

for($i = 1; $i <= 10; $i++){
    echo "<tr>
<td>". $i ."</td>
<td>x</td>
<td>9</td>
<td>=</td> 
<td>" . $i * 9 ."</td>
</tr>";
}

echo "</table>";