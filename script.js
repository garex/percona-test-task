(function() {
	var oldone       = null,
		initialTitle = null;

	function setupMenu() {
		var links = document.getElementById('menu').getElementsByTagName('a');

		for (var i = 0, iMax = links.length; i < iMax; i++) {
			links[i].onclick = function() {
				var id = extractIdFromHash(this.href);
				if (!document.getElementById(id)) {
					return false;
				}
				toggle(id);
			};
		}
	}

	function extractIdFromHash(hash) {
		return hash.split('#').slice(-1)[0];
	}

	function showFromHash() {
		var hash = window.location.hash;

		if (!hash) {
			return false;
		}

		var id = extractIdFromHash(hash);
		if (!document.getElementById(id)) {
			return false;
		}

		show(id);

		return true;
	}

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
		setupMenu();
		showFromHash() || show('about');
	};
})();
