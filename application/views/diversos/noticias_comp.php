<div class="setas">
    <div class="next" style="margin: 100px -65px 0px 0px;"></div>
</div>
<section id="noticias"> 
    <script>
        $(document).ready(function () {
            $(".next").on("click", function () {
                var page = parseInt($('.texto_paginacao_pgatual').text());
                carregarPaginaNoticia(page);
            });
        });
    </script>
    <?= $panel; ?>
</section>