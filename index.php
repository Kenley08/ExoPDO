<?php
  session_start();
  require_once "controlleur.php";
    require_once 'modele.php';
   //$id=isset($_GET['id']) ? $_GET['id'] : '' ;
  //   $cli=(object)['id_client'=>'','nom_complet'=>'jjj','ville'=>'','telephone'=>''];
   $id="023048884933";

   //1)-----utilisation de cookies pour le nombre de visites
  //   if (isset($_COOKIE['compteur']))
  //   {
  //         $message = "Vous etes deja venu ".$_COOKIE['compteur']." fois"."<br/>";
  //         $valeur = $_COOKIE['compteur'] + 1;
  //         modifiernbviews($valeur,$id);
  //       }
  //   else
  //   {
  //       $message = "Je vous met un petit cookie<br/>\n";
  //       $valeur = 1;
  //   }
  //     setCookie("compteur", $valeur);
  //     echo $message;


   //2_-----utilisation de sessions pour le nombre de visites
  if (!isset($_SESSION['cpt'])){
  $_SESSION['cpt']=0;
}  else{
  $valeur=$_SESSION['cpt']++;
  modifiernbviews($valeur,$id);
  echo "Vous avez vu cette page ".$_SESSION['cpt']." fois <br/>\n";
//  echo "Le SID courant est " . session_id();
}


    ?>

<html>
<head>
  <title>Gestion des clients</title>
  <meta charset="utf-8"/>
  <link rel="stylesheet" href="css/bootstrap-4.3.1-dist/css/bootstrap.min.css">
  <head>
  <body>

      <div class="container">
          <h1>Gestion Des Clients</h1>
          <form action="" method="get" class="form-inline">
          <input type="hidden" name="action" value="<?=$form_action?>">
            <input type="hidden" name="id" value="<?=$client->id_client?>">
            <input type="text" name="txtnomcomplet" class="form-control" placeholder="Nom Complet" value="<?=$client->nom_complet  ?>">
              <input type="text" name="txtville" class="form-control" placeholder="Ville" value="<?=$client->ville ?>">
                <input type="text" name="txttel" class="form-control" placeholder="telephone" value="<?=$client->telephone?>">
                <input type="submit" name="btnadd" value="<?php if($client->id_client==""){echo "Ajouter";}else{ echo "Modifier";}?>" class="btn btn-success"> &nbsp;

          </form>
        <table id="user_adr" class="table table-striped table-bordered">
            <tr>
              <th>ID</th>
                <th>NOM</th>
                  <th>VILLE</th>
                    <th>TEL</th>
            </tr>

            <?php foreach($clients as $c):?>
              <tr>
                  <td><?= $c->id_client ?></td>
                  <td><?= ucwords($c->nom_complet) ?></td>
                  <td><?= ucfirst($c->ville) ?></td>
                  <td><?= $c->telephone ?></td>
                    <td><a href="?action=del&id=<?=$c->id_client?>" class="btn btn-danger">
                      <span class="glyphicon glyphicon-minus-sign"></span>
                      <a></td>

                        <td><a href="?action=edit&id=<?=$c->id_client?>" class="btn btn-primary">
                          <span class="glyphicon glyphicon-edit"></span>
                          <a></td>
              </tr>
            <?php endforeach;?>
        </table>
      </div>
        <!-- <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script> -->

  </body>

</html>
