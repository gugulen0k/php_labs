<?php
$lastName = 'Ivanov';
$firstName = 'Nikolai';

echo 'Client\'s last name is ' . $lastName . ', and their first name is ' . $firstName . '.';

$age = 30;
print '<br>Client\'s age is ' . $age . '.';
?>

<hr style="margin: 2rem 0" />

<?php
$currentDay = date("w");

if ($currentDay == 5) {
  echo "Have a great weekend!";
} elseif ($currentDay == 0) {
  echo "Tomorrow starts a new work week!";
} else {
  echo "Have a productive workday!";
}

echo "<br>";

// Тернарный оператор
echo ($currentDay == 5)
  ? "Have a great weekend!"
  : (($currentDay == 0) ? "Tomorrow starts a new work week!" : "Have a productive workday!");
?>