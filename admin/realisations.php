<?php include '../lib/includes.php' ?>
<?php include '../template/admin_header.php'; 

  /**
   * SUPPERSSION
   */
  if (isset($_GET['delete'])) {
    checkCsrf();
    $id = $db->quote($_GET['delete']);
    $db->query("delete from realisations where id=$id");   
    setFlash('La réalisation à bien été supprimée'); 
    header('Location: realisations.php');
    die();
  }

  /**
   * realisations
   */
  $select = $db->query('select id, name, slug from realisations');
  $realisations = $select->fetchAll();
?>

<div class="container">

  <div class="starter-template">
    <h1>Mon portfolio</h1>
  </div>

  <h2>Mes réalisations</h2>
  
  <p><a href="realisations_edit.php" class="btn btn-success">Ajouter une nouvelle réalisation</a></p>

  <table class="table table-striped fond">
    <thead>
      <tr>
        <th>Id</th>
        <th>Nom</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($realisations as $realisations):?>.
      <tr>
        <td><?= $realisations['id']; ?></td>
        <td><?= $realisations['name']; ?></td>
        <td>
          <a class="btn btn-default" href="realisations_edit.php?id=<?= $realisations['id']; ?>">Edit</a>
          <a class="btn btn-error" onclick="return confirm('Voulez vous vraiment le supprimer ?!')" href="?delete=<?= $realisations['id']; ?>&<?= csrf(); ?>">Supprimer</a>
        </td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
  


</div><!-- /.container -->

    
<?php include '../template/admin_footer.php'; ?>