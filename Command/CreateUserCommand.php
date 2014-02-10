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

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Orkestra\Bundle\ApplicationBundle\Entity\User;
use Symfony\Component\Console\Helper\DialogHelper;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputInterface;

class CreateUserCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this->setName('orkestra:create-user')
            ->setDescription('Creates a new user');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $em = $this->getContainer()->get('orkestra.entity_manager');

        if (!$input->isInteractive()) {
            throw new \RuntimeException('This command must be run in interactive mode.');
        }

        $dialog = $this->getDialogHelper();

        $output->writeln(array(
            '',
            'This prompt will walk you through creating a user.',
            ''
        ));

        $firstName = $dialog->ask($output, '<info>First name:</info> ');
        $lastName = $dialog->ask($output, '<info>Last name:</info> ');

        $username = $dialog->askAndValidate($output, '<info>Username:</info> ', function($username) {
            // TODO: Check uniqueness

            return $username;
        });

        $password = $dialog->ask($output, '<info>Password:</info> ');

        $group = $dialog->askAndValidate($output, '<info>Group:</info> ', function($name) use ($em) {
            $group = $em->getRepository('Orkestra\Bundle\ApplicationBundle\Entity\Group')->findOneBy(array('name' => $name));

            if (!$group) {
                throw new \RuntimeException(sprintf('The group "%s" does not exist.', $name));
            }

            return $group;
        });

        $user = new User();
        $user->setFirstName($firstName);
        $user->setLastName($lastName);
        $user->setUsername($username);
        $user->setPassword($password);
        $user->addGroup($group);

        $factory = $this->getContainer()->get('security.encoder_factory');
        $encoder = $factory->getEncoder($user);
        $user->setPassword($encoder->encodePassword($user->getPassword(), $user->getSalt()));

        $em->persist($user);
        $em->flush();

        $output->writeln(array('', 'User created successfully'));
    }

    /**
     * @return \Symfony\Component\Console\Helper\DialogHelper
     */
    protected function getDialogHelper()
    {
        $dialog = $this->getHelperSet()->get('dialog');
        if (!$dialog) {
            $this->getHelperSet()->set($dialog = new DialogHelper());
        }

        return $dialog;
    }
}
