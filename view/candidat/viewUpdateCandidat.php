<?php

error_reporting(E_ALL ^ E_NOTICE);
?>
<div class="container">
  <div class="containerBee">
    <form id="event-form" style="margin :auto;" method="POST" action="index.php?controller=candidat&action=updated">
      <div class="fieldset-wrapper">
        <fieldset>
          <legend>Mettre à jour mon profil</legend>
        </fieldset>

        <div class="input-wrapper">
          <div class="input-wrapper">
            <label for="nom_prenom">Nom & Prénom</label>
            <input type="text" id="nom_prenom" value= "<?=$c->getNomPrenom()?>" name="nom_prenom" >
          </div>
          <div class="input-wrapper">
            <label for="tel">Téléphone</label>
            <input type="text" id="tel" name="tel" value= "<?=$c->getTel()?>" >
          </div>
        </div>
              
        <div class="input-wrapper">
          <label for="adresse">Adresse</label>
          <input type="text" id="adresse" name="adresse" value= "<?=$c->getAdresse()?>">
        </div>

        <div class="input-wrapper">
          <label for="ecole">Ecole</label>
          <input type="text" id="ecole" name="ecole" value= "<?=$c->getEcole()?>">
        </div>

        <div class="input-wrapper">
          <label for="niveau_etude">Niveau d'Etude</label>
          <input type="number" id="niveau_etude" name="niveau_etude" value= "<?=$c->getNiveauEtude()?>" >
        </div>
            
        <div class="input-wrapper">
          <label for="nb_exp">Nombre d'Experience</label>
          <input type="number" id="nb_exp" name="nb_exp" value= "<?=$c->getNbExp()?>">
        </div>

        <div class="fieldset-button">
          <button class="login-trigger" style="margin-bottom : 100px;" type="submit">Valider </button>
        </div>
      </div>
    </form>
  </div>
</div>













