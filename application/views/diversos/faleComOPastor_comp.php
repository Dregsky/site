<div id="content" class="container_12 clearfix">
    <div class="">
        <?php
        $alert = $this->session->flashdata('alert');
        if ($alert != null) {
            echo process_alert($alert);
        }
        ?>
        <?= form_open('diversos/pastor/enviarEmail', 'id="contact"'); ?>
        <fieldset>
            <label>Nome:<span class="required">*</span></label>
            <div>
                <input class="name" title='Nome Obrigatório' type="text" 
                       value="" size="30" name="nome" required>
            </div>

            <label>E-mail:<span class="required">*</span></label>
            <div>
                <input class="phone" title='Email Obrigatório' type="email" 
                       value="" size="30" name="email" required>
            </div>

            <label>Assunto:<span class="required">*</span></label>
            <div>
                <input class="phone" title='Assunto Obrigatório' 
                       type="text" value="" size="30" name="assunto" required>
            </div>

            <label>Mensagem:<span class="required">*</span></label>
            <div>
                <textarea rows="10" cols="60" minlength="20" name="mensagem" required></textarea>
            </div>
            <div class="row">
                <button class="btn btn-default" name="submit" type="submit">Enviar</button>
            </div>
        </fieldset>
        <?= form_close() ?>
    </div>
</div>