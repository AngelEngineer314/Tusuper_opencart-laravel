/*
* HSCore
* @version: 2.0.0 (Mon, 25 Nov 2019)
* @requires: jQuery v3.0 or later
* @author: Appsry
* @event-namespace: .HSCore
* @license: Appsry Libraries (https://Appsry.com/licenses)
* Copyright 2020 Appsry
*/
'use strict';

$.extend({
	HSCore: {
		init: function () {
			$(document).ready(function () {
				// Botostrap Tootltips
				$('[data-toggle="tooltip"]').tooltip();

				// Bootstrap Popovers
				$('[data-toggle="popover"]').popover();
			});
		},

		components: {}
	}
});

$.HSCore.init();
