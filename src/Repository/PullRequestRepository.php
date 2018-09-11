<?php
/**
 * Created by PhpStorm.
 * User: HP570
 * Date: 9/10/2018
 * Time: 4:13 PM
 */

namespace App\Repository;

use App\Entity\PullRequest;
use App\Services\ApiService;
use Carbon\Carbon;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

class PullRequestRepository extends AbstractRepository
{
    public function __construct(
        \Symfony\Bridge\Doctrine\RegistryInterface $registry
    ) {
        parent::__construct($registry, PullRequest::class);
    }

    public function save($api){
        foreach ($api as $item) {
            $prId = $item['id'];
            if (!$this->count(['number' => $prId])) {
                $created_at = new Carbon($item['created_at']);
                $updated_at = new Carbon($item['updated_at']);

                $pr = new PullRequest();
                $pr->setNumber($prId);
                $pr->setTitle($item['title']);
                $pr->setUrl($item['html_url']);
                $pr->setUserGithubLogin($item['user']['login']);
                $pr->setUserGithubId($item['user']['id']);
                $pr->setPrCreatedAt(new \DateTime($created_at->toDateTimeString()));
                $pr->setPrUpdatedAt(new \DateTime($updated_at->toDateTimeString()));
                $pr->setState($item['state']);
                $pr->setStatus(1);
                $pr->setOriginalData(json_encode($item));
                $this->getEntityManager()->persist($pr);
                $this->getEntityManager()->flush($pr);
            }
        }
    }
}