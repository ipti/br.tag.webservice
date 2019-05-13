<?php

return [
    // =========== Institution ============
    'PUT,PATCH,OPTIONS v1/institution/<id>' => 'v1/institution/update',
    'DELETE,OPTIONS v1/institution/<id>' => 'v1/institution/delete',
    'GET,HEAD,OPTIONS v1/institution/get/<id>' => 'v1/institution/view',
    'POST,OPTIONS v1/institution' => 'v1/institution/create',
    'GET,HEAD,OPTIONS v1/institution' => 'v1/institution/index',

    // =========== User ============
    'PUT,PATCH v1/user/<id>' => 'v1/user/update',
    'DELETE v1/user/<id>' => 'v1/user/delete',
    'GET,HEAD v1/user/<id>' => 'v1/user/view',
    'POST v1/user' => 'v1/user/create',
    'GET,HEAD v1/user' => 'v1/user/index',
    'POST user/login' => 'user/login',
    'POST user/logout' => 'user/logout',

    // =========== Complaint ============
    'POST v1/complaint/forward/<id>' => 'v1/complaint/forward',
    'POST v1/complaint/formalize/<id>' => 'v1/complaint/formalize',
    'POST v1/complaint/finalize/<id>' => 'v1/complaint/finalize',
    'POST v1/complaint/response/<id>' => 'v1/complaint/response',
    'POST v1/complaint/update/<id>' => 'v1/complaint/update',
    'DELETE v1/complaint/<id>' => 'v1/complaint/delete',
    'GET,HEAD v1/complaint/<id>' => 'v1/complaint/view',
    'POST v1/complaint' => 'v1/complaint/create',
    'GET,HEAD v1/complaint' => 'v1/complaint/index',

    // =========== People ============
    'POST v1/people' => 'v1/people/create',
    'POST,OPTIONS v1/people/<id>' => 'v1/people/update',
    'GET,HEAD v1/people' => 'v1/people/index',
    'GET,HEAD,OPTIONS v1/people/get/<id>' => 'v1/people/get',
    'GET,HEAD,OPTIONS v1/people/search' => 'v1/people/search',

    // =========== Notification ============
    'POST v1/notification' => 'v1/notification/create',
    'POST,OPTIONS v1/notification/<id>' => 'v1/notification/update',
    'DELETE,OPTIONS v1/notification/<id>' => 'v1/notification/delete',
    'GET,HEAD v1/notification' => 'v1/notification/index',
    'GET,HEAD,OPTIONS v1/notification/get/<id>' => 'v1/notification/get',

    // =========== Food ============
    'POST v1/food' => 'v1/food/create',
    'POST,OPTIONS v1/food/<id>' => 'v1/food/update',
    'DELETE,OPTIONS v1/food/<id>' => 'v1/food/delete',
    'GET,HEAD v1/food' => 'v1/food/index',
    'GET,HEAD,OPTIONS v1/food/get/<id>' => 'v1/food/get',

    // =========== Warning ============
    'POST v1/warning' => 'v1/warning/create',
    'POST,OPTIONS v1/warning/<id>' => 'v1/warning/update',
    'DELETE,OPTIONS v1/warning/<id>' => 'v1/warning/delete',
    'GET,HEAD v1/warning' => 'v1/warning/index',
    'GET,HEAD,OPTIONS v1/warning/get/<id>' => 'v1/warning/get',
    // =========== Service ============
    'POST v1/service' => 'v1/service/create',
    'POST,OPTIONS v1/service/<id>' => 'v1/service/update',
    'DELETE,OPTIONS v1/service/<id>' => 'v1/service/delete',
    'GET,HEAD v1/service' => 'v1/service/index',
    'GET,HEAD,OPTIONS v1/service/get/<id>' => 'v1/service/get',

    // =========== Report ============
    'POST v1/report' => 'v1/report/create',
    'POST,OPTIONS v1/report/<id>' => 'v1/report/update',
    'DELETE,OPTIONS v1/report/<id>' => 'v1/report/delete',
    'GET,HEAD v1/report' => 'v1/report/index',
    'GET,HEAD,OPTIONS v1/report/get/<id>' => 'v1/report/get',

    // =========== Citizen ============

    'POST v1/citizen' => 'v1/citizen/create',
    'GET,HEAD v1/citizen/<id>' => 'v1/citizen/view',
    'GET,HEAD v1/citizen' => 'v1/citizen/index',

    // =========== Migration ============
    'GET migration/import' => 'migration/import/index',

    'OPTIONS v1/<url:[a-zA-Z0-9-]+>' => 'v1/option/index',
    'OPTIONS <url:[a-zA-Z0-9-]+>' => 'v1/option/index',

    // =========== Notification ============
    'POST v1/housing' => 'v1/housing/create',
    'POST,OPTIONS v1/housing/<id>' => 'v1/housing/update',
    'DELETE,OPTIONS v1/housing/<id>' => 'v1/housing/delete',
    'GET,HEAD v1/housing' => 'v1/housing/index',
    'GET,HEAD,OPTIONS v1/housing/get/<id>' => 'v1/housing/get',
];
