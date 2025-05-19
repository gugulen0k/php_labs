<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lab 5</title>
</head>

<body>
  <?php
  $errors = [];
  $show_results = false;

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (empty($_POST['name'])) {
      $errors['name'] = 'Пожалуйста, введите ваше имя';
    }

    if (empty($_POST['email'])) {
      $errors['email'] = 'Пожалуйста, введите ваш email';
    } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
      $errors['email'] = 'Пожалуйста, введите корректный email';
    }

    if (empty($_POST['comment'])) {
      $errors['comment'] = 'Пожалуйста, оставьте комментарий';
    }

    if (empty($errors)) {
      $show_results = true;
    }
  }
  ?>

  <div class="form">
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
      <fieldset>
        <legend>Оставьте отзыв!</legend>
        <div id="main_info" style="display: flex; flex-direction: column; gap: 10px;">
          <div>
            <label for="name">Имя:
              <input type="text" name="name" />
            </label>
          </div>
          <div>
            <label for="email">Email:
              <input type="email" name="email" />
            </label>
          </div>
        </div>
        <div id="extra_info">
          <div>
            <p><label for="review">Оцените наш сервис!</label></p>
            <div style="display: flex; flex-direction: column;">
              <p><input id="review" type="radio" name="review" value="10" checked>Хорошо</p>
              <p><input id="review" type="radio" name="review" value="8">Удовлетворительно</p>
              <p><input id="review" type="radio" name="review" value="5">Плохо</p>
            </div>
          </div>
        </div>
        <div id="message_info">
          <div>
            <p><label for="comment">Ваш комментарий: </label></p>
            <textarea id="comment" name="comment" cols="25" rows="10" class="comment"></textarea>
          </div>
        </div>
        <div id="buttons" style="display: flex; flex-direction: row; gap: 10px; margin-top: 10px;">
          <input type="submit" value="Отправить" />
          <input type="reset" value="Удалить" />
        </div>

        <div class="errors">
          <?php if (isset($errors['name'])): ?>
            <span><?php echo $errors['name']; ?></span>
          <?php endif; ?>

          <?php if (isset($errors['email'])): ?>
            <span><?php echo $errors['email']; ?></span>
          <?php endif; ?>

          <?php if (isset($errors['comment'])): ?>
            <span><?php echo $errors['comment']; ?></span>
          <?php endif; ?>
        </div>
      </fieldset>
    </form>

    <?php if ($show_results): ?>
      <div id="result">
        <p>Ваше имя: <b><?php echo $_POST["name"] ?? ''; ?></b></p>
        <p>Ваш e-mail: <b><?php echo $_POST["email"] ?? ''; ?></b></p>
        <p>Оценка товара: <b><?php echo $_POST["review"] ?? ''; ?></b></p>
        <p>Ваше сообщение: <b><?php echo $_POST["comment"] ?? ''; ?></b></p>
      </div>
    <?php endif; ?>

  </div>
</body>

</html>

<style>
  :root {
    --yellow: #FFD369;
    --white: #EEEEEE;
    --dimmed-white: #EEEEEE80;
    --black: #222831;
    --grey: #393E46;
    --red: #FF8080
  }

  body {
    background-color: var(--black);
    color: var(--white);
    font-family: "Courier Prime", monospace;
  }

  fieldset {
    width: max-content;
    margin: 2rem auto;
    padding: 1.5rem;
    border: 2px solid var(--dimmed-white);
    border-radius: 10px;
  }

  .form {
    display: flex;
    flex-direction: column;
    align-items: center;
  }

  legend {
    color: var(--yellow);
    font-weight: 700;
    padding: 0 10px;
    font-size: 1.3rem;
  }

  label {
    display: flex;
    flex-wrap: wrap;
    margin-bottom: 0.5rem;
    color: var(--white);
  }

  input[type=text],
  input[type=email],
  textarea {
    width: 100%;
    padding: 0.5rem;
    background-color: var(--black);
    border: 1px solid var(--dimmed-white);
    border-radius: 4px;
    color: var(--white);
    font-family: "Courier Prime", monospace;
  }

  #message_info div {
    display: flex;
    flex-wrap: wrap;
  }

  textarea {
    min-height: 120px;
    resize: vertical;
  }


  input[type=submit],
  input[type=reset] {
    color: var(--yellow);
    text-decoration: none;
    padding: 0.5rem 1rem;
    border: 1px solid var(--yellow);
    border-radius: 5px;
    transition: all 0.3s ease;
    cursor: pointer;
    background-color: transparent;
  }

  input[type=submit]:hover,
  input[type=reset]:hover {
    background-color: var(--yellow);
    color: var(--black);
  }

  .errors {
    display: flex;
    flex-direction: column;
    color: var(--red);
    font-size: 1.1rem;
    font-weight: 700;
    margin-top: 1rem;
  }
</style>