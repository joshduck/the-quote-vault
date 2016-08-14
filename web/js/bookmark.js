function bookmarkPage()
{ 
	var set = false;
	try { 
		if (window.external && typeof window.external.AddFavorite != 'undefined') 
		{
			window.external.AddFavorite(location.href, document.title); 
			set = true;
		}
		else if (window.sidebar) 
		{
			window.sidebar.addPanel(location.href, document.title, '');
			set = true;
		}
	}
	finally 
	{ 
		if (!set) alert("Press Ctrl+D to bookmark this page in your browser."); 
	}
}