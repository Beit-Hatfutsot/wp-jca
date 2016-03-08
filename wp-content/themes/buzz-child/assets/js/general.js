$(document).ready(function() {

	// BH logo link
	$("<a href='" + _JCA_bh_siteurl + "' target='_blank'><div class='bh-logo'></div></a>").appendTo('#header > .container');

	// language switcher
	$('.shortcode-language-switcher li').each(function() {
		var link = $(this).find('a'),
			name = link.text();

		link.text(name.substr(0, 3).toUpperCase());
	});

});