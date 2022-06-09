
<!-- ----- début viewAll -->
<?php

require ($root . '/app/view/fragment/fragmentHeader.html');
?>

<body>
  <div class="container">
      <?php
      include $root . '/app/view/fragment/fragmentMenu.html';
      include $root . '/app/view/fragment/fragmentJumbotron.html';
      ?>

    <table class = "table table-striped table-bordered">
      <thead>
        <tr>
          <th scope = "col">centre</th>
          <th scope = "col">vaccin</th>
          <th scope = "col">doses disponibles</th>
        </tr>
      </thead>
      <tbody>
          <?php
          
          // La liste des vins est dans une variable $results             
          foreach ($results as $element) {
           printf("<tr><td>%s</td><td>%s</td><td>%s</td></tr>", $element['centrelabel'], $element['vaccinlabel'], $element['quantite']);
          }
          ?>
      </tbody>
    </table>
  </div>
  <?php include $root . '/app/view/fragment/fragmentFooter.html'; ?>

  <!-- ----- fin viewAll -->
  
  
  