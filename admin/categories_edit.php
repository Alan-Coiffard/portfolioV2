<?php include '../lib/includes.php';

  if (isset($_POST['name']) AND isset($_POST['slug']))
  {
    checkCsrf();
    $slug = $_POST['slug'];
    if (preg_match('/^[a-z\-0-9]+$/', $slug)) 
    {
      $name = $db->quote($_POST['name']);
      $slug = $db->quote($_POST['slug']);
      if (isset($_GET['id'])) {
        $id = $db->quote($_GET['id']);
        $db->query("update categories set name=$name, slug=$slug where id=$id");

      }else {
        $db->query("insert into categories set name=$name, slug=$slug");
      }
      setFlash('La catégorie à bien été ajouter !');
      header('Location:categories.php');
      die();
    }else{
      setFlash('Le slug n\'est pas valide', 'danger');
    }
  }

  if(isset($_GET['id'])){
    $id = $db->quote($_GET['id']);
    $select = $db->query("select * from categories where id=$id");
    if ($select->rowCount() == 0) {
      setFlash('Il n\'y a pas de catégorie avec cet ID', 'danger');
      header('Location:categories.php');
      die();
    }
    $_POST = $select->fetch();
  }

  include '../template/admin_header.php'; 
?>

<div class="container">
  <div class="fond">
    <h2>Editer une catégorie</h2>
  
    <form action="#" method="post">
      <div class="form-group">
        <label for="name">Nom de la catégorie</label>
        <?php echo input('name'); ?>
      </div>
      <div class="form-group">
        <label for="slug">URL de la catégorie</label>
        <?= input('slug'); ?>
      </div>
      <?= csrfInput() ?>
      <?php if (isset($_GET['id'])){ ?>
        <button type="submit" class="btn btn-default">Editer</button>
        <?php }else { ?>
        <button type="submit" class="btn btn-default">Ajouter</button>
      <?php } ?>
    </form>  
  </div>
</div><!-- /.container -->

<?php include '../template/admin_footer.php'; ?>