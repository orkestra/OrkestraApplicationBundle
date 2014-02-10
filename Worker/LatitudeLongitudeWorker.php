<?php

/*
 * This file is part of the OrkestraApplicationBundle package.
 *
 * Copyright (c) Orkestra Community
 *
 * For the full copyright and license information, please view the LICENSE file
 * that was distributed with this source code.
 */

namespace Orkestra\Bundle\ApplicationBundle\Worker;

use Doctrine\ORM\EntityManager;
use Guzzle\Http\ClientInterface;
use Orkestra\Bundle\ApplicationBundle\Entity\Contact\Address;
use Symfony\Component\HttpFoundation\Request;
use Orkestra\Common\Kernel\HttpKernel;

/**
 * Populates latitude and longitude in addresses
 */
class LatitudeLongitudeWorker implements WorkerInterface
{
    const MILLISECONDS_PAUSE_BETWEEN_QUERIES = 0;

    /**
     * @var \Doctrine\ORM\EntityManager
     */
    protected $entityManager;

    /**
     * @var \Doctrine\ORM\EntityRepository
     */
    protected $addressRepository;

    /**
     * @var \Guzzle\Http\ClientInterface
     */
    private $client;

    /**
     * Constructor
     *
     * @param \Doctrine\ORM\EntityManager $entityManager
     * @param \Guzzle\Http\ClientInterface $client
     */
    public function __construct(EntityManager $entityManager, ClientInterface $client)
    {
        $this->entityManager = $entityManager;
        $this->addressRepository = $entityManager->getRepository('OrkestraApplicationBundle:Contact\Address');
        $this->client = $client;
    }

    /**
     * Gets the user-friendly name of the worker
     *
     * @return string
     */
    public function getName()
    {
        return 'Latitude and Longitude Worker';
    }

    /**
     * Gets the internally used name of the worker
     *
     * @return string
     */
    public function getInternalName()
    {
        return 'orkestra.address.latitude_longitude';
    }

    /**
     * Execute the work
     *
     * @return void
     */
    public function execute()
    {
        $addresses = $this->addressRepository->createQueryBuilder('a')
            ->where('a.latitude IS NULL')
            ->orWhere('a.longitude IS NULL')
            ->setMaxResults(500)
            ->getQuery()
            ->getResult();

        foreach ($addresses as $address) {
            try {
                $this->updateLatLong($address);
            } catch (\RuntimeException $e) {
                echo "Stopping work -- over the API query limit.\n";

                break;
            }

            $this->entityManager->persist($address);

            usleep(self::MILLISECONDS_PAUSE_BETWEEN_QUERIES);
        }

        $this->entityManager->flush();
    }

    private function updateLatLong(Address $address)
    {
        $request = $this->client->get('https://maps.googleapis.com/maps/api/geocode/json');
        $request->getQuery()
            ->set('address', $address->__toString())
            ->set('sensor', 'false');

        $response = $request->send();

        $data = json_decode($response->getBody(true));

        if (isset($data->status)) {
            if ('OK' === $data->status && isset($data->results[0]->geometry->location)) {
                $address->setLatitude((float)$data->results[0]->geometry->location->lat);
                $address->setLongitude((float)$data->results[0]->geometry->location->lng);
                
            }  elseif ('OVER_QUERY_LIMIT' === $data->status) {
                throw new \RuntimeException('Over the query limit');
            }
        }
    }
}
