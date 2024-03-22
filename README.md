# About the project

It's an API using PostGreSQL and Laravel to register places in the database just by informing its name, city and state (only brazilian states). 
You can register a place, edit, see the data of a place registered previously or list of it and search places just by the name.
In the database, the table 'places' has a 'slug' column that autocompletes based on its name.


In order to the API work, it's necessary the creation of a database in PostreGreSQL and the '.env' file using 'env.example' as reference.
After that, fill these fields in '.env':



```
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE={your_database_name}
DB_USERNAME={your_postgre_username}
DB_PASSWORD={your_postgre_password}
```



## Available routes


### List
[GET] It shows all the places registered before by pagination (http://127.0.0.1:8000/api).


### Show
[GET] Shows the data of single place just writing the slug in the URL (http://127.0.0.1:8000/api/show/{slug}).


### Search
[POST] List places by name based on the characters given in the form. It has only one field. (http://127.0.0.1:8000/api/search).
```
name: string
```


### Create
[POST] Allow you to register a new place in the database. For that, there're 3 fields to fill (http://127.0.0.1:8000/api/store)
```
name: string
city: string
state: enum - contains the acronym of each Brazilian state (RS, SC and PR for example)
```
After sending the data, there will be an autocomplete slug based on the name.



### Update
[POST] Allow you to edit the data of a place registered previously. (http://127.0.0.1:8000/api/update/{slug}?_method=PUT).
```
name: string
city: string
state: enum - contains the acronym of each Brazilian state (RS, SC and PR for example)
```


## About Docker


There's a Dockerfile and a docker-compose file that are supposed to run the project with only Docker. 
But unfortunately there were some problems during the connection with Laravel and PostGreSQL.
So in order to run the project, I recommend installing composer and php.
