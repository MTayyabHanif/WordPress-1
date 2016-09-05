

/*function bobcatNew() {
    document.getElementById("bobcat-new").onclick = doFunction;
}*/

/* Popup */
			function bobcatPop(div) {
				document.getElementById(div).style.display = 'block';
			} // 
			function bobcatHide(div) {
				document.getElementById(div).style.display = 'none';
			} // put inside popup so when you click, it closes
			
			//To detect escape button: 
			document.onkeydown = function(evt) { // when you press a key, function happens
				evt = evt || window.event; // 
				if (evt.keyCode == 27) { // 27 is ascii code for escape key
					hide('bobcatPopDiv'); //div id 'bobcatPopDiv' (div surrounding popup)
				} // place 'bobcatPopDiv' in bobcatPop function
			};