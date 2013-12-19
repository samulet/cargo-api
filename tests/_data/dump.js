/** Пример создания индекса **/
/*
db.getCollection("account").ensureIndex({
  "_id": NumberInt(1)
},[

]);
*/

/** account records **/
db.getCollection("account").insert({
    "_id": ObjectId("526ea29b9e5346ef598b4567"),
    "uuid": "b21295c8a94c4bb0a4de07bd2d76ed38",
    "ownerId": ObjectId("52a4b7519e534607468b456f"),
    "created": ISODate("2013-10-28T17:44:59.0Z"),
    "updated": ISODate("2013-10-28T17:44:59.0Z"),
    "activated": "1",
    "title": "Аккаунт нумбер ван",
    "lastItemNumber": "0"
});
db.getCollection("account").insert({
    "_id": ObjectId("52792b609e534680338b456b"),
    "uuid": "e1c9c7a50e2c446e9864b29e1064ad39",
    "ownerId": ObjectId("52a4b7519e534607468b456f"),
    "created": ISODate("2013-11-05T17:31:12.0Z"),
    "updated": ISODate("2013-11-05T17:31:12.0Z"),
    "activated": "1",
    "title": "ТЭК Продрезерв",
    "lastItemNumber": "0"
});

/** auth_token records **/
db.getCollection("auth_token").insert({
    "_id": ObjectId("52a4b5e09e534643348b4576"),
    "token": "db057553f1a4989210ae84a2825982e1d04d6879a2690365e1fcecb619fb77e2",
    "user": ObjectId("52a4b7519e534607468b456f"),
    "createdAt": ISODate("2013-12-08T18:09:36.0Z")
});
db.getCollection("auth_token").insert({
    "token": "e7ef06c7e36e304be52190f73000764670d1ed4e5a25b06ff0b20120f0c4b553",
    "user": ObjectId("52a4b7519e534607468b4560"),
    "createdAt": ISODate("2013-12-09T18:09:36.0Z")
});

/** user records **/
db.getCollection("user").insert({
    "_id": ObjectId("52a4b7519e534607468b456f"),
    "uuid": "93456a97789c4538ba8d0e8d7419e658",
    "email": "some@mail.ru",
    "displayName": "Some User",
    "password": "mailruToLocalUser",
    "state": NumberInt(1),
    "created": ISODate("2013-12-08T18:15:45.0Z"),
    "updated": ISODate("2013-12-08T18:15:45.0Z"),
    "roles": [ "user" ],
    "name": [ ],
    "docs": [ ],
    "phone": [ ],
    "site": [ ],
    "sign": [ ],
    "social": [ ],
    "status": [ ]
});
db.getCollection("user").insert({
    "_id": ObjectId("52a4b7519e534607468b4560"),
    "uuid": "9e65893456a97789c4538ba8d0e8d741",
    "email": "another@mail.ru",
    "displayName": "Another User",
    "password": "mailruToLocalUser",
    "state": NumberInt(1),
    "created": ISODate("2013-12-08T18:15:45.0Z"),
    "updated": ISODate("2013-12-08T18:15:45.0Z"),
    "roles": [ "guest" ],
    "name": [ ],
    "docs": [ ],
    "phone": [ ],
    "site": [ ],
    "sign": [ ],
    "social": [ ],
    "status": [ ]
});
/** user_provider records **/
db.getCollection("user_provider").insert({
    "_id": ObjectId("52a4b7519e534607468b4570"),
    "userId": "52a4b7519e534607468b456f",
    "providerId": "13604129222078040511",
    "provider": "mailru"
});
db.getCollection("user_provider").insert({
    "_id": ObjectId("52a4b7519e534607468b4560"),
    "userId": "52a4b7519e534607468b4560",
    "providerId": "13604129222078040433",
    "provider": "mailru"
});
