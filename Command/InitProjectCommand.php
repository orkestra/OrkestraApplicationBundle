<?php

/*
 * This file is part of the OrkestraApplicationBundle package.
 *
 * Copyright (c) Orkestra Community
 *
 * For the full copyright and license information, please view the LICENSE file
 * that was distributed with this source code.
 */

namespace Orkestra\Bundle\ApplicationBundle\Command;

use Orkestra\Bundle\ApplicationBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Helper\DialogHelper;
use Symfony\Component\Console\Helper\QuestionHelper;
use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\ConfirmationQuestion;

class InitProjectCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this->setName('orkestra:init-project')
            ->setDescription('Sets up an initial project');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        if (!$input->isInteractive()) {
            throw new \RuntimeException('This command must be run in interactive mode.');
        }

        $dialog = $this->getDialogHelper();

        $output->writeln(array(
            '',
            'This prompt will walk you through initializing the project.',
            ''
        ));

        if ($dialog->ask($input, $output, new ConfirmationQuestion('<info>Do you want to create the database?</info> [no] ', false))) {
            $command = $this->getApplication()->find('doctrine:database:create');
            $input = new ArrayInput(array());
            $command->run($input, $output);
        }

        if ($dialog->ask($input, $output, new ConfirmationQuestion('<info>Do you want to create the schema?</info> [no] ', false))) {
            $command = $this->getApplication()->find('doctrine:schema:create');
            $input = new ArrayInput(array());
            $command->run($input, $output);
        }

        if ($dialog->ask($input, $output, new ConfirmationQuestion('<info>Do you want to load database fixtures?</info> [no] ', false))) {
            $command = $this->getApplication()->find('doctrine:fixtures:load');
            $input = new ArrayInput(array());
            $command->run($input, $output);
        }

        if ($dialog->ask($input, $output, new ConfirmationQuestion('<info>Do you want to create a bundle?</info> [no] ', false))) {
            $command = $this->getApplication()->find('generate:bundle');
            $input = new ArrayInput(array());
            $command->run($input, $output);
        }
        
        $output->writeln(array('', 'Project successfully initialized'));
    }

    /**
     * @return \Symfony\Component\Console\Helper\QuestionHelper
     */
    protected function getDialogHelper()
    {
        $dialog = $this->getHelperSet()->get('question');
        if (!$dialog) {
            $this->getHelperSet()->set($dialog = new QuestionHelper());
        }

        return $dialog;
    }
}
