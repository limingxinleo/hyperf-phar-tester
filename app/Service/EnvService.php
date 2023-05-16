<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://hyperf.wiki
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */
namespace App\Service;

use Han\Utils\Service;

use function Hyperf\Support\env;

class EnvService extends Service
{
    public function get(string $name, $default = null)
    {
        return env($name, $default);
    }
}
