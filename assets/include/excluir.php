<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title">Excluir</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body" id="form-content">
        <?php
        include_once('functions.php');
        if (!empty($_POST)) {
            delete();
        } else {
        ?>
            <div class="alert alert-danger" role="alert">Tem Certeza Que Deseja Excluir Esse Cadastro?</div>

            <form method="POST" id="form_anunciante">
                <div class="d-none">
                    <input type="text" name="id" value="<?php echo  $_GET['id']; ?>">
                </div>
                <button type="submit" class="btn btn-block btn-danger">Excluir</button>

            </form>

            <script type="text/javascript">
                jQuery('#form_anunciante').submit(function(e) {
                    e.preventDefault();
                    jQuery.post('assets/include/excluir.php', jQuery(this).serialize())
                        .done(function(data) {
                            jQuery('#form-content').fadeOut('slow', function() {
                                jQuery('#form-content').fadeIn('slow').html(data);
                            });
                        })
                        .fail(function() {
                            alert('Ajax Submit Failed ...');
                        });
                });
            </script>
        <?php
        }
        ?>
    </div>
</div>