
jQuery(document).ready(function() {
	

	/****************************************************************/
	/*** MOBILE NAVIGATION 																				  */
	/****************************************************************/
	jQuery('#SidebarNavigation').hide();
	jQuery('#SiteOverlay').hide();

	jQuery('#SidebarNavigation').children('div.w3-bar-block').children('a').click(function() {
		jQuery('#SidebarNavigation').toggle();
		jQuery('#SiteOverlay').toggle();
	});

	jQuery('a.MobileNavButton').click(function() {
		jQuery('#SidebarNavigation').toggle();
		jQuery('#SiteOverlay').toggle();
		return false;
	});

	jQuery('#SiteOverlay').each(function() {
		jQuery(this).click(function() {
			jQuery('#SidebarNavigation').toggle();
			jQuery('#SiteOverlay').toggle();
			return false;
		});
	});

	jQuery("div.HomeLink").click(function() {
		document.location.href = baseUrl;
	})

});

