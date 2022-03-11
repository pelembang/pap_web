/**
 * @license Copyright (c) 2003-2017, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.timestamp='yus123';


if($(".ckeditor").length>0){var idcke=$(".ckeditor").attr('id');}


CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
	config.filebrowserBrowseUrl = 'js/plugins/elfinder/elfinder.html';
	config.height = document.getElementById(idcke).rows*10;
	//config.height = 500;
	config.extraPlugins = 'stylescombo,richcombo';
	config.stylesSet = 'my_styles';

};
