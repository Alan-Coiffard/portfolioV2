<?php include '../lib/includes.php';
 include '../template/admin_header.php'; ?>

 <?php 

  $noms = $db->query("SELECT * from comptes")->fetchAll();

 ?>

<div class="container">

  <div class="starter-template">
    <h1>Liste des comptes</h1>
  </div>

  <table class="table table-striped fond">
    <thead>
      <tr>
        <th>Id</th>
        <th>Login</th>
        <th>Nom</th>
        <th>Prénom</th>
        <th>E-mail</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($noms as $nom):?>.
      <tr>
        <td><?= $nom['id']; ?></td>
        <td><?= $nom['username']; ?></td>
        <td><?= $nom['nom']; ?></td>
        <td><?= $nom['prenom']; ?></td>
        <td><?= $nom['mail']; ?></td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>


</div><!-- /.container -->

    
<?php include '../template/admin_footer.php'; ?>