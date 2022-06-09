
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
        <input type="hidden" name='action' value='ajouterRdvSuivant'>
        <?php echo '<input name="patient" type="hidden" value="'.$_GET['patient'].'">' ?>
        <?php echo '<input name="vaccin" type="hidden" value="'.$_GET['vaccin'].'">' ?>
        <?php echo '<input name="injection" type="hidden" value="'.$_GET['injection'].'">' ?>
        <label for="label">label : </label> <select class="form-control" id='centre_selectionne' name='centre_selectionne' style="width: 300px">
            <?php
            foreach ($results as $id) {
             echo ("<option value=".$id['id'].">".$id['label']."</option>");
            }
            ?>
        </select>
      </div>
      <p/>
      <button class="btn btn-primary" type="submit">Submit form</button>
    </form>
    <p/>
  </div>
  <?php include $root . '/app/view/fragment/fragmentFooter.html'; ?>

<!-- ----- fin viewInsert -->



