<div id="nav1">
    <ul class="menusm">
        <li><a href="<?= base_url() ?>">Site</a></li>
        <li><a id="principal" href="<?= base_url('departamento/' . $departamento) ?>">Principal</a></li>
        <li><a id="agenda" href="<?= base_url('departamento/' . $departamento . '/agenda') ?>">Agenda</a></li>
        <li><a id="fotos" href="<?= base_url('departamento/' . $departamento . '/fotos') ?>">Fotos</a></li>
        <li><a id="coordenacao" href="<?= base_url('departamento/' . $departamento . '/coordenacao') ?>">Coordenação</a></li>					
            <?php if ($departamento == 'EBD'): ?>
            <li><a target="_blank" href="http://www.virtualebd.com.br/">Virtual EBD</a></li>					
        <?php endif; ?>
        <li><a target="_blank" href="<?= base_url('restrito') ?>">Restrito</a></li>
    </ul>
</div>
