<?php

namespace Orkestra\Bundle\ApplicationBundle\Subscriber;

use Doctrine\Common\EventSubscriber;
use Doctrine\ORM\Events;
use Doctrine\ORM\Event\PreUpdateEventArgs;
use Orkestra\Bundle\ApplicationBundle\Entity\Contact\Address;

class LatitudeLongitudeSubscriber implements EventSubscriber
{
    public function preUpdate(PreUpdateEventArgs $event)
    {
        $entity = $event->getEntity();

        if (!$entity instanceof Address) {
            return;
        }

        if (!$event->hasChangedField('street')
            || !$event->hasChangedField('city')
            || !$event->hasChangedField('region')
            || !$event->hasChangedField('postalCode')
        ) {
            return;
        }

        if (!$event->hasChangedField('latitude')) {
            $entity->setLatitude(null);
        }

        if (!$event->hasChangedField('longitude')) {
            $entity->setLongitude(null);
        }

        // This "hack" is the only way to change a 'new' value in a preUpdate
        $em = $event->getEntityManager();
        $uow = $em->getUnitOfWork();
        $metadata = $em->getClassMetadata(get_class($entity));
        $uow->recomputeSingleEntityChangeSet($metadata, $entity);
    }

    /**
     * Returns an array of events this subscriber wants to listen to.
     *
     * @return array
     */
    public function getSubscribedEvents()
    {
        return array(Events::preUpdate);
    }
}
