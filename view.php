<?php
  $auth = 0;
  include 'lib/image.php';
  include 'lib/includes.php';

  if (!isset($_GET['slug'])) {
    header("HTTP/1.1 301 Moved Permanently");
    header('Location:index.php');
    die();
  } 

  $slug = $db->quote($_GET['slug']);
  $select = $db->query("SELECT * from realisations where slug=$slug");
  if ($select->rowCount() == 0) {
    header("HTTP/1.1 301 Moved Permanently");
    header('Location:index.php');
    die();
  } 
  $work = $select->fetch();
  $work_id = $work['id'];

  $select = $db->query("SELECT * from images where work_id=$work_id");
  $images = $select->fetchAll();
  $title = $work['name'];

  include 'template/header.php';


?>

<!-- Page Content -->

<div class="container">
  <div class="fond">
    <div class="starter-template">
      <h1><?= $work['name'] ?></h1>
    </div>

    <?= $work['content']; ?>

    <?php if ($work['motdepasse'] == NULL || (isset($_SESSION['Auth']['username']) && $_SESSION['Auth']['username'] == 'admin')): ?>
      <?php include 'lib/afficherView.php'; ?>
    <?php else: ?>
      <?php if (isset($_POST['mdp'])): ?>
        <?php if ($work['motdepasse'] == sha1($_POST['mdp'])): ?>
          <?php include 'lib/afficherView.php'; ?>   
        <?php else: ?>
          <?php include 'lib/formpassword.php'; ?>       
        <?php endif ?>
      <?php else: ?>
        <?php include 'lib/formpassword.php'; ?>
      <?php endif ?>     
    <?php endif ?>
    
    </div>
  </div>
</div>

<!-- /.container -->
    
<?php require_once 'template/footer.php'; ?>
