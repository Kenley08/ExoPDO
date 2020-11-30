<?php
    $xml=simplexml_load_file('clients.xml');
    $lesclients=$xml->client;
    foreach ($lesclients as $client) {
      //lesclients->attributes()->pin;
      if($client['pin']!='') $pin='('. $client['pin'].')';
      else $pin='';
      echo '<p><strong>client '. $client['idclient'] .'</strong></br>';
      echo 'Nom complet: ' .$client->nomcomplet .' ' . $pin .'</br>';
      echo 'ville: ' .$client->ville .'</p>';

    }
?>
