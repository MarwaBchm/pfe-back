<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Laravel CORS Configuration
    |--------------------------------------------------------------------------
    |
    | The following options configure the cross-origin resource sharing (CORS)
    | settings for your application. You can adjust these settings as needed.
    |
    */

    /*
    |--------------------------------------------------------------------------
    | Allowed Origins
    |--------------------------------------------------------------------------
    |
    | Here you may specify which domains are allowed to make cross-origin
    | requests. You can specify multiple origins as an array or use a wildcard
    | '*' to allow all origins. You may also use regular expressions to match
    | the origins. If set to null, no origins are allowed.
    |
    | Supported: "array", "string", "null"
    |
    */
    'paths' => ['api/*', '/sanctum/csrf-cookie'],  // Include your API routes and CSRF cookie route

    'allowed_origins' => ['http://localhost:5173'], // Specify your frontend URL here

    /*
    |--------------------------------------------------------------------------
    | Allowed Origins Patterns
    |--------------------------------------------------------------------------
    |
    | This option allows you to specify regular expressions that match the
    | origins that should be allowed to make requests. This is useful if
    | you want to allow requests from dynamic origins (for example, subdomains).
    |
    */

    'allowed_origins_patterns' => [],

    /*
    |--------------------------------------------------------------------------
    | Allowed Methods
    |--------------------------------------------------------------------------
    |
    | Specify which HTTP methods are allowed when making requests to the server.
    | You can specify the methods allowed as an array, or you can use "*" to
    | allow all methods.
    |
    | Supported: "array", "string"
    |
    */

    'allowed_methods' => ['*'], // Allows all HTTP methods (GET, POST, PUT, DELETE, etc.)

    /*
    |--------------------------------------------------------------------------
    | Allowed Headers
    |--------------------------------------------------------------------------
    |
    | Here you may specify which headers are allowed to be sent with cross-origin
    | requests. You can specify the headers allowed as an array or use "*" to
    | allow all headers. By default, Laravel allows a few common headers like
    | "Content-Type", "X-Requested-With", and "Authorization".
    |
    | Supported: "array", "string"
    |
    */

    'allowed_headers' => ['Content-Type', 'X-Requested-With', 'Authorization', 'Accept', 'X-CSRF-TOKEN'],

    /*
    |--------------------------------------------------------------------------
    | Exposed Headers
    |--------------------------------------------------------------------------
    |
    | This option controls which headers are exposed to the browser. You can specify
    | the headers you want to be exposed to the browser in response to a preflight
    | request.
    |
    | Supported: "array", "string"
    |
    */

    'exposed_headers' => [],

    /*
    |--------------------------------------------------------------------------
    | Max Age
    |--------------------------------------------------------------------------
    |
    | This option controls how long the results of a preflight request are cached
    | in the browser. The value is in seconds. By default, this value is set to 0
    | so that the browser will not cache preflight responses.
    |
    | Supported: "int"
    |
    */

    'max_age' => 0,  // Adjust as needed

    /*
    |--------------------------------------------------------------------------
    | Supports Credentials
    |--------------------------------------------------------------------------
    |
    | If your application needs to include cookies in cross-origin requests (for
    | example, for session-based authentication), set this option to true.
    |
    | Supported: bool
    |
    */

    'supports_credentials' => true,  // Required for session-based authentication
];
