<?php

namespace GErcoli\CDN\S3;

use GErcoli\CDN\ServiceProviders\CDNServiceProvider;

class S3ServiceProvider extends CDNServiceProvider
{

    // public function boot() {
    //     $this->addCommand("s3:upload", "classname");
    // }

    public function register()
    {
        $this->addCommand("s3:upload", 'GErcoli\CDN\S3\Commands\S3UploadCommand');
    }

}
