<?php
class User {
  private $_nom_user;
  private $_mdp_user;
  private $_id_user;



  public function __construct($datas = ['nom_user' => '', 'mdp_user' =>'', 'id_user' => '']){

    $this->nom_user= $datas['nom_user'];
    $this->mdp_user = $datas['mdp_user'];

    $this->id_user = $datas['id_user'];
  }


    public function getIdUser(){
      return $this->id_user;
    }
  public function toHTML(){
    $html = '<td>'. htmlspecialchars($this->nom_user).'</td>';
    $html .= '<td>'. htmlspecialchars($this->mdp_user).'</td>';


return $html;
  }

  public function formulaireUser(){
    $html = sprintf('<h2><a href="form_jeu.php">Créer un jeu :</a></h2>')
    . sprintf('<h2><a href="listJeu.php">Voir les jeux :</a></h2>')

. sprintf('<h2><a href="form_user.php">Créer un utilisateur :</a></h2><br />')
    . sprintf('<label>Nom de l\'utilisateur : </label><input type="text" name="nom_user" /><br />',htmlspecialchars($this->nom_user))
    . sprintf('<label>Mot de passe: </label><input type="password" name="mdp_user" /><br />',htmlspecialchars($this->mdp_user))
          .sprintf(' <input type="submit" value="Valider" />', htmlspecialchars($this->submit));

return $html;
  }



  public function formulaireModifier($user){
    $html = sprintf('<h2><a href="../class.jeu.php">Créer un jeu :</a></h2>')
    . sprintf('<h2><a href="../listJeu.php">Voir les jeux :</a></h2>')
. sprintf('<h2><a href="form_user.php">Créer un utilisateur :</a></h2><br />')
.sprintf('<h2><a href="../listUser.php">Voir les utilisateur :</a></h2>')
    . sprintf('<label>Nom utilisateurs : </label><input type="text" name="nom_user" value="'.$this->nom_user.'" /><br />',htmlspecialchars($this->nom_user))
          .sprintf('<label>Mot de passes utilisateurs : </label><input type="text" name="mdp_user" value="'.$this->mdp_user.'" /><br />',htmlspecialchars($this->mdp_user))

          .sprintf(' <input type="submit" value="Modifier" />');

return $html;
  }


    public function formulaireSup($user){
      $html = sprintf('<h2><a href="../class.jeu.php">Créer un jeu :</a></h2>')
      . sprintf('<h2><a href="../listJeu.php">Voir les jeux :</a></h2>')
  . sprintf('<h2><a href="form_user.php">Créer un utilisateur :</a></h2><br />')
  .sprintf('<h2><a href="listUser.php">Voir les utilisateur :</a></h2>')
      . sprintf('<label>Nom utilisateurs : </label><input type="text" name="nom_user" value="'.$this->nom_user.'" /><br />',htmlspecialchars($this->nom_user))
            .sprintf('<label>Mot de passes utilisateurs : </label><input type="text" name="mdp_user" value="'.$this->mdp_user.'" /><br />',htmlspecialchars($this->mdp_user))

            .sprintf(' <input type="submit" value="Supprimer" />');

  return $html;
    }


      public function formulaireConnexionUser(){
        $html = sprintf('<h2><a href="form_jeu.php">Créer un jeu :</a></h2>')
        . sprintf('<h2><a href="listJeu.php">Voir les jeux :</a></h2>')

    . sprintf('<h2><a href="form_user.php">Créer un utilisateur :</a></h2><br />')
        . sprintf('<label>Nom de l\'utilisateur : </label><input type="text" name="nom_user" /><br />',htmlspecialchars($this->nom_user))
        . sprintf('<label>Mot de passe: </label><input type="password" name="mdp_user" /><br />',htmlspecialchars($this->mdp_user))
              .sprintf(' <input type="submit" value="Entrer" />', htmlspecialchars($this->submit));

    return $html;
      }

}
