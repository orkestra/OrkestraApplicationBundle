<?php

namespace Orkestra\Bundle\ApplicationBundle\Worker;

use Doctrine\ORM\EntityManager;
use Orkestra\Bundle\ApplicationBundle\Entity\Contact\Address;
use Symfony\Component\HttpFoundation\Request;
use Orkestra\Common\Kernel\HttpKernel;

/**
 * Populates latitude and longitude in addresses
 */
class LatitudeLongitudeWorker implements WorkerInterface
{
    /**
     * @var \Doctrine\ORM\EntityManager
     */
    protected $entityManager;

    /**
     * @var \Doctrine\ORM\EntityRepository
     */
    protected $addressRepository;

    /**
     * @var \Orkestra\Common\Kernel\HttpKernel
     */
    protected $kernel;

    /**
     * Constructor
     *
     * @param \Doctrine\ORM\EntityManager $entityManager
     */
    public function __construct(EntityManager $entityManager, HttpKernel $kernel)
    {
        $this->entityManager = $entityManager;
        $this->addressRepository = $entityManager->getRepository('OrkestraApplicationBundle:Contact\Address');
        $this->kernel = $kernel;
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
            $this->updateLatLong($address);

            $this->entityManager->persist($address);
        }

        $this->entityManager->flush();
    }

    private function updateLatLong(Address $address)
    {
        $request = Request::create('https://maps.googleapis.com/maps/api/geocode/json', 'GET', array(
            'address' => $address->__toString(),
            'sensor' => 'false'
        ));

        $response = $this->kernel->handle($request);

        $data = json_decode($response->getContent());

        if (isset($data->status) && 'OK' === $data->status) {
            if (isset($data->results[0]->geometry->location)) {
                $address->setLatitude((float)$data->results[0]->geometry->location->lat);
                $address->setLongitude((float)$data->results[0]->geometry->location->lng);
            }
        }
    }
}
