<?php
/**
 * Page d'accueil de l'application web AppliFrais
 * @package default
 * @todo  RAS
 */
  $repInclude = './include/';
  require($repInclude . "_init.inc.php");

  // page inaccessible si visiteur non connecté
  if ( ! estVisiteurConnecte() )
  {
        header("Location: cSeConnecter.php");
  }
  require($repInclude . "_entete.inc.html");
  require($repInclude . "_sommaire.inc.php");


?>
  <!-- Division principale -->
  <div id="contenu">
      <h1>Fiche Véhicule</h1>
      <?php

       $req = obtenirInfoVH($idConnexion, obtenirIdUserConnecte());
            $idJeuEltsFraisForfait = mysqli_query($idConnexion, $req);
            echo mysqli_error($idConnexion);
            $vehi = mysqli_fetch_assoc($idJeuEltsFraisForfait);
            while ( is_array($vehi) ) {
                $txtMarque = $vehi["txtMarque"];
                $txtModele = $vehi["txtModele"];
                $txtAssurance = $vehi["txtAssurance"];
                $txtKM = $vehi["txtKM"];


?>
       <form id="" action="formValideVH.php" method="post">
      <div class="corpsForm">
      <p>
        <label for="txtMarque" >Marque :</label>
        <input type="text" id="txtMarque" name="txtMarque"  />
      </p>
      <p>
        <label for="txtModel" >Modèle : </label>
        <input type="text" id="txtModele" name="txtModele"/>
      </p>
       <p>
        <label for="txtAssurance" >Assurance : </label>
        <input type="text" id="txtAssurance" name="txtAssurance" />
      </p>
       <p>
        <label for="txtKM" >Kilomètres : </label>
        <input type="text" id="txtKM" name="txtKM"/>
      </p>
      </div>
      <div class="piedForm">
      <p>
        <input type="submit" id="ok" value="Valider" />
        <input type="reset" id="annuler" value="Effacer" />
      </p>
      </div>
      </form>

  </div>

  <h3>Test <?php echo htmlspecialchars($_POST['$txtAssurance']); ?></h3>
<?php
  require($repInclude . "_pied.inc.html");
  require($repInclude . "_fin.inc.php");
?>
