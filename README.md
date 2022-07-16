# EXADS Test

## Get Started
- First, you will need to install git, docker, docker-compose on your computer.
- Clone the repo `git clone <this repository url>`
- The test is enclosed in 3 directories: PrimeNumbers-AsciiArray, ABTesting, TVSeries


### PrimeNumbers-AsciiArray
- Inside the directory to see the result of the Task **Prime Numbers** execute:   
  `docker-compose run backend php PrimeNumbers.php`
- For the AsciiArray task. I formulated 2 solutions(AsciiArray.php & AsciiArray1.php).
  So inside the directory to see the result of the Task **ASCII Array** execute:   
  `docker-compose run backend php AsciiArray.php` OR  
  `docker-compose run backend php AsciiArray1.php`

### TVSeries
- First set up the environment and populate the DB. Inside the directory execute:
  `docker-compose up`
- Inside the directory to see the next tv shows for today execute:  
  `docker-compose exec backend php showTvSeries.php`
- Inside the directory to see the next tv shows from certain dateTime execute:  
  `docker-compose exec backend php showTvSeries.php '2022-07-21 08:00'`
- Inside the directory to see the next tv shows from certain dateTime and filtered by title execute:  
  `docker-compose exec backend php showTvSeries.php '2022-07-21 08:00' Saint Seiya`

My intention here is to show up my skills to code without the use of any dependency/package.
During the development process I used phpstan at level 9

### ABTesting
- Inside the directory to install dependencies & run web server execute:   
  `docker-compose up`
- Inside the directory to run the tests execute:  
  `docker-compose exec backend vendor/bin/phpunit`
- Inside the directory to analyze the code execute:  
  `docker-compose exec backend vendor/bin/phpstan analyse -l 9 src/`
- Click over the url(http://localhost:8884) to see the different promotions & designs

I used Nginx, PHP-FPM for this application to achieve great performance.
There are missing points I would have liked to achieve,but due to time I couldn't. I'm going to mention them anyway:
- Cache the result
- Setup preloading & jit to reach higher performance.  
- I have a project which focus on performance & microservices: https://github.com/nordin74/sample-code-sf

I decided focus the tests in the core of the app(election of the design), obviously the coverage could be increased. I have a project focus on testing, maybe you could find it interesting:
  https://github.com/nordin74/associative-json-assertions  
Finally, I decided not to use any framework as I heard you have a custom MVC framework.

### Thanks!
