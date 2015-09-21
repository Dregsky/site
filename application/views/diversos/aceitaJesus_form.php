<div id="content" class="container_12 clearfix">
    <div class="">
        <?php
        $alert = $this->session->flashdata('alert');
        if ($alert != null) {
            echo process_alert($alert);
        }
        ?>
        <?= form_open('diversos/AceitaJesus/cadastrar', 'id="contact"'); ?>
        <fieldset>
            <label>Nome:<span class="required">*</span></label>
            <div>
                <input class="name" title='Nome Obrigatório' type="text" 
                       value="" size="30" name="nome" required>
            </div>
            <label>Email:<span class="required">*</span></label>
            <div>
                <input class="name" title='Email Obrigatório' type="email" 
                       value="" size="30" name="email" required>
            </div>

            <label>Telefone/Celular:<span class="required">*</span></label>
            <div>
                <input class="phone" title='Número obrigatório' type="text" 
                       value="" id="telefone" name="telefone" maxlength="15" placeholder="(99)9999-9999" required>
            </div>

            <div class="row">
                <button class="btn btn-default" name="" type="submit">Aceitar</button>
            </div>
        </fieldset>
        <?= form_close() ?>
    </div>
</div>
<script>
    function id(el) {
        return document.getElementById(el);
    }

    window.onload = function () {
        id('telefone').onkeyup = function () {
            mascara(this, mtel);
        }
    }
</script>    