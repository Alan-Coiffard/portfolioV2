<?php
$auth = 0;
  include 'lib/image.php';
  include 'lib/includes.php';


  $condition = '';
  $categorie = false;
  if (isset($_GET['categorie'])) {
    $slug = $db->quote($_GET['categorie']);
    $select = $db->query("SELECT * from categories where slug=$slug");
    if (!isset($_GET['categorie'])) {
      header("HTTP/1.1 301 Moved Permanently");
      header('Location:' . WEBROOT);
      die();
    }
    $categorie = $select->fetch();
    $condition = " where realisations.categorie_id={$categorie['id']}"; 
  }

  $works = $db->query("
    SELECT realisations.name, realisations.id, realisations.slug, realisations.image_id as image_id, images.name as image_name
    FROM realisations
    LEFT JOIN images ON images.id = realisations.image_id
    $condition
  ")->fetchAll();


  $categories = $db->query("SELECT * from categories")->fetchAll();

  if ($categorie) {
    $title = "Mes réalisations {$categorie['name']}";
  } else {
    $title = "Bienvenue sur mon portfolio";
  }


  $tests = $db->query("
    SELECT  realisations.categorie_id, COUNT(realisations.categorie_id) as Nb
    FROM    realisations
    GROUP BY categorie_id
  ")->fetchAll();

  include 'template/header.php';

?>



<div class="container">
  <div class="fond">
    <div class="starter-template text-center">
      <h1><?= $title; ?></h1>
    </div>
    <hr>
    <div class="starter-template text-center">
      <p class="mr-3">
        <a href="<?= WEBROOT; ?>" class="btn btn-info">Tout afficher</a>
      </p>
      <?php foreach ($categories as $categorie):?>
        <?php foreach ($tests as $test): ?>
          <?php if ($categorie['id'] == $test['categorie_id']) {
            $nb = $test['Nb'];
          } ?>          
        <?php endforeach ?>
        <p class="mr-3">
          <a href="<?= WEBROOT; ?>categorie/<?= $categorie['slug']; ?>" class="btn btn-success"><?= $categorie['name']; ?> <?php if($nb != null){echo '<span class="badge">'.$nb.'</span>';} ?></a>        
        </p>
        <?php $nb = null ?>
      <?php endforeach ?>
    </div>
  </div>
  
  <div class="fond">
    <div class="starter-template">
      <h1><?= $title; ?></h1>
    </div>
    <div class="starter-template">
      <?php foreach ($works as $k => $work): ?>
        <a class="image" href="<?= WEBROOT; ?>realisation/<?= $work['slug']; ?>">
          <?php if($work['image_id'] != null): ?>
            <img src="<?= WEBROOT; ?>img/works/<?= resizedName($work['image_name'], 150, 150); ?>" class="pic" alt="">
            <?php else : ?>
            <img src="<?= WEBROOT; ?>img/WIP-logo.png" height="150" width="150" class="pic" alt="">
          <?php endif ?>
          <h2><?= $work['name']; ?></h2>
        </a>
      <?php endforeach ?>
    </div>
  </div>
  


</div><!-- /.container -->

    
<?php require_once 'template/footer.php'; ?>