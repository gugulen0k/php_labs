<?php
// Использование echo
echo "Это сообщение выведено с помощью echo.<br>";

// Использование print
print "Это сообщение выведено с помощью print.<br>";

// Пример нескольких параметров для echo
echo "Привет", " ", "мир!", "<br>";

// Print возвращает 1
$result = print "Print возвращает значение: 1.<br>";
echo "Результат: $result<br>";
?>

<hr style="margin: 3rem 0" />
<?php
$days = 288;
$message = "Все возвращаются на работу!";

// Конкатенация
echo "В " . $days . " день, приблизительно ... " . $message . "<br>";

// Двойные кавычки
echo "В $days день, приблизительно ... $message<br>";
?>

<hr style="margin: 3rem 0" />
<?php
$a = 10;
$b = 5;

// Арифметические операции
echo "Сложение: " . ($a + $b) . "<br>";
echo "Вычитание: " . ($a - $b) . "<br>";
echo "Умножение: " . ($a * $b) . "<br>";
echo "Деление: " . ($a / $b) . "<br>";
echo "Остаток от деления: " . ($a % $b) . "<br>";
?>

<hr style="margin: 3rem 0" />
<?php
$intVar = 42;
$floatVar = 3.14;
$stringVar = "Привет, PHP!";
$boolVar = true;

// Использование var_dump
var_dump($intVar);
echo "<br>";
var_dump($floatVar);
echo "<br>";
var_dump($stringVar);
echo "<br>";
var_dump($boolVar);
echo "<br>";
?>

<hr style="margin: 3rem 0" />
<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Интеграция PHP и HTML</title>
</head>

<body>
  <h1>Добро пожаловать, <?php echo "гость"; ?>!</h1>
  <p>Сегодня: <?php echo date("Y-m-d"); ?></p>
</body>

</html>

<hr style="margin: 3rem 0" />
<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Стихотворение</title>
</head>

<body>
  <h1>Стихотворение</h1>
  <pre>
<?php
echo "На свете есть немало слов,\n";
echo "Что будят в сердце добрый свет.\n";
echo "Слова: \"мечта\", \"любовь\", \"весна\",\n";
echo "И каждое из них — ответ.\n\n";

echo "Слова несут тепло и радость,\n";
echo "Но в час тревоги и борьбы\n";
echo "Они дают душе отвагу,\n";
echo "И свет надежды средь судьбы.";
?>
  </pre>
</body>

</html>