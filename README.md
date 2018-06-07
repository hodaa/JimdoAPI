
# Jimdo-api

API list places matching a query I provided from multiple providers on the internet
 (e.g. Google Places, Yelp, and/or Foursquare).

## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes. See deployment for notes on how to deploy the project on a live system.

### Prerequisites

PHP 7.2

Composer (https://getcomposer.org/)


### Installing

Execute the following command in your project root to install this library:

      composer install
      composer dump-autoload -o

## Configuration

Provider type is exist in config.php file .


##Examples
        http://jimdo.test/?query=coffe&lat=30.02&lng=30.33
 
 Method:get
 Parameters:query is required
            lat & lng are optional

## Built With

* [PHP 7.2]
* [Composer autoloading Package]


## Authors

* **Hoda Hussin** -- (https://github.com/hodaa)

## License

This project is licensed under the MIT License - see the [LICENSE.md](LICENSE.md) file for details

