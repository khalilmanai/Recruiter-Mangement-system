<?php 

error_reporting(E_ALL ^ E_NOTICE);?>
<div class="container">
  <div class="containerBee">
    <form id="event-form" style="margin :auto;" method="POST" action="index.php?controller=recruteur&action=created">
      <div class="fieldset-wrapper">
        <fieldset>
          <legend>Créer votre compte</legend>
        </fieldset>

        <div class="input-wrapper">
          <div class="input-wrapper">
            <label for="raison_social">Raison Social</label>
            <input type="text" id="raison_social" name="raison_social" required>
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
          <label for="num_siret">Numéro de Siret</label>
          <input type="number" id="num_siret" name="num_siret" required>
        </div>

        <div class="input-wrapper">
          <label for="nb_employe">Nombre d'Employe</label>
          <input type="number" id="nb_employe" name="nb_employe" required>
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
          <button class="login-trigger"  style="margin-bottom : 100px;" type="submit">Valider </button>
        </div>
      </div>
    </form>
  </div>
</div>




















