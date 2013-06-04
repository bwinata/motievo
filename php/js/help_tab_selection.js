$(document).ready(function () {
	switch (selection)
	{
		case 'faq':
			document.getElementById('faq_tab').style.textDecoration = 'underline';
			break;
		case 'about':
			document.getElementById('about_tab').style.textDecoration = 'underline';
			break;
		case 'privacy':
			document.getElementById('privacy_tab').style.textDecoration = 'underline';
			break;
		default:
			break;
	}	
});
