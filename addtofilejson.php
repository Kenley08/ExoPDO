  <?php

    require_once "controlleur.php";
    require_once 'modele.php';
    $resultat[];
      foreach($clients as $c):
        $resultat[]=[
          "id_client"=>$c->id_client,
           "non_complet"=>$c->nom_complet,
           "ville"=>$c->ville,
           "telephone"=>$c->telephone
        ]
        $js=json_encode($resultat);
        file_put_contents('data.js',$js);
      endforeach;
    ?>
