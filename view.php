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

// Replace portugol with the name of your module and remove this line.

require_once(dirname(dirname(dirname(__FILE__))).'/config.php');
require_once(dirname(__FILE__).'/lib.php');

$id = optional_param('id', 0, PARAM_INT); // Course_module ID, or
$n  = optional_param('n', 0, PARAM_INT);  // ... portugol instance ID - it should be named as the first character of the module.

if ($id) {
    $cm         = get_coursemodule_from_id('portugol', $id, 0, false, MUST_EXIST);
    $course     = $DB->get_record('course', array('id' => $cm->course), '*', MUST_EXIST);
    $portugol  = $DB->get_record('portugol', array('id' => $cm->instance), '*', MUST_EXIST);
} else if ($n) {
    $portugol  = $DB->get_record('portugol', array('id' => $n), '*', MUST_EXIST);
    $course     = $DB->get_record('course', array('id' => $portugol->course), '*', MUST_EXIST);
    $cm         = get_coursemodule_from_instance('portugol', $portugol->id, $course->id, false, MUST_EXIST);
} else {
    error('You must specify a course_module ID or an instance ID');
}

require_login($course, true, $cm);

$event = \mod_portugol\event\course_module_viewed::create(array(
    'objectid' => $PAGE->cm->instance,
    'context' => $PAGE->context,
));
$event->add_record_snapshot('course', $PAGE->course);
$event->add_record_snapshot($PAGE->cm->modname, $portugol);
$event->trigger();

// Print the page header.

$PAGE->set_url('/mod/portugol/view.php', array('id' => $cm->id));
$PAGE->set_title(format_string($portugol->name));
$PAGE->set_heading(format_string($course->fullname));

/*
 * Other things you may want to set - remove if not needed.
 * $PAGE->set_cacheable(false);
 * $PAGE->set_focuscontrol('some-html-id');
 * $PAGE->add_body_class('portugol-'.$somevar);
 */

function salvarQuestao () {
    /* O METODO DE SALVAR A QUESTÃO DEVERÁ PRIMEIRO VERIFICAR SE JA EXISTE A QUESTÃO SALVA NO BD, (ID ALUNO, ID QUESTÃO)
        CASO A QUESTÃO NÃO TENHA SIDO SALVA AINDA USAMOS O METODO $DB->insert_records() PARA SALVAR A QUESTÃO NO BD,
        CASO A QUESTÃO JÁ TENHA SIDO SALVA ANTES, USAREMOS O METODO $DB->update_record() PARA ATUALIZAR A QUESTÃO NO BD
    */
    echo "Salvando";
}

// Output starts here.
echo $OUTPUT->header();

//Printa o título do exercicio
echo $OUTPUT->heading($portugol->name);

// Conditions to show the intro can change to look for own settings or whatever.
if ($portugol->intro) {
    echo $OUTPUT->box(format_module_intro('portugol', $portugol, $cm->id), 'generalbox mod_introbox', 'portugolintro');
}

require 'ambiente.html';

echo $OUTPUT->heading('Documentação Portugol');

//require 'doc.html';

echo '<a href="salvar.php">Salvar</a>';

// Finish the page.
echo $OUTPUT->footer();




