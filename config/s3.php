<?php
return [
    'defaults'  => [
        // When 'bucket' is null, the first bucket in the "buckets" array will be the default:
        'bucket'        => 'assets',
        // This is the hostname to use fo the CDN (exclude the bucket name):
        'host_name'     => 's3-website-us-east-1.amazonaws.com',
        // if true, assets will be retrieved locally instead of the CDN:
        'bypass'        => false,
        // How long to cache this? (for the browser):
        'cache_time'    => 1*60*60,
        // AWS has many permission settings, set that here:
        'permissions'   => 'public-read',
        // You can store these values in your .env file:
        'key_public'    => env('S3_PUBLIC_KEY', null),
        'key_private'   => env('S3_PRIVATE_KEY', null)
    ],
    'buckets'   => [
        'assets'    => [
            'bucket_name'   => 'app-assets',    // This will prefix the host
            'host_name'     => null,            // Use the default host name.
            'patterns'      => [
                [
                    'public/css/*/**.css',      // Local files to upload.
                    'css/'                      // Where to place them on the CDN.
                ],
                [
                    'public/js/*/**',           // Local files to upload.
                    'js/',                      // Where to place them on the CDN.
                    ['public/js/*/**.map']      // We don't need no stinking maps (exclude them)
                ]
            ]
        ],
        'gallery'   => [
            'bucket_name'   => 'app-gallery',
            'host_name'     => 's3-website-us-east-2.amazonaws.com',
            'cache_time'    => 24*60*60,
            'patterns'      => [
                [
                    'public/img/gallery/*/**',
                    'img/gallery/'
                ]
            ]
        ]
    ]
];