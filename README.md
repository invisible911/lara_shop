# lara_shop
a small shop powered by Laravel framework.

## install
	1. composer update
	2. '''config database
	3. php artisan migrate:refresh
	4. php artisan db:seed


## use
	* php artisan serve
	* default user:
		190724@qq.com\password
	* admin user:
		admin1@laravelshop.com\admin_pass
	
## Functionalities
### User
	1. browsing products	
	2. managing products in cart
	3. making orders
	5. viewing orders 


### Admin User
	1. adding new products
	2. viewing all orders
	3. managing products (adding and updating instock status)
	4. acting as a normal user

## Implementation features:

* using middleware control
* keeping added products in cart after sign up and log in.
* 'database' carts and apply soft delete product items in a cart.
* custom pivot table.
* pagination.
* use a third-party package to do the credit card validation.
* server-side validation and alerts feedback in page when improper inputs.
* using a queue job to process the checkout.
* using cache to hold checkout results.
* updating products in cart after successful checkout.
* updating products instock information after checkout.
* admin user visit permission control.
	

