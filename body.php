<?php 
  include './php/connect.php';
  $charset = $mysqli->set_charset('utf8');

  if (isset($_GET['id'])) {
    // Sets the page ID parameter to variable called id
    $id = $_GET['id'];

    // If ID is not a number
    if (!ctype_digit($id)) {
      return include '404.php';
    };

    // SQL Query
    $result = $mysqli->query("SELECT * FROM articles WHERE id=" . $id);

    // If the id is a param but it is not defined
    // Or, if there is no article with defined ID
    if (empty($id) || $result->num_rows === 0) {
      return include '404.php';
    };

    // If there are not problems, render the articles from SQL query
    // Before, set background image
    $background_with_template = "./images/banner.png";
    $background_with_id = "./images/" . $id . ".jpg";
  
    if (file_exists($background_with_id)) {
      $background = $background_with_id;
    } else {
      $background = $background_with_template;
    }

    // Then, fetch results into a row variable
    $row = $result->fetch_assoc();

    // Finally, render article
    echo "<article>
    <div id=\"background\" style=\"background-image: url('" . $background . "')\">
      <div id=\"title\">
        <h1>The DYOM Journal #" . $row['ID'] . "</h1>
        <h2>" . $row['Title'] . "</h2>
      </div>
    </div>
    <div id=\"content\">
      <div id=\"text\">
        " . $row['Content'] . "
      </div>
    </div>
  </article>";
  } else {
    // If ID is not set into the URL params,
    // show all published articles from the database in a list
    return include '404.php'; // TODO
  };
