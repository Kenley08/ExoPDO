<?php
      require_once 'modele.php';
        ////--1)Avec XMLwriter()

        // $xml= new XMLWriter();
        // $xml->openURI('clients.xml');
        // $xml->startDocument('1.0','utf-8');
        // $xml->startElement('mesclients');
        // $clients=getAllClients();
        // foreach($clients as $c):
        //       $xml->startElement('contact');
        //       $xml->writeAttribute('id',$c->id_client);
        //       $xml->writeElement('nom_complet',$c->nom_complet);
        //       $xml->writeElement('ville',$c->ville);
        //       $xml->writeElement('telephone',$c->telephone);
        //       $xml->endElement();
        // //  echo $c->id_client."</br>";
        // endforeach;
        //   $xml->endElement();
        //   $xml->endElement();
        //   $xml->flush();


        //2)--Avec DomDocument()
            $clients=getAllClients();
            if($clients){
              $document=new DomDocument();
              $document->preserveWhiteSpace=false;
              $document->formatOutput=true;
              // on crée la racine <lesClients> et on l'insère dans le document
              $lesclients=$document->createElement('lesclients');
              $document->appendChild($lesclients);
              //On boucle pour tous les Cients trouvés dans la BD
               foreach($clients as $unclient):
                $client=$document->createElement('client');
                $client->setAttribute('idclient',$unclient->id_client);
                $lesclients->appendChild($client);
                // on crée l'élément nom_complet et on l'ajoute à $clients
                $nomcomplet=$document->createElement('nomcomplet');
                $client->appendChild($nomcomplet);
                //on definit le texte nom complet pour client
                $textnom=$document->createTextNode(utf8_encode($unclient->nom_complet));
                $nomcomplet->appendChild($textnom);

                  // on crée l'élément ville et on l'ajoute à $clients
                  $ville=$document->createElement('ville');
                  $client->appendChild($ville);
                  //on definit le texte ville pour client
                  $textville=$document->createTextNode(utf8_encode($unclient->ville));
                  $ville->appendChild($textville);

               endforeach;
               $document->save('mesclients.xml');
               echo "Export XML fini !";
            }else{
              echo "Aucun client dans la base.";
            }




?>
