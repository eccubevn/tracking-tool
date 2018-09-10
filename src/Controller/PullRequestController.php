<?php

namespace App\Controller;

use App\Entity\PullRequest;
use App\Services\ApiService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class PullRequestController extends AbstractController
{
    /** @var  EntityManagerInterface */
    protected $entityManager;

    /**
     * PullRequestController constructor.
     *
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }


    /**
     * @Route("/pull/request", name="pull_request")
     */
    public function index()
    {
        $api = ApiService::getInstance()->call(ApiService::GET_PRs);

        if($api){
            foreach ($api as $item){
                $pr = new PullRequest();
                $pr->setNumber($item['id']);
                $pr->setUrl($item['url']);
                $pr->setUserGithubLogin($item['user']['login']);
                $pr->setUserGithubId($item['user']['id']);
                $pr->setPrCreatedAt($item['created_at']);
                $pr->setPrCreatedAt($item['updated_at']);
                $pr->setState($item['state']);
                $pr->setStatus(1);
                $this->entityManager->persist($pr);
                $this->entityManager->flush($pr);
            }
        }
        return $this->render('pull_request/index.html.twig', [
            'controller_name' => 'PullRequestController',
        ]);
    }
}
