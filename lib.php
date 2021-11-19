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
 * Atto Loom library functions
 *
 * @package    atto_loom
 * @author     Max MacCluer
 * @copyright  2021 Idaho State University
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

/**
 * Set params for this plugin.
 *
 * @param string $elementid
 * @param stdClass $options - the options for the editor, including the context.
 * @param stdClass $fpoptions - unused.
 */
function atto_loom_params_for_js($elementid, $options, $fpoptions) {
    $context = $options['context'];
    if (!$context) {
        $context = context_system::instance();
    }

    $sesskey = sesskey();
    $publicappid = get_config('atto_loom', 'publicappid');
    $fontfamily = get_config('atto_loom', 'fontfamily');
    $fontunitsize = get_config('atto_loom', 'fontunitsize');
    $recordbuttoncolor = get_config('atto_loom', 'recordbuttoncolor');
    $recordbuttonhovercolor = get_config('atto_loom', 'recordbuttonhovercolor');
    $recordbuttonactivecolor = get_config('atto_loom', 'recordbuttonactivecolor');
    $primarycolor = get_config('atto_loom', 'primarycolor');
    $primaryhovercolor = get_config('atto_loom', 'primaryhovercolor');
    $primaryactivecolor = get_config('atto_loom', 'primaryactivecolor');

    $params = array('contextid' => $context->id,
            'sesskey' => $sesskey,
            'publicappid' => $publicappid,
            'fontfamily' => $fontfamily,
            'fontunitsize' => $fontunitsize,
            'recordbuttoncolor' => $recordbuttoncolor,
            'recordbuttonhovercolor' => $recordbuttonhovercolor,
            'recordbuttonactivecolor' => $recordbuttonactivecolor,
            'primarycolor' => $primarycolor,
            'primaryhovercolor' => $primaryhovercolor,
            'primaryactivecolor' => $primaryactivecolor

    );
    return $params;
}

/**
 * Initialise the strings required for js
 */
function atto_loom_strings_for_js() {
    global $PAGE;
    $strings = array(
            'browsererror',
            'browsererror_title',
            'nopublicappiderror',
            'nopublicappiderror_title',
            'record'
    );
    $PAGE->requires->strings_for_js($strings, 'atto_loom');
}

