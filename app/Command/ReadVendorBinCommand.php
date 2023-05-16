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
namespace App\Command;

use Hyperf\Command\Annotation\Command;
use Hyperf\Command\Command as HyperfCommand;
use Psr\Container\ContainerInterface;

#[Command]
class ReadVendorBinCommand extends HyperfCommand
{
    protected bool $coroutine = false;

    public function __construct(protected ContainerInterface $container)
    {
        parent::__construct('read:vendor-bin');
    }

    public function configure()
    {
        parent::configure();
        $this->setDescription('Read command in vendor/bin.');
    }

    public function handle()
    {
        system('vendor/bin/php-parse', $code);
        if ($code === 127) {
            exit(127);
        }
    }
}
