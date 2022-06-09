
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
        <input type="hidden" name='action' value='vaccinDosesUpdated'>
        <input type="hidden" name='label' value='<?php echo $_GET['label'];?>' style="width: 150px">
        <label for="id">Doses pour le vaccin <?php echo $_GET['label'] ?> : </label><input type="number" step='any' name='doses' placeholder='Nombre de doses à injecter' style="width: 150px">                
      </div>
      <p/>
      <button class="btn btn-primary" type="submit">Go</button>
    </form>
    <p/>
  </div>
  <?php include $root . '/app/view/fragment/fragmentFooter.html'; ?>

<!-- ----- fin viewInsert -->



