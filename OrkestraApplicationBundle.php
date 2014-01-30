<?php

namespace Orkestra\Bundle\ApplicationBundle;

use Orkestra\Bundle\ApplicationBundle\DependencyInjection\Compiler\ModifyServiceDefinitionsPass;
use Symfony\Component\HttpKernel\Bundle\Bundle;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Doctrine\DBAL\Types\Type;
use Orkestra\Common\Type\Date;
use Orkestra\Common\Type\DateTime;
use Orkestra\Bundle\ApplicationBundle\DependencyInjection\Compiler\RegisterFormTypesPass;
use Orkestra\Bundle\ApplicationBundle\DependencyInjection\Compiler\RegisterWorkersPass;
use Orkestra\Common\DbalType\EncryptedStringType;

class OrkestraApplicationBundle extends Bundle
{
    /**
     * {@inheritDoc}
     */
    public function boot()
    {
        Type::overrideType('datetime', 'Orkestra\Common\DbalType\DateTimeType');
        Type::overrideType('date',     'Orkestra\Common\DbalType\DateType');
        Type::overrideType('time',     'Orkestra\Common\DbalType\TimeType');

        if (!Type::hasType('encrypted_string')) {
            Type::addType('encrypted_string', 'Orkestra\Common\DbalType\EncryptedStringType');
        } elseif (!(Type::getType('encrypted_string') instanceof EncryptedStringType)) {
            throw new \UnexpectedValueException('Type encrypted_string must be instance of Orkestra\Common\DbalType\EncryptedStringType');
        }

        $encryptedStringType = Type::getType('encrypted_string');
        $encryptedStringType->setKey($this->container->getParameter('secret'));

        // Set up date related settings
        $defaultTimezone = new \DateTimeZone(date_default_timezone_get());
        DateTime::setServerTimezone($defaultTimezone);
        DateTime::setUserTimezone($defaultTimezone);
        DateTime::setDefaultFormat('Y-m-d H:i:s');
        Date::setDefaultFormat('Y-m-d');
    }

    /**
     * {@inheritDoc}
     */
    public function build(ContainerBuilder $container)
    {
        $container->addCompilerPass(new ModifyServiceDefinitionsPass());
        $container->addCompilerPass(new RegisterFormTypesPass());
        $container->addCompilerPass(new RegisterWorkersPass());
    }
}
