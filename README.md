# DistanceCalculator
Distance calculator between cities.
The algorithm used to find the route between the cities use as inference rule the city closest to actual one.
The algorithm can be changed creating a extended file from Algorithm interface and changing the dependency in `src/travel/infrastructure/config/services.yaml`

## Install project
### Dependencies
You need Docker & Docker-compose.

- Clone the repo and go to the project root.

In the terminal you must execute the next commands:
```
docker-compose up -d
docker-compose exec php-fpm composer install
docker-compose exec php-fpm vendor/bin/simple-phpunit
```

### Execute project
In the terminal run:
```
docker-compose exec php-fpm ./solve.php
```

### Execute the tests
You must execute:
``` 
docker-compose exec php-fpm vendor/bin/simple-phpunit
```

