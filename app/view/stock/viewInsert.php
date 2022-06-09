
<!-- ----- début viewInsert -->
 
<?php 
require ($root . '/app/view/fragment/fragmentHeader.html');
?>

<body>
  <div class="container">
    <?php
      include $root . '/app/view/fragment/fragmentMenu.html';
      include $root . '/app/view/fragment/fragmentJumbotron.html';
    ?> 

    <form role="form" method='get' action='router2.php'>
      <div class="form-group">
        <input type="hidden" name='action' value='attribuerDoses'>
        <input type="hidden" name='centre_selectionne' value='<?php echo $_GET['centre_selectionne']; ?>'>
        
        <?php 
        
        foreach ($results as $id) {
            echo '<label for='.$id.'>Doses à ajouter au vaccin '.$id.' </label> <input type="text" name='.$id.'><br/>';
        }
        
        ?>
                     
      </div>
      <p/>
      <button class="btn btn-primary" type="submit">Go</button>
    </form>
    <p/>
  </div>
  <?php include $root . '/app/view/fragment/fragmentFooter.html'; ?>

<!-- ----- fin viewInsert -->



