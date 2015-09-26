<?php
$altura = isset($altura) ? $altura : '600';
$largura = isset($largura) ? $largura : '940';
$tipos= array('MONTH', 'WEEK', 'AGENDA');
$tipo = isset($tipo) ? $tipo : 'MONTH';

if(!in_array($tipo, $tipos)){
    $tipo = 'MONTH';
}

if (strlen($agenda) > 100) {
    ?>
    <?= $agenda; ?>
<?php } else { 
   echo '<iframe src="https://www.google.com/calendar/embed?showTitle=0&amp;showCalendars=0&amp;'.
           'mode='.$tipo.'&amp;height='
    .$altura.'&amp;wkst=1&amp;bgcolor=%23cccccc&amp;src='.$agenda.'%40group.calendar.google.com&amp;color='.
            '%23125A12&amp;ctz=America%2FSao_Paulo" style=" border-width:0 "'.
            'width="'.$largura.'" height="'.$altura.'" frameborder="0" scrolling="no">'.
    '</iframe>';
    
} ?>