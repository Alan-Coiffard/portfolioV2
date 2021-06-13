<?php $auth = 0; 
	include 'lib/includes.php'; 
  	include 'template/header.php'; 
?>
<form action="#" method="post" class="fond">
	<div class="form-group">
		<label for="username">Nom d'utilisateur</label>
		<?= input('username'); ?>
	</div>
	<div class="form-group">
		<label for="password">Mot de passe</label>
		<input type="password" name="password" class="form-control" id="password">
	</div>
	<button type="submit" class="btn btn-default">Se connecter</button>
</form>

<?php 
	if (isset($_POST['username']) && isset($_POST['password'])) {
		$username = $db->quote($_POST['username']);
		$password = sha1($_POST['password']);
		$select = $db->query("select * from comptes where username=$username AND password='$password'");
		if ($select->rowCount() > 0) {
			$_SESSION['Auth'] = $select->fetch();
			setFlash('Vous êtes bien connecté');
			header('Location:'.WEBROOT);
			die();
		}
	}
?>

<?php include 'template/footer.php'; ?>
