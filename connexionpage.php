<?php 
session_start(); 
if(isset($_SESSION['login']))
{
	$connect = 1;
}
if($connect = 1)
{
  session_destroy();
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Generateur</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	
	<link rel="stylesheet" type="text/css" href="css/connexion.css">
</head>
<body>

    <div class="container">
        <div class="card card-container">
            <!-- <img class="profile-img-card" src="//lh3.googleusercontent.com/-6V8xOA6M7BA/AAAAAAAAAAI/AAAAAAAAAAA/rzlHcD0KYwo/photo.jpg?sz=120" alt="" /> -->
            <img id="profile-img" class="profile-img-card" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" />
            <p id="profile-name" class="profile-name-card"></p>
            <form action="connexion.php" method="post" class="form-signin">
                <span id="reauth-email" class="reauth-email"></span>
                <input type="text" id="login" name="login" class="form-control" placeholder="identifiant" required autofocus>
                <input type="password" id="password" name="password" class="form-control" placeholder="mot de passe" required>
                <button class="btn btn-lg btn-success btn-block btn-signin" type="submit">connexion</button>
            </form><!-- /form -->
            <a href="inscription.html" class="forgot-password">
               Pas de compte ? inscivez vous 
            </a>
        </div><!-- /card-container -->
    </div><!-- /container -->
</body>
</html>