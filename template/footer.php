    <?php //include 'lib/debug.php'; ?>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>

    <script>window.jQuery || document.write('<script src="assets/js/vendor/jquery.min.js"><\/script>')</script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="<?php echo WEBROOT; ?>assets/js/ie10-viewport-bug-workaround.js"></script>
    <script type="text/javascript" src="<?= WEBROOT; ?>js/jquery.js"></script>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="<?php echo WEBROOT; ?>js/bootstrap.js"></script>
    
    <script src="<?php echo WEBROOT; ?>js/bootstrap.min.js"></script>

    <?php if (isset($scrit)) {
        echo $script;
    } ?>
    <script type="text/javascript" src="<?= WEBROOT; ?>js/tinymce/jquery.tinymce.min.js"></script>
    
    

    <script type="text/javascript">
        $(document).on('click', '[data-toggle="lightbox"]', function(event) {
                event.preventDefault();
                $(this).ekkoLightbox();
            });
    </script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.js"></script>
    


  </body>
</html>