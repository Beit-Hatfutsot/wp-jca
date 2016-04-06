/**
 * PF - widget frontend JS functions
 *
 * @author		Nir Goldberg
 * @package		js
 * @version		1.0
 */
jQuery( function($) {

	// letters
	$('.pf-widget .pf-letters-filter li').bind('click', pf_letter_click);

	// communities / occupations
	$('.pf-widget .pf-communities-filter select, .pf-widget .pf-occupations-filter select').bind('change', pf_communities_occupations_change);

	// clear
	$('.pf-widget .button-clear a').bind('click', pf_clear);

});

/**
 * pf_letter_click
 *
 * Toggle letter
 *
 * @since		1.0
 * @param		event (object)
 * @return		N/A
 */
function pf_letter_click(event) {

	var current = event.currentTarget,
		active = $(current).hasClass('active') ? true : false;

	// toggle active
	if (active) {
		$(current).removeClass('active');
	}
	else {
		$(current).addClass('active');
	}

	// refresh personalities
	pf_refresh_personalities();

}

/**
 * pf_communities_occupations_change
 *
 * Select change event handling
 *
 * @since		1.0
 * @param		event (object)
 * @return		N/A
 */
function pf_communities_occupations_change(event) {

	// refresh personalities
	pf_refresh_personalities();

}

/**
 * pf_clear
 *
 * Clear all filters
 *
 * @since		1.0
 * @param		event (object)
 * @return		N/A
 */
function pf_clear(event) {

	// clear letters
	$('.pf-widget .pf-letters-filter li').removeClass('active');

	// clear selects
	$('.pf-widget .pf-communities-filter select, .pf-widget .pf-occupations-filter select').val('0');

	// refresh personalities
	pf_expose_all_personalities();

}

/**
 * pf_refresh_personalities
 *
 * Refresh personalities grid according to filter values
 *
 * @since		1.0
 * @param		N/A
 * @return		N/A
 */
function pf_refresh_personalities() {

	// collect filters values
	var letters		= [],
		community	= $('.pf-communities-filter select').val(),
		occupation	= $('.pf-occupations-filter select').val();

	$('.pf-widget .pf-letters-filter li').each(function() {
		if ( $(this).hasClass('active') ) {
			letters.push( $(this).index() );
		}
	});

	// hide all persons from grid
	$('.person').addClass('hidden');

	// hide all letters from grid
	$('.personalities-index-entry').addClass('hidden');

	// expose only persons who match filters
	$('.person').each(function() {
		var classes	= $(this).attr('class'),
			letter	= pf_get_person_letter(classes);

		if ( ( ! letters.length || letter && $.inArray(parseInt(letter), letters) != -1 ) &&
		     ( community == '0' || community != '0' && $(this).hasClass('com-' + community) ) &&
		     ( occupation == '0' || occupation != '0' && $(this).hasClass('occ-' + occupation) )
		   ) {
			// expose person
			$(this).removeClass('hidden');

			// expose letter
			$(this).parent('.personalities-index-entry').removeClass('hidden');
		}
	});

	// close all persons info
	pf_close_all_persons();

}

/**
 * pf_expose_all_personalities
 *
 * Expose all personalities after clearing filters
 *
 * @since		1.0
 * @param		N/A
 * @return		N/A
 */
function pf_expose_all_personalities() {

	// expose all persons
	$('.person').removeClass('hidden');

	// expose all letters
	$('.personalities-index-entry').removeClass('hidden');

	// close all persons info
	pf_close_all_persons();

}

/**
 * pf_get_person_letter
 *
 * Get person index letter according to its class attribute
 *
 * @since		1.0
 * @param		classes (string) class attrinute
 * @return		(mixed) index or false if no letter found
 */
function pf_get_person_letter(classes) {

	var letter_regex = /index-entry-(\d+)/,
		m;

	if ((m = letter_regex.exec(classes)) !== null) {
		// return
		return m[1];
	}

	// return
	return false;

}

/**
 * pf_close_all_persons
 *
 * Close all persons info
 *
 * @since		1.0
 * @param		N/A
 * @return		N/A
 */
function pf_close_all_persons() {

	var persons = $('.personalities-data .person');

	persons.removeClass('active');
	persons.children('.toggle').text('+');

}