$(document).ready(function() {

	// BH logo link
	$("<a href='" + _JCA_bh_siteurl + "' target='_blank'><div class='bh-logo'></div></a>").appendTo('#header > .container');

	// personalities
	$('.personalities-data .person').bind('click', jca_toggle_person);
	$('.personalities-data .person a').click(function(e) { e.stopPropagation(); });

	// language switcher
	$('.shortcode-language-switcher li').each(function() {
		var link = $(this).find('a'),
			name = link.text();

		link.text(name.substr(0, 3).toUpperCase());
	});

});

/**
 * jca_toggle_person
 *
 * Toggle person info
 *
 * @param		event (object)
 * @return		N/A
 */
function jca_toggle_person(event) {

	var current = event.currentTarget,
		active = $(current).hasClass('active') ? true : false;

	// toggle active
	if (active) {
		$(current).removeClass('active');
		$(current).children('.toggle').text('+');
	}
	else {
		$(current).addClass('active');
		$(current).children('.toggle').text('-');
	}

}
