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

use App\Constants\ErrorCode;
use App\Exception\BusinessException;
use App\Service\NameService;
use Hyperf\Command\Annotation\Command;
use Hyperf\Command\Command as HyperfCommand;
use Psr\Container\ContainerInterface;
use Symfony\Component\Console\Input\InputOption;

#[Command]
class ShowNameCommand extends HyperfCommand
{
    public function __construct(protected ContainerInterface $container)
    {
        parent::__construct('show:name');
    }

    public function configure()
    {
        parent::configure();
        $this->setDescription('Show App Name');
        $this->addOption('name', 'N', InputOption::VALUE_OPTIONAL, '验证项目名');
    }

    public function handle()
    {
        $this->line($name = di()->get(NameService::class)->getName());

        if ($name !== $this->input->getOption('name')) {
            throw new BusinessException(ErrorCode::SERVER_ERROR);
        }
    }
}
