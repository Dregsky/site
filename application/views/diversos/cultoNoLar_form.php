<div id="content" class="container_12 clearfix">
    <div class="">
        <?php
        $alert = $this->session->flashdata('alert');
        if ($alert != null) {
            echo process_alert($alert);
        }
        ?>
        <?= form_open('diversos/CultoNoLar/enviarEmail', 'id="contact" onsubmit="return validaDataMaiorAtual()"'); ?>
        <fieldset>
            <label>Nome:<span class="required">*</span></label>
            <div>
                <input class="name" title='Nome Obrigatório' type="text" 
                       value="" size="30" name="nome" required>
            </div>

            <label>Data do Culto:<span class="required">*</span></label>
            <div>
                <input class="phone" title='Data Obrigatória' type="date" 
                       value="" onblur="validaDataMaiorAtual()"n name="data" required>
            </div>

            <label>Telefone/Celular:<span class="required">*</span></label>
            <div>
                <input class="phone" title='Número obrigatório' type="text" 
                       value="" id="telefone" name="telefone" maxlength="15" placeholder="(99)9999-9999" required>
            </div>

            <label>Endereço:<span class="required">*</span></label>
            <div>
                <textarea rows="5" cols="60" minlength=20 name="endereco" required></textarea>
            </div>

            <label>Informações Adicionais<span>(Opcional):</span></label>
            <div>
                <textarea rows="5" cols="60" name="info"></textarea>
            </div>
            <div class="row">
                <button class="btn btn-default" name="" type="submit">Enviar</button>
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