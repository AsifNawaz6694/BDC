function UpdateShopProductQuick(url, shop_id, product_code, sale_price, quantity){

	$.post( url ,
		{
			'_token': csrf_token,
			'shop_id': shop_id,
			'product_code': product_code,
			'sale_price': sale_price,
			'quantity': quantity
		},
		function(response){
			if( response == 'null' ){
				$.toaster({ message : 'Error updating product details', priority : 'danger' });
			}else{
				$.toaster({ message : 'Product details updated' });
			}
		}
	);

}

function UpdateProductActiveState(url, shop_id, product_id, state){

	$.post( url , 
	{
		'_token': csrf_token,
		'shop_id': shop_id,
		'product_id': product_id,
		'is_active': state
	}
	, function(response){

		if(state){
			state = 'available';
			$.toaster({ message : 'Product is ' + state + ' for your shop' });
		}else{
			state = 'not available';
			$.toaster({ message : 'Product is ' + state + ' for your shop',  
				priority : 'danger' });
		}

	});

}

var table = $(".jTable-onpage").DataTable({

	'fnCreatedRow': function (nRow, aData, iDataIndex) {
		$(nRow).attr('data-product-code', aData[1]);
		$(nRow).attr('id', 'product-' + aData[1]);
	},

});

var shop_p_table = $("#shop-products").DataTable({

	'fnCreatedRow': function (nRow, aData, iDataIndex) {
		$(nRow).attr('data-product-code', aData[0]);
		$(nRow).attr('id', 'product-' + aData[0]);
	},		

});