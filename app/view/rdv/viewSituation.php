
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
    
      <?php if (empty($results['doses_necessaires'])) {
          $results['doses_necessaires'][0] = -1;
      }
      
      if (empty($results['injections_realisees'])) {
          $results['injections_realisees'] = 0;
      }
      
      if ($results['doses_necessaires'][0] == $results['injections_realisees']) {
          echo 'Ce patient est totalement vacciné.';
      } 
      
      else if ($results['injections_realisees'] == 0) {
          echo 'Ce patient n\'est pas vacciné.';
          ?>
      
      <form role="form" method='get' action='router2.php'>
      <div class="form-group">
        
      </div>
      <input name="action" type="hidden" value="prendrerdv">
      <?php echo '<input name="vaccin" type="hidden" value="nd">' ?>
      <?php echo '<input name="patient" type="hidden" value="'.$_GET['nom'].'">' ?>
      <?php echo '<input name="injection" type="hidden" value="0">' ?>
      <button class="btn btn-primary" type="submit">Obtenir un rendez-vous</button>
    </form>
      
      <?php
      }
      
      else {
          echo 'Ce patient n\'est pas vacciné.';
          ?>
      
      <form role="form" method='get' action='router2.php'>
      <div class="form-group">
        
      </div>
      <input name="action" type="hidden" value="completerrdv">
      <?php echo '<input name="vaccin" type="hidden" value="'.$results['vaccin_id'].'">' ?>
      <?php echo '<input name="patient" type="hidden" value="'.$_GET['nom'].'">' ?>
      <?php echo '<input name="injection" type="hidden" value="'.$results['injections_realisees'].'">' ?>
      <button class="btn btn-primary" type="submit">Obtenir un rendez-vous pour la dose suivante</button>
    </form>
      
      <?php
      }
      
      
      ?>
      
    
    <p/>
  </div>

  <?php include $root . '/app/view/fragment/fragmentFooter.html'; ?>

  <!-- ----- fin viewId -->