# Message Bus - PHP

This is an example implementation of message bus on a web-application. This can often be a way to distribute load 
across an application, allowing work to be placed in a queue and processed independently. 

Steps: 

1. Clone this repository
2. Move to the message-bus directory using `cd message-bus/`
3. Run `composer install && composer dump-autoload -o`
4. Run `php -S localhost:8000 -t public`
5. Open another tab in terminal and move to `scripts` directory
6. Run `php worker_script.php`
7. Open Postman or apps like postman
8. Create a post request with url `http://localhost:8000/create` and post param `key = some values`
9. Then send the request and watch the response in your postman response 
10. Also check the response in worker tab in terminal 