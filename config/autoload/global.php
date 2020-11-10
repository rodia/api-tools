<?php

$db = parse_url(getenv("DATABASE_URL"));
$dns = "pgsql:" . sprintf(
    "host=%s;port=%s;user=%s;password=%s;dbname=%s",
    $db["host"],
    $db["port"],
    $db["user"],
    $db["pass"],
    ltrim($db["path"], "/"));

return [
    'api-tools-content-negotiation' => [
        'selectors' => [],
    ],
    'api-tools-mvc-auth' => [
        'authentication' => [
            'adapters' => [
                'oauth' => [
                    'adapter' => \Laminas\ApiTools\MvcAuth\Authentication\OAuth2Adapter::class,
                    'storage' => [
                        'adapter' => \pdo::class,
                        'dsn' => $dns,
                        'route' => '/oauth',
                        'username' => $db['user'],
                        'password' => $db['pass'],
                    ],
                ],
            ],
        ],
    ],
    'db' => [
        'adapters' => [
            'PGAdapter' => [
                'database' => ltrim($db["path"], "/"),
                'driver' => 'PDO_Pgsql',
                'hostname' => $db["host"],
                'username' => $db["user"],
                'password' => $db["pass"],
                'port' => $db["port"],
                'dsn' => $dsn,
            ],
        ],
    ],
    'router' => [
        'routes' => [
            'oauth' => [
                'options' => [
                    'spec' => '%oauth%',
                    'regex' => '(?P<oauth>(/oauth))',
                ],
                'type' => 'regex',
            ],
        ],
    ],
    'api-tools-oauth2' => [
        'allow_implicit' => true,
    ],
    'EnterpriseLib' => [
        'array_mapper_path' => 'data/enterpriselib.php',
    ],
];
