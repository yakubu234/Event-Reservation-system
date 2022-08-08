<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

# Project: EventX Scheduling and Resevation

This is the documentation for EventX an online event organizing and reservation system. the API is hosted on Heroku, and can be found at https://event-reservation-system.herokuapp.com

if you want to test the endpoints then the variable {{url}} should be https://event-reservation-system.herokuapp.com without trailing slash or your server IP Address if you clone the Laravel app to your local machine.

All .env parameters needed are available at the .env.example file, kindly use the variable and replace with your own parameters. you can as well view a postman version of this documentation at https://documenter.getpostman.com/view/12538701/UzkQayEk

# 📁 Collection: Event

## End-point: Create an event

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
| user_id       | 96f8c9d6-528d-471a-94b9-4e210832fa4a                          | text |
| event_name    | NaijaHacks hundred 10                                         | text |
| location      | Zone Tech park, Gbagada, Lagos                                | text |
| event_date    | 2022-10-23                                                    | text |
| type          | paid                                                          | text |
| start_time    | 39:00                                                         | text |
| end_time      | 40:00                                                         | text |
| file          | /home/yakubu/Pictures/Screenshot from 2022-08-01 18-00-07.png | file |
| maximun_seats | 50                                                            | text |
| status        | active                                                        | text |

### 🔑 Authentication bearer

| Param | value | Type                                     |
| ----- | ----- | ---------------------------------------- | ------ |
| token | 3     | OsUNOWSULrVfV7EbSlp5tRyKoip13vlwQtwy8Apm | string |

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
| event_id      | 96f8d76f-23e9-4e68-9bbd-50603b162683                          | text |
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
| token | 3     | OsUNOWSULrVfV7EbSlp5tRyKoip13vlwQtwy8Apm | string |

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

## End-point: Update an E

### Method: POST

> ```
> {{url}}/api/event/update
> ```

### Body (**raw**)

```json
{
    "event_id": "96b09f19-3b76-4b92-9bce-aa5e0e216456",
    "event_name": "NaijaHacks Hackerton"
}
```

### 🔑 Authentication bearer

| Param | value | Type                                     |
| ----- | ----- | ---------------------------------------- | ------ |
| token | 1     | qpoRIIuxzYmxoQpwDESL91hPnYY62RaMZWfykHX3 | string |

⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃

## End-point: Delete an event

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
    "event_id": "96f8d76f-23e9-4e68-9bbd-50603b162683",
    "amount": 5000,
    "type": "gold",
    "maximum_reservation": 10
}
```

### 🔑 Authentication bearer

| Param | value | Type                                     |
| ----- | ----- | ---------------------------------------- | ------ |
| token | 3     | OsUNOWSULrVfV7EbSlp5tRyKoip13vlwQtwy8Apm | string |

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

## End-point: Register

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

## End-point: Login

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

## End-point: Signout

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

## End-point: all events customer

### Method: GET

> ```
> {{url}}/api/
> ```

⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃

---

Powered By: [postman-to-markdown](https://github.com/bautistaj/postman-to-markdown/)

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
