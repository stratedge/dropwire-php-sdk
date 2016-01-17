<?php

namespace Notifier\SDK;

use Notifier\SDK\Exceptions\NotifierSDKException;
use Notifier\SDK\NotifierApp;

class Notifier
{
    const APP_ID_ENV_NAME = 'NOTIFIER_APP_ID';

    const APP_SECRET_ENV_NAME = 'NOTIFIER_APP_SECRET';

    const DEFAULT_VERSION = 'v1';

    public function __construct(array $config = [])
    {
        $config = array_merge([
            'app_id' => getenv(static::APP_ID_ENV_NAME),
            'app_secret' => getenv(static::APP_SECRET_ENV_NAME),
            'default_version' => static::DEFAULT_VERSION
        ], $config);

        if (!$config['app_id']) {
            throw new NotifierSDKException('Config value for "app_id" not provided and could not be found in environment under "' . static::APP_ID_ENV_NAME . '"');
        }

        if (!$config['app_secret']) {
            throw new NotifierSDKException('Config value for "app_secret" not provided and could not be found in environment under "' . static::APP_SECRET_ENV_NAME . '"');
        }

        $this->app = new NotifierApp();
    }
}
