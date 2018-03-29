<?php 

$con=mysqli_connect("localhost","root","", "flori") or die('Could not connect: ' . mysql_error($con)); 
echo "<h2>MySQL: Simple Select statement</h2>"; 
$result = mysqli_query($con,"select * from flori"); 
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
$sql4 = "CREATE TRIGGER MysqlTrigger AFTER UPDATE ON flowers FOR EACH ROW
BEGIN
INSERT INTO flower_update(nume, status, edtime) VALUES(NEW.nume, 'UPDATED', NOW());
END;"; 
highlight_string("CREATE TRIGGER MysqlTrigger AFTER UPDATE ON flowers FOR EACH ROW
BEGIN
INSERT INTO flower_update(nume, status, edtime) VALUES(NEW.nume, 'UPDATED', NOW());
END;");
mysqli_query($con, $sql4);
echo "<h2>MySQL: Update Statement</h2>"; 

$qry = mysqli_query($con, "UPDATE flowers SET nume='toporasi' where id=2"); 

highlight_string("UPDATE flowers SET nume='toporasi' where id=2");
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
echo "<h2>MySQL: Second effect of the Trigger</h2>"; 
$result1 = mysqli_query($con,"select * from flower_update"); 
echo "<table border='1'> 
<tr> 
<th>Nume</th> 
<th>Status</th>  
<th>Edtime</th>
</tr>"; 
while($row = mysqli_fetch_array($result1)) 
{ 
echo "<tr>"; 
echo "<td>" . $row['nume'] . "</td>"; 
echo "<td>" . $row['status'] . "</td>"; 
echo "<td>" . $row['edtime'] . "</td>";
echo "</tr>"; 
} 
echo "</table>"; 
mysqli_close($con); 

