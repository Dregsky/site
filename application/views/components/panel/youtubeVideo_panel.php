<div class="col">
    <object width="<?= $width ?>" height="<?= $height ?>">
        <param name="movie" value="http://www.youtube.com/v/<?= $match ?>&hl=pt-br&fs=1"></param>
        <param name="allowFullScreen" value="true"></param>
        <param name="allowscriptaccess" value="always"></param>
        <embed src="http://www.youtube.com/v/<?= $match ?>&hl=pt-br&fs=1" 
               type="application/x-shockwave-flash" allowscriptaccess="always" 
               allowfullscreen="true" 
               width="<?= $width ?>" height="<?= $height ?>">
        </embed>
    </object>
</div>
