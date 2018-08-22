## Category Api

 ### `GET` Categories
```
/api/categories
```
Get list all categories with child categories
#### Request Headers
| Key | Value |
|---|---|
|Accept|application/json

 #### Response
```json
{
    "result": [
        {
            "id": 1,
            "name": "Jerald Spencer",
            "parent_id": null,
            "created_at": "2018-08-13 23:30:42",
            "updated_at": "2018-08-13 23:30:42",
            "childrens": [
                {
                    "id": 22,
                    "name": "Emilie Daugherty",
                    "parent_id": 1,
                    "created_at": "2018-08-13 23:30:43",
                    "updated_at": "2018-08-13 23:30:43",
                }
            ]
        },
    ],
    "code": 200
}
```
