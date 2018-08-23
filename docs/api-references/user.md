### `POST` Login
```
/api/login
```
Login User
#### Request Headers
| Key | Value |
|---|---|
|Accept|application/json
 #### Query Param
| Key | Value | Description |
|---|---|---|
| email | email | User's Email |
| password | password | User's Password |
 #### Response
* _Error_
``` json
{
    "error": "Unauthorised",
    "code": 401
}
```
 * _Success_
```json
{
    "result": {
        "user": {
            "id": 2,
            "username": "nsawayn",
            "email": "rodriguez.pink@hahn.org",
            "phonenumber": "+5981979767862",
            "address": "981 Sophie Place\nWilmamouth, VT 49783",
            "avatar": "/avatars/default.png",
            "created_at": "2018-08-21 10:52:14",
            "updated_at": "2018-08-21 10:52:14",
            "deleted_at": null
        },
        "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6ImQ0ODIzZjdmNzExMDcyYjQxNDcyMTkzY2Y2NjJjYzUzZWYwZjcwNThiYjY0MDBkNmM4YTc5YWJlMWNjMDVlODUyYzBhMjNmMDViMjg5YmMzIn0.eyJhdWQiOiI0IiwianRpIjoiZDQ4MjNmN2Y3MTEwNzJiNDE0NzIxOTNjZjY2MmNjNTNlZjBmNzA1OGJiNjQwMGQ2YzhhNzlhYmUxY2MwNWU4NTJjMGEyM2YwNWIyODliYzMiLCJpYXQiOjE1MzQ5Mzg3MDUsIm5iZiI6MTUzNDkzODcwNSwiZXhwIjoxNTY2NDc0NzA1LCJzdWIiOiIyIiwic2NvcGVzIjpbXX0.LVIGzu2ki20RFGuH_EEEsUn2rpVZtc6UMTNaamEj-IuYl58vdoCmFc2_IIHH2mQAkqFIx6062xosg7NyaB7_WWBc1jGGFrLoztthpGSPBJchkNiJ7BCa6ZRZ2q6Gm4oHlyBhLT3F0exWuDw_EA2NyhXAjjozwg7eEtjjx3_l6m55fQrafgNlqcWOco6yYJs45YUFULhrSzaoeOiqjgwNukHiT5aB9zPCsFSgof_JGD0FcolMIW2vVmc1_dv2s64Yr4lgO6ZS7qIXG29hKTIIZg-PCSPYzRiAs-p3k4ODWriu4-IW0dx8-fWfa9svyQyRur424LlQvIKJ1s4LpPOTBSCvpGWIW_7zrT56ZbRzvnG-7KaZSI0Hm8KOu6pOoZqKgS1AbtZTlk12pj5zG5aPgwx_iP4oD8xySsymv9mXBjyIYUqL0WgxnzT4DCfs5YztnCJcOtQ0JnzLpxVwvNl8TZ67N2UukMMow3dv00mXwJ15Hmq4-MlaflBtbvkvXXDlCI1b0DLy5jZB0hwJ91uH7or9aEbCMrvWivEKEQVZQNP08KZkEZlmjozose9CwOQbzyxXsYJ8mdq90URFfG-IXt5UmW8C7Q29ualaBTt5zegxwETbtzg7ItnGp5Ovyj7IluMkMKLm9JUaRU-R5tIhjfRmtpweJOW_UHe9BH5OFkY"
    },
    "code": 200
}
```
 ### `POST` Logout
```
/api/logout
```
Logout user
#### Request Headers
| Key | Value |
|---|---|
|Accept|application/json
|Authorization|Bearer $token
 #### Response
* _Success_
 ```
