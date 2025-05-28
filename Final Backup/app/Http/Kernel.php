protected $middlewareGroups = [
    'web' => [
        // ...existing middleware...
        \App\Http\Middleware\VerifyCsrfToken::class,
        // ...existing middleware...
    ],
];
