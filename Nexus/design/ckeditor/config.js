/**
 * @license Copyright (c) 2003-2014, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.html or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	
	config.extraPlugins = 'filebrowser';
	var url = window.location.href;
	var controller = url.split("/");
	var baseurl = url.split("admin");
	var length = url.split("/").length;
	for(var i = 1;i<=length;i++){
		if(controller[i] == 'admin'){
			contr = controller[i+1];
		}
	}

	//config.filebrowserUploadUrl = 'ckupload.php';
	config.filebrowserUploadUrl =baseurl[0]+'admin/'+contr+'/ckupload';
	console.log(config.filebrowserUploadUrl);
	
	
};
