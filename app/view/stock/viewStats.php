
<!-- ----- début viewAll -->
<?php

require ($root . '/app/view/fragment/fragmentHeader.html');
?>

<body>
  <div class="container">
      <?php
      include $root . '/app/view/fragment/fragmentMenu.html';
      include $root . '/app/view/fragment/fragmentJumbotron.html';
      $total = 0;
      
      foreach ($results as $element) {
           $total = $total+$element['total'];
          }
      ?>

    <table class = "table table-striped table-bordered">
      <thead>
        <tr>
          <th scope = "col">vaccin</th>
          <th scope = "col">doses</th>
          <th scope = "col">pourcentage de doses</th>
        </tr>
      </thead>
      <tbody>
          <?php
          
          // La liste des vins est dans une variable $results             
          foreach ($results as $element) {
           printf("<tr><td>%s</td><td>%d</td><td>%f</td></tr>", $element['label'], $element['total'], $element['total']/$total*100);
          }
          ?>
      </tbody>
    </table>
  </div>
  <?php include $root . '/app/view/fragment/fragmentFooter.html'; ?>

  <!-- ----- fin viewAll -->
  
  
  