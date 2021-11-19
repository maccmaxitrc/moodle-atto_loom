YUI.add('moodle-atto_loom-button', function (Y, NAME) {

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

/*
 * @package    atto_loom
 * @author     Max MacCluer
 * @copyright  2021 Idaho State University
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

/**
 * @module moodle-atto_loom-button
 */

/**
 * Atto text editor Loom plugin.
 *
 * @namespace M.atto_loom
 * @class button
 * @extends M.editor_atto.EditorPlugin
 */

Y.namespace('M.atto_loom').Button = Y.Base.create('button', Y.M.editor_atto.EditorPlugin, [], {

    initializer: function() {
        this.addButton({
            callback: this._setupLoom,
            icon: 'bw-icon',
            iconComponent: 'atto_loom',
            title: 'record'
        });
    },

    _setupLoom: function() {
        window.global = window;
        require(['atto_loom/index'], loomSdk => {
            loomSdk.isSupported().then(isSupported => this._checkSupport(loomSdk, isSupported));
        });
    },

    _checkSupport: function(loomSdk, isSupported) {
        var {supported, error} = isSupported;
        if (!supported) {
            this._showErrorDialogue(error);
            return;
        }

        var publicAppId = this.get('publicappid');
        if (!publicAppId) {
            this._showErrorDialogue('no-publicappid');
            return;
        }

        loomSdk.setup({
            publicAppId: publicAppId,
            config: {
                styles:{
                    fontFamily: this.get('fontfamily'),
                    fontUnitSize: this.get('fontunitsize'),
                    recordButtonColor: this.get('recordbuttoncolor'),
                    recordButtonHoverColor: this.get('recordbuttonhovercolor'),
                    recordButtonActiveColor: this.get('recordbuttonactivecolor'),
                    primaryColor: this.get('primarycolor'),
                    primaryHoverColor: this.get('primaryhovercolor'),
                    primaryActiveColor: this.get('primaryactivecolor')
                }
            }
        }).then(setup => this._showLoomDialogue(setup));
    },

    _showLoomDialogue: function(setup) {
        var dummyButton = document.createElement("button");
        var sdkButton = setup.configureButton({element: dummyButton});
        sdkButton.on("insert-click", async video => this._insertEmbedUrl(video.embedUrl));
        dummyButton.click();
    },

    _insertEmbedUrl: function(url) {
        var host = this.get('host');
        host.focus();
        host.insertContentAtFocusPoint(url.replace("embed", "share"));
    },

    _showErrorDialogue: function(error) {
        var errorDialogue = this.getDialogue({width: 500});
        var headerContent = 'Error';
        var bodyContent = error;

        if (error.includes('incompatible-browser')) {
            headerContent = M.util.get_string('browsererror_title', 'atto_loom');
            bodyContent = M.util.get_string('browsererror', 'atto_loom');
        } else if (error.includes('no-publicappid')) {
            headerContent = M.util.get_string('nopublicappiderror_title', 'atto_loom');
            bodyContent = M.util.get_string('nopublicappiderror', 'atto_loom');
        }

        errorDialogue.set('headerContent', headerContent);
        errorDialogue.set('bodyContent', bodyContent);
        errorDialogue.show();
    }
}, {
    ATTRS: {
        publicappid: {
            value: null
        },
        fontfamily: {
            value: null
        },
        fontunitsize: {
            value: null
        },
        recordbuttoncolor: {
            value: null
        },
        recordbuttonhovercolor: {
            value: null
        },
        recordbuttonactivecolor: {
            value: null
        },
        primarycolor: {
            value: null
        },
        primaryhovercolor: {
            value: null
        },
        primaryactivecolor: {
            value: null
        }
    }
});


}, '@VERSION@', {"requires": ["moodle-editor_atto-plugin", "moodle-atto_loom-sdk"]});
