$(document).ready(function () {
	switch (selection)
	{
		case 'personal':
			document.getElementById('personal_tab').style.textDecoration = 'underline';
			break;
		case 'dashboard':
			document.getElementById('dashboard_tab').style.textDecoration = 'underline';
			break;
		case 'privacy':
			document.getElementById('privacy_tab').style.textDecoration = 'underline';
			break;
		default:
			break;
	}
});
