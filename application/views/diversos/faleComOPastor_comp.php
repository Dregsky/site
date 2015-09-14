<div id="content" class="container_12 clearfix">
    <div class="col-left">
         <?= form_open('pastor/enviarSenha', 'id="contact"'); ?>
            <fieldset>
                <label>Nome:<span class="required">*</span></label>
                <div class="inputShadow">
                    <input class="name" type="text" value="" size="30" name="nome" required>
                </div>

                <label>E-mail:<span class="required">*</span></label>
                <div class="inputShadow">
                    <input class="phone" type="email" value="" size="30" name="email" required>
                </div>

                <label>Assunto:<span class="required">*</span></label>
                <div class="inputShadow">
                    <input class="phone" type="text" value="" size="30" name="assunto" required>
                </div>

                <label>Mensagem:<span class="required">*</span></label>
                <div class="inputShadow">
                    <textarea rows="10" cols="60" name="mensagem" required></textarea>
                </div>
                <button class="png" name="submit" type="submit">Enviar</button>
            </fieldset>
        <?= form_close() ?>
    </div>
</div>