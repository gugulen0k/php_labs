<?php
$errors = [];
$validated = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $name = trim($_POST['name'] ?? '');
  if (empty($name)) {
    $errors['name'] = "Enter your name";
  } elseif (!preg_match('/^[a-zA-Z\s-]{2,50}$/u', $name)) {
    $errors['name'] = "Only english letters, space and hyphen sign (2-50 symbols)";
  }

  $email = trim($_POST['email'] ?? '');
  if (empty($email)) {
    $errors['email'] = "Enter your email";
  } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors['email'] = "Enter valid email";
  }

  $age = $_POST['age'] ?? '';
  if (empty($age)) {
    $errors['age'] = "Enter your age";
  } elseif (!is_numeric($age) || $age < 12 || $age > 99) {
    $errors['age'] = "Age should be from 12 to 99";
  }

  $course = $_POST['course'] ?? '';
  $allowedCourses = ['backend', 'frontend', 'devops', 'qa'];
  if (empty($course)) {
    $errors['course'] = "Choose a course";
  } elseif (!in_array($course, $allowedCourses)) {
    $errors['course'] = "Selected course is unaccaptable";
  }

  $format = $_POST['format'] ?? '';
  if (empty($format)) {
    $errors['format'] = "Enter studying format";
  }

  if (empty($errors)) {
    $validated = true;
    $experience = isset($_POST['experience']) ? 'Yes' : 'No';
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registration for IT courses</title>
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
      font-family: 'Courier Prime', monospace;
      background-color: var(--black);
      color: var(--white);
      padding: 20px;
      max-width: 600px;
      margin: 0 auto;
    }

    h1 {
      color: var(--yellow);
      margin-bottom: 20px;
    }

    fieldset {
      border: 2px solid var(--dimmed-white);
      border-radius: 5px;
      padding: 20px;
      margin-bottom: 20px;
    }

    legend {
      color: var(--yellow);
      padding: 0 10px;
    }

    label {
      display: flex;
      flex-wrap: wrap;
      margin-bottom: 8px;
    }

    input,
    select,
    textarea {
      background-color: var(--grey);
      border: 1px solid var(--dimmed-white);
      color: var(--white);
      padding: 8px;
      margin-bottom: 15px;
      width: 100%;
      font-family: 'Courier Prime', monospace;
      border-radius: 5px;
    }

    input[type="number"] {
      width: 100px;
    }

    input[type="checkbox"],
    input[type="radio"] {
      width: auto;
      margin-right: 10px;
    }

    .radio-group,
    .checkbox-group {
      margin-bottom: 15px;
    }

    .radio-label,
    .checkbox-label {
      display: flex;
      align-items: center;
      margin-bottom: 5px;
    }

    button {
      background-color: var(--yellow);
      color: var(--black);
      border: none;
      border-radius: 5px;
      padding: 10px 20px;
      font-family: 'Courier Prime', monospace;
      font-weight: bold;
      cursor: pointer;
      margin-right: 10px;
    }

    button:hover {
      opacity: 0.9;
    }

    #result {
      border: 2px solid var(--yellow);
      padding: 20px;
      border-radius: 5px;
      margin-top: 20px;
      display: <?php echo $validated ? 'block' : 'none'; ?>;
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
</head>

<body>
  <h1>Registration for programming courses</h1>

  <form method="POST">
    <fieldset>
      <legend>Personal Information</legend>

      <label>
        Name:
        <input type="text" name="name" value="<?php echo $name ?? ''; ?>">
      </label>

      <label>
        Email:
        <input type="email" name="email" value="<?php echo $email ?? ''; ?>">
      </label>

      <label>
        Age:
        <input type="number" name="age" min="12" max="99" value="<?php echo $age ?? ''; ?>">
      </label>
    </fieldset>

    <fieldset>
      <legend>Course Selection</legend>

      <label>
        Course:
        <select name="course">
          <option value="">-- Select the course --</option>
          <option value="backend" <?php echo ($course ?? '') == 'frontend' ? 'selected' : ''; ?>>Front-End</option>
          <option value="frontend" <?php echo ($course ?? '') == 'backend' ? 'selected' : ''; ?>>Back-End</option>
          <option value="devops" <?php echo ($course ?? '') == 'devops' ? 'selected' : ''; ?>>DevOps</option>
          <option value="qa" <?php echo ($course ?? '') == 'qa' ? 'selected' : ''; ?>>QA</option>
        </select>
      </label>

      <div class="checkbox-group">
        <label class="checkbox-label">
          <input type="checkbox" name="experience" <?php echo isset($_POST['experience']) ? 'checked' : ''; ?>>
          I have programming experience
        </label>
      </div>

      <div class="radio-group">
        <p>Studying format:</p>
        <label class="radio-label">
          <input type="radio" name="format" value="online" <?php echo ($format ?? '') == 'online' ? 'checked' : ''; ?>>
          Online
        </label>
        <label class="radio-label">
          <input type="radio" name="format" value="offline" <?php echo ($format ?? '') == 'offline' ? 'checked' : ''; ?>>
          Offline
        </label>
      </div>

      <div class="errors">
        <?php if (isset($errors['name'])): ?>
          <span><?php echo $errors['name']; ?></span>
        <?php endif; ?>

        <?php if (isset($errors['email'])): ?>
          <span><?php echo $errors['email']; ?></span>
        <?php endif; ?>

        <?php if (isset($errors['age'])): ?>
          <span><?php echo $errors['age']; ?></span>
        <?php endif; ?>

        <?php if (isset($errors['course'])): ?>
          <span><?php echo $errors['course']; ?></span>
        <?php endif; ?>

        <?php if (isset($errors['format'])): ?>
          <span><?php echo $errors['format']; ?></span>
        <?php endif; ?>
      </div>
    </fieldset>

    <button type="submit">Send</button>
    <button type="reset">Clear</button>
  </form>

  <div id="result">
    <?php if ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
      <h2>Your information:</h2>
      <p><strong>Name:</strong> <?php echo $name; ?></p>
      <p><strong>Email:</strong> <?php echo $email; ?></p>
      <p><strong>Age:</strong> <?php echo $age; ?></p>
      <p><strong>Course:</strong>
        <?php
        switch ($course) {
          case 'backend':
            echo 'Back-End Development';
            break;
          case 'frontend':
            echo 'Fron-End Development';
            break;
          case 'devops':
            echo 'DevOps';
            break;
          case 'qa':
            echo 'QA';
            break;
          default:
            echo 'Not Selected';
        }
        ?>
      </p>
      <p><strong>Programming experience:</strong> <?php echo $experience; ?></p>
      <p><strong>Studying format:</strong> <?php echo $format == 'online' ? 'Online' : 'Offline'; ?></p>
    <?php endif; ?>
  </div>
</body>

</html>