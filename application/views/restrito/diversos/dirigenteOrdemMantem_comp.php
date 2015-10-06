<div class="row">
    <div class="col-xs-12">
        <div class="box box-info">
            <div class="box-header">
                <h3 class="box-title"><?= $title ?></h3>
            </div>
            <?= form_open('restrito/diversos/dirigentes/salvarOrdem') ?>
            <div class="box-body">
                <!-- select -->
                <?php $size = count($dirigentes); ?>
                <?php foreach ($dirigentes as $j => $d) : ?>
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
                                        <label><?= $d->getNomeDirigente() . ' - ' ?></label>
                                        <?= $d->getPeriodoDirigido() ?> 
                                    </div>
                                </div>
                                <input type="hidden" name="<?= $d->getId() ?>" value ="<?= ($j + 1) ?>" 
                                       class="form-control ord" required>
                            </div>
                        </div>
                        <?php if ($j < $size - 1) : ?>
                            <a class="col-sm-12 ord fa fa-sort-desc" onclick="desce(this)">
                            </a>
                        <?php endif; ?>
                        <div class="form-ord-num">
                            <button type="button" onclick="trocaByNumber(this)" class="btn btn-primary btn-black">
                                Trocar pela posição:
                            </button>
                            <input class="input-num" type="number" value="<?= ($j + 1) ?>" max="<?= $size ?>" min="1">
                        </div>
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

        $('.input-num').on('change', function () {
            if (this.value > parseInt($(this).attr('max'))) {
                this.value = $(this).attr('max');
            }
            else if (this.value < 1) {
                this.value = 1;
            }

        });

        function trocaByNumber(botao) {
            var number = $(botao).next();
            var idAtual = parseInt(number.parent().parent().find('input').val());
            var idDestino = number.val();

            number.val(idAtual);

            troca(idAtual, idDestino);
        }
    </script>