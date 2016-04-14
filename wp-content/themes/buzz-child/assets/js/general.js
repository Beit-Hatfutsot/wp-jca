$(document).ready(function() {

	// BH logo link
	$("<a href='" + _JCA_bh_siteurl + "' target='_blank'><div class='bh-logo'></div></a>").appendTo('#header > .container');

	// personalities
	$('.personalities-data .person').bind('click', jca_toggle_person);
	$('.personalities-data .person a').click(function(e) { e.stopPropagation(); });

	// timeline
	jca_init_timeline();

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

/**
 * jca_init_timeline
 *
 * Initiate timeline visibility
 *
 * @param		N/A
 * @return		N/A
 */
function jca_init_timeline() {

	var timezones_wrapper	= $('.timezones-wrapper'),
		timezones			= timezones_wrapper.find('.timezones'),
		first_timezone		= timezones.children('li').eq(0),
		first_timezone_id	= first_timezone.attr('data-timezone-id'),
		sub_timezones		= timezones_wrapper.find('.sub-timezones');

	// active first timezone
	jca_change_timezone(first_timezone_id);

	// bind click events
	timezones.children('li').bind('click', jca_select_timezone);
	sub_timezones.children('li').bind('click', jca_select_sub_timezone);

}

/**
 * jca_select_timezone
 *
 * Select timezone
 *
 * @param		event (object)
 * @return		N/A
 */
function jca_select_timezone(event) {

	var current		= event.currentTarget,
		active		= $(current).hasClass('active') ? true : false;

	if (active)
		return;

	timezone_id = $(current).attr('data-timezone-id');

	// change timezone
	jca_change_timezone(timezone_id);

}

/**
 * jca_select_sub_timezone
 *
 * Select sub-timezone
 *
 * @param		event (object)
 * @return		N/A
 */
function jca_select_sub_timezone(event) {

	var current		= event.currentTarget,
		active		= $(current).hasClass('active') ? true : false;

	if (active)
		return;

	sub_timezone_id = $(current).attr('data-sub-timezone-id');

	// change timezone
	jca_change_sub_timezone(sub_timezone_id);

}

/**
 * jca_change_timezone
 *
 * Change timezone
 *
 * @param		timezone_id (int)
 * @return		N/A
 */
function jca_change_timezone(timezone_id) {

	var timezones_wrapper	= $('.timezones-wrapper'),
		timezones			= timezones_wrapper.find('.timezones'),
		active_timezone		= timezones.find("[data-timezone-id='" + timezone_id + "']"),
		sub_timezones		= timezones_wrapper.find('.sub-timezones'),
		timeline_lists		= $('.timeline-list');

	// deactivate all timezones and sub-timezones
	timezones.children('li').removeClass('active');
	sub_timezones.removeClass('active');
	sub_timezones.children('li').removeClass('active');

	// deactivate all timeline lists
	timeline_lists.removeClass('active');

	// activate current timezone
	active_timezone.addClass('active');

	// activate current sub-timezones (ul) and first sub-timezone (li)
	var active_sub_timezones	= timezones_wrapper.find("[data-parent-timezone-id='" + timezone_id + "']"),
		first_sub_timezone		= active_sub_timezones.children('li').eq(0);
		first_sub_timezone_id	= first_sub_timezone.attr('data-sub-timezone-id');

	// activate current sub-timezones (ul)
	active_sub_timezones.addClass('active');

	// activate first sub-timezone (li)
	first_sub_timezone.addClass('active');

	// activate first sub-timezone timeline list
	$(".timeline-list[data-timeline-list-id='" + first_sub_timezone_id + "']").addClass('active');

}

/**
 * jca_change_sub_timezone
 *
 * Change sub-timezone
 *
 * @param		sub_timezone_id (int)
 * @return		N/A
 */
function jca_change_sub_timezone(sub_timezone_id) {

	var timezones_wrapper	= $('.timezones-wrapper'),
		sub_timezones		= timezones_wrapper.find('.sub-timezones'),
		timeline_lists		= $('.timeline-list');

	// deactivate all sub-timezones
	sub_timezones.children('li').removeClass('active');

	// deactivate all timeline lists
	timeline_lists.removeClass('active');

	// activate sub-timezone
	sub_timezones.find("[data-sub-timezone-id='" + sub_timezone_id + "']").addClass('active');

	// activate sub-timezone timeline list
	$(".timeline-list[data-timeline-list-id='" + sub_timezone_id + "']").addClass('active');

}