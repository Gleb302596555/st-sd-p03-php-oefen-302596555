<?php
try {
    $db = new PDO("mysql:host=localhost;dbname=bmw_cars", "root", "");
} catch (PDOException $e) {
    die('Error' . $e->getMessage());
}

$query = $db->prepare(query: 'SELECT * FROM `bmws`');
$query->execute();

$bmw_cars = $query->fetchAll(PDO::FETCH_ASSOC);

//echo "<pre>";
//var_dump($cars);
//echo "</pre>";
?>


<table>
    <thead>
    <tr>
        <th>id</th>
        <th>name</th>
        <th>range</th>
        <th>price</th>
    </tr>
    </thead>
<tbody>
<?php
foreach ($bmw_cars as $car) {
 echo   "    <tr>
    <th>" . $car['id'] . "</th>
    <th>" . $car['model'] . "</th>
    <th>" . $car['range1'] . "</th>
    <th>" . $car['price'] . "</th>
    </tr>";
}
?>
</tbody>
</table>