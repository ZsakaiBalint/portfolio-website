<?php
if(!defined('APP_ACCESS')) { 
    http_response_code(404);
    header("Location: /error");
    die();
}
?>

<?php 
require "partials/head.php";
?>

<?php 
require "partials/nav.php";
?>

<link rel="stylesheet" href="styles/about.css">

<body>

<div class="container  text-center">
  <div class="col-12">
    <h1 class="emoji">👨‍💻</h1>
    <h1 class="margin-bottom"><kbd> Rólam </kbd></h1>
  </div>
</div>

<div class="container margin-top">
  <div class="row text-center">

    <div class="col-12 col-md-6">
      <img class="fluid-image img-rounded" src="../images/about_1.jpg" alt="graduation">
      <label> kép forrása: <br>
        https://www.facebook.com/groups/elteikbsc?locale=hu_HU
      </label>
    </div>

    <div class="col-12 col-md-6">
      <h1 class="emoji">🎓</h1>
      <h1> <kbd>Át kell esni a szakma kezdeti nehézségein.</kbd> </h1> 
      <h3 class="roboto-mono-custom"> 
        Diplomát szereztem 2024 nyarán az ELTE programtervező informatikus alapképzésén.
        Az egyetem alatt sokat tanultam, többek között saját magamról is.
      </h3>
    </div>

  </div>
</div>

<div class="container margin-top">
  <div class="row text-center">

    <div class="col-12 col-md-6">
      <h2 class="emoji">💡</h2>
      <h2> <kbd>Ebben a szakmában mindig kell tanulni.</kbd> </h2>
      <h3 class="roboto-mono-custom">
        Ezzel ellentétben számomra az egyszerűségre törekvés határozza meg a jó szoftverfejlesztőket.
        Gyakran tapasztalom, hogy könnyű a részletekben és új technológiák választékában elveszni.
        Jelenleg a PHP nyelvet tanulom, ezen a nyelven írtam ezt a weboldalt is.
      </h3>
    </div>

    <div class="col-12 col-md-6">
      <img class="fluid-image img-rounded" src="../images/about_2.jpg" alt="graduation">
      <label> kép forrása: <br>
        ...
      </label>
    </div>

  </div>
</div>

<div class="container margin-top">
  <div class="row text-center">

    <div class="col-12 col-md-6">
      <img class="fluid-image img-rounded" src="../images/about_3.jpg" alt="graduation">
      <label> kép forrása: <br>
        ...
      </label>
    </div>

    <div class="col-12 col-md-6">
      <h2 class="emoji"> 🌐 </h>
      <h2> <kbd>Egy közösség tagjaként</kbd> </h2>
      <h3 class="roboto-mono-custom">
        Azok a programozók, akik jól boldogulnak munkájuk során, nem létezhetnek vákumban.
        Egy programozónak meglepően sok soft-skillre van szüksége.
        Ilyenek a kommunikáció, csapatmunka és az alkalmazkodóképesség. 
        Hogy ezeket a készségeimet is fejleszteni tudjam, beléptem a 
        <a href="https://www.growmesh.io/" target="_blank">mesh.</a>
        nevű mérnökcsapatba. Itt mindig igyekszünk egymásnak szakmai segítséget nyújtani.
      </h3>
    </div>

  </div>
</div>

</body>


<?php 
require "partials/footer.php";
?>


</html>