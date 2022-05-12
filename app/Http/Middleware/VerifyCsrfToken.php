<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * Indicates whether the XSRF-TOKEN cookie should be set on the response.
     *
     * @var bool
     */
    protected $addHttpCookie = true;

    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        '/add-booking-form-data',
        '/add-share-document-form-data',
        '/add-new-share-document-form-data',
        '/quote',
        '/new-quote',
        '/add-greeting-form-data',
        '/add-new-greeting-form-data',
        '/send-live-site-url-for-client-login',
        '/add-custom-form-data',
        '/add-strata-form-data',
        '/reschedule',
    ];
}
