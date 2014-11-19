function highlight_error_fields (fields) {
	document.getElementById('alert').style.display = 'block';
    $.each(fields, function(k, v) {
        document.getElementById(v).style.backgroundColor = '#F9B9BF';
    });
    $('body, html').animate({
    	scrollTop: 0
    }, 800);
}