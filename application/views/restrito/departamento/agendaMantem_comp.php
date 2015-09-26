<div class="row">
    <div class="col-xs-12">
        <div class="box box-info">
            <div class="box-header">
                <h3 class="box-title"><?= $title ?></h3>
            </div>
            <?= form_open('restrito/departamento/' . $departamento->getApelido() . '/salvarAgenda') ?>
            <div class="box-body">
                <!-- select -->
                <div class="form-group">
                    <label>Tipo(Selecione para ver o exemplo)*</label>
                    <select name="tipo" id="tipo" class="form-control" rows="3" required>
                        <option value="">
                        </option>
                        <option value="WEEK" <?= isset($tipo) ? ($tipo == 'WEEK' ? 'selected' : '') : '' ?>>
                            Semana
                        </option>
                        <option value="MONTH" <?= isset($tipo) ? ($tipo == 'MONTH' ? 'selected' : '') : '' ?>>
                            Mês
                        </option>
                        <option value="AGENDA" <?= isset($tipo) ? ($tipo == 'AGENDA' ? 'selected' : '') : '' ?>>
                            Compromissos
                        </option>
                    </select>
                </div><!-- form group -->
                <div class="form-group">
                    <label>Exemplo:</label>
                    <div class="form-group">
                        <img style="display:none;" id="compromissos" 
                             src="<?= base_url('public/images/compromissos_exemplo.png') ?>">
                        <img style="display:none;" id="mes" 
                             src="<?= base_url('public/images/mes_exemplo.png') ?>">
                        <img style="display:none;" id="semana" 
                             src="<?= base_url('public/images/semana_exemplo.png') ?>">
                    </div>
                </div><!-- form group -->
                <div class="bootstrap-timepicker">
                    <div class="form-group">
                        <label>ID da Agenda Google</label>
                        <textarea id="agenda" name="agenda" class="form-control" rows="3" required
                                  maxlength="900"><?= isset($agenda) ? $agenda : '' ?></textarea>
                    </div><!-- form group -->
                </div>
            </div><!-- /.box-body -->
            <div class="box-footer">
                <button id="submit" type="submit" class="btn btn-primary pull-right">Salvar</button>
            </div>
            <?= form_close(); ?>
        </div><!-- /.box -->
    </div>

    <script>

        $(function () {
            exemplosTipos(tipo);
        });
        
        $('#tipo').on('change', function () {
            exemplosTipos();
        });
        
        function exemplosTipos(){
            var tipo = $('#tipo').val();
            switch (tipo) {
                case 'WEEK':
                    $('#semana').show();
                    $('#compromissos').hide();
                    $('#mes').hide();
                    break;
                case 'MONTH':
                    $('#semana').hide();
                    $('#compromissos').hide();
                    $('#mes').show();
                    break;
                case 'AGENDA':
                    $('#semana').hide();
                    $('#compromissos').show();
                    $('#mes').hide();
                    break;
            }
        }
    </script>