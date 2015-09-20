<script>
    $(window).load(function () {
        var menuAtivo = $('#menuAtivo').val();
        $('#' + menuAtivo).addClass('active');
        var menuAtivoFilho = $('#menuAtivoFilho').val();
        if (menuAtivoFilho.length > 0) {
            $('#' + menuAtivoFilho).addClass('active');
        }
    });
</script>