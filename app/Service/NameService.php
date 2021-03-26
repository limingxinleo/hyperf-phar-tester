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
use Hyperf\Di\Annotation\Inject;

class NameService extends Service
{
    /**
     * @Inject
     * @var EnvService
     */
    protected $env;

    public function getName(): string
    {
        return $this->env->get('APP_NAME', 'null');
    }
}
