# API 基本规范
## 格式与对接
项目接口采用类 RESTful 风格。请求以 HTTP 方法表示操作类型，以 URL 定位操作对象。返回 HTTP 状态一律 200 OK，实际的状态、消息和数据通过响应体返回，并以 JSON 格式编码。
以下对于响应数据的解说，都以完成解析的 json 数据为前提，之后不再特别说明。
### HTTP 方法以及对应的操作类型
#### GET 方法
GET 方法表示获取资源操作。该操作类型按获取资源的数量分为两种：获取单个资源，和获取多个资源。而它们的区别在于用于请求的 URL 是否明确制定了唯一的资源。例如 `http://host/api/resources?category=active` 并没有指定唯一的资源，仅仅是用 `category=active` 条件给定了一个范围，所以属于获取多个资源的类型；而 `http://host/api/resources/123` 则在 URL 中通过 `123` 指定了唯一的资源，属于获取唯一资源的类型。而不同的类型返回的数据格式是不同的。
##### 获取唯一资源类型
要求用于请求的 URL 定位到唯一的资源，例如 `http://newerp.esmtong.com/api/users/3`。
如果请求成功，响应体数据结构类似如下。
```json
{
    "code": 0,
    "message": "成功",
    "detail": [],
    "data": {
        "id": 2,
        "email": "",
        "department_id": null,
        "account": "zxj",
        "real_name": "张晓杰",
        "phone": "15900000000",
        "status": 0,
        "last_login_ip": null,
        "last_login_time": null,
        "creator_id": 1,
        "updator_id": 1,
        "created_time": null,
        "updated_time": null,
        "deleted_time": null,
        "creator": {
            "id": 1,
            "email": "",
            "department_id": null,
            "account": "admin",
            "real_name": "",
            "phone": "",
            "status": 1,
            "last_login_ip": null,
            "last_login_time": null,
            "creator_id": 0,
            "updator_id": 0,
            "created_time": null,
            "updated_time": null,
            "deleted_time": null
        },
        "updator": {
            "id": 1,
            "email": "",
            "department_id": null,
            "account": "admin",
            "real_name": "",
            "phone": "",
            "status": 1,
            "last_login_ip": null,
            "last_login_time": null,
            "creator_id": 0,
            "updator_id": 0,
            "created_time": null,
            "updated_time": null,
            "deleted_time": null
        }
    }
}
```
如果请求失败，返回的响应体数据结构类似如下。
```json
{
    "code": 4,
    "message": "请求的资源不存在",
    "detail": [],
    "data": {}
}
```
有时也会有详细的错误信息，如下。
```json
{
    "code": 2,
    "message": "接口参数没有通过验证",
    "detail": [
        "账号 不能为空",
        "手机号码 不能为空",
        "密码 不能为空",
        "真实姓名 不能为空"
    ],
    "data": {}
}
```
##### 请求多个资源类型
要求用于请求的 URL 只定位到资源类型即可，可以通过传递参数，要求服务器只返回满足条件的资源。例如 `http://newerp.esmtong.com/api/users?page=2`。该 URL 指定的资源类型为 users，条件为 page=2。意思是希望服务器返回第二页的 users 资源。
如果请求成功，返回的响应体数据结构如下。
```json
{
    "code": 0,
    "message": "成功",
    "detail": [],
    "data": {
        "list": [
            {
                "id": 1,
                "email": "",
                "department_id": null,
                "account": "admin",
                "real_name": "",
                "phone": "",
                "status": 1,
                "last_login_ip": null,
                "last_login_time": null,
                "creator_id": 0,
                "updator_id": 0,
                "created_time": null,
                "updated_time": null,
                "deleted_time": null,
                "creator": null,
                "updator": null
            },
            {
                "id": 2,
                "email": "",
                "department_id": null,
                "account": "zxj",
                "real_name": "张晓杰",
                "phone": "15900000000",
                "status": 0,
                "last_login_ip": null,
                "last_login_time": null,
                "creator_id": 1,
                "updator_id": 1,
                "created_time": null,
                "updated_time": null,
                "deleted_time": null,
                "creator": {
                    "id": 1,
                    "email": "",
                    "department_id": null,
                    "account": "admin",
                    "real_name": "",
                    "phone": "",
                    "status": 1,
                    "last_login_ip": null,
                    "last_login_time": null,
                    "creator_id": 0,
                    "updator_id": 0,
                    "created_time": null,
                    "updated_time": null,
                    "deleted_time": null
                },
                "updator": {
                    "id": 1,
                    "email": "",
                    "department_id": null,
                    "account": "admin",
                    "real_name": "",
                    "phone": "",
                    "status": 1,
                    "last_login_ip": null,
                    "last_login_time": null,
                    "creator_id": 0,
                    "updator_id": 0,
                    "created_time": null,
                    "updated_time": null,
                    "deleted_time": null
                }
            }
        ],
        "meta": {
            "current_page": 1,
            "per_page": 15,
            "total": 2
        }
    }
}
```
当请求失败时，返回规则与 GET 方法请求唯一资源相同。
#### POST 方法
POST 方法用于创建新资源的操作。用于请求的 URL 只需要定位到资源类型即可，例如 `http://newerp.esmtong.com/api/users`。
使用该方法时需要传递参数，以指定将要被创建的资源信息。参数需包含于请求体中，Content-Type 可以是 application/json，也可以是 multipart/x-www-form-urlencode，根据情况而定。
当请求成功时，响应体中返回的数据结构如下。
```json
{
    "code": 0,
    "message": "成功",
    "detail": [],
    "data": {
        "account": "zxj1",
        "email": "",
        "phone": "15900000001",
        "real_name": "张晓杰 1 号",
        "updator_id": 1,
        "creator_id": 1,
        "updated_time": "2020-02-25 16:41:02",
        "created_time": "2020-02-25 16:41:02",
        "id": 3,
        "creator": {
            "id": 1,
            "email": "",
            "department_id": null,
            "account": "admin",
            "real_name": "",
            "phone": "",
            "status": 1,
            "last_login_ip": null,
            "last_login_time": null,
            "creator_id": 0,
            "updator_id": 0,
            "created_time": null,
            "updated_time": null,
            "deleted_time": null
        },
        "updator": {
            "id": 1,
            "email": "",
            "department_id": null,
            "account": "admin",
            "real_name": "",
            "phone": "",
            "status": 1,
            "last_login_ip": null,
            "last_login_time": null,
            "creator_id": 0,
            "updator_id": 0,
            "created_time": null,
            "updated_time": null,
            "deleted_time": null
        }
    }
}
```
数据格式与请求唯一资源成功时返回的数据格式基本相同。

如果是同时创建多个资源，则需要在请求体中填充更多的参数。同时，根据实际情况，在响应体中返回全部或者部分被创建的资源。响应体数据结构如下。
```json
{
    "code": 0,
    "message": "成功",
    "detail": [],
    "data": {
        "list": [
            {
                "id": 1,
                "email": "",
                "department_id": null,
                "account": "admin",
                "real_name": "",
                "phone": "",
                "status": 1,
                "last_login_ip": null,
                "last_login_time": null,
                "creator_id": 0,
                "updator_id": 0,
                "created_time": null,
                "updated_time": null,
                "deleted_time": null,
                "creator": null,
                "updator": null
            },
            {
                "id": 2,
                "email": "",
                "department_id": null,
                "account": "zxj",
                "real_name": "张晓杰",
                "phone": "15900000000",
                "status": 0,
                "last_login_ip": null,
                "last_login_time": null,
                "creator_id": 1,
                "updator_id": 1,
                "created_time": null,
                "updated_time": null,
                "deleted_time": null,
                "creator": {
                    "id": 1,
                    "email": "",
                    "department_id": null,
                    "account": "admin",
                    "real_name": "",
                    "phone": "",
                    "status": 1,
                    "last_login_ip": null,
                    "last_login_time": null,
                    "creator_id": 0,
                    "updator_id": 0,
                    "created_time": null,
                    "updated_time": null,
                    "deleted_time": null
                },
                "updator": {
                    "id": 1,
                    "email": "",
                    "department_id": null,
                    "account": "admin",
                    "real_name": "",
                    "phone": "",
                    "status": 1,
                    "last_login_ip": null,
                    "last_login_time": null,
                    "creator_id": 0,
                    "updator_id": 0,
                    "created_time": null,
                    "updated_time": null,
                    "deleted_time": null
                }
            }
        ]
    }
}
```
格式与 GET 方法请求多个资源成功后，返回的只有资源信息、不带 api 信息和元信息的格式相同。
如果是更极端的情况，例如一次创建 1000 条数据，那么将所有数据塞入响应体中返回显然是不合适的。这时，通常的做法是只返回其中一部分（例如 10 条），而将基本信息，例如创建条目数，通过元信息表达。类似分页请求资源时返回数据的结构。

当请求失败时，返回格式与 GET 方法请求唯一资源失败时相同。
#### DELETE 方法
使用 DELETE 方法请求资源会将被指定的资源删除。这可能是硬删除，及在数据层面真实删除相关记录；也可能是软删除，仅仅标记相关数据，是其在正常情况下无法被访问到。
使用该方法可以一次只删除一条资源，也可以一次删除多个资源。准确的通过 URL 和参数定位到计划要删除的资源即可。
例如，通过使用 DELETE 方法请求 `http://host/api/resources/3` URL 可以删除唯一标识为 3 的 resources 类资源，而 URL `http://host/api/recourses?id=3` 表达了相同的含义。而通过使用 DELETE 方法请求 `http://host/api/resources?ids=1,2,3` 或 `http://host/api/resources?category=active` 则表示要删除一批满足指定条件的 recourses 类资源。

请求成功时返回返回的数据结构如下。
```json
{
    "code": 0,
    "message": "删除成功",
    "detail": [],
    "data": {}
}
```

请求错误时返回相应的 HTTP 状态，具体情况与使用 GET 方法访问唯一资源错误时的相同。
#### PUT 方法
使用 PUT 方法请求资源表示客户端希望对请求的资源做出修改。可以请求单个资源，也可以批量修改复数的资源。当请求单个资源时，使用能定位到唯一资源的 URL，例如 `http://host/api/resources/3`，编辑内容通过请求体传递。当请求多个资源时，URL 只能定位到资源类新，条件范围通过参数指定，例如 `http://host/api/resources?category=selected`，而编辑内容通过请求体传递。
**注意：使用 PUT 方法时，请求体必须采用 multipart/x-www-form-urlencode 编码。**

请求成功，返回响应体中包含被修改后的资源，具体规则同 POST 方法。

请求失败，规则同 GET 方法请求唯一资源。
#### PATHCH 方法
此方法同 PUT 方法一样，表示修改资源。但与 PUT 不同的是，PATCH 用于不是 *幂等* 的编辑资源的场景。幂等可以简单的理解为，多次请求接口和单次请求接口，最后对资源造成的结果不会有什么不同。例如，将修改用户密码，只要参数和编辑内容相同，那么访问这个接口一次还是两次，结果都是一样的。而有些应用场景是不幂等的，例如增加文章的阅读数，每次请求接口，都需要在原有的数量上加 1，那么显然单次请求和多次请求对资源造成的影响不同。这时，就该使用 PATCH 方法。

除了应用场景不同，其它和 PUT 方法都一样。
### 响应体数据结构
响应体是以 JSON 编码的一个对象，第一级一定存在属性：`code`、`message`、`detail` 和 `data`，当服务端开启 debug 模式时还会有一个 `debug`，用于调试。
#### code
响应状态码，对响应状态分类。其可能的值为：0，1，2，3，4，5。其中除了 0，均表示错误响应。
1，表示登录认证错误；
2，表示参数错误；
3，表示权限认证错误；
4，表示请求资源不存在错误；
5，表示其它服务端错误。
#### message
响应的信息，对操作结果做出描述。
#### data
响应的数据，默认为一个空对象 `{}`。
### 请求参数
除了附在 URL 后的 GET 参数以外，有时候需要在请求体中附带别的参数。此时一律用 JSON 编码，并附带 Content-Type: application/json 请求头。如果需要上传文件，则还是使用 Content-Type: multitype/x-www-form-urlencode。
### 客户端对接注意事项
- 客户端发送的请求中，头部信息必须包括 Accept: application/json 键值对；表示请求客户端返回 JSON 数据类型
- 客户端发送的请求中，大部分 API 会要求头部信息包括 Authorization: Bearer {token} 键值对；表示用户认证信息；其中 {token} 为用户成功登录后，服务器返回的 access_token
