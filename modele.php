<?php

function connect_db()
{

//$stringcon="mysql:dbname=".db_client.";host=".localhost;
$stringcon="mysql:host=localhost;dbname=db_client";
try
{
  $connexion=new PDO($stringcon,"root","",array(PDO::ATTR_PERSISTENT =>true));
}
  catch(PDOException $e)
  {
      printf("Échec de la connexion : %s\n", $e->getMessage());
      exit();
    }
      return $connexion;
}

  //$pdo=new PDO("mysql:host=localhost;dbname=db_client","root","");

   function ajouterClient($id,$nom,$ville,$tel){
  //  global $pdo;
    $sql="insert into tblclient values(?,?,?,?)";
    $resultat=connect_db()->prepare($sql);
    $resultat->bindValue(1,$id,PDO::PARAM_STR);
    $resultat->bindValue(2,$nom,PDO::PARAM_STR);
    $resultat->bindValue(3,$ville,PDO::PARAM_STR);
    $resultat->bindValue(4,$tel,PDO::PARAM_STR);
    return $resultat->execute();
  }

   function supprimerClient($id){
  //  global $pdo;
    $sql="delete from tblclient where id_client=?";
    $resultat=connect_db()->prepare($sql);
    $resultat->bindValue(1,$id,PDO::PARAM_STR);
    return $resultat->execute();
  }

   function modifierClient($id,$nom,$ville,$tel){
  //  global $pdo;
    $sql="update tblclient set nom_complet=:nom,ville=:ville,telephone=:tel where id_client=:id";
    $resultat=connect_db()->prepare($sql);
    $id= filter_input(INPUT_GET, 'id');
    $resultat->bindValue('id',$id,PDO::PARAM_STR);
    $resultat->bindValue('nom',$nom,PDO::PARAM_STR);
    $resultat->bindValue('ville',$ville,PDO::PARAM_STR);
    $resultat->bindValue('tel',$tel,PDO::PARAM_STR);
    return $resultat->execute();
  }


     function modifiernbviews($nb,$id){
    //  global $pdo;
      $sql="update tbladmin set nombre_visite=:nb where id_admin=:id";
      $resultat=connect_db()->prepare($sql);
    //  $nb= filter_input(INPUT_GET, 'nb');
    //  $id= filter_input(INPUT_GET, 'id');
      $resultat->bindValue('nb',$nb,PDO::PARAM_INT);
      $resultat->bindValue('id',$id,PDO::PARAM_STR);
      return $resultat->execute();
    }


     function getClient($id){
    //  global $pdo;
      $sql="select * from tblclient where id_client=?";
      $resultat=connect_db()->prepare($sql);

      $resultat->execute([$id]);
      return $resultat->fetch(PDO::FETCH_OBJ);
    }

    function getAllClients(){
  //  global $pdo;
     $sql="select * from tblclient";
     $resultat=connect_db()->prepare($sql);

     $resultat->execute();
     return $resultat->fetchAll(PDO::FETCH_OBJ);
   }
?>
