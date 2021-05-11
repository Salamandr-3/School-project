var val0 = 0;
setTimeout(function run() {
	var val = document.getElementById('cnt').value;
	if (isEmpty(val)) {
		val = 3;
	}
	if (val < 1) {
		val = 1;
	}
	if (val > 10) {
		val = 10;
	}
	if (val > 0 && val < 11) {
		if(val0 != val){
			val0 = val;
			$(".factor").empty();
			var a = "";
			for (var i = 1; i < val; i++) {
				a += '+(<input type="number" class="inp" name="'+(val - i)+'">)X <sup><small>'+ (val - i) +'</small></sup>';
			}
			$('.factor').append('<p><i><input type="number" class="inp" name="'+val+'">X <sup><small>'+ val +'</small></sup>'+ a +'+ (<input type="number" class="inp" name="0">)</i></p>');
		}
	}
   	setTimeout(run, 1);
}, 1);
function isEmpty(str) {
	if (str.trim() == '')
		return true;
	return false;
}