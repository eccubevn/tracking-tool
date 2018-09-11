<?php

namespace App\Controller;

use App\Entity\PullRequest;
use App\Repository\PullRequestRepository;
use App\Services\ApiService;
use Carbon\Carbon;
use Symfony\Component\Routing\Annotation\Route;

class PullRequestController extends \App\Controller\AbstractController
{
    /** @var PullRequestRepository */
    protected $pullRequestRepo;

    /** @var  ApiService */
    protected $apiService;

    /**
     * PullRequestController constructor.
     * @param PullRequestRepository $pullRequestRepo
     * @param ApiService $apiService
     */
    public function __construct(PullRequestRepository $pullRequestRepo, ApiService $apiService)
    {
        $this->pullRequestRepo = $pullRequestRepo;
        $this->apiService = $apiService;
    }


    /**
     * @Route("/pull/request", name="pull_request")
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(ApiService $apiService)
    {
//        $this->apiService->getCallPullRequest();
        $PullRequest = $this->pullRequestRepo->findAll();

        return $this->render('pull_request/index.html.twig', [
            'PullRequest' => $PullRequest,
        ]);
    }
}
