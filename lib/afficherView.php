<?php if (isset($_SESSION['Auth']) && $_SESSION['Auth']['username'] == 'admin'): ?>
      <a class="btn btn-success" href="<?= WEBROOT; ?>admin/realisations_edit.php?id=<?= $work_id; ?>&<?= csrf(); ?>">Modifier</a>
<?php endif ?>

<hr class="mt-2 mb-5">

<div id="galerie" class="blur galerie">
 <?php foreach($images as $k => $image): ?>
      <a href="<?= WEBROOT; ?>img/works/<?= $image['name']; ?>" class="d-block mb-4 h-100" data-toggle="lightbox" data-gallery="hidden-images" data-size="1600x1067">
            <img class="img-fluid img-thumbnail" src="<?= WEBROOT; ?>img/works/<?= $image['name']; ?>" alt="">
      </a>
<?php endforeach ?>
</div>