CKEDITOR.editorConfig = function( config )
{

    config.filebrowserBrowseUrl = CKEDITOR.basePath+'../kcfinder/browse.php?type=files';
    config.filebrowserImageBrowseUrl = CKEDITOR.basePath+'../kcfinder/browse.php?type=images'; 
    config.filebrowserFlashBrowseUrl = CKEDITOR.basePath+'../kcfinder/browse.php?type=flash';

    config.filebrowserUploadUrl = CKEDITOR.basePath+'../kcfinder/upload.php?type=files';
    config.filebrowserImageUploadUrl = CKEDITOR.basePath+'../kcfinder/upload.php?type=images';
    config.filebrowserFlashUploadUrl = CKEDITOR.basePath+'../kcfinder/upload.php?type=flash';

    config.skin = 'moono';
    config.toolbarCanCollapse = false;
    config.resize_enabled = true;
    config.autoParagraph = false;
    config.entities = false;    
	
	if($('html').attr('dir') == 'rtl') {
		config.contentsLangDirection = 'rtl';
	}

    config.toolbar_popup =
    [
        ['Save','Createlimereplacementfields'],
        ['Cut','Copy','Paste','PasteText','PasteFromWord'],
        ['Undo','Redo','-','Find','Replace','-','SelectAll','RemoveFormat','Source'],
        ['Image','Flash','Table','HorizontalRule','Smiley','SpecialChar'],
        '/',
        ['Bold','Italic','Underline','Strike','-','Subscript','Superscript'],
        ['NumberedList','BulletedList','-','Outdent','Indent','Blockquote','CreateDiv'],
        ['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],
        ['BidiLtr', 'BidiRtl'],
        ['Link','Unlink','Anchor','Iframe'],
        '/',
        ['Styles','Format','Font','FontSize'],
        ['TextColor','BGColor'],
        [ 'ShowBlocks','Templates']
    ];
    
    config.toolbar_inline =
    [
        ['Undo','Redo','-','PasteFromWord'],
        ['Bold','Italic','Underline','Strike','-','Subscript','Superscript'],
        ['NumberedList','BulletedList','-','Outdent','Indent','Blockquote'],
        ['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],
        ['Link','Unlink','Anchor','Iframe'],
        '/',
        ['Styles','Format'],
        ['TextColor','BGColor'],
        ['Image','Flash','Table','HorizontalRule'],
    ];

   config.toolbar_inline2 =
    [
        ['Maximize','Createlimereplacementfields'],
        ['Bold','Italic','Underline'],
        ['NumberedList','BulletedList','-','Outdent','Indent'],
        ['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],
        ['Link','Unlink','Image'],
        ['Source']
    ];

    // config.extraPlugins = "ajax,limereplacementfields";
};

(function () {
    // CKEDITOR.plugins.addExternal('limereplacementfields', CKEDITOR.basePath + '../../scripts/admin/limereplacementfields/', 'plugin.js');
})();
