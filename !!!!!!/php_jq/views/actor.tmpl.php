<?php include '_partials/header.php'; ?>

<div class="jumbotron">

  <h2>Информация об актере:<br><strong>
    <?php if ( $info  ) { echo $info[0]->first_name . ' ' . $info[0]->last_name; } ?>
  </strong></h2>

  <?php if ( $info ) : ?>

  <div class="alert alert-warning">
    <h3>Список фильмов, в которых снялся актер:</h3>

    <ul class="list">
      <?php
      foreach($info as $i) {
        echo "<li>" . $i->title . "</li>";
      }
      ?>
    </ul>
  </div>

  <?php else : ?>

  <div class="alert alert-warning">
    <p>Ничего не найдено!</p>
  </div>

  <?php endif; ?>

  <a class="btn" href="index.php">Назад</a>

</div>

<?php include '_partials/footer.php'; ?>