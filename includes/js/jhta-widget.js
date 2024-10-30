jQuery(document).ready(function() {
	
	jQuery('.jhtaAccord').live('click', function(){
		jQuery(this).parent().children('.jhtaAccordWrap').hide();
		jQuery(this).next('.jhtaAccordWrap').show();
	});
	
	jQuery('.jhtaTb').live('click', function(){
		var cntId = jQuery(this).parent().attr('editorId');
		var openTag = jQuery(this).attr('openTag');
		var closeTag = jQuery(this).attr('closeTag');
		var action = jQuery(this).attr('action');
		return awQuickTags(cntId, openTag, closeTag, action);
	});
	
	jQuery('.jhtaTb-preview').live('click', function(){
		var editId = jQuery(this).attr('editorId');
		jhtaOpenPopup(jQuery('#' + editId).val());
	});
	
	jQuery('.jhtaOverlayClose').click(function(){
		jQuery(this).parent().fadeOut('fast');
	});
	
});

function jhtaOpenPopup(content){
	
	jhtaIframe.document.open();
	jhtaIframe.document.write(content);
	jhtaIframe.document.close();
	
	jQuery('.jhtaWindow').fadeIn('fast');
}