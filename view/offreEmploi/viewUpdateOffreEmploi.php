<?php 

error_reporting(E_ALL ^ E_NOTICE);
?>
<div class="container">
  <div class="containerBee">
    <form id="event-form" method="POST" action="index.php?controller=offreEmploi&action=updated">
      <div class="fieldset-wrapper">
        <fieldset>
          <legend> Modifier Une Offre d'Emploi</legend>
        </fieldset>

        <div class="input-wrapper">
          <div class="input-wrapper">
            <label for="date">Date</label>
            <input type="date" id="date" name="date" value="<?=$o->getDate()?>" required>
          </div>
          <div class="input-wrapper">
            <label for="date_exp">Date d'Expiration</label>
            <input type="date" id="date_exp" name="date_exp" value="<?=$o->getDateExp()?>" required>
          </div>
        </div>
        <div class="input-wrapper">
                <label for="description">Description</label>
                <textarea id="description" name="description" ><?=$o->getDescription()?></textarea>
            </div>

        <div class="fieldset-button">
          <button class="login-trigger" type="submit">Valider </button>
        </div>
      </div>
    </form>
  </div>
</div>