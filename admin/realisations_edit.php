<?php include '../lib/includes.php';

/**
 * La sauvegarde
 */
  if (isset($_POST['name']) && isset($_POST['slug']))
  {
    checkCsrf();
    $slug = $_POST['slug'];
    if (preg_match('/^[a-z\-0-9]+$/', $slug)) 
    {
      $name = $db->quote($_POST['name']);
      $slug = $db->quote($_POST['slug']);
      $categorie_id = $db->quote($_POST['categorie_id']);
      $content = $db->quote($_POST['content']);
      /**
       * SAUVEGARDE DE LA REALISATION
       */
      
      if (!empty($_POST['pwd'])) {
        $pwd = sha1($_POST['pwd']);
        if (isset($_GET['id'])) {
          $id = $db->quote($_GET['id']);
          $db->query("update realisations set name=$name, slug=$slug, content=$content, categorie_id=$categorie_id, motdepasse='$pwd' where id=$id");
        }else {
          $db->query("insert into realisations set name=$name, slug=$slug, content=$content, categorie_id=$categorie_id, motdepasse='$pwd'");
          $_GET['id'] = $db->lastInsertId();
        }
      }else {
        if (isset($_GET['id'])) {
          $id = $db->quote($_GET['id']);
          $db->query("update realisations set name=$name, slug=$slug, content=$content, categorie_id=$categorie_id where id=$id");
        }else {
          $db->query("insert into realisations set name=$name, slug=$slug, content=$content, categorie_id=$categorie_id");
          $_GET['id'] = $db->lastInsertId();
        }
      }
      setFlash('La réalisation a bien été ajouter !');
      
      /**
       * ENVOIS DES IMAGES
       */
      $work_id = $db->quote($_GET['id']);
      $files = $_FILES['images'];
      $images = array();
      require '../lib/image.php';
      foreach($files['tmp_name'] as $k => $v){
        $image = array(
          'name' => $files['name'][$k],
          'tmp_name' => $files['tmp_name'][$k]
        );      
        $extension = pathinfo($image['name'], PATHINFO_EXTENSION);
        if (in_array($extension, array('jpg','png'))) {
          $db->query("insert into images set work_id=$work_id");
          $images_id = $db->lastInsertId();
          $image_name = $images_id . '.' . $extension;
          move_uploaded_file($image['tmp_name'], IMAGES . '/works/' . $image_name);
          resizeImage(IMAGES . '/works/' . $image_name, 150, 150);
          $image_name = $db->quote($image_name);
          $db->query("update images set name=$image_name where id = $images_id");
        }   
      }

      header('Location:realisations.php');
      die();
    }else{
      setFlash('Le slug n\'est pas valide', 'danger');
    }
  }

  /**
   * On récupère une réalisation
   */

  if(isset($_GET['id'])){
    $id = $db->quote($_GET['id']);
    $select = $db->query("select * from realisations where id=$id");
    if ($select->rowCount() == 0) {
      setFlash('Il n\'y a pas de réalisation avec cet ID', 'danger');
      header('Location:realisations.php');
      die();
    }
    $_POST = $select->fetch();
  }

  /**
   * Suppression d'une images
   */
    
  if (isset($_GET['delete_image'])) {
    checkCsrf();
    $id = $db->quote($_GET['delete_image']);
    $select = $db->query("select name, work_id from images where id=$id");
    $image = $select->fetch();
    var_dump($image['name']);
    $images = glob(IMAGES . '/works/' . pathinfo($image['name'], PATHINFO_FILENAME) . '_*x*.*');
    if (is_array($images)) {
      foreach ($images as $v) {
        unlink($v);
      }
    }
    unlink(IMAGES . '/works/' . $image['name']);
    $db->query("delete from images where id=$id");
    setFlash("L'image a bien été supprimée", "success");
    header('Location:realisations.php');
    die();
  }

  /**
   * Mise en avant d'une images
   */

  if (isset($_GET['highlight_image'])) {
    checkCsrf();
    $work_id = $db->quote($_GET['id']);
    $image_id = $db->quote($_GET['highlight_image']);
    $db->query("update realisations set image_id=$image_id where id=$work_id");
    setFlash("L'image à bien été mise en avant", 'success');
    header('Location:realisations_edit.php?id=' . $_GET['id']);
    die();
  }
  /**
   * Récupération de la liste des catégories
   */
  $select = $db->query('select id, name from categories order by name ASC');
  $categories = $select->fetchAll();
  $categories_list = array();
  foreach ($categories as $category) {
    $categories_list[$category['id']] = $category['name'];
  }

  /**
   * On récupère la liste des images
   */
  if (isset($_GET['id'])) {
    $work_id = $db->quote($_GET['id']);
    $select = $db->query("select id, name from images where work_id=$work_id");
    $images = $select->fetchAll();
  }else {
    $images = array();
  }
 


  include '../template/admin_header.php'; 
?>

<div class="container">
  <div class="fond">
  <h2>Editer une réalisation</h2>

  <div class="row">
    <form action="#" method="post" enctype="multipart/form-data">
      <div class="col-sm-8">
          <div class="form-group">
            <label for="name">Nom de la réalisation</label>
            <?= input('name'); ?>
          </div>
          <div class="form-group">
            <label for="slug">URL de la réalisation</label>
            <?= input('slug'); ?>
          </div>

          <p>
            <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
              Mettre en privé
            </button>
          </p>
          <div class="collapse" id="collapseExample">
            <div class="form-group">
              <label for="pwd">Entrez le mot de passe (non obligatoire)</label>
              <?= input('pwd'); ?>
            </div>
          </div>
          
          <div class="form-group">
            <label for="content">Contenu de la réalisation</label>
            <?= textarea('content'); ?>
          </div>
          <div class="form-group">
            <label for="categorie_id">Contenu de la réalisation</label>
            <?= select('categorie_id', $categories_list); ?>
          </div>
          
          <?= csrfInput() ?>
          <?php if (isset($_GET['id'])){ ?>
            <p>
              <button type="submit" class="btn btn-primary">Modifier</button>
            </p>
            <?php }else { ?>
            <p>
              <button type="submit" class="btn btn-primary">Ajouter</button>  
            </p>
          <?php } ?>
      </div>
      <div class="col-sm-4">
        <p><a href="#" class="btn btn-success" id="duplicatebtn">Ajouter une image</a></p>
        <div class="form-group">
          <input type="file" name="images[]">
          <input type="file" name="images[]" class="hidden" id="duplicate">
        </div>
        <?php foreach ($images as $k => $image): ?>
          <p>
            <img src="<?= WEBROOT; ?>img/works/<?= $image['name']; ?>" width="150" alt="">
            <a class="btn btn-danger" href="?delete_image=<?= $image['id']; ?>&<?= csrf(); ?>" onclick="return confirm('êtes vous sur ?')">Supprimer</a>
            <a class="btn btn-success" href="?highlight_image=<?= $image['id']; ?>&id=<?= $_GET['id']; ?>&<?= csrf(); ?>">Mettre à la une</a>
          </p>
        <?php endforeach ?>
        
        
      </div>
      </form>
    </div>    
  </div>
</div><!-- /<div class=""></div>container -->

<?php 
  $script = "
    <script>
      tinymce.init({
        selector: 'textarea'
      });
    </script>";
?>
<script type="text/javascript" src="<?= WEBROOT; ?>js/jquery.js"></script>
<script type="text/javascript">
  (function($) {

    $('#duplicatebtn').click(function(e){
      e.preventDefault();
      var $clone = $('#duplicate').clone().attr('id', '').removeClass('hidden');
      $('#duplicate').before($clone);
    })

  })(jQuery);
  
</script>
<?php include '../template/admin_footer.php'; ?>