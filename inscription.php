
<?php



try	
{
    $bdd = new PDO('mysql:host=localhost;dbname=webservice;charset=utf8', 'root', '');
}

catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

  extract($_POST);
  // on recupére le password de la table qui correspond au login du visiteur
  $sql = "select login from clients where login='".$login."'";
  $response =  $bdd->query($sql);
  $data = $response->fetch();
  
  if($_POST["confirmpassword"] != $_POST["password"]){
 echo '<div class="alert alert-dismissable alert-danger">
  <button type="button" class="close" data-dismiss="alert">x</button>
  <strong>Oh Non !</strong> Mauvais mot de passe  / verif mot de passe . Merci de recommencer !
</div>';
header("refresh:5;url=inscription.html");
}else{
  if($data['login'] != $login){

     $query=$bdd->prepare('INSERT INTO clients (login, password)

        VALUES (:login, :password)');

    $query->bindValue(':login', $login, PDO::PARAM_STR);

    $query->bindValue(':password', $password, PDO::PARAM_STR);

        $query->execute();  
    
	echo '<div class="alert alert-dismissable alert-danger">
  <button type="button" class="close" data-dismiss="alert">x</button>
  <strong>Bien joue </strong> Felicitation vous etes enregistre 
</div>';
    header("refresh:5;url=connexionpage.php");

}else{
	echo '<div class="alert alert-dismissable alert-danger">
  <button type="button" class="close" data-dismiss="alert">x</button>
  <strong>Oh Non !</strong> Login deja pris ! veuillez changer ! 
</div>';
	header("refresh:5;url=inscription.html");
}
}	

?>