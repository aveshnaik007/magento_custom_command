<?php

/**
 *
 * @category  Custom Development
 * @email     contactus@learningmagento.com
 * @author    Learning Magento
 * @website   learningmagento.com
 * @Date      20-01-2024
 */

namespace Learningmagento\Customcommand\Console;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
class CombineCommand extends Command
{
    protected function configure()
    {
        $this->setName('combined:commands');
        $this->setDescription('Run all main 3 commands of Magento which are setup:upgrade, di:compile and content deploy');
        parent::configure();
    }
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $commandList = array('setup:upgrade', 'setup:di:compile', 'setup:static-content:deploy -f');
        foreach ($commandList as $list) {
            $command = $this->getApplication()->find($list);
            $returnCode = $command->run($input, $output);
            if(!$returnCode) {
                $output->writeln($list . ' successfully finished');
            }
        }
    }
}
