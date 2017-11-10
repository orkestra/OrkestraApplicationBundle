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
use Symfony\Component\Console\Helper\QuestionHelper;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\Question;

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

        $firstName = $dialog->ask($input,$output, new Question('<info>First name:</info> '));
        $lastName = $dialog->ask($input,$output, new Question('<info>Last name:</info> '));

        $qUsername = new Question('<info>Username:</info>');
        $qUsername->setValidator(function($username) use ($em) {
            $exists = $em->getRepository('Orkestra\Bundle\ApplicationBundle\Entity\User')->findOneBy(array('username' => $username));

            if ($exists) {
                throw new \Exception(sprintf('Username has already been taken'));
            }

            return $username;
        });

        $username = $dialog->ask($input, $output,$qUsername);

        $qPassword = new Question('<info>Password:</info> ');
        $qPassword->setHidden(true);
        $password = $dialog->ask($input, $output, $qPassword);

        $qGroup = new Question('<info>Group:</info> ');
        $qGroup->setValidator(function($name) use ($em) {
            $group = $em->getRepository('Orkestra\Bundle\ApplicationBundle\Entity\Group')->findOneBy(array('name' => $name));

            if (!$group) {
                throw new \Exception(sprintf('The group "%s" does not exist.', $name));
            }

            return $group;
        });

        $group = $dialog->ask($input, $output, $qGroup);

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
        $dialog = $this->getHelperSet()->get('question');
        if (!$dialog) {
            $this->getHelperSet()->set($dialog = new QuestionHelper());
        }

        return $dialog;
    }
}
