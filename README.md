# accouma
An Account Manager system for personal finances.

## Motivation

Accouma is a new system for taking control of your personal finances. Of course, it is not the first but, why not? Personaly I has five year administrating my accounts on a simple excel sheet, after that I decided to create a system for that.

## Technologies

  - Node.js
  - React.js
  - Sass
  - Materialize
  - Redux
  - Laravel
  - MySql
  - Magic
 
## On the Front End

After using a lot of programing tecnologies, we need an Ui framework, or doing from cero, I decided the first and search for something compatible with react.

Material design was my first option, but, I didn't find a stable framework... I found a bootstrap version from React that looks good, but it's from another school, for a momento I try a simple and different framework: Belle, but was too simple. Finally I returned for my first option with an specific Ui library that looks enough for me, materialize.

## Installing and running

 1. Clone or download from Github
 2. Make shure you have composer for php and node.js wh npm instaled
 3. Go to accouma_api folder an run on cmd:
  
```sh
$ composer install
```  

4. Go to accouma_front folder and run:


```sh
$ npm install
```

5. Return to the root folder of accouma and run:
    
    
```sh
$ sh serve.sh
```

Of course you can run all by separate:

#### Run api on accouma_api folder

```sh
$ php artisan serve
```

#### Run web on accouma_front folder

```sh
$ npm run dev
```

6. Thats all, Api listen on 8000 port and Web is abailable on 3000 port.
    
    
## Linting

Into the accouma_front folder you can lint the code to apply best practices and nicer code.

#### lint sass

```sh
$ npm run sasslint
```

#### lint js and jsx including Airbnb rules

```sh
$ npm run eslint
```

## Build the project

Still into accouma_front folder you can update the project with your changes using the next commands:

#### Build sass

```sh
$ npm gulp sass
```

#### Build js and jsx

```sh
$ npm gulp build
```


#### Or build all together

```sh
$ npm run make
```

## Contributing

All pull request are welcoming if make the project better.
