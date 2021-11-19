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
 * Settings that allow the entering of a Loom SDK API key.
 *
 * @package    atto_loom
 * @author     Max MacCluer
 * @copyright  2021 Idaho State University
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$ADMIN->add('editoratto', new admin_category('atto_loom', new lang_string('pluginname', 'atto_loom')));

if ($ADMIN->fulltree) {
    // Public App ID.
    $name = get_string('publicappid', 'atto_loom');
    $desc = get_string('publicappid_desc', 'atto_loom');
    $setting = new admin_setting_configtext('atto_loom/publicappid', $name, $desc, null);
    $settings->add($setting);

    // Font-family used in the record menu.
    $name = get_string('fontfamily', 'atto_loom');
    $desc = get_string('fontfamily_desc', 'atto_loom');
    $default = 'circular, -apple-system, BlinkMacSystemFont, Segoe UI, sans-serif';
    $setting = new admin_setting_configtext('atto_loom/fontfamily', $name, $desc, $default);
    $settings->add($setting);

    // Base font unit size used to calculate the font size for the text.
    $name = get_string('fontunitsize', 'atto_loom');
    $desc = get_string('fontunitsize_desc', 'atto_loom');
    $default = '8px';
    $setting = new admin_setting_configtext('atto_loom/fontunitsize', $name, $desc, $default);
    $settings->add($setting);

    // Record button color.
    $name = get_string('recordbuttoncolor', 'atto_loom');
    $setting = new admin_setting_configcolourpicker('atto_loom/recordbuttoncolor', $name, null, '#ff613d', null);
    $settings->add($setting);

    // Record button hover color.
    $name = get_string('recordbuttonhovercolor', 'atto_loom');
    $setting = new admin_setting_configcolourpicker('atto_loom/recordbuttonhovercolor', $name, null, '#ff370a');
    $settings->add($setting);

    // Record button active color.
    $name = get_string('recordbuttonactivecolor', 'atto_loom');
    $setting = new admin_setting_configcolourpicker('atto_loom/recordbuttonactivecolor', $name, null, '#d72700');
    $settings->add($setting);

    // Primary color (this will override the 'insert' button background color).
    $name = get_string('primarycolor', 'atto_loom');
    $setting = new admin_setting_configcolourpicker('atto_loom/primarycolor', $name, null, '#625df5');
    $settings->add($setting);

    // Primary hover color.
    $name = get_string('primaryhovercolor', 'atto_loom');
    $setting = new admin_setting_configcolourpicker('atto_loom/primaryhovercolor', $name, null, '#342df2');
    $settings->add($setting);

    // Primary active color.
    $name = get_string('primaryactivecolor', 'atto_loom');
    $setting = new admin_setting_configcolourpicker('atto_loom/primaryactivecolor', $name, null, '#140dda');
    $settings->add($setting);
}
