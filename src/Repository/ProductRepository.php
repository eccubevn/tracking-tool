<?php
/**
 * Created by PhpStorm.
 * User: HP570
 * Date: 9/10/2018
 * Time: 4:13 PM
 */

namespace App\Repository;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

class ProductRepository extends ServiceEntityRepository
{
    public function __construct(
        \Symfony\Bridge\Doctrine\RegistryInterface $registry
    ) {
        parent::__construct($registry, \src\Entity\Product::class);
    }
}