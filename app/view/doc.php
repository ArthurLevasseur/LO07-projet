 
<!-- ----- debut de la page cave_acceuil -->
<?php include 'fragment/fragmentHeader.html'; ?>
<body>
  <div class="container">
    <?php
    include 'fragment/fragmentMenu.html';
    include 'fragment/fragmentJumbotron.html';
    ?>
      <h1>Documentation</h1>
      
      <h2>Pourcentage de doses disponibles par type de vaccin</h2>
      <p>Cette fonction permet de voir le pourcentage de doses disponible pour chaque type de vaccin. Lors de l'affichage de la quantité
      des doses, le total des doses tout vaccin confondu est calculé, ce qui permet d'afficher le pourcentage.</p>
      
      <h2>Rendez-vous à venir</h2>
      <p>Cette fonction permet d'afficher le nombre de rendez-vous pris dans chaque centre de vaccination.</p>
      
      <h2>Ajouter un vaccin à un centre</h2>
      <p>Cette fonction permet d'ajouter la possibilité d'attribuer des vaccins d'un type donnée à un centre. Sans cette fonction, l'ajout de vaccin ou de centre est inutile car
      si l'entrée d'un stock n'est pas dans la base de donnée, alors il est impossible d'ajouter des doses à un centre. Cette fonction permet donc d'attribuer
      tous les vaccins (présents dans la base de donnée dès le départ ou non) à tous les centres (présents dans la base de donnée dès le départ ou non).</p>
      
      <h1>Améliorations possibles</h1>
      
      <ul><li>Ajouter une partie qui s'occupe du suivi des rendez-vous. Actuellement les doses sont décomptées dès qu'un rendez vous est pris, mais il serait intéressant d'associer une date aux rendez-vous et de pouvoir décompter les doses seulement si le rendez-vous a été honoré.</li>
          <li>Pouvoir voir la part de personnes vaccinées parmis les patients (difficile car les vaccins ne demandent pas tous le même nombre de doses).</li>
          <li>Orienter le patient directement vers le centre le plus proche de chez lui.</li>
      </ul>
      
  </div>   
  
    
    
  <?php
  include 'fragment/fragmentFooter.html';
  ?>

  <!-- ----- fin de la page cave_acceuil -->

</body>
</html>