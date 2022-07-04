<?php

error_reporting(E_ALL ^ E_NOTICE); ?>


<div class="container">
  <div class="containerBee">
    <form id="event-form" style="margin :auto;" method="POST" action="index.php?controller=candidat&action=created">
      <div class="fieldset-wrapper">
        <fieldset>
          <legend>Créer votre compte</legend>
        </fieldset>

        <div class="input-wrapper">
          <div class="input-wrapper">
            <label for="nom_prenom">Nom & Prénom</label>
            <input type="text" id="nom_prenom" name="nom_prenom" required>
          </div>
          <div class="input-wrapper">
            <label for="tel">Téléphone</label>
            <input type="text" id="tel" name="tel" required>
          </div>
        </div>
              
        <div class="input-wrapper">
          <label for="adresse">Adresse</label>
          <input type="text" id="adresse" name="adresse" required>
        </div>

        <div class="input-wrapper">
          <label for="ecole">Ecole</label>
          <input type="text" id="ecole" name="ecole" required>
        </div>

        <div class="input-wrapper">
          <label for="niveau_etude">Niveau d'Etude</label>
          <input type="number" id="niveau_etude" name="niveau_etude" required>
        </div>
            
        <div class="input-wrapper">
          <label for="nb_exp">Nombre d'Experience</label>
          <input type="number" id="nb_exp" name="nb_exp" required>
        </div>

        <div class="input-wrapper">
          <label for="login">Login</label>
          <input type="text" id="login1" name="login" required>
        </div>

        <div class="input-wrapper">
          <label for="Email">Email</label>
          <input type="email" id="email" name="email" required>
        </div>

        <div class="input-wrapper">
          <label for="pwd">Mot De Passe</label>
          <input type="password" id="pwd" name="pwd" required>
        </div>

        <div class="fieldset-button">
          <button class="login-trigger" style="margin-bottom : 100px;" type="submit">Valider </button>
        </div>
      </div>
    </form>
  </div>
</div>