function total() {
	
	var subtotal = document.getElementById("subtotal").innerHTML;
	subtotal = subtotal.replace(/\D/g,'');
	var shippingfee = document.getElementById("shippingfee").innerHTML;
	shippingfee = shippingfee.replace(/\D/g,'');

	var total = parseInt(subtotal) + parseInt(shippingfee);
	document.getElementById("total").innerHTML = "&#8369; "  + total.toFixed(2);
}

