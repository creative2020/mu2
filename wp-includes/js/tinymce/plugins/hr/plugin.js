/**
 * plugin.js
 *
<<<<<<< HEAD
 * Copyright, Moxiecode Systems AB
 * Released under LGPL License.
=======
 * Released under LGPL License.
 * Copyright (c) 1999-2015 Ephox Corp. All rights reserved
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
 *
 * License: http://www.tinymce.com/license
 * Contributing: http://www.tinymce.com/contributing
 */

/*global tinymce:true */

tinymce.PluginManager.add('hr', function(editor) {
	editor.addCommand('InsertHorizontalRule', function() {
		editor.execCommand('mceInsertContent', false, '<hr />');
	});

	editor.addButton('hr', {
		icon: 'hr',
		tooltip: 'Horizontal line',
		cmd: 'InsertHorizontalRule'
	});

	editor.addMenuItem('hr', {
		icon: 'hr',
		text: 'Horizontal line',
		cmd: 'InsertHorizontalRule',
		context: 'insert'
	});
});
