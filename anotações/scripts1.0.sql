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

/*UPDATE `adcru732_adcruz`.`tbl_pessoa` SET `cod_departamento` = 6 WHERE `cod_departamento` = 0;

#ALTER TABLE `tbl_pessoa` ADD CONSTRAINT `fk_departamento` FOREIGN KEY ( `cod_departamento` ) 
#REFERENCES `tbl_departamento` ( `cod_departamento` ) ;
*/
ALTER TABLE `tbl_pessoa` DROP `cod_departamento`;

UPDATE `tbl_pessoa` set `codPessoaExclusao` = null;
ALTER TABLE `tbl_pessoa` DROP `codPessoaExclusao`;

ALTER TABLE `tbl_pessoa` CHANGE `nome_conjuge` `nome_conjuge` VARCHAR(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL;
ALTER TABLE `tbl_pessoa` CHANGE `data_casamento` `data_casamento` DATE NULL;
ALTER TABLE `tbl_pessoa` CHANGE `data_batismo_aguas` `data_batismo_aguas` DATE NULL;
ALTER TABLE `tbl_pessoa` CHANGE `data_batismo_espirito` `data_batismo_espirito` DATE NULL;
ALTER TABLE `tbl_pessoa` CHANGE `senha` `senha` VARCHAR(80) CHARACTER SET utf8 COLLATE utf8_general_ci NULL;
ALTER TABLE `tbl_pessoa` CHANGE `qtd_filhos` `qtd_filhos` INT(3) NULL DEFAULT '0';

/**
* Scripts tbl_noticia
*/

ALTER TABLE `tbl_noticia` ENGINE = InnoDB;

ALTER TABLE `tbl_noticia` CHANGE `cod_departamento` `cod_departamento` INT(11) NULL;

SET FOREIGN_KEY_CHECKS=0;
ALTER TABLE `tbl_noticia` ADD CONSTRAINT `fk1_departamento` FOREIGN KEY ( `cod_departamento` ) 
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

UPDATE `tbl_noticia` SET `cod_status` = 3;

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

UPDATE `adcru732_adcruz`.`tbl_noticia` SET `cod_departamento` = 2 
WHERE `tbl_noticia`.`cod_perfil` = 7;

UPDATE `adcru732_adcruz`.`tbl_noticia` SET `cod_departamento` = 7 
WHERE `tbl_noticia`.`cod_perfil` = 14;

UPDATE `adcru732_adcruz`.`tbl_noticia` SET `cod_departamento` = 1 
WHERE `tbl_noticia`.`cod_perfil` = 9;

UPDATE `adcru732_adcruz`.`tbl_departamento` SET `apelido` = 'EBD' WHERE `tbl_departamento`.`cod_departamento` = 7;

UPDATE `adcru732_adcruz`.`tbl_departamento` SET `nomeCompleto` = 'CVKIDS', `apelido` = 'CVKIDS' 
WHERE `tbl_departamento`.`cod_departamento` = 3; 
UPDATE `adcru732_adcruz`.`tbl_departamento` SET `nomeCompleto` = 'Orquestra', `apelido` = 'Orquestra' 
WHERE `tbl_departamento`.`cod_departamento` = 4; 
UPDATE `adcru732_adcruz`.`tbl_departamento` SET `nomeCompleto` = 'CIBE', `apelido` = 'CIBE' 
WHERE `tbl_departamento`.`cod_departamento` = 5; 
UPDATE `adcru732_adcruz`.`tbl_departamento` SET `nomeDepartamento` = 'Geração de Davi', `nomeCompleto` = 'Ministério Geração de Davi', `apelido` = 'MGD' 
WHERE `tbl_departamento`.`cod_departamento` = 6; 
UPDATE `adcru732_adcruz`.`tbl_departamento` SET `nomeCompleto` = 'Igreja', `apelido` = 'ADCRUZ' 
WHERE `tbl_departamento`.`cod_departamento` = 8; 
UPDATE `adcru732_adcruz`.`tbl_departamento` SET `nomeCompleto` = 'Varões', `apelido` = 'Varoes' 
WHERE `tbl_departamento`.`cod_departamento` = 9; 
UPDATE `adcru732_adcruz`.`tbl_departamento` SET `nomeDepartamento` = 'Secretária', `nomeCompleto` = 'Secretária', `apelido` = 'Secretaria' 
WHERE `tbl_departamento`.`cod_departamento` = 10; 
UPDATE `adcru732_adcruz`.`tbl_departamento` SET `nomeCompleto` = 'Diretoria', `apelido` = 'Diretoria' 
WHERE `tbl_departamento`.`cod_departamento` = 11;
UPDATE `adcru732_adcruz`.`tbl_departamento` SET `nomeDepartamento` = 'Missões', `nomeCompleto` = 'Departamento de Missões', `apelido` = 'Missoes' 
WHERE `tbl_departamento`.`cod_departamento` = 12;
UPDATE `adcru732_adcruz`.`tbl_departamento` SET `nomeCompleto` = 'DataShow', `apelido` = 'DataShow'
WHERE `tbl_departamento`.`cod_departamento` = 13;
UPDATE `adcru732_adcruz`.`tbl_departamento` SET `nomeCompleto` = 'Som', `apelido` = 'Som' 
WHERE `tbl_departamento`.`cod_departamento` = 14; 
UPDATE `adcru732_adcruz`.`tbl_departamento` SET `nomeCompleto` = 'Obreiros', `apelido` = 'Obreiros' 
WHERE `tbl_departamento`.`cod_departamento` = 15;

INSERT INTO `adcru732_adcruz`.`tbl_departamento` (`cod_departamento`, `nomeDepartamento`, `nomeCompleto`, `apelido`) 
VALUES (NULL, 'Família', 'Familia', 'Familia');

ALTER TABLE `tbl_departamento` ADD `agendaGoogle` VARCHAR(900) CHARACTER SET utf8 COLLATE utf8_general_ci NULL ;


/**
* tbl_testemunho
*/
ALTER TABLE `tbl_testemunho` ADD CONSTRAINT `fk3_status` FOREIGN KEY ( `cod_status` ) 
REFERENCES `tbl_status` ( `cod_status` ) ;

/**
*tbl_album
*/

ALTER TABLE `tbl_album` 
CHANGE `link_flickr` `link_flickr` VARCHAR(600) CHARACTER SET latin1 
COLLATE latin1_swedish_ci NULL DEFAULT NULL;

ALTER TABLE `tbl_album` CHANGE `cod_status` `cod_status` INT(11) NULL DEFAULT NULL;

ALTER TABLE `tbl_album` ADD CONSTRAINT `fk4_status` FOREIGN KEY ( `cod_status` ) 
REFERENCES `tbl_status` ( `cod_status` ) ;

SET FOREIGN_KEY_CHECKS=0;
ALTER TABLE `tbl_album` ADD CONSTRAINT `fk2_dapartamento` FOREIGN KEY ( `codDepartamento` ) 
REFERENCES `tbl_departamento` ( `cod_departamento` ) ;

SET FOREIGN_KEY_CHECKS=0;
ALTER TABLE `tbl_album` ADD CONSTRAINT `fk2_pessoa_exclusao` FOREIGN KEY ( `codPessoaExclusao` ) 
REFERENCES `tbl_pessoa` ( `cod_pessoa` ) ;

SET FOREIGN_KEY_CHECKS=0;
ALTER TABLE `tbl_album` ADD CONSTRAINT `fk2_pessoa_cadastro` FOREIGN KEY ( `codPessoaCadastro` ) 
REFERENCES `tbl_pessoa` ( `cod_pessoa` ) ;

ALTER TABLE `tbl_album` CHANGE `codDepartamento` `codDepartamento` INT(11) NOT NULL DEFAULT '8';
UPDATE `tbl_album` SET `codDepartamento`=8 WHERE 1;

/**
* tbl_pessoa_departamento
*/
SET FOREIGN_KEY_CHECKS=0;
ALTER TABLE `tbl_pessoa_departamento` ADD CONSTRAINT `fk2_departamento` 
FOREIGN KEY ( `cod_departamento` ) REFERENCES `tbl_departamento` ( `cod_departamento` ) ;
ALTER TABLE `tbl_pessoa_departamento` ADD CONSTRAINT `fk_pessoa` FOREIGN KEY ( `cod_pessoa` ) 
REFERENCES `tbl_pessoa` ( `cod_pessoa` ) ;

/*
* tbl_perfil
*/

UPDATE `adcru732_adcruz`.`tbl_perfil` SET `descricao` = 'Super Administrador' WHERE `tbl_perfil`.`cod_perfil` = 1;
UPDATE `adcru732_adcruz`.`tbl_perfil` SET `descricao` = 'Administrador' WHERE `tbl_perfil`.`cod_perfil` = 2;
