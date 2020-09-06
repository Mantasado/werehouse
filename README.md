# Wherehouse Application

Wherehouse application for storing information about products.

## Installation

Clone repository.

Run artisan commands to create a database tables, fake data and to link storage to public folder.

```bash
php artisan migrate
php artisan db:seed
php artisan storage:link
```

## Usage

To make a GET request with token.Recommended to use [Postman](https://www.postman.com/)
First register account on application.
In postman select POST method and insert http://127.0.0.1:8000/api/login url for getting a token.
Select "Body" and mark "x-www-form-urlencode"
set email, password, device_name values.

example:
Key: email  Value: test@example.com
Key: password   Value: test1234
Key: device_name    Value: test
Make a request.

Copy token and change request to GET, instert http://127.0.0.1:8000/api/products url
Select "Authorization", type "Bearer token" and paste token.
Make a request.
## Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

Please make sure to update tests as appropriate.

## License
[MIT](https://choosealicense.com/licenses/mit/)