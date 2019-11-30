/**
 * @license Copyright (c) 2003-2019, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see https://ckeditor.com/legal/ckeditor-oss-license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
    config.language = 'vi';
	// config.uiColor = '#AADC6E';
	config.allowedContent = true;
    config.disallowedContent = 'img {width,height}';
    config.extraAllowedContent = 'img[title]';
    config.entities = false;
	config.filebrowserBrowseUrl= '/ckfinder/ckfinder.html',
    config.filebrowserUploadUrl= '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files'
 
};