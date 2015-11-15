/**
 * @license Copyright (c) 2003-2015, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here.
	// For complete reference see:
	// http://docs.ckeditor.com/#!/api/CKEDITOR.config

	// The toolbar groups arrangement, optimized for a single toolbar row.
	config.toolbar = [
		{ name: 'event', items: [ 'save' ] },
		{ name: 'basicstyles', items: [ 'Bold', 'Italic' ] },
		{ name: 'paragraph', items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent' ] }
	];

	// The default plugins included in the basic setup define some buttons that
	// are not needed in a basic editor. They are removed here.
	config.removeButtons = 'Cut,Copy,Paste,Undo,Redo,Anchor,Underline,Strike,Subscript,Superscript';

	// Dialog windows are also simplified.
	config.removeDialogTabs = 'link:advanced';
	// config.skin = 'bootstrapck';
	config.extraPlugins = 'save';
};

CKEDITOR.plugins.add( 'save', {
    icons: 'save',
    init: function( editor ) {
        editor.addCommand( 'savecontent', {
            exec : function(editor){
                var data = editor.getData();
                normal_icon = $('.cke_button__save_icon').css('background-image');

                alert(data);
                //replace the standard save icon with the ajaxloader icon. 
                //We do this with css.

                //Now we are ready to post to the server...
                // $.ajax({
                //     url: editor.config.saveSubmitURL,//the url to post at... configured in config.js
                //     type: 'POST', 
                //     data: {text: data, id: editor.name, page: page},//editor.name contains the id of the current editable html tag
                // })
                // .done(function(response) {
                //     console.log("success");
                //     alert('id: '+editor.name+' \nurl: '+page+' \ntext: '+data);

                // })
                // .fail(function() {
                //     console.log("error");
                // })
                // .always(function() {
                //     console.log("complete");
                //     //set the button icon back to the original
                //     $('.cke_button__save_icon').css("background-image", normal_icon);
                // });
            } 
    	});

        editor.ui.addButton( 'save', {
            label: 'Save',
            command: 'savecontent'
           // toolbar: 'insert'
        });
	}
});