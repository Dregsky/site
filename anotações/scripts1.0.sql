/**
* Scripts Tabela Pessoa
*/

ALTER TABLE `tbl_pessoa` CHANGE `senha` `senha` VARCHAR(80) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL;

ALTER TABLE `tbl_pessoa` CHANGE `cod_perfil` `cod_perfil` INT(11) NOT NULL;

ALTER TABLE `tbl_perfil` ENGINE = InnoDB;

INSERT INTO `adcru732_adcruz`.`tbl_perfil` (`cod_perfil`, `descricao`) VALUES ('16', 'Membro');

ALTER TABLE `tbl_pessoa` ADD CONSTRAINT `fk_perfil` FOREIGN KEY ( `cod_perfil` ) 
REFERENCES `tbl_perfil` ( `cod_perfil` ) ;

ALTER TABLE `tbl_status` ENGINE = InnoDB;

ALTER TABLE `tbl_pessoa` ADD CONSTRAINT `fk_status` FOREIGN KEY ( `cod_status` ) 
REFERENCES `tbl_status` ( `cod_status` ) ;

ALTER TABLE `tbl_funcao_ministerial` ENGINE = InnoDB;

UPDATE `adcru732_adcruz`.`tbl_pessoa` SET `cod_funcao_ministerial` = 10 WHERE `cod_funcao_ministerial` = 0; 

ALTER TABLE `tbl_funcao_ministerial` CHANGE `cod_funcao_ministerial` `cod_funcao_ministerial` INT(11) NOT NULL AUTO_INCREMENT

ALTER TABLE `tbl_pessoa` ADD CONSTRAINT `fk_funcao_ministerial` FOREIGN KEY ( `cod_funcao_ministerial` ) 
REFERENCES `tbl_funcao_ministerial` ( `cod_funcao_ministerial` ) ;

ALTER TABLE `tbl_profissao` ENGINE = InnoDB;

ALTER TABLE `tbl_profissao` CHANGE `cod_profissao` `cod_profissao` INT(10) NOT NULL AUTO_INCREMENT;

UPDATE `adcru732_adcruz`.`tbl_pessoa` SET `cod_profissao` = 102 WHERE `cod_profissao` = 0;

ALTER TABLE `tbl_pessoa` ADD CONSTRAINT `fk_profissao` FOREIGN KEY ( `cod_profissao` ) 
REFERENCES `tbl_profissao` ( `cod_profissao` ) ;

ALTER TABLE `tbl_escolaridade` ENGINE = InnoDB;

ALTER TABLE `tbl_escolaridade` CHANGE `cod_escolaridade` `cod_escolaridade` INT(10) NOT NULL AUTO_INCREMENT;

UPDATE `adcru732_adcruz`.`tbl_pessoa` SET `cod_escolaridade` = 6 WHERE `cod_escolaridade` = 0;

ALTER TABLE `tbl_pessoa` ADD CONSTRAINT `fk_escolaridade` FOREIGN KEY ( `cod_escolaridade` ) 
REFERENCES `tbl_escolaridade` ( `cod_escolaridade` ) ;

ALTER TABLE `tbl_estado_civil` CHANGE `cod_estado_civil` `cod_estado_civil` INT(10) NOT NULL AUTO_INCREMENT;

UPDATE `adcru732_adcruz`.`tbl_pessoa` SET `cod_estado_civil` = 1 WHERE `cod_estado_civil` = 0;

ALTER TABLE `tbl_pessoa` ADD CONSTRAINT `fk_estado_civil` FOREIGN KEY ( `cod_estado_civil` ) 
REFERENCES `tbl_estado_civil` ( `cod_estado_civil` ) ;

UPDATE `adcru732_adcruz`.`tbl_pessoa` SET `cod_departamento` = 6 WHERE `cod_departamento` = 0;

ALTER TABLE `tbl_pessoa` ADD CONSTRAINT `fk_dapartamento` FOREIGN KEY ( `cod_departamento` ) 
REFERENCES `tbl_departamento` ( `cod_departamento` ) ;

UPDATE `tbl_pessoa` set `codPessoaExclusao` = null;
ALTER TABLE `tbl_pessoa` DROP `codPessoaExclusao`;


/**
* Scripts tbl_noticia
*/

ALTER TABLE `tbl_noticia` ENGINE = InnoDB;

ALTER TABLE `tbl_noticia` CHANGE `cod_departamento` `cod_departamento` INT(11) NULL;

SET FOREIGN_KEY_CHECKS=0;
ALTER TABLE `tbl_noticia` ADD CONSTRAINT `fk_dapartamento` FOREIGN KEY ( `cod_departamento` ) 
REFERENCES `tbl_departamento` ( `cod_departamento` ) ;

ALTER TABLE `tbl_noticia` ADD CONSTRAINT `fk_tipo` FOREIGN KEY ( `cod_tipo` ) 
REFERENCES `tbl_tiponoticia` ( `cod_tipo` ) ;

SET FOREIGN_KEY_CHECKS=0;
ALTER TABLE `tbl_noticia` ADD CONSTRAINT `fk_pessoa_exclusao` FOREIGN KEY ( `codPessoaExclusao` ) 
REFERENCES `tbl_pessoa` ( `cod_pessoa` ) ;

SET FOREIGN_KEY_CHECKS=0;
ALTER TABLE `tbl_noticia` ADD CONSTRAINT `fk_pessoa_cadastro` FOREIGN KEY ( `codPessoaCadastro` ) 
REFERENCES `tbl_pessoa` ( `cod_pessoa` ) ;

ALTER TABLE `tbl_noticia` ADD CONSTRAINT `fk1_status` FOREIGN KEY ( `cod_status` ) 
REFERENCES `tbl_status` ( `cod_status` ) ;

SET FOREIGN_KEY_CHECKS=0;
ALTER TABLE `tbl_noticia` ADD CONSTRAINT `fk1_perfil` FOREIGN KEY ( `cod_perfil` ) 
REFERENCES `tbl_perfil` ( `cod_perfil` ) ;

/**
* Scripts Comunicado tbl_comunicado
*/

ALTER TABLE `tbl_comunicado` ENGINE = InnoDB;

SET FOREIGN_KEY_CHECKS=0;
ALTER TABLE `tbl_comunicado` ADD CONSTRAINT `fk1_pessoa_cadastro` FOREIGN KEY ( `codPessoaCadastro` ) 
REFERENCES `tbl_pessoa` ( `cod_pessoa` ) ;

SET FOREIGN_KEY_CHECKS=0;
ALTER TABLE `tbl_comunicado` ADD CONSTRAINT `fk2_perfil` FOREIGN KEY ( `cod_perfil` ) 
REFERENCES `tbl_perfil` ( `cod_perfil` ) ;

ALTER TABLE `tbl_comunicado` ADD CONSTRAINT `fk1_pessoa_exclusao` FOREIGN KEY ( `codPessoaExclusao` ) 
REFERENCES `tbl_pessoa` ( `cod_pessoa` ) ;

/**
* Scripts Comunicado tbl_mural
*/

ALTER TABLE `tbl_mural` ENGINE = InnoDB;

ALTER TABLE `tbl_mural` ADD CONSTRAINT `fk2_status` FOREIGN KEY ( `cod_status` ) 
REFERENCES `tbl_status` ( `cod_status` ) ;

/**
* Scripts Departamento tbl_departamento
*/

ALTER TABLE `tbl_departamento` ADD `apelido` VARCHAR(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL ;
UPDATE `adcru732_adcruz`.`tbl_departamento` SET `apelido` = 'ANG' WHERE `tbl_departamento`.`cod_departamento` = 2;
UPDATE `adcru732_adcruz`.`tbl_departamento` SET `apelido` = 'E.B.D' WHERE `tbl_departamento`.`cod_departamento` = 7;
UPDATE `adcru732_adcruz`.`tbl_departamento` SET `apelido` = 'JTV' WHERE `tbl_departamento`.`cod_departamento` = 1;

ALTER TABLE `tbl_departamento` ADD `nomeCompletoDepartamento` VARCHAR(80) CHARACTER SET utf8 COLLATE utf8_general_ci NULL AFTER `nomeDepartamento`;

UPDATE `adcru732_adcruz`.`tbl_departamento` SET `nomeCompletoDepartamento` = 'Adolescentes Nova Geração' 
WHERE `tbl_departamento`.`cod_departamento` = 2;
UPDATE `adcru732_adcruz`.`tbl_departamento` SET `nomeCompletoDepartamento` = 'Escola Bíblica Dominical' 
WHERE `tbl_departamento`.`cod_departamento` = 7;
UPDATE `adcru732_adcruz`.`tbl_departamento` SET `nomeCompletoDepartamento` = 'Mocidade Tochas Vivas' 
WHERE `tbl_departamento`.`cod_departamento` = 1;

ALTER TABLE `tbl_departamento` CHANGE `nomeCompletoDepartamento` `nomeCompleto` VARCHAR(80) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL;


