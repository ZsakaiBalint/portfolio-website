<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">


<?php require __DIR__ . '/head.php'; ?>


<body>


<?php require __DIR__ . '/navbar.php'; ?>


<div class="container  text-center">
  <div class="col-12">
    <h1><i class="fa-solid fa-user"></i></h1>
    <h1 class="margin-bottom"><kbd> About me </kbd></h1>
  </div>
</div>


<!-- row 1 -->
<div class="container margin-top">
  <div class="row text-center">

    <div class="col-12 col-md-6">
      <img class="fluid-image img-rounded" src="images/about_1.jpg" alt="graduation">
    </div>

    <div class="col-12 col-md-6">
      <h2> <kbd>Rough start</kbd> </h2>
      <h3 class="roboto-mono-custom"> I began my journey into programming and advanced mathematics at university,
         despite having little prior knowledge. The challenges were significant, but I maintained a positive outlook, 
         focusing on growth and learning. Overcoming doubts and pushing through difficulties, I stayed determined 
         in my goal to become a software engineer. My persistence paid off, 
         and I proudly earned a Bachelor of Science degree in Computer Science. <br>(Budapest, Hungary - ELTE university - 2024)</h3>
    </div>

  </div>
</div>

<!-- row 2 -->
<div class="container margin-top">
  <div class="row text-center">

    <div class="col-12 col-md-6">
      <h2> <kbd>Programming full-time</kbd> </h2>
      <h3 class="roboto-mono-custom"> Since I turned 16, I gained various experiences by holding several
         student jobs during my summer breaks in high school and while attending university. 
         These experiences provided me with a broad skill set by the time I graduated. 
         Although I was initially uncertain about my career path, I ultimately chose the IT field 
         because of my long-standing passion for learning and creating. I aim to fully 
         realize my potential through the use of computers and automation.</h3>
    </div>

    <div class="col-12 col-md-6">
      <img class="fluid-image img-rounded" src="images/about_2.jpg" alt="graduation">
    </div>

  </div>
</div>


<!-- row 3 -->
<div class="container margin-top">
  <div class="row text-center">

    <div class="col-12 col-md-6">
      <img class="fluid-image img-rounded" src="images/about_3.jpg" alt="graduation">
    </div>

    <div class="col-12 col-md-6">
      <h2> <kbd>Student for life</kbd> </h2>
      <h3 class="roboto-mono-custom"> Understanding that a healthy mind thrives in a healthy body, 
        I enjoy spending my free time gardening and doing street workouts. 
        Staying active and engaging with others comes naturally to me! 
        I keep up with my studies at home while working full-time, though I don't plan to 
        pursue a master's degree in the near future.</h3>
    </div>

  </div>
</div>


<?php require __DIR__ . '/footer.php'; ?>


</body>

</html>