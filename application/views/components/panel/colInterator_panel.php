<h2 style="<?=$styleTitle?>"><?=$title?></h2>
<?php foreach ($rows as $i => $r) : ?>
<p style="<?= ($i%2)==0 ? $style1 : $style2 ?>"><?= htmlentities($r) ?></p>
<?php endforeach; ?>