<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Prints a particular instance of portugol
 *
 * You can have a rather longer description of the file as well,
 * if you like, and it can span multiple lines.
 *
 * @package    mod_portugol
 * @copyright  2016 IC: Guna Alexander, Vitor Marcelino e Leonardo Menezes
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

require_once(dirname(dirname(dirname(__FILE__))).'/config.php');
require_once(dirname(__FILE__).'/lib.php');

/* O METODO DE SALVAR A QUESTÃO DEVERÁ PRIMEIRO VERIFICAR SE JA EXISTE A QUESTÃO SALVA NO BD, (ID ALUNO, ID QUESTÃO)
CASO A QUESTÃO NÃO TENHA SIDO SALVA AINDA USAMOS O METODO $DB->insert_records() PARA SALVAR A QUESTÃO NO BD,
CASO A QUESTÃO JÁ TENHA SIDO SALVA ANTES, USAREMOS O METODO $DB->update_record() PARA ATUALIZAR A QUESTÃO NO BD
*/


$registro = new stdClass();
$registro->idportugol = 1;
$registro->idaluno = 2;
$registro->nota = 10;
$registro->codigo = $_POST['codigo'];

$lastinsertid = $DB->insert_record('portugol_atividade', $registro, false);

echo "Salvo com sucesso!";