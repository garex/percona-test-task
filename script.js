(function() {
	var oldone       = null,
		initialTitle = null;

	function show(id) {
		var obj = document.getElementById(id);
		obj.className = '';
		oldone = id;
		setTitle(id);
	}

	function setTitle(newTitle) {
		!initialTitle && (initialTitle = document.title);

		document.title = newTitle + ' — ' + initialTitle;
	}

	function hide(id) {
		var obj = document.getElementById(id);
		obj.className = 'hidden';
	}

	function toggle(id) {
		oldone && hide(oldone);
		show(id);
	}

	window.toggle = toggle;
	window.onload = function() {
		show('about');
	};
})();
