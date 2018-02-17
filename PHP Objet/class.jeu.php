<?php
class Jeu {
  private $_nomJeu;
  private $_editeur;
  private $_anneeSortie;
  private $_descriptif;
  private $_categorie;
  private $_duree;
  private $_nbrJoueur;
  private $_commentaire;
//  private $_submit;
  private $_id_jeu;
  public function __construct($data = ['nomJeu' => '', 'editeur'=> '', 'anneeSortie' => '', 'descriptif' => '', 'categorie' => '', 'duree' => '', 'nbrJoueur' => '', 'commentaire' => '', 'id_jeu' =>'']){
    $this->nomJeu= $data['nomJeu'];
    $this->editeur = $data['editeur'];
    $this->anneeSortie = $data['anneeSortie'];
    $this->descriptif = $data['descriptif'];
    $this->categorie = $data['categorie'];
    $this->duree= $data['duree'];
    $this->nbrJoueur = $data['nbrJoueur'];
    $this->commentaire = $data['commentaire'];
    $this->id_jeu = $data['id_jeu'];

  //  $this->submit = $date['submit'];
  }

  public function getIdJeu(){
    return $this->id_jeu;
  }


  public function formulaire(){
    $html = sprintf('<h2><a href="class.jeu.php">Créer un jeu :</a></h2>')
    . sprintf('<h2><a href="listJeu.php">Voir les jeux :</a></h2>')
. sprintf('<h2><a href="form_user.php">Créer un utilisateur :</a></h2><br />')
. sprintf('<label>Numéro du jeu : </label><input type="text" name="nom_jeu" /><br />',htmlspecialchars($this->id_jeu))
    . sprintf('<label>Nom du jeu : </label><input type="text" name="nom_jeu" /><br />',htmlspecialchars($this->nomJeu))
          .sprintf('<label>Editeur : </label><input type="text" name="editeur" /><br />',htmlspecialchars($this->editeur))
          .sprintf(' <label>Année de sortie : </label><input type="number" name="annee_sortie" /><br />',htmlspecialchars($this->anneeSortie))
          .sprintf(' <label>Descriptif: </label><input type="text" name="descriptif" /><br />',htmlspecialchars($this->descriptif))
          .sprintf(' <label>Catégorie :
                  <select name="categorie">
              <option value="familiale">Familiale</option>
              <option value="figurine">Figurine</option>
              <option value="gestion">Gestion</option>
              <option value="expert">Expert</option>
              <option value="apero">Apéro</option>
              </select><br />',htmlspecialchars($this->categorie))
          .sprintf('  <label>Durée en minutes : </label><input type="number" name="duree" /><br />',htmlspecialchars($this->duree))
          .sprintf('  <label>Nombre de joueurs : </label><input type="number" name="nbr_joueur" /><br />',htmlspecialchars($this->nbrJoueur))
          .sprintf('  <label>Commentaire : </label><textarea name="commentaire"></textarea><br />', htmlspecialchars($this->commentaire))
          .sprintf(' <input type="submit" value="Valider" />');

return $html;
  }

  public function formulaireModifier($jeu){
    $html = sprintf('<h2><a href="../class.jeu.php">Créer un jeu :</a></h2>')
    . sprintf('<h2><a href="../listJeu.php">Voir les jeux :</a></h2>')
. sprintf('<h2><a href="form_user.php">Créer un utilisateur :</a></h2><br />')
    . sprintf('<label>Nom du jeu : </label><input type="text" name="nom_jeu" value="'.$this->nomJeu.'" /><br />',htmlspecialchars($this->nomJeu))
          .sprintf('<label>Editeur : </label><input type="text" name="editeur" value="'.$this->editeur.'" /><br />',htmlspecialchars($this->editeur))
          .sprintf(' <label>Année de sortie : </label><input type="number" name="annee_sortie" value="'.$this->anneeSortie.'"/><br />',htmlspecialchars($this->anneeSortie))
          .sprintf(' <label>Descriptif: </label><input type="text" name="descriptif" value="'.$this->descriptif.'"/><br />',htmlspecialchars($this->descriptif))
          .sprintf(' <label>Catégorie :
                  <select name="categorie" value="'.$this->categorie.'">
              <option value="familiale">Familiale</option>
              <option value="figurine">Figurine</option>
              <option value="gestion">Gestion</option>
              <option value="expert">Expert</option>
              <option value="apero">Apéro</option>
              </select><br />',htmlspecialchars($this->categorie))
          .sprintf('  <label>Durée en minutes : </label><input type="number" name="duree" value="'.$this->duree.'"/><br />',htmlspecialchars($this->duree))
          .sprintf('  <label>Nombre de joueurs : </label><input type="number" name="nbr_joueur" value="'.$this->nbrJoueur.'"/><br />',htmlspecialchars($this->nbrJoueur))
          .sprintf('  <label>Commentaire : </label><textarea name="commentaire" value="'.$this->commentaire.'"></textarea><br />', htmlspecialchars($this->commentaire))
          .sprintf(' <input type="submit" value="Modifier" />');

return $html;
  }
  public function toHTML(){
    $html = '<td>'. htmlspecialchars($this->id_jeu).'</td>';
    $html = '<td>'. htmlspecialchars($this->nomJeu).'</td>';
    $html.= '<td>'. htmlspecialchars($this->editeur).'</td>';
    $html.= '<td>'.htmlspecialchars($this->anneeSortie).'</td>';
    $html.= '<td>'. htmlspecialchars($this->descriptif).'</td>';
    $html.= '<td>'. htmlspecialchars($this->categorie).'</td>';
    $html.= '<td style="text-align:center;">'.htmlspecialchars($this->duree).'</td>';
    $html.= '<td style="text-align:center;">'.htmlspecialchars($this->nbrJoueur).'</td>';
    $html.= '<td>'. htmlspecialchars($this->commentaire).'</td>';
return $html;
  }
  public function formulaireSup($jeu){
    $html = sprintf('<h2><a href="../class.jeu.php">Créer un jeu :</a></h2>')
    . sprintf('<h2><a href="../listJeu.php">Voir les jeux :</a></h2>')
. sprintf('<h2><a href="../class.user.php">Créer un utilisateur :</a></h2><br />')
    . sprintf('<label>Nom du jeu : </label><input type="text" name="nom_jeu" value="'.$this->nomJeu.'" /><br />',htmlspecialchars($this->nomJeu))
          .sprintf('<label>Editeur : </label><input type="text" name="editeur" value="'.$this->editeur.'" /><br />',htmlspecialchars($this->editeur))
          .sprintf(' <label>Année de sortie : </label><input type="number" name="annee_sortie" value="'.$this->anneeSortie.'"/><br />',htmlspecialchars($this->anneeSortie))
          .sprintf(' <label>Descriptif: </label><input type="text" name="descriptif" value="'.$this->descriptif.'"/><br />',htmlspecialchars($this->descriptif))
          .sprintf(' <label>Catégorie :
                  <select name="categorie" value="'.$this->categorie.'">
              <option value="familiale">Familiale</option>
              <option value="figurine">Figurine</option>
              <option value="gestion">Gestion</option>
              <option value="expert">Expert</option>
              <option value="apero">Apéro</option>
              </select><br />',htmlspecialchars($this->categorie))
          .sprintf('  <label>Durée en minutes : </label><input type="number" name="duree" value="'.$this->duree.'"/><br />',htmlspecialchars($this->duree))
          .sprintf('  <label>Nombre de joueurs : </label><input type="number" name="nbr_joueur" value="'.$this->nbrJoueur.'"/><br />',htmlspecialchars($this->nbrJoueur))
          .sprintf('  <label>Commentaire : </label><textarea name="commentaire" value="'.$this->commentaire.'"></textarea><br />', htmlspecialchars($this->commentaire))
          .sprintf(' <input type="submit" value="Supprimer" />');

return $html;
  }
}
