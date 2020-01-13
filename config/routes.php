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
    'POST,OPTIONS user/login' => 'user/login',
    'POST,OPTIONS user/logout' => 'user/logout',

    // =========== Complaint ============
    'POST,OPTIONS v1/complaint/forward/<id>' => 'v1/complaint/forward',
    'POST,OPTIONS v1/complaint/formalize/<id>' => 'v1/complaint/formalize',
    'POST,OPTIONS v1/complaint/finalize/<id>' => 'v1/complaint/finalize',
    'POST,OPTIONS v1/complaint/response/<id>' => 'v1/complaint/response',
    'POST,OPTIONS v1/complaint/update/<id>' => 'v1/complaint/update',
    'DELETE,OPTIONS v1/complaint/<id>' => 'v1/complaint/delete',
    'GET,OPTIONS v1/complaint/<id>' => 'v1/complaint/view',
    'POST,OPTIONS v1/complaint' => 'v1/complaint/create',
    'GET,OPTIONS v1/complaint' => 'v1/complaint/index',

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

    'POST,OPTIONS v1/citizen' => 'v1/citizen/create',
    'GET,OPTIONS v1/citizen/<id>' => 'v1/citizen/view',
    'GET,OPTIONS v1/citizen' => 'v1/citizen/index',

    // =========== Migration ============
    'GET migration/import' => 'migration/import/index',

    'OPTIONS v1/<url:[a-zA-Z0-9-]+>' => 'v1/option/index',
    'OPTIONS <url:[a-zA-Z0-9-]+>' => 'v1/option/index',

    // =========== Housing ============
    'POST v1/housing' => 'v1/housing/create',
    'POST,OPTIONS v1/housing/<id>' => 'v1/housing/update',
    'DELETE,OPTIONS v1/housing/<id>' => 'v1/housing/delete',
    'GET,HEAD v1/housing' => 'v1/housing/index',
    'GET,HEAD,OPTIONS v1/housing/get/<id>' => 'v1/housing/get',

    // =========== Fact ============
    'POST v1/fact' => 'v1/fact/create',
    'POST,OPTIONS v1/fact/<id>' => 'v1/fact/update',
    'DELETE,OPTIONS v1/fact/<id>' => 'v1/fact/delete',
    'GET,HEAD v1/fact' => 'v1/fact/index',
    'GET,HEAD,OPTIONS v1/fact/get/<id>' => 'v1/fact/get',

    // =========== Attendance ============
    'POST v1/attendance' => 'v1/attendance/create',
    'GET,HEAD v1/attendance' => 'v1/attendance/index',
    'GET,HEAD,OPTIONS v1/attendance/type' => 'v1/attendance/type',
    
    // =========== Registration ============
    'GET,HEAD,OPTIONS registration/import' => 'registration/migration/import',
    'GET,HEAD,OPTIONS registration/export' => 'registration/migration/export',

    'POST,OPTIONS registration/login' => 'registration/user/login',
    
    'GET,HEAD,OPTIONS registration/school' => 'registration/school/index',
    'GET,HEAD,OPTIONS registration/school/<id>' => 'registration/school/view',

    'GET,HEAD,OPTIONS registration/schedule' => 'registration/schedule/index',
    'GET,HEAD,OPTIONS registration/schedule/<id>' => 'registration/schedule/view',
    'PUT,PATCH,OPTIONS registration/schedule/<id>' => 'registration/schedule/update',
    'POST,OPTIONS registration/schedule' => 'registration/schedule/create',
    'DELETE,OPTIONS registration/schedule/<id>' => 'registration/schedule/delete',
    
    'GET,HEAD,OPTIONS registration/classroom/<schoolInepId>' => 'registration/classroom/index',
    'PUT,PATCH,OPTIONS registration/classroom/<id>' => 'registration/classroom/update',
    'GET,HEAD,OPTIONS registration/classroom/get/<id>' => 'registration/classroom/get',

    'GET,HEAD,OPTIONS registration/students' => 'registration/student/index',
    'GET,HEAD,OPTIONS registration/student/<id>' => 'registration/student/view',
    'POST,OPTIONS registration/student' => 'registration/student/create',
    'PUT,PATCH,OPTIONS registration/student/<id>' => 'registration/student/update',
    
    'GET,HEAD,OPTIONS registration' => 'registration/registration/index',
    'GET,HEAD,OPTIONS registration/<id>' => 'registration/registration/view',
    'POST,OPTIONS registration' => 'registration/registration/create',
    'PUT,PATCH,OPTIONS registration/<id>' => 'registration/registration/update',
    'PUT,PATCH,OPTIONS registration/status/<id>' => 'registration/registration/status',
];
