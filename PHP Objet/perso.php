
<?php



class Personnage{


  public $_force;
  public $_localisation;
  public $_experience;
  public $_degats;/*

  public function __construct($force)
  {
  	$this->setForce($force);
  	$this->setDegat($degats);
  	$this->_experience = 1;
  }*/
const FORCE_PETITE = 20;
const FORCE_MOYENNE = 50;
const FORCE_GRANDE = 80;

private static $_textADire ='Je vais tous vous tueur';

  public function __construct($forceInt){
  	$this->setForce($forceInt);
  }



  public function setForss($force){
  	if(in_array($force, [self::FORCE_PETITE, self::FORCE_MOYENNE, self::FORCE_GRANDE])){
  		$this->_force =$force;

  	}
  	return self::FORCE_GRANDE;

  }

  public function frapper(Personnage $persoAFrapper){
$persoAFrapper->_degats +=$this->_force;

  }
  /*
  public function gagnerExp(){

    $this->_experience = $this->_experience +1;
    $this->_experience++;
  }
*/
public function afficherExp(){
	return $this->_experience."\n";
}

  public static function parler(){
    echo('Je suis un pingouin.<br />');
  }

public function degats(){
	return $this->_degats;
	}

public function experience(){
	return $this->_experience;
	}
/*
public function setForce($force){
	if(!is_int($force)){
	trigger_error('La force doit etre un entier');
	return;
		}
	if($force >100)
	{
	trigger_error('La force ne peut excéder 100');
	return;
	}

	else{
		$this->_force =$force;
	}
}
*/

public function setForce ($force){

}

public function setExp($experience){
	if(!is_int($experience)){
	trigger_error('La force doit etre un entier');
	return;
		}
	if($experience >100)
	{
	trigger_error('L\'expérience ne peut excéder 100');
	return;
	}

	else{
		$this->_experience = $experience;
	}
}



public function setDegat($degats){
	if(!is_int($degats)){
	trigger_error('Degat doit etre un entier');
	return;
		}
	if($degats >100)
	{
	trigger_error('Degat ne peut excéder 100');
	return;
	}

	else{
		$this->_degats = $degats;
	}

}


public function force(){
	return $this->_force;
	}
}

$perso = new Personnage(Personnage:: FORCE_GRANDE);
$perso2=new Personnage(Personnage:: FORCE_PETITE);
$perso3=new Personnage(Personnage::FORCE_MOYENNE);

//$perso->gagnerExp();
$perso->afficherExp();
//$perso->parler();
Personnage::parler();
$perso->setForce(15);
$perso->setExp(25);
$perso->setDegat(42);

$perso->frapper($perso2);
//$perso->gagnerExp();
$perso->setForce(50);

$perso2->frapper($perso);
//$perso2->gagnerEXp();
$perso2->setForce(20);
$perso2->setExp(100);
$perso2->setDegat(78);

$perso3->setForss(91);

$persoAfrapper = 42;
//$persoAfrapper->_degats +=50;

echo 'Le personnage 1 a '. $perso->force(). ' de force, contrairement au personne 2 qui a ', $perso2->force(),' de force.<br />';
echo 'Le personnage 1 a ', $perso->experience(), ' d expérience, contrairement au personne 2 qui a ', $perso2->experience(),' d expérience.<br />';
echo 'Le personnage 1 a  ', $perso->degats(), ' de dégats, contrairement au personnage 2 qui a ', $perso2->degats(),' de dégats. <br />';
echo $perso->setForss($force);


?>
