<form id="formAux" method="post">
    <input name="id"  id="inputAux" type="hidden" >
</form>
<script>

    function ativar(numID, metodo, msg) {
        $("#inputAux").val(numID);
        if(msg === undefined){
            msg = "Você tem certeza que deseja ativar esse Registro?";
        }
        bootbox.confirm(msg, function (result) {
            if (result) {
                var action = BASE_URL + metodo;
                $("#formAux").attr("action", action);
                $('#formAux').submit();
            }
        });
    }
    function inativar(numID, metodo) {
        $("#inputAux").val(numID);
        bootbox.confirm("Você tem certeza que deseja Inativar esse Registro?", function (result) {
            if (result) {
                var action = BASE_URL + metodo;
                $("#formAux").attr("action", action);
                $('#formAux').submit();
            }
        });
    }
</script>