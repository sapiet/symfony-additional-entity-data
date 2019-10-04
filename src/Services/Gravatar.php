<?php

namespace App\Services;

class Gravatar
{
    const URL = 'https://www.gravatar.com/avatar/%s';

    public function getUrl(string $email, array $parameters = []): string
    {
        $queryParameters = [];

        if (array_key_exists('default', $parameters)) {
            $queryParameters['d'] = $parameters['default'];
        }

        if (array_key_exists('size', $parameters)) {
            $queryParameters['s'] = $parameters['size'];
        }

        $queryParametersString = empty($queryParameters) ? '' : '?'.http_build_query($queryParameters);

        return sprintf(self::URL, md5($email)).$queryParametersString;
    }
}
