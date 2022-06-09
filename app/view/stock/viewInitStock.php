
<!-- ----- début viewId -->
<?php 
require ($root . '/app/view/fragment/fragmentHeader.html');
?>

<body>
  <div class="container">
      <?php
      include $root . '/app/view/fragment/fragmentMenu.html';
      include $root . '/app/view/fragment/fragmentJumbotron.html';
      
      

      // $results contient un tableau avec la liste des clés.
      ?>

    <form role="form" method='get' action='router2.php'>
      <div class="form-group">
        <input type="hidden" name='action' value='initStock'>
        <label for="vaccin">vaccin : </label> <select class="form-control" id='vaccin' name='vaccin' style="width: 100px">
            <?php
            foreach ($results as $id) {
             echo ("<option value=".$id['id'].">".$id['label']."</option>");
            }
            ?>
        </select>
        
        <label for="centre">centre : </label> <select class="form-control" id='centre' name='centre' style="width: 100px">
            <?php
            foreach ($results2 as $id) {
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

  <!-- ----- fin viewId -->
  
  