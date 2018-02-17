<?php
/**************** CREE PAR MOUNIR R'QUIBA (MOON) (mounir.rquiba@gmail.com) ******************

     11/04/2010 !! COPYRIGHT !!
     A utiliser sans moderation :D
     CLASS ContactFormulaire PHP 5 POO , VERIFICATION , ENVOI DU MAIL
    /



class ContactFormulaireRquiba{
/*

     la proprité $nom défini le nom ou la raison social du contact
    /


    public $nom;

/*

     la proprité $mail défini l'adresse email du contact
    /


    public $mail;

/*

     la proprité $tel défini le numéro de telephone du contact
    /


    public $tel;

/*

     la proprité $sujet défini le sujet du message
    /


    public $sujet;

/*

     la proprité $message défini le message du contact
    /


    public $message;

/*

     la proprité $webmaster défini l'adresse email ou le message sera envoyé
    /


    public $webmaster;

/*

     la proprité $sendCheck est un valeur boolean qui valide l'envoi du mail
    /


    public $sendCheck = null;

/*

     la methode envoi_mail() envoi le mail
    /


    public function envoi_mail(){

       $contenu_message = "Nom : ".$this->nom."\nMail : ".$this->mail."\nSujet : ".$this->sujet."\nTelephone : ".$this->tel."\nMessage : ".$this->message;
	     $entete = "From: ".$this->nom." <".$this->mail."> \nContent-Type: text/html; charset=iso-8859-1";
       mail($this->webmaster,$this->sujet,$contenu_message,$entete);

	  }

/*

     la methode verif_null() verifie si la valeur de l'input et null
    /


    public function verif_null($var)
    {
      return (!empty($var))?$var:null;
    }

/*

     la methode verif_mail() verifie si la valeur de l'adresse email est correct.
    /


    public function verif_mail($var)
    {
      return (preg_match('#^[\w.-]+@[\w.-]+\.[a-zA-Z]{2,5}$#',$var))?$var:null;
    }
/*

     la methode verif_tel() verifie si la valeur du telephone est correct.
    /


    public function verif_tel($var)
    {
     return (preg_match('#^[0-9]{9,18}$#',$var))?$var:null;
    }

/*

     la methode inputTrue() permet de mettre en rouge les valeurs saisie incorrect.
     pour un $type = 1 => input simple
     pour un $type = 2 => input mail
     pour un $type = 3 => input tel
    /


    public function inputTrue($input,$type = '1'){

        $style_blanc = ' style = "font-family: verdana;border: solid #000000 1px;font-size: 8pt;color: #000000;background-color: #ffffff" ';
        $style_rouge = ' style = "font-family: verdana;border: solid #000000 1px;font-size: 8pt;color: #000000;background-color: #ff0000" ';
        $test = null;
        if(isset($_POST['nom'])){

        switch($type){
            case '1': $test = $this->verif_null($input);
            break;

            case '2': $test = $this->verif_mail($input);
            break;

            case '3': $test = $this->verif_tel($input);
            break;
        }

        if(empty($test)){
              echo $style_rouge;
           }else{
              echo $style_blanc;
           }
        }

    }

/*

     la methode loadForm() permet le chargement des données du formulaire dans chaque propriété de l'objet.
     $data => tableau du formulaire de contact $_POST
    /


    public function loadForm($data){
        extract($data);
        $this->nom      = trim(htmlentities($nom, ENT_QUOTES));
        $this->mail     = $this->verif_mail($mail);
        $this->tel      = $this->verif_tel($tel);
        $this->sujet    = trim(htmlentities($sujet, ENT_QUOTES));
        $this->message  = trim(htmlentities($message, ENT_QUOTES));
        $test = $this->testForm();
        if(!empty($test)){
           $this->envoi_mail();
           $this->printForm();
           $this->sendCheck = 1;
        }else{
            echo '<div style="padding:5px;border:solid 2px #FF0000;background-color:#FEDFDF;width:600px;color:#ff0000;" >';
              echo 'Veuillez correctement remplir les champs en rouge.';
            echo '</div>';
        }
    }

/*

     la methode printForm() Affiche le résultat final du mail envoyé.
    /


    public function printForm(){
      echo '<div style="padding:2px;margin:2px;" >';
        echo '<h2>Votre message a bien été envoyé</h2>';
        echo '<a href="./">Envoyer un nouveau message</a><br />';
        echo '<a href="./">Retour á la page d\'accueil</a><br />';
      echo '</div>';
      echo '<div style="padding:2px;border:solid 2px #000000;background-color:#000001;width:600px;color:#ffffff;" >';
        echo 'Contenu de votre message envoyé ';
      echo '</div>';
      echo '<div style="padding:2px;border:solid 2px #000000;background-color:#CDE9E5;width:600px;" >';
        echo '<ul><li><b>Votre nom / Raison Social : </b>'.$this->nom.'</li>';
        echo '<li><b>Votre mail : </b>'.$this->mail.'</li>';
        echo '<li><b>Telephone : </b>'.$this->tel.'</li>';
        echo '<li><b>Sujet : </b>'.$this->sujet.'</li>';
        echo '<li><b>Votre message : </b>'.$this->message.'</li></ul>';
      echo '</div>';
    }

/*

     la methode testForm() renvoi 1 si les toutes les données du fomulaire sont corrécts sinon NULL.
    /


    public function testForm(){
       if($this->verif_null($this->nom) and $this->verif_null($this->mail) and $this->verif_null($this->tel) and $this->verif_null($this->sujet) and $this->verif_null($this->message)){
          if($this->verif_mail($this->mail) and $this->verif_tel($this->tel)){
              return 1;
          }
          return NULL;
       }
       return NULL;
    }

}

?>
<?php
/**************** CREE PAR MOUNIR R'QUIBA (MOON) (mounir.rquiba@gmail.com) ******************

     11/04/2010 !! COPYRIGHT !!
     A utiliser sans moderation :D
     index.php, PHP5 POO , VERIFICATION , ENVOI DU MAIL
    /



include 'ContactFormulaireRquiba.php';

/*

     Création de l'objet concact.
    /


$contact = new ContactFormulaireRquiba();

/*

     Chargement de la propiété webmaster qui est le destinataire du mail.
    /


$contact->webmaster = 'mounir@rquiba.com'; // Veuillez indiquez votre adresse email

/*

     Verification d'une action sur le formuilaire de contact.
    /


if(isset($_POST['nom'])){
    $contact->loadForm($_POST);
}

/*

     $send = null => Formulaire incomplet
     $send = 1 => Formulaire complet
    /


$send = $contact->sendCheck;

/*

     Si $send est null on affiche le formulaire de contact
    /


if(empty($send)){

?>
<?php /* FORMULAIRE DEBUT */ ?>
<div style="width:600px;padding:5px;">
<form method="post">
  <table width="100%" height="317" border="0">
    <tr>
      <td width="30%" align="right" valign="middle">
	      &nbsp;&nbsp;
      </td>
      <td width="70%">
	      <b>Soit</b> <a href="mailto:<?php echo $contact->webmaster; ?>">cliquer ici pour envoyer un mail directement</a><br />
        <b>Ou</b> veuillez remplir le formulaire de contact :<br />
	    </td>
    </tr>
    <tr>
      <td width="30%" align="right" valign="middle">
	      <font size="3" face="Verdana, Arial, Helvetica, sans-serif">Votre nom / Raison social <b>*</b> :</font>
      </td>
      <td width="60%">
	      <input type="text" name="nom"  size="50" <?php $contact->inputTrue($contact->nom); ?> value="<?php echo $contact->nom; ?>/>
	    </td>
    </tr>
    <tr>
      <td align="right" valign="middle">
	      <font size="3" face="Verdana, Arial, Helvetica, sans-serif">Votre mail <b>*</b> :</font></td>
      <td>
	      <input type="text" name="mail" size="50" <?php $contact->inputTrue($contact->mail,'2'); ?> value="<?php echo $contact->mail; ?>" />
      </td>
    </tr>
    <tr>
      <td align="right" valign="middle">
        <font size="3" face="Verdana, Arial, Helvetica, sans-serif">Tel <b>*</b> :</font></td>
      <td>
	      <input type="text" name="tel" size="20" <?php $contact->inputTrue($contact->tel,'3'); ?> value="<?php echo $contact->tel; ?>" />
      </td>
    </tr>
      <td  align="right" valign="middle">
	      <font size="3" face="Verdana, Arial, Helvetica, sans-serif">Sujet <b>*</b> :</font>
      </td>
      <td>
	      <input type="text" name="sujet" size="50" <?php $contact->inputTrue($contact->sujet); ?> value="<?php echo $contact->sujet; ?>" />
      </td>
    </tr>
    <tr>
      <td height="181" align="right" valign="top">
	      <font size="3" face="Verdana, Arial, Helvetica, sans-serif">Message  <b>*</b>  : </font>
      </td>
      <td valign="top">
        <textarea name="message"  cols="47" <?php $contact->inputTrue($contact->message); ?> rows="10" ><?php echo $contact->message; ?></textarea>
      </td>
    </tr>
    <tr>
      <td>
        &nbsp;
      </td>
      <td valign="TOP">
	      (<b>*</b>) Champ obligatoire.
      </td>
    </tr>
    <tr>
      <td>
        &nbsp;
      </td>
      <td valign="TOP">
	      <input type="submit" style = "font-family: verdana;padding: 5px 45px 5px 45px;border: solid #000000 2px;font-size: 8pt;color: #ffffff;background-color: #32269F"  name="envoyer" value="Envoyer" />
      </td>
    </tr>
  </table>
</form>
</div>
<?php
?>
<?php /* FOMULAIRE FIN*/ ?>
