<div id="content" class="container_12 clearfix">
    <div class="">
        <?php
        $alert = $this->session->flashdata('alert');
        if ($alert != null) {
            echo process_alert($alert);
        }
        ?>
        <?= form_open('diversos/testemunho/cadastrar', 'id="contact"'); ?>
        <fieldset>
            <label>Nome:<span class="required">*</span></label>
            <div>
                <input class="name" title='Nome Obrigatório' type="text" 
                       value="" size="30" name="nomePessoa" required>
            </div>

            <label>Testemunho:<span class="required">*</span></label>
            <div>
                <input class="phone" title='Titulo Obrigatório' 
                       type="text" value="" size="30" name="nomeTestemunho" required>
            </div>

            <label>Descrição:<span class="required">*</span></label>
            <div>
                <textarea rows="10" cols="60" minlength="20" maxlength="2000" name="descricao" required></textarea>
            </div>
            <div class="row">
                <button class="btn btn-default" type="submit">Enviar</button>
            </div>
        </fieldset>
        <?= form_close() ?>
    </div>
</div>