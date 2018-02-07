
document.addEventListener('snipcart.ready', function() {
	
	Snipcart.subscribe('page.validating', function(ev, data) {
		if(ev.type == 'cart-content') {
			for(var i=0; i<data.length; i++) {
				if(data[i].metadata && data[i].metadata.spicy) {
					ev.addError(data[i].uniqueId, "Oups. I'm not sure you can handle that spicy taste.");
				}
			}
		}
	})
})

