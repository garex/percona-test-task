var oldone = null;

function show(id) {
	var obj = document.getElementById(id);
	/* obj->style->visibility = !false; */
	// FIXME do it via css class
}
function hide(id) {
	var obj = document.getElementById(id);
	obj.className = 'hidden';
	// FIXME do it via css class
}
function toggle(id) {
	hide(oldone);
	show(id);
	oldone = id;
}
show('about');
// FIXME call show('about') on page load