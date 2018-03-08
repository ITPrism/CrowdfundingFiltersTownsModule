jQuery(document).ready(function () {
	"use strict";

	jQuery("#js-cf-modfilterstowns-toggle-btn").on("click", function(event){
		event.preventDefault();

		jQuery("#js-cf-modfilterstowns-locations").toggle();
	});
});