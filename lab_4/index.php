<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Courier+Prime:ital,wght@0,400;0,700;1,400;1,700&family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  <title>Lab 4</title>
</head>

<body>
  <main>
    <section>
      <h1>Task 1 (for loop)</h1>

      <?php
      $a = 0;
      $b = 0;

      for ($i = 0; $i <= 5; $i++) {
        $a += 10;
        $b += 5;

        $step = $i + 1;
        echo "a: $a | b: $b (step $step)<br>";
      }

      echo "===============================<br>";
      echo "End of the loop: a = $a, b = $b";
      ?>
    </section>

    <section>
      <h1>Task 2 (while loop)</h1>

      <?php
      $a = 0;
      $b = 0;
      $i = 0;

      while ($i <= 5) {
        $a += 10;
        $b += 5;
        $step = $i + 1;

        echo "a: $a | b: $b (step $step)<br>";

        $i++;
      }
      echo "===============================<br>";
      echo "End of the loop: a = $a, b = $b";
      ?>
    </section>

    <section>
      <h1>Task 3 (working with arrays)</h1>

      <span>Array elements are: </span>
      <?php
      $array = array();

      for ($i = 0; $i <= 100; $i++) {
        $array[] = $i;
      }

      for ($i = 0; $i < sizeof($array); $i++) {
        echo " $array[$i] ";

        if ($i % 10 == 0) {
          echo "<br>";
        }
      }
      ?>
    </section>

    <section>
      <h1>Task 4 (Associative arrays and functions)</h1>

      <?php
      //определение ассоциативного массива транзакций
      $transactions = [
        [
          "transaction_id" => 1, // id
          "transaction_date" => "2019-01-01", // дата
          "transaction_amount" => 100.00, // сумма транзакции
          "transaction_description" => "Payment for groceries", // описание
          "merchant_name" => "SuperMart", // название организации
        ],
        [
          "transaction_id" => 2,
          "transaction_date" => "2020-02-15",
          "transaction_amount" => 75.50,
          "transaction_description" => "Dinner with friends",
          "merchant_name" => "Local Restaurant",
        ],
        [
          "transaction_id" => 3,
          "transaction_date" => "2020-02-18",
          "transaction_amount" => 42.30,
          "transaction_description" => "Grocery shopping",
          "merchant_name" => "SuperMarket Chain"
        ],
        [
          "transaction_id" => 4,
          "transaction_date" => "2020-02-20",
          "transaction_amount" => 19.99,
          "transaction_description" => "Monthly subscription",
          "merchant_name" => "Streaming Service Inc."
        ],
        [
          "transaction_id" => 5,
          "transaction_date" => "2020-02-22",
          "transaction_amount" => 125.00,
          "transaction_description" => "Weekend getaway booking",
          "merchant_name" => "Coastal Resorts LLC"
        ]
      ];

      function sum($carry, $item)
      {
        $carry += $item;

        return $carry;
      }

      function selectAmounts($item)
      {
        return $item["transaction_amount"];
      }

      function calculateTotalAmount($array)
      {
        $amounts = array_map('selectAmounts', $array);

        return array_reduce($amounts, 'sum');
      }

      function calculateAverage($array)
      {
        $amounts = array_map('selectAmounts', $array);
        $amountsSum = array_reduce($amounts, 'sum');

        return round($amountsSum / sizeof($amounts), 2);
      }

      function selectDescriptions($item)
      {
        $description = $item["transaction_description"];
        echo $description . "<br>";

        return $description;
      }

      function mapTransactionDescriptions($array)
      {
        return array_map('selectDescriptions', $array);
      }
      ?>
      <table>
        <tr>
          <th colspan="5">Transactions</th>
        </tr>
        <tr>
          <th>ID</th>
          <th>Date</th>
          <th>Amount</th>
          <th>Description</th>
          <th>Organization</th>
        </tr>
        <?php
        foreach ($transactions as $transaction) { ?>
          <tr>
            <td>
              <?php
              echo $transaction["transaction_id"] ?>
            </td>
            <td>
              <?php
              echo $transaction["transaction_date"] ?>
            </td>
            <td>
              <?php
              echo $transaction["transaction_amount"] ?>
            </td>
            <td>
              <?php
              echo $transaction["transaction_description"] ?>
            </td>
            <td>
              <?php
              echo $transaction["merchant_name"] ?>
            </td>
          </tr>
        <?php } ?>
        <tr class="highlighted">
          <td colspan="5"><?php echo "Total amount: " .  calculateTotalAmount($transactions); ?> </td>
        </tr>
        <tr class="highlighted">
          <td colspan="5"><?php echo "Average amount: " .  calculateAverage($transactions); ?> </td>
        </tr>
      </table>

      <br>
      <h3>Descriptions:</h3>
      <p>
        <?php
        mapTransactionDescriptions($transactions)
        ?>
      </p>
    </section>
  </main>
</body>

</html>


<style>
  *,
  *::before,
  *::after {
    margin: 0;
    padding: 0;
  }

  :root {
    --yellow: #FFD369;
    --white: #EEEEEE;
    --dimmed-white: #EEEEEE80;
    --black: #222831;
    --grey: #393E46;
  }

  body {
    background-color: var(--black);
    color: var(--white);
    font-family: "Courier Prime", monospace;
  }

  main {
    margin: 2rem;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    gap: 3rem;
  }

  h1 {
    color: var(--yellow);
    margin-bottom: 2rem;
    font-weight: 700;
  }

  section {
    border: solid 2px var(--dimmed-white);
    border-radius: 10px;
    padding: 1rem;
    height: max-content;
    width: max-content;
  }

  table {
    border-collapse: separate;
    border-spacing: 0;
    border: 1px solid var(--dimmed-white);
    overflow: hidden;
    border-radius: 0.3rem;
    font-size: 1.1rem;
  }

  th,
  .highlighted {
    padding: .2rem .5rem;
    border: 1px solid var(--dimmed-white);
    background-color: var(--grey);
    font-weight: 700;
  }

  td {
    background-color: transparent;
    padding: .2rem .5rem;
    border: 1px solid var(--dimmed-white);
  }
</style>