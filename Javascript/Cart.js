
var CaclulateCostTotal = function() {
    $('tr.items').each(function(i, el) {
        var $this = $(this),
            $cost = $this.find('[id="cost"]'),
            $quant = $this.find('[id="quantity"]'),
            c = parseFloat($cost.val()),
            q = parseInt($quant.val()),
            total = c * q || 0;
            
       $this.find('[id="total"]').val(total.toFixed(2));
        $this.find('[id="total"]').text(total.toFixed(2));

    });

};

var CaclulateQuantityTotal = function() {
    CaclulateCostTotal();
}

function notifVerif() {
    alert("Please verify your email to proceed.");
}
