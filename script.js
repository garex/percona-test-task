(function() {
	var oldone = null;

	function show(id) {
		var obj = document.getElementById(id);
		obj.className = '';
		oldone = id;
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
