<div class="row">
    <div class="col-xs-12">
        <div class="box box-info">
            <div class="box-header">
                <h3 class="box-title"><?= $title ?></h3>
            </div>
            <?= form_open('restrito/departamento/' . $departamento->getApelido() . '/salvarOrdem') ?>
            <div class="box-body">
                <!-- select -->
                <?php $size = count($pessoas); ?>
                <?php foreach ($pessoas as $j => $p) : ?>
                    <div class="form-group row row-ord">
                        <?php if ($j > 0) : ?>
                            <a class="col-sm-12 ord fa fa-sort-asc" onclick="sobe(this)">
                            </a>
                        <?php endif; ?>
                        <div id="<?= ($j + 1) ?>">
                            <div class="row">

                                <div class="ord-content col-sm-12">
                                    <div class="ord-num">
                                        <span ><?= ($j + 1) ?></span>
                                    </div>
                                    <div class="ord-name">
                                        <label><?= $p->getNomePessoa() . ' - ' ?></label>
                                            <?= $p->getNomeCargo() ?> 
                                    </div>
                                </div>
                                <input type="hidden" name="<?= $p->getId() ?>" value ="<?= ($j + 1) ?>" 
                                       class="form-control ord" required>
                            </div>
                        </div>
                        <?php if ($j < $size - 1) : ?>
                            <a class="col-sm-12 ord fa fa-sort-desc" onclick="desce(this)">
                            </a>
                        <?php endif; ?>
                    </div><!-- row-ord form group -->
                <?php endforeach; ?>
            </div><!-- /.box-body -->
            <div class="box-footer">
                <button type="submit" class="btn btn-primary pull-right">Salvar</button>
            </div>
            <?= form_close(); ?>
        </div><!-- /.box -->
    </div>

    <script>
        $('.ord').on('change', function () {

        });

        function troca(idAtual, idDestino) {
            //this é o select atual;
//            console.log($('#' + idDestino + ' .row'));
            //          console.log($('#' + idAtual));
            var groupAtual = $('#' + idAtual);
            var groupDestino = $('#' + idDestino);

            var inputDestino = groupDestino.find('input');
            var spanDestino = groupDestino.find('span');

            var spanAtual = groupAtual.find('span');
            var inputAtual = groupAtual.find('input');


            inputAtual.val(idDestino);
            spanAtual.text(idDestino);

            inputDestino.val(idAtual);
            spanDestino.text(idAtual);

            var rowDoDestino = $('#' + idDestino + ' .row');
            var rowDoAtual = $('#' + idAtual + ' .row');

            groupAtual.empty();
            groupDestino.empty();

            groupAtual.append(rowDoDestino);
            groupDestino.append(rowDoAtual);

        }

        function desce(botao) {
            var valor = parseInt($(botao).prev().find('input').val());
            var idDestino = valor + 1;
            var idAtual = $(botao).prev().attr('id');
            troca(idAtual, idDestino);

        }

        function sobe(botao) {
            var valor = parseInt($(botao).next().find('input').val());
            var idDestino = valor - 1;
            var idAtual = $(botao).next().attr('id');
            troca(idAtual, idDestino);

        }
    </script>