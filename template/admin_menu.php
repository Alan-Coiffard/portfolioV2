<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <img src="<?= WEBROOT; ?>img/logoBlanc.png" height="50vh">
      <?php if(!isset($_SESSION['Auth']['username'])): ?>
      <a class="navbar-brand" href="<?= WEBROOT; ?>">Mon portfolio</a>
      <?php else: ?>
        <a class="navbar-brand" href="<?= WEBROOT.'pagePerso.php'; ?>">Mon portfolio<?php echo ' - '.$_SESSION['Auth']['username']; ?></a>
      <?php endif ?>
      <?php include 'translate.php'; ?>
    </div>
    <div id="navbar" class="collapse navbar-collapse">
      <ul class="nav navbar-nav">
        <li class="active"><a href="<?= WEBROOT; ?>">Home</a></li>
        <li class="active"><a href="http://www.alan-coiffard.ovh">Présentation</a></li>
        <li class="active"><a href="<?= WEBROOT; ?>contact.php">Contact</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <?php if (isset($_SESSION['Auth'])): ?>
          <li class="active"><a href="<?= WEBROOT; ?>logout.php">Logout</a></li>
          <?php if ($_SESSION['Auth']['username'] == 'admin'): ?>
            <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Gestion<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="<?= WEBROOT; ?>admin/categories.php">Catégories</a></li>
                <li><a href="<?= WEBROOT; ?>admin/realisations.php">Réalisations</a></li>
                <li><a href="<?= WEBROOT; ?>admin/index.php">Liste des comptes</a></li>
              </ul>
            </li>
          <?php endif ?>
        <?php else : ?>
            <li class="active"><a href="<?= WEBROOT; ?>login.php">login</a></li>
        <?php endif ?>
      </ul>
    </div><!--/.nav-collapse -->
  </div>
</nav>


