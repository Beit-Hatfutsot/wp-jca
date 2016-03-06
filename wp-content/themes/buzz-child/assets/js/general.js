$(document).ready(function() {

/*	// smooth scroll
	var platform = navigator.platform.toLowerCase(),
		srSmoothscroll_args = {
			// defaults
			step: 55,
			speed: 400,
			ease: 'linear',
			target: $('body'),
			container: $(window)
		};

	if (platform.indexOf('win') == 0 || platform.indexOf('linux') == 0) {
		if ($.browser.webkit) {
			$.srSmoothscroll(srSmoothscroll_args);
		}
	}
*/

/*	var s = skrollr.init({
		smoothScrolling: true,
		smoothScrollingDuration: 200
	});
*/
	var s = skrollr.init({
		edgeStrategy: 'set',
		easing: {
			WTF: Math.random,
			inverted: function(p) {
				return 1-p;
			}
		}
	});
});