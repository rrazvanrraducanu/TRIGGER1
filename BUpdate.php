<?php 
$con=mysqli_connect("localhost","root","", "flori") or die('Could not connect: ' . mysql_error($con)); 
echo "<h2>MySQL: Simple Select statement</h2>";
$result = mysqli_query($con,"select * from flowers"); 
echo "<table border='1'> 
<tr> 
<th>Nume</th>
<th>Culoare</th>
<th>Marime</th> 
<th>Pret</th>
</tr>"; 
while($flower = mysqli_fetch_array($result)) 
{ 
echo "<tr>"; 
echo "<td>" . $flower['nume'] . "</td>"; 
echo "<td>" . $flower['culoare'] . "</td>"; 
echo "<td>" . $flower['marime'] . "</td>"; 
echo "<td>" . $flower['pret'] . "</td>"; 
echo "</tr>"; 

} 
echo "</table>"; 
echo "<h2>CREATE MySQL Trigger In PHP</h2>"; 

$sql = "CREATE TRIGGER MysqlTrigger1 BEFORE UPDATE ON flowers FOR EACH ROW
        BEGIN
        SET NEW.nume=UPPER(NEW.nume);
        END;"; 
highlight_string("CREATE TRIGGER MysqlTrigger1 BEFORE UPDATE ON flowers FOR EACH ROW SET NEW.nume=UPPER(NEW.nume);");
mysqli_query($con, $sql);
echo "<h2>MySQL: Update Statement</h2>"; 

$qry = mysqli_query($con, "UPDATE flowers SET nume='toporasi' where id=16"); 

highlight_string("UPDATE flowers SET nume='toporasi' where id=16");

echo "<br/><br/>Table has been updated."; 

mysqli_query($con,$qry); 

echo "<h2>MySQL: Effect of the Trigger</h2>"; 
$result = mysqli_query($con,"select * from flowers"); 
echo "<table border='1'> 
<tr> 
<th>Nume</th>
<th>Culoare</th>
<th>Marime</th> 
<th>Pret</th>
</tr>"; 
while($flower = mysqli_fetch_array($result)) 
{ 
echo "<tr>"; 
echo "<td>" . $flower['nume'] . "</td>"; 
echo "<td>" . $flower['culoare'] . "</td>"; 
echo "<td>" . $flower['marime'] . "</td>"; 
echo "<td>" . $flower['pret'] . "</td>"; 
echo "</tr>"; 

} 
echo "</table>"; 
