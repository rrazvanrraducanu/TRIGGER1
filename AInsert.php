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
$sql3="CREATE TRIGGER TrigAfterInsert AFTER INSERT ON flowers FOR EACH ROW
BEGIN
INSERT INTO flower_update(nume, status, edtime) VALUES(NEW.nume, 'UPDATED', NOW());
END";
highlight_string("CREATE TRIGGER TrigAfterInsert AFTER INSERT ON flowers FOR EACH ROW
BEGIN
INSERT INTO flower_update(nume, status, edtime) VALUES(NEW.nume, 'UPDATED', NOW());
END");
mysqli_query($con,$sql3);
echo "<h2>MySQL: Insert Statement</h2>"; 
$qry2="INSERT INTO flowers(nume,marime,culoare,pret) VALUES('ghiocei','mici','albi','10')";
highlight_string("INSERT INTO flowers(nume,marime,culoare,pret) VALUES('ghiocei','mici','albi','10')");
mysqli_query($con,$qry2);
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
