
<!-- ----- début viewInserted -->
<?php
require ($root . '/app/view/fragment/fragmentHeader.html');
?>

<body>
  <div class="container">
    <?php
    include $root . '/app/view/fragment/fragmentMenu.html';
    include $root . '/app/view/fragment/fragmentJumbotron.html';
    ?>
    <!-- ===================================================== -->
    <?php
    if ($results != -1) {
     echo ("<h3>Le vin a été supprimé </h3>");
     echo("<ul>");
     echo ("<li>id = " . $results . "</li>");
     echo("</ul>");
    } else {
     echo ("<h3>Problème de suppression du Vin, il est probable qu'il soit présent dans la table des récoltes.</h3>");
    }

    echo("</div>");
    
    include $root . '/app/view/fragment/fragmentFooter.html';
    ?>
    <!-- ----- fin viewInserted -->    

    
    