function generate_qrcode() {
   	var nis = document.getElementById('nis');
   	$('#qrcode canvas').remove();
   	$('#qrcode').qrcode({
    	render:'canvas',
    	text:nis.value
   	});
}