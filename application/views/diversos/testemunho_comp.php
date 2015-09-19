<div class="setas">
    <div class="next"></div>
</div>
<section id="testemunhos"> 
    <script>
        $(document).ready(function () {
            $(".next").on("click", function () {
                var page = parseInt($('.texto_paginacao_pgatual').text());
                carregarPaginaTestemunho(page);
            });
        });
    </script>
    <?= $panel; ?>
</section>