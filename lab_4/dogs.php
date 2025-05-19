<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Courier+Prime:ital,wght@0,400;0,700;1,400;1,700&family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  <title>Dogs Information</title>
</head>

<body>
  <main>
    <section>
      <h1>Dogs World</h1>
      <span>Everything about dogs.</span>
    </section>

    <div class="menu">
      <a href="#breeds">Breeds</a>
      <a href="#gallery">Gallery</a>
      <a href="#facts">Intersting Facts</a>
    </div>

    <section id="breeds">
      <h3>15 Most Popular Dog Breeds:</h3>

      <ul class="breeds-list">
        <li>
          <span class="highlight">Labrador Retriever</span>
          <div class="origin">Origin: Canada/UK</div>
        </li>
        <li>
          <span class="highlight">French Bulldog</span>
          <div class="origin">Origin: France</div>
        </li>
        <li>
          <span class="highlight">Golden Retriever</span>
          <div class="origin">Origin: Scotland</div>
        </li>
        <li>
          <span class="highlight">German Shepherd</span>
          <div class="origin">Origin: Germany</div>
        </li>
        <li>
          <span class="highlight">Poodle</span>
          <div class="origin">Origin: Germany/France</div>
        </li>
        <li>
          <span class="highlight">Bulldog</span>
          <div class="origin">Origin: England</div>
        </li>
        <li>
          <span class="highlight">Beagle</span>
          <div class="origin">Origin: England</div>
        </li>
        <li>
          <span class="highlight">Rottweiler</span>
          <div class="origin">Origin: Germany</div>
        </li>
        <li>
          <span class="highlight">Dachshund</span>
          <div class="origin">Origin: Germany</div>
        </li>
        <li>
          <span class="highlight">Pembroke Welsh Corgi</span>
          <div class="origin">Origin: Wales</div>
        </li>
        <li>
          <span class="highlight">Australian Shepherd</span>
          <div class="origin">Origin: United States</div>
        </li>
        <li>
          <span class="highlight">Yorkshire Terrier</span>
          <div class="origin">Origin: England</div>
        </li>
        <li>
          <span class="highlight">Boxer</span>
          <div class="origin">Origin: Germany</div>
        </li>
        <li>
          <span class="highlight">Siberian Husky</span>
          <div class="origin">Origin: Russia</div>
        </li>
        <li>
          <span class="highlight">Great Dane</span>
          <div class="origin">Origin: Germany</div>
        </li>
      </ul>
    </section>

    <section id="gallery">
      <h3>Gallery:</h3>
      <div class="gallery">
        <?php
        // Задаем путь к папке с изображениями
        $dir = 'images/';
        // Сканируем содержимое директории
        $files = scandir($dir);

        // Если нет ошибок при сканировании
        if ($files === false) {
          return;
        }

        for ($i = 0; $i < count($files); $i++) {
          // Пропускаем текущий каталог и родительский
          if (($files[$i] != ".") && ($files[$i] != "..")) {
            // Получаем путь к изображению
            $path = $dir . $files[$i];
            // Выводим картинку на экран
            echo '<img src="' . $path . '" alt="' . $files[$i] . '">';
          }
        } ?>
      </div>
    </section>

    <section id="facts">
      <h3>Interesting Facts:</h3>
      <div class="fact-item">
        <div class="fact-title"><span class="dog-paw">🐕</span> Nose Prints</div>
        <p>A dog's nose print is unique, much like a human's fingerprint, and can be used to identify them.</p>
      </div>

      <div class="fact-item">
        <div class="fact-title"><span class="dog-paw">🧠</span> Smart Pups</div>
        <p>The average dog is as intelligent as a 2-year-old child and can understand up to 250 words and gestures.</p>
      </div>

      <div class="fact-item">
        <div class="fact-title"><span class="dog-paw">👃</span> Super Sniffers</div>
        <p>A dog's sense of smell is 10,000 to 100,000 times more acute than humans, with some breeds having up to 300 million olfactory receptors.</p>
      </div>

      <div class="fact-item">
        <div class="fact-title"><span class="dog-paw">💓</span> Heartbeat Sync</div>
        <p>When dogs and humans gaze into each other's eyes, both experience a rise in oxytocin levels, the "love hormone".</p>
      </div>

      <div class="fact-item">
        <div class="fact-title"><span class="dog-paw">🌍</span> Ancient Companions</div>
        <p>Dogs were the first domesticated animals, with evidence suggesting they've lived with humans for over 15,000 years.</p>
      </div>

      <div class="fact-item">
        <div class="fact-title"><span class="dog-paw">🔄</span> Circling Instinct</div>
        <p>When dogs circle before lying down, they're following an ancient instinct to flatten grass and check for predators.</p>
      </div>

      <div class="fact-item">
        <div class="fact-title"><span class="dog-paw">👂</span> Ear Muscles</div>
        <p>Dogs have about 18 muscles controlling their ears, allowing for precise movements to locate sounds.</p>
      </div>

      <div class="fact-item">
        <div class="fact-title"><span class="dog-paw">🌡️</span> Temperature Sensors</div>
        <p>A dog's nose acts as an infrared sensor, detecting small changes in temperature which helps them locate warm-blooded prey.</p>
      </div>

      <div class="fact-item">
        <div class="fact-title"><span class="dog-paw">🏊</span> Not All Can Swim</div>
        <p>While many dogs can swim naturally, breeds like Bulldogs and Basset Hounds often struggle due to their body structure.</p>
      </div>

      <div class="fact-item">
        <div class="fact-title"><span class="dog-paw">🕰️</span> Time Perception</div>
        <p>Dogs can tell time through their amazing sense of smell - they detect how scent fades throughout the day to gauge time passed.</p>
      </div>

      <div class="fact-item">
        <div class="fact-title"><span class="dog-paw">😊</span> Smile Evolution</div>
        <p>Dogs may have evolved their "puppy dog eyes" expression specifically to communicate with humans.</p>
      </div>

      <div class="fact-item">
        <div class="fact-title"><span class="dog-paw">🧭</span> Magnetic Sensitivity</div>
        <p>Dogs prefer to poop aligned with the Earth's north-south magnetic field lines when the magnetic field is calm.</p>
      </div>

      <div class="fact-item">
        <div class="fact-title"><span class="dog-paw">💤</span> Dream Patterns</div>
        <p>Dogs experience similar sleep stages as humans, including REM sleep where they dream (you might see their paws twitch!).</p>
      </div>

      <div class="fact-item">
        <div class="fact-title"><span class="dog-paw">🎵</span> Musical Preferences</div>
        <p>Studies show dogs prefer reggae and soft rock over other music genres, with measurable relaxation effects.</p>
      </div>

      <div class="fact-item">
        <div class="fact-title"><span class="dog-paw">❤️</span> Health Benefits</div>
        <p>Petting a dog can lower your blood pressure, reduce stress hormones, and boost serotonin and dopamine levels.</p>
      </div>
    </section>

    <footer>
      USM &copy; <?php echo date("Y"); ?>
    </footer>
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

  h1,
  h2,
  h3 {
    color: var(--yellow);
    margin-bottom: 1rem;
    font-weight: 700;
    text-align: center;
  }

  section {
    border: solid 2px var(--dimmed-white);
    border-radius: 10px;
    padding: 1.5rem;
    width: 80%;
    max-width: 1000px;
  }

  .menu {
    display: flex;
    justify-content: center;
    gap: 1rem;
  }

  .menu a {
    color: var(--yellow);
    text-decoration: none;
    padding: 0.5rem 1rem;
    border: 1px solid var(--yellow);
    border-radius: 5px;
    transition: all 0.3s ease;
  }

  .menu a:hover {
    background-color: var(--yellow);
    color: var(--black);
  }

  .dog-image {
    max-width: 100%;
    height: auto;
    border-radius: 8px;
    margin: 1rem 0;
    border: 1px solid var(--dimmed-white);
  }

  ul {
    margin-left: 1.5rem;
    line-height: 1.8;
  }

  footer {
    margin-top: 3rem;
    padding: 1rem;
    text-align: center;
    border-top: 1px solid var(--dimmed-white);
    color: var(--dimmed-white);
    font-size: 0.9rem;
  }

  .breeds-list {
    list-style-type: none;
    counter-reset: breed-counter;
  }

  .breeds-list li {
    counter-increment: breed-counter;
    padding: 0.8rem 1rem;
    margin-bottom: 0.5rem;
    border-left: 3px solid var(--yellow);
    position: relative;
    transition: all 0.3s ease;
  }

  .breeds-list li:hover {
    background-color: var(--grey);
    transform: translateX(5px);
  }

  .breeds-list li::before {
    content: counter(breed-counter);
    color: var(--yellow);
    font-weight: bold;
    margin-right: 1rem;
  }

  .origin {
    color: var(--dimmed-white);
    font-size: 0.9rem;
    margin-top: 0.3rem;
    font-style: italic;
  }

  .highlight {
    color: var(--yellow);
    font-weight: bold;
  }

  .gallery {
    display: flex;
    justify-content: space-evenly;
    flex-wrap: wrap;
    gap: 1rem;
  }

  .gallery img {
    width: 300px;
    height: 200px;
    border: 1px solid var(--dimmed-white);
    border-radius: .5rem;
    object-fit: cover;
    scale: 1;
    transition: ease-in-out;
    transition-timing-function: cubic-bezier(0.19, 1, 0.22, 1);
    transition-duration: 200ms;
  }

  img:hover {
    scale: 1.1;
  }

  .fact-item {
    margin-bottom: 1.5rem;
    padding: 1rem;
    border-left: 3px solid var(--yellow);
    transition: all 0.3s ease;
  }

  .fact-item:hover {
    background-color: var(--grey);
    transform: translateX(5px);
  }

  .fact-title {
    color: var(--yellow);
    font-weight: bold;
    margin-bottom: 0.5rem;
    font-size: 1.1rem;
  }

  .dog-paw {
    color: var(--yellow);
    margin-right: 0.5rem;
  }
</style>