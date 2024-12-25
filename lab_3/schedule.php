<?php
$day = date("w");

switch ($day) {
  case 0:
    echo "Today is Sunday, " . date("d.m.Y");
    break;
  case 1:
    echo "Today is Monday, " . date("d.m.Y");
    break;
  case 2:
    echo "Today is Tuesday, " . date("d.m.Y");
    break;
  case 3:
    echo "Today is Wednesday, " . date("d.m.Y");
    break;
  case 4:
    echo "Today is Thursday, " . date("d.m.Y");
    break;
  case 5:
    echo "Today is Friday, " . date("d.m.Y");
    break;
  case 6:
    echo "Today is Saturday, " . date("d.m.Y");
    break;
  default:
    echo "Unknown day";
    break;
}
?>

<hr style="margin: 2rem 0;" />

<?php
$day = date("w");
echo "<table border='1'>";
echo "<tr><th>№</th><th>Фамилия Имя</th><th>График работы</th></tr>";

// John Styles
if (in_array($day, [1, 3, 5])) {
  $scheduleJohn = "8:00-12:00";
} else {
  $scheduleJohn = "Нерабочий день";
}
echo "<tr><td>1</td><td>John Styles</td><td>$scheduleJohn</td></tr>";

// Jane Doe
if (in_array($day, [2, 4, 6])) {
  $scheduleJane = "12:00-16:00";
} else {
  $scheduleJane = "Нерабочий день";
}
echo "<tr><td>2</td><td>Jane Doe</td><td>$scheduleJane</td></tr>";

echo "</table>";
