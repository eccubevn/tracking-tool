<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class PullRequestController extends AbstractController
{
    /**
     * @Route("/pull/request", name="pull_request")
     */
    public function index()
    {
        return $this->render('pull_request/index.html.twig', [
            'controller_name' => 'PullRequestController',
        ]);
    }
}
