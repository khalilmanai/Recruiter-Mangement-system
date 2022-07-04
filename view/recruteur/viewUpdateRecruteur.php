<?php  ?>
<div class="container">
  <div class="containerBee">
    <form id="event-form" method="POST" action="index.php?controller=recruteur&action=updated">
      <div class="fieldset-wrapper">
        <fieldset>
          <legend>Modifier votre profil</legend>
        </fieldset>

        <div class="input-wrapper">
          <div class="input-wrapper">
            <label for="raison_social">Raison Social</label>
            <input type="text" id="raison_social" value="<?= $r->getRaisonSocial() ?>" name="raison_social">
          </div>
          <div class="input-wrapper">
            <label for="tel">Téléphone</label>
            <input type="text" id="tel" name="tel" value="<?= $r->getTel() ?>">
          </div>
        </div>

        <div class="input-wrapper">
          <label for="adresse">Adresse</label>
          <input type="text" id="adresse" name="adresse" value="<?= $r->getAdresse() ?>">
        </div>

        <div class="input-wrapper">
          <label for="num_siret">Numéro de Siret</label>
          <input type="number" id="num_siret" name="num_siret" value="<?= $r->getNumSiret() ?>">
        </div>

        <div class="input-wrapper">
          <label for="nb_employe">Nombre d'Employe</label>
          <input type="number" id="nb_employe" name="nb_employe" value="<?= $r->getNbEmploye() ?>">
        </div>

        <div class="fieldset-button">
          <button class="login-trigger" type="submit">Valider </button>
        </div>
      </div>
    </form>
  </div>
</div>