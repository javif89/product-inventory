# Product Inventory

- We have users and products
- Products have name and brand
- Products also have variants of color or size
- A user has products and variants of that product but not necessarily all of them
- A user's inventory contains the users products and the variants they have of that product

## Seeding the database
```
php artisan db:seed
```

Will create 5 users with 10 products each and 2 variants of that product.

## Running the tests

After seeding the database you can run
```$xslt
phpunit
```

Or if that doesn't work:

```$xslt
php vendor\phpunit\phpunit\phpunit
```

For nice colored output you can add some parameters

```$xslt
php vendor\phpunit\phpunit\phpunit --colors=always --testdox
```

## Endpoints

**Products**

Retrieve product by id
```
GET /api/products/{id}
```

Add product
```
POST /api/products/create
```
```json
{
  "name": "Product Name",
  "brand": "Product Brand"
}
```

Delete Product
```
DELETE /api/products/{id}/delete
```

**User**

Get User's Inventory
```
GET /api/user/{id}/products
```