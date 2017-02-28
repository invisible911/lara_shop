# lara_shop
a small shop powered by Laravel framework.

## install
	1. composer update
	2. '''config database
	3. php artisan migrate:refresh
	4. php artisan db:seed
	
## Functionalities
### User
	1. browsing products	
	2. managing products in cart
	3. making orders
	5. viewing orders 


### Admin User
	1. adding new products
	2. viewing orders
	3. managing products (adding and chaging instock status)

## Implementation features:

	* keeping products added-in after sign up and log in.
	* 'database' carts and  soft delete items in a cart.
	* custom pivot table.
	* pagination.
	* use a third-party package to do the credit card validation.
	* using a queue job to process the checkout.
	* using cache to hold checkout results.
	* updating products in cart after successful checkout.
	* updating products instock information after checkout.
	

