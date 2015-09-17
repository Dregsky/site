<html>
    <head>
        <title>Agendamento Culto no Lar</title>
    </head>
    <body>
    <center>
        <table>
            <tr>
                <td colspan='2' style='border-style: solid; border-width: 3; border-color: #666666'>
                    <table border='0' width='100%'>
                        <tr>
                            <td colspan='2'>
                                <!--<img src=""<?= base_url('public/images/topoFaleComPastor.png') ?>"/>-->
                            </td>
                        </tr>
                    </table>
                    <table border='0' width='100%'>
                        <tr>
                            <td colspan='2' height='10'></td>
                        </tr>
                    </table>
                    <table border='0' width='700'>
                        <tr>
                            <td colspan='2' height='50' valign='middle' style='text-align: justify; text-justify: newspaper; text-indent:50px; line-height:150%'>
                                <b>Nome:</b> <?= $nome ?>
                            </td>
                        </tr>
                        <tr>
                            <td colspan='2' height='50' valign='middle' style='text-align: justify; text-justify: newspaper; text-indent:50px; line-height:150%'>
                                <b>Data do Culto:</b> <?= date('d/m/Y', strtotime($data)) ?>
                            </td>
                        </tr>
                        <tr>
                            <td colspan='2' height='50' valign='middle' style='text-align: justify; text-justify: newspaper; text-indent:50px; line-height:150%'>
                                <b>Contato:</b> <?= $telefone ?>
                            </td>
                        </tr>
                        <tr>
                            <td colspan='2' height='50' valign='middle' style='text-align: justify; text-justify: newspaper; text-indent:50px; line-height:150%'>
                                <b>Endereço:</b> <?= $endereco ?>
                            </td>
                        </tr>
                        <tr>
                            <td colspan='2' height='50' valign='middle' style='text-align: justify; text-justify: newspaper; text-indent:50px; line-height:150%'>
                                <b>Informações Adicionais:</b> <?= $info ?>
                            </td>
                        </tr>
                        <tr>
                            <td colspan='2' align='center'></td>
                        </tr>
                    </table>
                    <table border='0' width='100%'>
                        <tr>
                            <td colspan='2'>
                                <!--<img src="<?= base_url('public/images/rodapeFaleComPastor.png') ?>"/>-->
                            </td>
                        </tr>
                    </table>
                </td>							
            </tr>
        </table>
    </center>
</body>

</html>
