<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;

class AbstractController extends \Symfony\Bundle\FrameworkBundle\Controller\AbstractController
{
    /**
     * @var EntityManagerInterface
     */
    protected $entityManager;

    /**
     * @param EntityManagerInterface $entityManager
     * @required
     */
    public function setEntityManager(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }
}
