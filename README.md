yo-back
=======

Yo-back is a mini-framework written in PHP. It will allow you to deploy a Yo-enabled
service in minutes.

## Usage

1. Clone this repository somewhere on your web server
2. Run `composer update`
3. Make sure your web server is configured to expose the www folder
4. Go to your [Yo dashboard](https://dev.justyo.co/) and grap your API token.
5. Configure a callback URL for your account, routing to the www folder
6. Rename the file `config/config.php.dist` in `config/config.php`
7. Open it and paste your API token
8. Write an "handler" closure as indicated in the header. This IS the only logic required. The handler is used to create a payload to send with your Yo.

Done! You're welcome.

## Demo

Coming soon

## License

Yo-back is licensed under BSD-2-Clause.