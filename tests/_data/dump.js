db.getCollection("externalCompany").drop();
db.getCollection("externalCompany").ensureIndex({
    "source": 1,
    "id": 1
}, {uniq: 1});
db.getCollection("externalPlace").drop();
db.getCollection("externalPlace").ensureIndex({
    "source": 1,
    "type": 1,
    "id": 1
}, {uniq: 1});

// account records
db.getCollection("account").remove();
db.getCollection("account").insert({
    "uuid": "b21295c8a94c4bb0a4de07bd2d76ed38",
    "created": ISODate("2013-10-28T17:44:59.0Z"),
    "updated": ISODate("2013-10-28T17:44:59.0Z"),
    "activated": true,
    "title": "Аккаунт нумбер ван",
    "staff": ["93456a97789c4538ba8d0e8d7419e658"],
    "creator": {
        "id" : ObjectId("52a4b7519e534607468b456f") ,
        "name" : "Some User" ,
        "uuid" : "93456a97789c4538ba8d0e8d7419e658"
    }
});
db.getCollection("account").insert({
    "uuid": "e1c9c7a50e2c446e9864b29e1064ad39",
    "created": ISODate("2013-11-05T17:31:12.0Z"),
    "updated": ISODate("2013-11-05T17:31:12.0Z"),
    "activated": true,
    "title": "ТЭК Продрезерв",
    "staff": ["93456a97789c4538ba8d0e8d7419e658"],
    "creator": {
        "id" : ObjectId("52a4b7519e534607468b456f") ,
        "name" : "Some User" ,
        "uuid" : "93456a97789c4538ba8d0e8d7419e658"
    }
});
db.getCollection("account").insert({
    "uuid": "a2c9c7a50e2c446e9864b29e1064ad40",
    "created": ISODate("2013-11-05T17:31:12.0Z"),
    "updated": ISODate("2013-11-05T17:31:12.0Z"),
    "activated": true,
    "title": "Рога и Ко",
    "staff": ["c9579582de5940b0853c7b07c1112576", "93456a97789c4538ba8d0e8d7419e658"],
    "creator": {
        "id" : ObjectId("52a4b7519e534607468b456f") ,
        "name" : "Some User" ,
        "uuid" : "93456a97789c4538ba8d0e8d7419e658"
    }
});
db.getCollection("account").insert({
    "uuid": "11c1c7a50e2c446e9864b29e1064ad30",
    "created": ISODate("2013-11-05T17:31:12.0Z"),
    "updated": ISODate("2013-11-05T17:31:12.0Z"),
    "activated": true,
    "title": "Трансэнергосбыт",
    "staff": ["c9579582de5940b0853c7b07c1112576"],
    "creator": {
        "id" : ObjectId("52b00f009e534607468b4579") ,
        "name" : "Василий Сквозняковский" ,
        "uuid": "7e64b31bc7874340bb6ed61cd4735eb3"
    }
});

// auth_token records
db.getCollection("auth_token").remove();
db.getCollection("auth_token").insert({
    "token": "db057553f1a4989210ae84a2825982e1d04d6879a2690365e1fcecb619fb77e2",
    "user": ObjectId("52a4b7519e534607468b456f"),
    "createdAt": ISODate("2013-12-08T18:09:36.0Z")
});
db.getCollection("auth_token").insert({
    "token": "e7ef06c7e36e304be52190f73000764670d1ed4e5a25b06ff0b20120f0c4b553",
    "user": ObjectId("52a4b7519e534607468b4560"),
    "createdAt": ISODate("2013-12-09T18:09:36.0Z")
});
db.getCollection("auth_token").insert({
    "token": "ff3df763a0a89fc86cac89977e1f4794013265d773a2b7f9e488f14d3814bfa3",
    "user": ObjectId("52b010469e53462e6e8b456c"),
    "createdAt": ISODate("2013-12-09T18:09:36.0Z")
});

// user records
db.getCollection("user").remove();
db.getCollection("user").insert({
    "_id": ObjectId("52a4b7519e534607468b456f"),
    "uuid": "93456a97789c4538ba8d0e8d7419e658",
    "email": "some@mail.ru",
    "displayName": "Some User",
    "password": "mailruToLocalUser",
    "state": NumberInt(1),
    "created": ISODate("2013-12-08T18:15:45.0Z"),
    "updated": ISODate("2013-12-08T18:15:45.0Z"),
    "roles": [
        "user",
        "system.moderator",
        "account.admin",
    ],
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
db.getCollection("user").insert({
    "_id": ObjectId("52b010469e53462e6e8b456c"),
    "uuid": "c9579582de5940b0853c7b07c1112576",
    "email": "email.one@mail.ru",
    "displayName": "Алексей Попов",
    "password": "mailruToLocalUser",
    "state": 1,
    "created": ISODate("2013-12-17T08:50:14Z"),
    "updated": ISODate("2013-12-17T08:50:14Z"),
    "roles": [  "user" ],
    "name": [ ],
    "docs": [ ],
    "phone": [ ],
    "site": [ ],
    "sign": [ ],
    "social": [ ],
    "status": [ ]
});
db.getCollection("user").insert({
    "_id": ObjectId("52b00f009e534607468b4579"),
    "uuid": "7e64b31bc7874340bb6ed61cd4735eb3",
    "email": "email-two@mail.ru",
    "displayName": "Василий Сквозняковский",
    "password": "mailruToLocalUser",
    "state": 1,
    "created": ISODate("2013-12-17T08:44:48Z"),
    "updated": ISODate("2013-12-17T08:44:48Z"),
    "roles": [  "user", "account.admin" ],
    "name": [ ],
    "docs": [ ],
    "phone": [ ],
    "site": [ ],
    "sign": [ ],
    "social": [ ],
    "status": [ ]
});

// user_provider records
db.getCollection("user_provider").remove();
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
db.getCollection("user_provider").insert({
    "_id": ObjectId("52b00f009e534607468b457a"),
    "userId": "52b00f009e534607468b4579",
    "providerId": "8524538222726473009",
    "provider": "mailru"
});
db.getCollection("user_provider").insert({
    "_id": ObjectId("52b010469e53462e6e8b456d"),
    "userId": "52b010469e53462e6e8b456c",
    "providerId": "11994362226096226506",
    "provider": "mailru"
});

// company records
db.getCollection("company").remove();
db.getCollection("company").insert({
    "_id": ObjectId("52a8d20b9e534644348b457a"),
    "uuid": "7e7f422230554465b121c6bb8b313554",
    "created": ISODate("2013-12-11T20:58:51.0Z"),
    "updated": ISODate("2013-12-11T20:58:51.0Z"),
    "short": "ООО Рога и Ко",
    "inn": "1231231234",
    "ogrn": "1234321123432",
    "tax": {
        "agency_number": "98788",
        "date_accounting": "2012-10-15T20:57:46.709Z",
        "date_registration": "2012-10-09T20:00:00.000Z",
        "registration_agency_number": "987987",
        "rate": NumberInt(18)
    },
    "contacts": {
        "phones": [
            {
                "type": "work",
                "number": "+7 926 123-1200"
            },
            {
                "type": "cell",
                "number": "+7 913-121-89-43"
            }
        ],
        "emails": [

        ],
        "sites": [

        ],
        "addresses": [

        ]
    },
    "founders": [

    ],
    "okved": [
        "72.02.01",
        "12.99.70"
    ],
    "pfr": {
        "insurance": "298199",
        "number": "1233",
        "date_registration": NumberInt(1344888000)
    },
    "fms": {
        "insurance": "123993993992",
        "number": "098098",
        "date_registration": NumberInt(1362513600)
    },
    "licenses": [

    ],
    "applicants": [

    ],
    "accounts": [
        {
            "bank": "Первый",
            "account": "192993838827",
            "corresp": "8768987988",
            "bik": "8768768798"
        }
    ],
    "persons": [
    ]
});
db.getCollection("company").insert({
    "_id": ObjectId("52b00f939e534607468b457b"),
    "uuid": "7fa1a29e95c949c8ae27ca0d6bfd0e70",
    "created": ISODate("2013-12-17T08:47:15.0Z"),
    "updated": ISODate("2013-12-17T08:47:15.0Z"),
    "owner": "b21295c8a94c4bb0a4de07bd2d76ed38",
    "name": "ООО \"Маша и медведи\"",
    "short": "Маша и МЕдведи",
    "inn": "222222222222",
    "tax": [

    ],
    "contacts": {
        "phones": [

        ],
        "emails": [

        ],
        "sites": [

        ],
        "addresses": [

        ]
    },
    "founders": [

    ],
    "okved": [

    ],
    "pfr": [

    ],
    "fms": [

    ],
    "licenses": [

    ],
    "applicants": [

    ],
    "accounts": [

    ],
    "persons": [

    ]
});
db.getCollection("company").insert({
    "_id": ObjectId("52b2480f9e53462e6e8b456e"),
    "uuid": "c14bfc17646343b4afc037fb3c8c5391",
    "created": ISODate("2013-12-19T01:12:47.0Z"),
    "updated": ISODate("2013-12-19T01:12:47.0Z"),
    "deleted": ISODate("2013-12-19T01:12:47.0Z"),
    "short": "demo56",
    "inn": "111111111111",
    "tax": [

    ],
    "contacts": {
        "phones": [

        ],
        "emails": [

        ],
        "sites": [

        ],
        "addresses": [

        ]
    },
    "founders": [

    ],
    "okved": [

    ],
    "pfr": [

    ],
    "fms": [

    ],
    "licenses": [

    ],
    "applicants": [

    ],
    "accounts": [

    ],
    "persons": [

    ]
});

// externalCompany records
db.getCollection("externalCompany").remove();
db.getCollection("externalCompany").insert({
    "_id": ObjectId("52b57f679e53461c2f8b4567"),
    "source": "vesta",
    "id": "29",
    "code": "vesta-29",
    "owner_id": "0",
    "id_1s": "11249",
    "contract_number_1s": "00018409",
    "name": "ООО Джонсон & Джонсон",
    "full_name": "Общество с отграниченной ответственностью Джонсон & Джонсон",
    "u_name": "Джонсон и Джонсон",
    "inn": "7725216105",
    "kpp": "773101001",
    "okato": "",
    "legal_adress": "121614, Москва, ул. Крылатская, 17, корп.2",
    "real_adress": "121614, Москва, ул. Крылатская, 17, корп.2",
    "org_base": "",
    "leader_post_ip": "",
    "leader_post_rp": "",
    "leader_post_dp": "",
    "leader_ip": "",
    "leader_rp": "",
    "leader_dp": "",
    "director": "",
    "accountant": "",
    "rs": "40702810200701011031",
    "ks": "",
    "bank": "",
    "bank_adress": "",
    "bik": "",
    "okpo": "",
    "okvd": "",
    "phone": "",
    "email": "dkruglov@its.jnj.com;Etynniko@its.jnj.com ;ybogdanov@its.jnj.com;npoplavs@its.jnj.com",
    "contract": "LCV-79\/10-K",
    "contract_date": "2010-11-09",
    "save_sum": "0",
    "prr_sum": "0",
    "def_pay": "0",
    "box_cost_a": "0",
    "box_cost_b": "0",
    "box_cost_c": "0",
    "representative": "",
    "group": "customer",
    "is_our_firm": "0",
    "responsible_worker": "24",
    "nds": "0",
    "activity": "1",
    "ttn": "1",
    "trn": "1",
    "blocked": "0",
    "period_type": "wb_date",
    "contractor_id": "50",
    "work_type": "with_commitions",
    "print_consignee": "1",
    "consignee_for_print": "",
    "print_shipper": "1",
    "shipper_for_print": "",
    "no_desposcheme": "0",
    "wb_import": "0",
    "non_food": "0",
    "wh_return": "0",
    "inform_about_account": "0",
    "service_title": "",
    "can_change_adopted": "0",
    "temperature": "2|3",
    "auto_adopt": "0",
    "tariff_factor": "0",
    "days_of_difference_for_order": "0",
    "print_mark": "0",
    "print_receiving_act": "0",
    "print_commission_forwarder": "0",
    "print_receipt_forwarder": "0",
    "docs_tn": "0",
    "docs_ttn": "0",
    "docs_trn": "0",
    "print_actp2": "1",
    "actp2_for_print": "",
    "insurance": "0",
    "wb_status_for_bills": "received",
    "service_type": "1",
    "name_in_invoice": "",
    "cargo_types": "2",
    "notice_order_adopt": "0",
    "order_import_format_id": "9",
    "transit": "1"
});
db.getCollection("externalCompany").insert({
    "_id": ObjectId("52b57f679e53461c2f8b4568"),
    "source": "vesta",
    "id": "9",
    "code": "vesta-9",
    "owner_id": "0",
    "id_1s": "0",
    "contract_number_1s": "",
    "name": "Перевозчик Вася",
    "full_name": "Перевозчик Вася",
    "u_name": "Перевозчик Вася",
    "inn": "",
    "kpp": "",
    "okato": "",
    "legal_adress": "",
    "real_adress": "",
    "org_base": "",
    "leader_post_ip": "",
    "leader_post_rp": "",
    "leader_post_dp": "",
    "leader_ip": "",
    "leader_rp": "",
    "leader_dp": "",
    "director": "",
    "accountant": "",
    "rs": "",
    "ks": "",
    "bank": "",
    "bank_adress": "",
    "bik": "",
    "okpo": "",
    "okvd": "",
    "phone": "",
    "email": "",
    "contract": "",
    "contract_date": "2011-05-28",
    "save_sum": "0",
    "prr_sum": "0",
    "def_pay": "0",
    "box_cost_a": "0",
    "box_cost_b": "0",
    "box_cost_c": "0",
    "representative": "",
    "group": "forwarding",
    "is_our_firm": "0",
    "responsible_worker": "0",
    "nds": "0",
    "activity": "1",
    "ttn": "0",
    "trn": "0",
    "blocked": "0",
    "period_type": "wb_date",
    "contractor_id": "6",
    "work_type": "with_commitions",
    "print_consignee": "1",
    "consignee_for_print": "",
    "print_shipper": "1",
    "shipper_for_print": "",
    "no_desposcheme": "0",
    "wb_import": "0",
    "non_food": "0",
    "wh_return": "0",
    "inform_about_account": "0",
    "service_title": "",
    "can_change_adopted": "0",
    "temperature": "",
    "auto_adopt": "0",
    "tariff_factor": "0",
    "days_of_difference_for_order": "0",
    "print_mark": "0",
    "print_receiving_act": "0",
    "print_commission_forwarder": "0",
    "print_receipt_forwarder": "0",
    "docs_tn": "0",
    "docs_ttn": "0",
    "docs_trn": "0",
    "print_actp2": "1",
    "actp2_for_print": "",
    "insurance": "0",
    "wb_status_for_bills": "received",
    "service_type": "1",
    "name_in_invoice": "",
    "cargo_types": "",
    "notice_order_adopt": "0",
    "order_import_format_id": "0",
    "transit": "1",
    "link": "afc66c7dd6234e568317e4799068a03b"
});
db.getCollection("externalCompany").insert({
    "_id": ObjectId("52b57f679e53461c2f8b4569"),
    "source": "vesta",
    "id": "28",
    "code": "vesta-28",
    "owner_id": "0",
    "id_1s": "10604",
    "contract_number_1s": "00017475",
    "name": "ООО Главпродукт-торг",
    "full_name": "Общество с ограниченной ответственностью Главпродукт - торг",
    "u_name": "Главпродукт",
    "inn": "7715531690",
    "kpp": "091801001",
    "okato": "",
    "legal_adress": "369330, Карачаево-Черкесская Респ., Адыге-Хабльский р-он, а. Адыге-Хабль, ул. Банова, дом 16",
    "real_adress": "125167, г. Москва, 4-я ул. 8 Марта, дом 6А, стр. 1, 7 этаж",
    "org_base": "",
    "leader_post_ip": "",
    "leader_post_rp": "",
    "leader_post_dp": "",
    "leader_ip": "",
    "leader_rp": "",
    "leader_dp": "",
    "director": "",
    "accountant": "",
    "rs": "40702810400003036000",
    "ks": "",
    "bank": "",
    "bank_adress": "",
    "bik": "",
    "okpo": "",
    "okvd": "",
    "phone": "",
    "email": "silver@glavproduct.ru;ikravcova@glavproduct.ru;gpbuchaka@yandex.ru;dbalykin@glavproduct.ru;gpbuchaka@yandex.ru;anovichkov@glavproduct.ru",
    "contract": "01\/09\/10",
    "contract_date": "2010-09-01",
    "save_sum": "0",
    "prr_sum": "0",
    "def_pay": "0",
    "box_cost_a": "0",
    "box_cost_b": "0",
    "box_cost_c": "0",
    "representative": "",
    "group": "customer",
    "is_our_firm": "0",
    "responsible_worker": "71",
    "nds": "0",
    "activity": "1",
    "ttn": "1",
    "trn": "1",
    "blocked": "0",
    "period_type": "wb_date",
    "contractor_id": "49",
    "work_type": "with_commitions",
    "print_consignee": "1",
    "consignee_for_print": "",
    "print_shipper": "1",
    "shipper_for_print": "",
    "no_desposcheme": "0",
    "wb_import": "0",
    "non_food": "0",
    "wh_return": "0",
    "inform_about_account": "0",
    "service_title": "",
    "can_change_adopted": "0",
    "temperature": "2|3",
    "auto_adopt": "0",
    "tariff_factor": "0",
    "days_of_difference_for_order": "0",
    "print_mark": "0",
    "print_receiving_act": "0",
    "print_commission_forwarder": "0",
    "print_receipt_forwarder": "0",
    "docs_tn": "0",
    "docs_ttn": "0",
    "docs_trn": "0",
    "print_actp2": "1",
    "actp2_for_print": "",
    "insurance": "0",
    "wb_status_for_bills": "received",
    "service_type": "1",
    "name_in_invoice": "",
    "cargo_types": "1",
    "notice_order_adopt": "0",
    "order_import_format_id": "15",
    "transit": "1"
});
db.getCollection("externalCompany").insert({
    "_id": ObjectId("52b57f8a9e53461c2f8b46ce"),
    "source": "prodrezerv",
    "id": "1",
    "code": "prodrezerv-1",
    "owner_id": "0",
    "id_1s": "0",
    "contract_number_1s": "",
    "name": "ООО «ТЭК «Продрезерв»",
    "full_name": "Общество с ограниченной ответственностью «Транспортно-экспедиционная компания «Продрезерв»",
    "u_name": "Продрезерв",
    "inn": "5030066382",
    "kpp": "503001001",
    "okato": "",
    "legal_adress": "143330, Московская область, Наро – Фоминский  р-н, г.\r\nВерея, ул. Боровская д.15.",
    "real_adress": "143330, Московская область, Наро – Фоминский  р-н, г.\r\nВерея, ул. Боровская д.15.",
    "org_base": "Устава",
    "leader_post_ip": "Генеральный директор",
    "leader_post_rp": "Генерального директора",
    "leader_post_dp": "",
    "leader_ip": "Мацуев И.А.",
    "leader_rp": "Мацуева И.А.",
    "leader_dp": "",
    "director": "",
    "accountant": "Уткина О.В.",
    "rs": "40702810900000042304",
    "ks": "30101810100000000716",
    "bank": "ВТБ 24 (ЗАО), г. Москва",
    "bank_adress": "",
    "bik": "044525716",
    "okpo": "61557892",
    "okvd": "1095030001780",
    "phone": "+7 (495) 645-91-25; +7 (495) 645-91-26; +7 (495) 645-91-27; +7 (495) 645-91-28; +7 (495) 645-91-29;",
    "email": "",
    "contract": "",
    "contract_date": "2009-12-08",
    "save_sum": "0",
    "prr_sum": "0",
    "def_pay": "0",
    "box_cost_a": "0",
    "box_cost_b": "0",
    "box_cost_c": "0",
    "representative": "",
    "group": "our_firm",
    "is_our_firm": "1",
    "responsible_worker": "0",
    "nds": "1",
    "activity": "1",
    "ttn": "0",
    "trn": "0",
    "blocked": "0",
    "period_type": "wb_date",
    "contractor_id": "1",
    "work_type": "with_orders",
    "print_consignee": "0",
    "consignee_for_print": "----",
    "print_shipper": "0",
    "shipper_for_print": "----",
    "no_desposcheme": "0",
    "wb_import": "0",
    "non_food": "0",
    "wh_return": "0",
    "inform_about_account": "0",
    "service_title": "",
    "can_change_adopted": "0",
    "temperature": "",
    "auto_adopt": "1",
    "tariff_factor": "0",
    "days_of_difference_for_order": "0",
    "print_mark": "0",
    "print_receiving_act": "0",
    "print_commission_forwarder": "0",
    "print_receipt_forwarder": "0",
    "docs_tn": "0",
    "docs_ttn": "0",
    "docs_trn": "0",
    "print_actp2": "1",
    "actp2_for_print": "",
    "insurance": "0",
    "wb_status_for_bills": "received",
    "service_type": "1",
    "name_in_invoice": "",
    "cargo_types": "",
    "notice_order_adopt": "0",
    "order_import_format_id": "0",
    "transit": "1"
});
db.getCollection("externalCompany").insert({
    "_id": ObjectId("52b57f8a9e53461c2f8b46d0"),
    "source": "prodrezerv",
    "id": "4",
    "code": "prodrezerv-4",
    "owner_id": "0",
    "id_1s": "0",
    "contract_number_1s": "",
    "name": "ООО Витленд",
    "full_name": "Общество с ограниченной ответственностью Витленд",
    "u_name": "Витленд",
    "inn": "4646464654",
    "kpp": "416416846",
    "okato": "4564646",
    "legal_adress": "рапорпорплорп",
    "real_adress": "паорпаорпорплорп",
    "org_base": "паорпао",
    "leader_post_ip": "паорпао",
    "leader_post_rp": "апопао",
    "leader_post_dp": "",
    "leader_ip": "апопао",
    "leader_rp": "аопапора",
    "leader_dp": "",
    "director": "",
    "accountant": "аорпааа",
    "rs": "5346846849054",
    "ks": "48641786",
    "bank": "ватипаовппр",
    "bank_adress": "авпотлрпорп",
    "bik": "6462728",
    "okpo": "453121321",
    "okvd": "3213213",
    "phone": "312321",
    "email": "123213213213",
    "contract": "213213",
    "contract_date": "2009-12-18",
    "save_sum": "0",
    "prr_sum": "0",
    "def_pay": "0",
    "box_cost_a": "0",
    "box_cost_b": "0",
    "box_cost_c": "0",
    "representative": "",
    "group": "customer",
    "is_our_firm": "0",
    "responsible_worker": "0",
    "nds": "1",
    "activity": "0",
    "ttn": "0",
    "trn": "0",
    "blocked": "0",
    "period_type": "order_date",
    "contractor_id": "1",
    "work_type": "with_commitions",
    "print_consignee": "0",
    "consignee_for_print": "----",
    "print_shipper": "0",
    "shipper_for_print": "----",
    "no_desposcheme": "0",
    "wb_import": "0",
    "non_food": "0",
    "wh_return": "1",
    "inform_about_account": "0",
    "service_title": "3213213321",
    "can_change_adopted": "0",
    "temperature": "1",
    "auto_adopt": "0",
    "tariff_factor": "0",
    "days_of_difference_for_order": "0",
    "print_mark": "0",
    "print_receiving_act": "0",
    "print_commission_forwarder": "0",
    "print_receipt_forwarder": "0",
    "docs_tn": "0",
    "docs_ttn": "0",
    "docs_trn": "0",
    "print_actp2": "1",
    "actp2_for_print": "",
    "insurance": "0",
    "wb_status_for_bills": "received",
    "service_type": "1",
    "name_in_invoice": "",
    "cargo_types": "1",
    "notice_order_adopt": "0",
    "order_import_format_id": "0",
    "transit": "0"
});
db.getCollection("externalCompany").insert({
    "_id": ObjectId("52b57f8a9e53461c2f8b46d1"),
    "source": "prodrezerv",
    "id": "82",
    "code": "prodrezerv-82",
    "owner_id": "0",
    "id_1s": "0",
    "contract_number_1s": "",
    "name": "ООО \"Тоскана\"",
    "full_name": "(Общество с ограниченной ответственностью \"Тоскана\"",
    "u_name": "Тоскана",
    "inn": "7701691535",
    "kpp": "770201001",
    "okato": "",
    "legal_adress": "107045 Москва, ул. Трубная л.18\/1",
    "real_adress": "107045 Москва, ул. Трубная л.18\/1",
    "org_base": "устава",
    "leader_post_ip": "генеральный директор",
    "leader_post_rp": "генерального директора",
    "leader_post_dp": "",
    "leader_ip": "Куликова Е.В.",
    "leader_rp": "Куликовой Е.В.",
    "leader_dp": "",
    "director": "",
    "accountant": "",
    "rs": "40702810800270002411",
    "ks": "30101810500000000113",
    "bank": "ОАО \"Банк ВЕФК\"",
    "bank_adress": "г. Москва",
    "bik": "0445991113",
    "okpo": "",
    "okvd": "",
    "phone": "",
    "email": "",
    "contract": "70",
    "contract_date": "2010-04-15",
    "save_sum": "0",
    "prr_sum": "0",
    "def_pay": "0",
    "box_cost_a": "0",
    "box_cost_b": "0",
    "box_cost_c": "0",
    "representative": "",
    "group": "customer",
    "is_our_firm": "0",
    "responsible_worker": "0",
    "nds": "1",
    "activity": "0",
    "ttn": "0",
    "trn": "0",
    "blocked": "0",
    "period_type": "order_date",
    "contractor_id": "1",
    "work_type": "with_orders",
    "print_consignee": "0",
    "consignee_for_print": "----",
    "print_shipper": "0",
    "shipper_for_print": "----",
    "no_desposcheme": "0",
    "wb_import": "0",
    "non_food": "0",
    "wh_return": "0",
    "inform_about_account": "0",
    "service_title": "Транспортно-экспедиционные услуги",
    "can_change_adopted": "0",
    "temperature": "1",
    "auto_adopt": "0",
    "tariff_factor": "0",
    "days_of_difference_for_order": "0",
    "print_mark": "0",
    "print_receiving_act": "0",
    "print_commission_forwarder": "0",
    "print_receipt_forwarder": "0",
    "docs_tn": "0",
    "docs_ttn": "0",
    "docs_trn": "0",
    "print_actp2": "1",
    "actp2_for_print": "",
    "insurance": "0",
    "wb_status_for_bills": "received",
    "service_type": "1",
    "name_in_invoice": "",
    "cargo_types": "1",
    "notice_order_adopt": "0",
    "order_import_format_id": "0",
    "transit": "0"
});
db.getCollection("externalCompany").insert({
    "_id": ObjectId("52b57f8a9e53461c2f8b46d2"),
    "source": "prodrezerv",
    "id": "6",
    "code": "prodrezerv-6",
    "owner_id": "0",
    "id_1s": "0",
    "contract_number_1s": "",
    "name": "ООО \"Рога и копыта\"",
    "full_name": "Общество с ограниченной ответственностью \"Рога и копыта\")",
    "u_name": "РиК",
    "inn": "77158744",
    "kpp": "778954666",
    "okato": "",
    "legal_adress": "г. Москва ул. Озерная д.7",
    "real_adress": "г. Москва ул. Озерная д.7",
    "org_base": "устава",
    "leader_post_ip": "",
    "leader_post_rp": "Иванов И.И.",
    "leader_post_dp": "",
    "leader_ip": "",
    "leader_rp": "Иванов И.И.",
    "leader_dp": "",
    "director": "",
    "accountant": "Петрова И.М.",
    "rs": "111100036848989544",
    "ks": "111100036848989544",
    "bank": "ОАО \"ВТБ 24\"",
    "bank_adress": "г. Москва ул. Петровка д.38",
    "bik": "12458",
    "okpo": "15698441",
    "okvd": "0006597",
    "phone": "",
    "email": "",
    "contract": "1-11-2010",
    "contract_date": "2010-01-11",
    "save_sum": "0",
    "prr_sum": "0",
    "def_pay": "0",
    "box_cost_a": "0",
    "box_cost_b": "0",
    "box_cost_c": "0",
    "representative": "",
    "group": "customer",
    "is_our_firm": "0",
    "responsible_worker": "0",
    "nds": "1",
    "activity": "0",
    "ttn": "0",
    "trn": "0",
    "blocked": "0",
    "period_type": "wb_date",
    "contractor_id": "1",
    "work_type": "with_commitions",
    "print_consignee": "0",
    "consignee_for_print": "----",
    "print_shipper": "0",
    "shipper_for_print": "----",
    "no_desposcheme": "0",
    "wb_import": "0",
    "non_food": "0",
    "wh_return": "0",
    "inform_about_account": "0",
    "service_title": "Транспортно Экспедиционное обслуживание",
    "can_change_adopted": "0",
    "temperature": "1",
    "auto_adopt": "0",
    "tariff_factor": "0",
    "days_of_difference_for_order": "0",
    "print_mark": "0",
    "print_receiving_act": "0",
    "print_commission_forwarder": "0",
    "print_receipt_forwarder": "0",
    "docs_tn": "0",
    "docs_ttn": "0",
    "docs_trn": "0",
    "print_actp2": "1",
    "actp2_for_print": "",
    "insurance": "0",
    "wb_status_for_bills": "received",
    "service_type": "1",
    "name_in_invoice": "",
    "cargo_types": "1",
    "notice_order_adopt": "0",
    "order_import_format_id": "0",
    "transit": "0"
});
