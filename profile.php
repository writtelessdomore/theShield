<?php
// on se connecte à MySQL
session_start();
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=webservice;charset=utf8', 'root', '');
}

catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

extract($_POST);

	$idclient = $_SESSION['idclients'];
	 
	$sqlnbr = "SELECT password FROM clients WHERE id=".$idclient."";
	$responsenbr =  $bdd->query($sqlnbr);
	$datanbr = $responsenbr->fetch();

if( isset($newpassword) && $datanbr['password'] == $password) {
  
  $update = $bdd->prepare("UPDATE `clients` SET `password`=:password  WHERE id='".$idclient."'");
 
            try {
            $update->execute(array(':password' => $newpassword));
			}catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}
 
    
    echo '<div class="alert alert-dismissable alert-success">
  <button type="button" class="close" data-dismiss="alert">×</button>
  <strong>Yes !</strong> Vous avez bien change votre mot de passe veuillez vous reconnecter ! <meta http-equiv="refresh" content="5; URL=dashboard">
</div>';
	session_destroy();
    header('refresh:5;url=connexionpage.php');      
     

}else{
	   echo '<div class="alert alert-dismissable alert-success">
  <button type="button" class="close" data-dismiss="alert">×</button>
  <strong>Non</strong> Votre mot de passe actuel n est pas le bon  <meta http-equiv="refresh" content="5; URL=dashboard">
</div>';
header('refresh:5;url=modifprofile.php');     
}

?>