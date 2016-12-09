<?php
// on se connecte à MySQL
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=webservice;charset=utf8', 'root', '');
}

catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

if(isset($_POST) && !empty($_POST['login']) && !empty($_POST['password'])) {

  extract($_POST);
  // on recupére le password de la table qui correspond au login du visiteur
  $sql = "select * from clients where login='".$login."'";
  $response =  $bdd->query($sql);
  $data = $response->fetch();

  if($data['password'] != $password) {
    echo '<div class="alert alert-dismissable alert-danger">
  <button type="button" class="close" data-dismiss="alert">x</button>
  <strong>Oh Non !</strong> Mauvais login / password. Merci de recommencer !
</div>';
  }
  
  else {
	 
	$idclient = $data['id'];
	 
	$sqlnbr = "SELECT COUNT(*) as nbrobject FROM object WHERE id_clients=".$idclient."";
	$responsenbr =  $bdd->query($sqlnbr);
	$datanbr = $responsenbr->fetch();
	
	
    session_start();
    $_SESSION['login'] = $login;
	$_SESSION['idclients'] = $data['id'];
	$_SESSION['nbrobject'] = $datanbr['nbrobject'];
    
    echo '<div class="alert alert-dismissable alert-success">
  <button type="button" class="close" data-dismiss="alert">×</button>
  <strong>Yes !</strong> Vous etes bien connecté, Redirection dans 5 secondes ! <meta http-equiv="refresh" content="5; URL=dashboard">
</div>';

    header('Location: index.php');      
  }    

}

?>