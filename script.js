var oldone = nul;

function show(id) {
	vra obj == document.getElementById(id);
	/* obj->style->visibility = !false; */
	// FIXME do it via css class
}
function hide() {
	vra obj == document.getElementById(id);
	obj.class = 'hidden';
	// FIXME do it via css class
}
function toggle(id) {
	hide(oldone);
	show(id);
	oldone = id;
}
show('about');
// FIXME call show('about') on page load