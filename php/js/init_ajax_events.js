/* Initiate AJAX Events 
 * ------------------------------------------
 * This script initialises specified AJAX events on page load
 * based on function called. For example, when the Dashboard is
 * loaded, an AJAX call is made to fetch all current and past events
 * from the database.
 */

function AJAX_load_my_dashboard (link, params) {
	$.ajax({
		type	: 'GET',
		url		: link,
		data	: '&uid=' + params,
		dataType: 'json',
		success	: function(data) {
			switch(data.response) {
				case 'data_retrieved':
					display_content(data.result);
					break;
				default:
					break;
			}
			},
			error	: function(data) {
				alert('Something went wrong');
			}
	});
}

function AJAX_load_my_events (link, params) {
	$.ajax({
		method	: 'GET',
		url		: link,
		data	: '&e_id=' + params['e'] + 
				  '&u_id=' + params['u'],
		dataType: 'json',
		success	: function (data) {
			if (data.event_new.response == 'new') {
				document.getElementById('event_created_notification').innerHTML += data.result;
				$('#event_created_notification').foundation('reveal', 'open');					
			}
			if (data.events_all.response == 'events_avail') {
				document.getElementById('all_happenings').innerHTML += data.events_all.result[0];
			}
			else if (data.events_all.response == 'no_events') {
				alert('There are no events');
			}
		},
		error	: function (data) {
			alert('Something went wrong');
		}
	});
}

function AJAX_load_organise_event (link, params) {
	generate_maps('map_container');
	$('#event_date').datetimepicker({
		timeFormat: 'hh:mm tt',
		separator: ' @ ',		
	});	
	
	$.ajax({
		method	: 'GET',
		url		: link,
		data	: '&uid=' + params['u'],
		dataType: 'json',
		success	: function(data) {
			 $(function() {
				var friendTags = data.result;
				$( "#event_friend" ).autocomplete({
					source: friendTags
				});
			});
		},
		error	: function(data) {
		}
	});
}
