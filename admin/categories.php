<?php include '../lib/includes.php' ?>
<?php include '../template/admin_header.php'; 

  /**
   * SUPPERSSION
   */
  if (isset($_GET['delete'])) {
    checkCsrf();
    $id = $db->quote($_GET['delete']);
    $db->query("delete from categories where id=$id");   
    setFlash('La catégories à bien été supprimée'); 
    header('Location: categories.php');
    die();
  }

  /**
   * Categories
   */
  $select = $db->query('select id, name, slug from categories');
  $categories = $select->fetchAll();
?>

<div class="container">

  <div class="starter-template">
    <h1>Mon portfolio</h1>
  </div>

  <h2>Les catégories</h2>
  
  <p><a href="categories_edit.php" class="btn btn-success">Ajouter une nouvelle catégorie</a></p>

  <table class="table table-striped fond">
    <thead>
      <tr>
        <th>Id</th>
        <th>Nom</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($categories as $categories):?>.
      <tr>
        <td><?= $categories['id']; ?></td>
        <td><?= $categories['name']; ?></td>
        <td>
          <a class="btn btn-default" href="categories_edit.php?id=<?= $categories['id']; ?>">Edit</a>
          <a class="btn btn-error" onclick="return confirm('Voulez vous vraiment le supprimer ?!')" href="?delete=<?= $categories['id']; ?>&<?= csrf(); ?>">Supprimer</a>
        </td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
  


</div><!-- /.container -->

    
<?php include '../template/admin_footer.php'; ?>