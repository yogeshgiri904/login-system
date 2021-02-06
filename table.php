<form method="POST">
<input type="number" name="number" max='20' placeholder="Enter the number">
<input type="submit">
</form>

<?php

$number=$_POST['number'];
$i=1;
while($i<=10){
print $number*$i;
echo "<br>";
$i++;
}
?>