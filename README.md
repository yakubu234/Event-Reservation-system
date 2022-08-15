<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

# Project: Event Scheduling and Resevation

This is the documentation for EventX an online event organizing and reservation system. the API is hosted on Heroku, and can be found at https://event-reservation-system.herokuapp.com

if you want to test the endpoints then the variable {{url}} should be https://event-reservation-system.herokuapp.com without trailing slash or your server IP Address if you clone the Laravel app to your local machine.

All .env parameters needed are available at the .env.example file, kindly use the variable and replace with your own parameters. you can as well view a postman version of this documentation at https://documenter.getpostman.com/view/12538701/UzkQayEk

# 📁 Collection: Event

## End-point: Create an event

This endpoint create unique event. This is a Post request, and requires Authorization bearer Token, which is the token generated on Login. This endpoint consist of the below payload.

~~required field~~

1. user_id : this is the UiD returned at the login, its unique to individual authenticated users. this endpoint is expecting a string datatype.

2. event_name: this is unique and is being validated at the backend. it accepts string data type.

3. location : This is the address or landmark to where the event will take place.

4. event_date : This is the exact date of the event, it accepts a string datatype.

5. status : This is an Enum field, it accepts only one of this two 'active' or 'inactive' by default an event that's about to be created is active

6. type : This is an Enum field, it accepts only one of htis two 'free', 'paid' . a paid event will make use of paystack as the payment gateway.

7. maximun_seats : This is the total number of reservations available for the event. it accepts string or integer data type.

8. start_time : This is the expected start time of the event, it accepts a string data type

~~non-required field~~

9. end_time : This is the presumed time the event will end. its a string data type, and not a required field.

10. file : This is can be a picture or a short advertisement video not more than 2mb in size. this is an optional field.

### Method: POST

> ```
> {{url}}/api/event/create
> ```

### Headers

| Content-Type | Value            |
| ------------ | ---------------- |
| Accept       | application/json |

### Body formdata

| Param         | value                                                         | Type |
| ------------- | ------------------------------------------------------------- | ---- |
| user_id       | 96f99c05-7cd7-4cc8-83ef-3ae0631ec708                          | text |
| event_name    | NaijaHacks hundred 10                                         | text |
| location      | Zone Tech park, Gbagada, Lagos                                | text |
| event_date    | 2022-10-23                                                    | text |
| type          | paid                                                          | text |
| start_time    | 39:00                                                         | text |
| end_time      | 40:00                                                         | text |
| file          | /home/yakubu/Pictures/Screenshot from 2022-08-07 18-49-13.png | file |
| maximun_seats | 50                                                            | text |
| status        | active                                                        | text |

### 🔑 Authentication bearer

| Param | value | Type                                     |
| ----- | ----- | ---------------------------------------- | ------ |
| token | 2     | 8Zq07ct5w50LscWZw3NUJCydqT9INYMGVQp9fgw6 | string |

### Response: 200

```json
{
    "status": "Success",
    "message": "Event added successfully",
    "data": {
        "event": {
            "id": "96f8d76f-23e9-4e68-9bbd-50603b162683",
            "event_name": "NaijaHacks hundred 10",
            "location": "Zone Tech park, Gbagada, Lagos",
            "event_date": "2022-10-23",
            "event_uid": "96f8d76f-23e9-4e68-9bbd-50603b162683",
            "maximun_seats": "50",
            "start_time": "39:00",
            "media_file": null,
            "type": "paid",
            "user": {
                "id": 1,
                "uid": "96f8c9d6-528d-471a-94b9-4e210832fa4a",
                "first_name": "Abiola",
                "last_name": "Yakubu",
                "email": "yakubuabiola2003@gmail.com",
                "email_verified_at": null,
                "created_at": "2022-08-08T10:00:23.000000Z",
                "updated_at": "2022-08-08T10:00:23.000000Z"
            },
            "ticket": []
        }
    }
}
```

⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃

## End-point: Update an event

This endpoint Updates an existing event. This is a Post request, and requires Authorization bearer Token, which is the token generated on Login. This endpoint consist of the below payload.

~~ required field ~~

1. event_id : This is a unique ID attached to an Individual Event, it is a string data type

~~any one is optional field~~ 2. event_name : This is the name of the Event, it accepts a string data type

3. user_id : this is the UiD returned at the login, its unique to individual authenticated users. this endpoint is expecting a string datatype.

4. event_name: this is unique and is being validated at the backend. it accepts string data type.

5. location : This is the address or landmark to where the event will take place.

6. event_date : This is the exact date of the event, it accepts a string datatype.

7. status : This is an Enum field, it accepts only one of this two 'active' or 'inactive' by default an event that's about to be created is active

8. type : This is an Enum field, it accepts only one of htis two 'free', 'paid' . a paid event will make use of paystack as the payment gateway.

9. maximun_seats : This is the total number of reservations available for the event. it accepts string or integer data type.

10. start_time : This is the expected start time of the event, it accepts a string data type

11. end_time : This is the presumed time the event will end. its a string data type, and not a required field.

12. file : This is can be a picture or a short advertisement video not more than 2mb in size. this is an optional field.

### Method: POST

> ```
> {{url}}/api/event/update
> ```

### Headers

| Content-Type | Value            |
| ------------ | ---------------- |
| Accept       | application/json |

### Body formdata

| Param         | value                                                         | Type |
| ------------- | ------------------------------------------------------------- | ---- |
| event_id      | 96f99e6e-3d9c-40b0-80cc-dd2393ee1d62                          | text |
| event_name    | NaijaHacks hundred 10                                         | text |
| location      | Zone Tech park, Gbagada, Lagos                                | text |
| event_date    | 2022-12-23                                                    | text |
| type          | paid                                                          | text |
| start_time    | 39:00                                                         | text |
| end_time      | 40:00                                                         | text |
| file          | /home/yakubu/Pictures/Screenshot from 2022-08-01 18-00-07.png | file |
| maximun_seats | 50                                                            | text |
| status        | active                                                        | text |

### 🔑 Authentication bearer

| Param | value | Type                                     |
| ----- | ----- | ---------------------------------------- | ------ |
| token | 2     | 8Zq07ct5w50LscWZw3NUJCydqT9INYMGVQp9fgw6 | string |

### Response: 200

```json
{
    "status": "Success",
    "message": "Event updated successfully",
    "data": {
        "event": {
            "id": "96f8d76f-23e9-4e68-9bbd-50603b162683",
            "event_name": "NaijaHacks hundred 10",
            "location": "Zone Tech park, Gbagada, Lagos",
            "event_date": "2022-10-23",
            "event_uid": "96f8d76f-23e9-4e68-9bbd-50603b162683",
            "maximun_seats": "50",
            "start_time": "39:00",
            "media_file": null,
            "type": "paid",
            "user": {
                "id": 1,
                "uid": "96f8c9d6-528d-471a-94b9-4e210832fa4a",
                "first_name": "Abiola",
                "last_name": "Yakubu",
                "email": "yakubuabiola2003@gmail.com",
                "email_verified_at": null,
                "created_at": "2022-08-08T10:00:23.000000Z",
                "updated_at": "2022-08-08T10:00:23.000000Z"
            },
            "ticket": []
        }
    }
}
```

⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃

## End-point: Delete an event

This endpoint deletes an existing event that hasn't been booked. it required the Authorization bearer token that's generated upon login. it accept the following payload.

1. event_id : This is a unique ID attached to an Individual Event

2. event_name : This is the name of the Event

The two fields are required by this request.

### Method: DELETE

> ```
> {{url}}/api/event/delete
> ```

### Headers

| Content-Type | Value            |
| ------------ | ---------------- |
| Accept       | application/json |

### Body (**raw**)

```json
{
    "event_id": "96f8cf06-1052-4419-9357-dd346d135aee",
    "event_name": "NaijaHacks Hackerton"
}
```

### 🔑 Authentication bearer

| Param | value | Type                                     |
| ----- | ----- | ---------------------------------------- | ------ |
| token | 3     | OsUNOWSULrVfV7EbSlp5tRyKoip13vlwQtwy8Apm | string |

### Response: 422

```json
{
    "message": "The selected event id is invalid.",
    "errors": {
        "event_id": ["The selected event id is invalid."]
    }
}
```

⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃

## End-point: My events

This is a get request endpoint that returns all Events created by the authenticated user.

### Method: GET

> ```
> {{url}}/api/event/my-events
> ```

### 🔑 Authentication bearer

| Param | value | Type                                     |
| ----- | ----- | ---------------------------------------- | ------ |
| token | 3     | OsUNOWSULrVfV7EbSlp5tRyKoip13vlwQtwy8Apm | string |

### Response: 200

```json
{
    "status": "Success",
    "message": "Event fetched successfully",
    "data": {
        "events": [
            {
                "id": "96f8cf06-1052-4419-9357-dd346d135aee",
                "event_name": "NaijaHacks hundred",
                "location": "Zone Tech park, Gbagada, Lagos",
                "event_date": "2022-10-23",
                "event_uid": "96f8cf06-1052-4419-9357-dd346d135aee",
                "maximun_seats": "50",
                "start_time": "39:00",
                "media_file": null,
                "type": "paid",
                "user": {
                    "id": 1,
                    "uid": "96f8c9d6-528d-471a-94b9-4e210832fa4a",
                    "first_name": "Abiola",
                    "last_name": "Yakubu",
                    "email": "yakubuabiola2003@gmail.com",
                    "email_verified_at": null,
                    "created_at": "2022-08-08T10:00:23.000000Z",
                    "updated_at": "2022-08-08T10:00:23.000000Z"
                },
                "ticket": []
            },
            {
                "id": "96f8d76f-23e9-4e68-9bbd-50603b162683",
                "event_name": "NaijaHacks hundred 10",
                "location": "Zone Tech park, Gbagada, Lagos",
                "event_date": "2022-12-23",
                "event_uid": "96f8d76f-23e9-4e68-9bbd-50603b162683",
                "maximun_seats": "50",
                "start_time": "39:00",
                "media_file": null,
                "type": "paid",
                "user": {
                    "id": 1,
                    "uid": "96f8c9d6-528d-471a-94b9-4e210832fa4a",
                    "first_name": "Abiola",
                    "last_name": "Yakubu",
                    "email": "yakubuabiola2003@gmail.com",
                    "email_verified_at": null,
                    "created_at": "2022-08-08T10:00:23.000000Z",
                    "updated_at": "2022-08-08T10:00:23.000000Z"
                },
                "ticket": []
            }
        ]
    }
}
```

⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃

## End-point: All Events

This Endpoint is a get request that returns list of available events in STACK order to the Homepage for Guest to make reservation.

### Method: GET

> ```
> {{url}}/api/event
> ```

### Body (**raw**)

```json

```

### 🔑 Authentication bearer

| Param | value | Type                                     |
| ----- | ----- | ---------------------------------------- | ------ |
| token | 3     | OsUNOWSULrVfV7EbSlp5tRyKoip13vlwQtwy8Apm | string |

### Response: 200

```json
{
    "status": "Success",
    "message": "Event fetched successfully",
    "data": {
        "events": [
            {
                "id": "96f8d76f-23e9-4e68-9bbd-50603b162683",
                "event_name": "NaijaHacks hundred 10",
                "location": "Zone Tech park, Gbagada, Lagos",
                "event_date": "2022-12-23",
                "event_uid": "96f8d76f-23e9-4e68-9bbd-50603b162683",
                "maximun_seats": "50",
                "start_time": "39:00",
                "media_file": null,
                "type": "paid",
                "user": {
                    "id": 1,
                    "uid": "96f8c9d6-528d-471a-94b9-4e210832fa4a",
                    "first_name": "Abiola",
                    "last_name": "Yakubu",
                    "email": "yakubuabiola2003@gmail.com",
                    "email_verified_at": null,
                    "created_at": "2022-08-08T10:00:23.000000Z",
                    "updated_at": "2022-08-08T10:00:23.000000Z"
                },
                "ticket": []
            },
            {
                "id": "96f8cf06-1052-4419-9357-dd346d135aee",
                "event_name": "NaijaHacks hundred",
                "location": "Zone Tech park, Gbagada, Lagos",
                "event_date": "2022-10-23",
                "event_uid": "96f8cf06-1052-4419-9357-dd346d135aee",
                "maximun_seats": "50",
                "start_time": "39:00",
                "media_file": null,
                "type": "paid",
                "user": {
                    "id": 1,
                    "uid": "96f8c9d6-528d-471a-94b9-4e210832fa4a",
                    "first_name": "Abiola",
                    "last_name": "Yakubu",
                    "email": "yakubuabiola2003@gmail.com",
                    "email_verified_at": null,
                    "created_at": "2022-08-08T10:00:23.000000Z",
                    "updated_at": "2022-08-08T10:00:23.000000Z"
                },
                "ticket": []
            }
        ]
    }
}
```

⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃

## End-point: Create Ticket

### Method: POST

> ```
> {{url}}/api/event/create-ticket
> ```

### Body (**raw**)

```json
{
    "event_id": "96f99e6e-3d9c-40b0-80cc-dd2393ee1d62",
    "amount": 5000,
    "type": "platinum",
    "maximum_reservation": 15
}
```

### 🔑 Authentication bearer

| Param | value | Type                                     |
| ----- | ----- | ---------------------------------------- | ------ |
| token | 2     | 8Zq07ct5w50LscWZw3NUJCydqT9INYMGVQp9fgw6 | string |

### Response: 200

```json
{
    "status": "Success",
    "message": "Ticket created successfully",
    "data": {
        "ticket": {
            "uid": "96f2cb9c-3fd7-4c08-9e07-d985160e08c3",
            "event_id": 1,
            "amount": 5000,
            "type": "regular",
            "maximum_reservation": 4029,
            "updated_at": "2022-08-05T10:30:22.000000Z",
            "created_at": "2022-08-05T10:30:22.000000Z",
            "id": 3
        }
    }
}
```

⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃

# 📁 Collection: Authentication

## End-point: Register Request

### Method: POST

> ```
> {{url}}/api/register
> ```

### Headers

| Content-Type | Value            |
| ------------ | ---------------- |
| accept       | application/json |

### Body (**raw**)

```json
{
    "first_name": "Abiola",
    "last_name": "Yakubu",
    "email": "yakubuabiola2003@gmail.com",
    "password": "@we4mk10qMM",
    "password_confirmation": "@we4mk10qMM"
}
```

### Response: 201

```json
{
    "status": "Success",
    "message": "User created successfully",
    "data": {
        "token": "1|iAjAGDXO3oVRHbt6kyhL8l1cHRizNuoratAjDS8t",
        "user_details": {
            "uid": "96f8c9d6-528d-471a-94b9-4e210832fa4a",
            "first_name": "Abiola",
            "last_name": "Yakubu",
            "email": "yakubuabiola2003@gmail.com",
            "updated_at": "2022-08-08T10:00:23.000000Z",
            "created_at": "2022-08-08T10:00:23.000000Z",
            "id": 1
        }
    }
}
```

⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃

## End-point: Login Request

This is a Post Method, The expected payload are as below

1. email : the email you use in registration during registration.

2. password : the password you supplied during registration.

the endpoint shall return a response both on success or on error, you are encouraged to view the example at the example dropdown

### Method: POST

> ```
> {{url}}/api/signin
> ```

### Body (**raw**)

```json
{
    "email": "yakubuabiola2003@gmail.com",
    "password": "@we4mk10qMM"
}
```

### Response: 200

```json
{
    "status": "Success",
    "message": "login successful",
    "data": {
        "token": "2|nHPl1FcYI4Yje4RzgNGz7clx777t5zP26hgSqYmW",
        "user": {
            "id": 1,
            "uid": "96f8c9d6-528d-471a-94b9-4e210832fa4a",
            "first_name": "Abiola",
            "last_name": "Yakubu",
            "email": "yakubuabiola2003@gmail.com",
            "email_verified_at": null,
            "created_at": "2022-08-08T10:00:23.000000Z",
            "updated_at": "2022-08-08T10:00:23.000000Z"
        }
    }
}
```

⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃

## End-point: Signout Request

This is a get request that signs a user out from the system . no payload for this endpoint. a response will be return on success and on error.

### Method: GET

> ```
> {{url}}/api/sign-out
> ```

### Headers

| Content-Type | Value            |
| ------------ | ---------------- |
| Accept       | application/json |

### 🔑 Authentication bearer

| Param | value | Type                                     |
| ----- | ----- | ---------------------------------------- | ------ |
| token | 2     | nHPl1FcYI4Yje4RzgNGz7clx777t5zP26hgSqYmW | string |

### Response: 200

```json
{
    "message": "Tokens Revoked"
}
```

⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃

## End-point: All Events Customer Request

This Endpoint is a get request that returns list of available events in STACK order to the Homepage for Guest to make reservation.

### Method: GET

> ```
> {{url}}/api/
> ```

### Response: 200

```json
{
    "status": "Success",
    "message": "Event fetched successfully",
    "data": {
        "events": [
            {
                "id": "96f99e6e-3d9c-40b0-80cc-dd2393ee1d62",
                "event_name": "NaijaHacks hundred 10",
                "location": "Zone Tech park, Gbagada, Lagos",
                "event_date": "2022-12-23",
                "event_uid": "96f99e6e-3d9c-40b0-80cc-dd2393ee1d62",
                "maximun_seats": "50",
                "start_time": "39:00",
                "media_file": "/storage/file/1659988490_Screenshot from 2022-08-07 18-49-13.png",
                "type": "free",
                "user": {
                    "id": 1,
                    "uid": "96f99c05-7cd7-4cc8-83ef-3ae0631ec708",
                    "first_name": "Abiola",
                    "last_name": "Yakubu",
                    "email": "yakubuabiola2003@gmail.com",
                    "email_verified_at": null,
                    "created_at": "2022-08-08T19:48:06.000000Z",
                    "updated_at": "2022-08-08T19:48:06.000000Z"
                },
                "ticket": [
                    {
                        "id": 1,
                        "uid": "96f9a0c9-c069-46d0-a207-f00f54f9e742",
                        "event_id": 1,
                        "amount": 5000,
                        "type": "gold",
                        "current_reservation": "10",
                        "maximum_reservation": "10",
                        "created_at": "2022-08-08T20:01:25.000000Z",
                        "updated_at": "2022-08-13T20:45:08.000000Z"
                    },
                    {
                        "id": 2,
                        "uid": "96f9a105-4702-40ec-9e1b-41b3de03e200",
                        "event_id": 1,
                        "amount": 5000,
                        "type": "regular",
                        "current_reservation": "6",
                        "maximum_reservation": "20",
                        "created_at": "2022-08-08T20:02:05.000000Z",
                        "updated_at": "2022-08-15T10:24:18.000000Z"
                    },
                    {
                        "id": 3,
                        "uid": "96f9a121-003d-4473-a0a4-a9db91bf5268",
                        "event_id": 1,
                        "amount": 5000,
                        "type": "silver",
                        "current_reservation": "0",
                        "maximum_reservation": "10",
                        "created_at": "2022-08-08T20:02:23.000000Z",
                        "updated_at": "2022-08-08T20:02:23.000000Z"
                    },
                    {
                        "id": 4,
                        "uid": "96f9a22f-d812-464a-8f3c-f58f2b2dfc53",
                        "event_id": 1,
                        "amount": 5000,
                        "type": "platinum",
                        "current_reservation": "15",
                        "maximum_reservation": "15",
                        "created_at": "2022-08-08T20:05:20.000000Z",
                        "updated_at": "2022-08-15T09:40:42.000000Z"
                    }
                ]
            }
        ]
    }
}
```

⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃

## End-point: Make Reservation Request

### Method: POST

> ```
> {{url}}/api/reservation
> ```

### Headers

| Content-Type | Value            |
| ------------ | ---------------- |
| Accept       | application/json |

### Body (**raw**)

```json
{
    "name": "Yakubu Abiola Jude",
    "event_id": "96f99e6e-3d9c-40b0-80cc-dd2393ee1d62",
    "phone": "0808989809",
    "email": "yakubuabiola2003@gmail.com",
    "ticket_type": "regular",
    "number_of_reservation": "2"
}
```

### Response: 200

```json
{
    "status": "Success",
    "message": "booked successfully",
    "data": {
        "id": "9706e748-f928-4818-bd51-809a70cfb5bc",
        "number_of_reservation": "2",
        "receipt_number": "NH19809NYHP",
        "ticket_type": "regular",
        "name": "Yakubu Abiola Jude",
        "phone": "0808989809",
        "email": "yakubuabiola2003@gmail.com",
        "payment": {
            "id": 10,
            "payment_uid": "9706e749-9259-4f3a-8a25-753329d886eb",
            "reservation_uid": "9706e748-f928-4818-bd51-809a70cfb5bc",
            "amount": "00.00",
            "reference": "free",
            "type": "free",
            "status": "successful",
            "created_at": "2022-08-15T10:24:19.000000Z",
            "updated_at": "2022-08-15T10:24:19.000000Z"
        },
        "event": {
            "id": 1,
            "uid": "96f99e6e-3d9c-40b0-80cc-dd2393ee1d62",
            "user_id": 1,
            "event_name": "NaijaHacks hundred 10",
            "location": "Zone Tech park, Gbagada, Lagos",
            "event_date": "2022-12-23",
            "start_time": "39:00",
            "end_time": "40:00",
            "total_reservation": "31",
            "maximun_seats": "50",
            "tickect_type_count": "0",
            "image_path": "/storage/file/1659988490_Screenshot from 2022-08-07 18-49-13.png",
            "status": "active",
            "type": "free",
            "deleted_at": null,
            "created_at": "2022-08-08T19:54:50.000000Z",
            "updated_at": "2022-08-15T10:24:20.000000Z"
        }
    }
}
```

⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃

## End-point: previev reservation

### Method: POST

> ```
> {{url}}/api/preview-reservation
> ```

### Body (**raw**)

```json
{
    "receipt_number": "NH19809SJIG"
}
```

⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃

---

Powered By: [postman-to-markdown](https://github.com/bautistaj/postman-to-markdown/)

⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃

---

Powered By: [postman-to-markdown](https://github.com/bautistaj/postman-to-markdown/)

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
