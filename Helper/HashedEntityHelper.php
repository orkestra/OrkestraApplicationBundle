<?php

/*
 * This file is part of the OrkestraApplicationBundle package.
 *
 * Copyright (c) Orkestra Community
 *
 * For the full copyright and license information, please view the LICENSE file
 * that was distributed with this source code.
 */

namespace Orkestra\Bundle\ApplicationBundle\Helper;

use Doctrine\ORM\EntityManager;
use Orkestra\Bundle\ApplicationBundle\Entity\HashedEntity;
use Orkestra\Bundle\ApplicationBundle\Model\PersistentModelInterface;

class HashedEntityHelper
{
    /**
     * @var EntityManager
     */
    private $entityManager;

    /**
     * Constructor
     *
     * @param EntityManager $entityManager
     */
    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @param  PersistentModelInterface $entity
     * @param  \DateTime                $expiration
     * @return HashedEntity
     */
    public function create(PersistentModelInterface $entity, \DateTime $expiration = null)
    {
        $entityClass = get_class($entity);

        $hash = $this->entityManager->getRepository('OrkestraApplicationBundle:HashedEntity')
            ->createQueryBuilder('h')
            ->where('h.referenceId = :refId')
            ->andWhere('h.className = :className')
            ->andWhere('h.dateExpires >= :curDate')
            ->andWhere('h.active = true')
            ->setParameters(array(
                'refId' => $entity->getId(),
                'className' => $entityClass,
                'curDate' => new \DateTime()
            ))
            ->getQuery()->getOneOrNullResult();

        if (!$hash) {
            $hash = new HashedEntity();
            $hash->setClassName($entityClass);
            $hash->setReferenceId($entity->getId());
        }

        $hash->setDateExpires($expiration);
        $hash->setReferencedObject($entity);
        $hash->setHash(sha1(uniqid(mt_rand(), true)));

        return $hash;
    }

    /**
     * @param string $hash
     * @param string $class
     *
     * @return HashedEntity
     */
    public function lookup($hash, $class)
    {
        $qb = $this->entityManager->getRepository('OrkestraApplicationBundle:HashedEntity')
            ->createQueryBuilder('h');

        $result = $qb->where('h.hash = :hash')
            ->andWhere('h.className = :className')
            ->andWhere($qb->expr()->orX(
                $qb->expr()->gte('h.dateExpires', ':curDate'),
                $qb->expr()->isNull('h.dateExpires')
            ))
            ->andWhere('h.active = true')
            ->setParameters(array(
                'hash' => $hash,
                'className' => $class,
                'curDate' => new \DateTime()
            ))
            ->getQuery()->getOneOrNullResult();

        if ($result) {
            $referencedObject = $this->entityManager->getRepository($class)
                ->createQueryBuilder('x')
                ->where('x.id = :refId')
                ->setParameter('refId', $result->getReferenceId())
                ->getQuery()->getOneOrNullResult();

            if ($referencedObject) {
                $result->setReferencedObject($referencedObject);
            } else {
                throw new \RuntimeException('Unable to find referenced object.');
            }
        }

        return $result;
    }

    /**
     * @param HashedEntity $hashedEntity
     */
    public function invalidate($hashedEntity)
    {
        $hashedEntity->setActive(false);
    }
}
