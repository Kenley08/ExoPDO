<?php
require_once "modele.php";
  $action=isset($_GET['action']) ? $_GET['action'] : '' ;
  $client=(object)array('id_client'=>'','nom_complet'=>'','ville'=>'','telephone'=>'');
  $form_action='add';
  switch ($action) {
    case 'add':
    $id=time()."".rand(1,100);
    $nomcom=$_GET['txtnomcomplet'];
    $ville=$_GET['txtville'];
    $tel=$_GET['txttel'];
    ajouterClient($id,$nomcom,$ville,$tel);
  //  $nom=$_GET['txtnomcomplet'];
      break;

      case 'del':
          $id=$_GET['id'];
          supprimerClient($id);
        break;

        case 'edit':
          $id=$_GET['id'];
          $client=getClient($id);
          
          $form_action='update';
          break;

          case 'update':
          $id=$_GET['id'];
          $nomcom=$_GET['txtnomcomplet'];
          $ville=$_GET['txtville'];
          $tel=$_GET['txttel'];
          modifierClient($id,$nomcom,$ville,$tel);
            break;
}
$clients=getAllClients();

?>
