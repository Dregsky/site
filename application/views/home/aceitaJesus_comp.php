<h2 style="margin-left: 13%;">Aceita Jesus</h2>
    <img src="<?= base_url('public/images/home/aceita_jesus.jpg') ?>" width="100" height="100" alt="image" style="float: left" />
    <span style="font-size:15px; color: #666666;">
        Eu aceito Jesus Cristo como único e suficiente Salvador e o declaro como Senhor da minha vida.
    </span>
    <form id="contact" name="formAceitaJesus" action="<?=base_url('diversos/AceitaJesus')?>" method="post">
        <fieldset>
            <div style="margin-left: 130px; ">
                <input 	type="checkbox" 
                        value="Eu aceito Jesus Cristo como único e suficiente Salvador e o declaro como Senhor da minha vida." 
                        name="aceitaJesus" required>
            </div>
            <button class="png" name="submit" type="submit">Aceitar Jesus</button>
        </fieldset>
    </form>