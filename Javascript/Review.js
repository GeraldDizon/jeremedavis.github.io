function getSelectedValue(){
    var selectedValue = document.getElementById("location").value;
    document.getElementById('ShippingFee').value = selectedValue;
}

function checkforblank(){
    if (((document.getElementById('name').value) == "")||((document.getElementById('email').value) == "")
    	||((document.getElementById('contact').value) == "")||((document.getElementById('location').value) == "State or Province / City or Town")||((document.getElementById('address').value) == "")){
        document.getElementById('error').innerHTML="<li>Don't leavea blank</li>";
        return false;
    }
}


function ShippingOpt(){
    var shippingfee = document.getElementById("ShippingFee").value;
    var x = 0;
   if(document.getElementById('shipping').checked) {
        document.getElementById("ShippingValue").value = shippingfee;
    }else if(document.getElementById('pickup').checked) {
        document.getElementById("ShippingValue").value = x;
    }

}