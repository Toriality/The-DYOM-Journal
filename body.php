<?php 
  include './php/connect.php';
  $charset = $mysqli->set_charset('utf8');

  $id = $_GET['id'];

  $background_with_template = "./images/banner.png";
  $background_with_id = "./images/" . $id . ".jpg";

  if (file_exists($background_with_id)) {
    $background = $background_with_id;
  } else {
    $background = $background_with_template;
  }
  $result = $mysqli->query("SELECT * FROM articles WHERE id=" . $id);
  $row = $result->fetch_assoc()
?>
<article>
  <div id="background" style="background-image: url('<?=$background?>')" >
    <div id="title">
      <h1>The DYOM Journal #<?= $row['ID'] ?></h1>
      <h2><?= $row['Title'] ?></h2>
    </div>
  </div>
  <div id="content">
    <div id="text">
      <?= $row['Content'] ?>
    </div>
  </div>
</article>
