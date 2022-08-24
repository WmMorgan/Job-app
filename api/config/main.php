<?php

$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-api',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'api\controllers',
    'modules' => [
        'v1' => [
            'basePath' => '@app/modules/v1',
            'class' => 'api\modules\v1\Module'
        ]
    ],
    'components' => [
            'request' => [
                'csrfParam' => '_csrf-api',
                //'baseUrl' => '/api',
                'parsers' => [
                    'application/json' => 'yii\web\JsonParser',
                ]
            ],
        'response' => [
            'class' => 'yii\web\Response',
            'on beforeSend' => function ($event) {
                $response = $event->sender;
                if ($response->data !== null && !empty(Yii::$app->request->get('suppress_response_code'))) {
                    $response->data = [
                        'success' => $response->isSuccessful,
                        'data' => $response->data,
                    ];
                    $response->statusCode = 200;
                } else {
                  $response->data = $response->data['error-info'] ?? $response->data;
                 }
            },
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => false,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'enableStrictParsing' => true,
            'showScriptName' => false,
            'rules' => [
                 [
                     'class' => 'yii\rest\UrlRule',
                     'controller' => 'v1/statament',
                     'tokens' => [
                         '{id}' => '<id:\\w+>'
                     ],
                     'extraPatterns' => [
                         'POST {id}' => 'create',
                         ],
                 ],
                'v1/auth' => 'v1/auth/login'
            ],
        ]
    ],
    'params' => $params,
];


