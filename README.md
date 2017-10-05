# JSON REST API

### Requirements
* PHP
* Composer
* Git

### Instalation
```git clone https://github.com/CountJr/json-rest-api.git```


### Usage

* List all users
Method: GET
Request: /api/v1/users
Response:
    ```
    {
        "1": {
           "id": 1,
           "email": "some@mail.com",
           "password": "123asdas456",
           "first_name": "John",
           "second_name": "Doe",
           "age": 105,
           "sex": "M"
        }
        ...
    }
    ```

* List one user
Method: GET
Request: /api/v1/users/id
Response:
    ```
    {
       "id": 1,
       "email": "some@mail.com",
       "password": "123asdas456",
       "first_name": "John",
       "second_name": "Doe",
       "age": 105,
       "sex": "M"
    }
    ```
    
* Create user
Method: POST
Request: /api/v1/users
    ```
    {
       "email": "some@mail.com",
       "password": "123asdas456",
       "first_name": "John",
       "second_name": "Doe",
       "age": 105,
       "sex": "M"
    }
    ```
Response:
    ```
    {
        "id": "5"
    }
    ```

* Modify user
Method: PUT
Request: /api/v1/users/id
    ```
    {
       "email": "some@mail.com",
       "password": "123asdas456",
       "first_name": "John",
       "second_name": "Doe",
       "age": 105,
       "sex": "M"
    }
    ```
Response:
    ```
    {
        "msg": "ok"
    }
    ```
    
* Delete user
Method: DELETE
Request: /api/v1/users/id
Response:
    ```
    {
        "msg": "ok"
    }
    ```

### Last, but not least. To-do section

* Add more actions like bulk modify/delete.
* Secure password field.
* Add some validations of incoming data.
* (Important!) Add status codes in answers.
* (Important!) Take a look at test engine and make tests!
* Try to understand better API practices.
