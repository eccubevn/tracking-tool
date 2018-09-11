<?php
/**
 * Created by PhpStorm.
 * User: HP570
 * Date: 9/10/2018
 * Time: 4:36 PM
 */
namespace App\Services;

use App\Entity\PullRequest;
use App\Repository\PullRequestRepository;
use Carbon\Carbon;
use Doctrine\ORM\EntityManagerInterface;

class ApiService
{
    const
        REPO_USER = 'EC-CUBE',
        REPO_NAME = 'ec-cube';

    public static $urlPRs = 'https://api.github.com/repos/'.self::REPO_USER.'/'.self::REPO_NAME.'/pulls';


    /** @var PullRequestRepository */
    protected $pullRequestRepo;

    /** @var EntityManagerInterface */
    protected $entityManager;

    /**
     * ApiService constructor.
     *
     * @param PullRequestRepository $pullRequestRepo
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(PullRequestRepository $pullRequestRepo, EntityManagerInterface $entityManager)
    {
        $this->pullRequestRepo = $pullRequestRepo;
        $this->entityManager = $entityManager;
    }

    public function call($url)
    {
        $ch = curl_init();

        // Basic Authentication with token
        // https://developer.github.com/v3/auth/
        // https://github.com/blog/1509-personal-api-tokens
        // https://github.com/settings/tokens
        $access = 'username:token';

        curl_setopt($ch, CURLOPT_URL, $url);
        //curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/xml'));
        curl_setopt($ch, CURLOPT_USERAGENT, 'Agent smith');
        curl_setopt($ch, CURLOPT_HEADER, 0);
//        curl_setopt($ch, CURLOPT_USERPWD, $access);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        $output = curl_exec($ch);
        curl_close($ch);
        $result = json_decode(trim($output), true);
        return $result;
    }

    public function getCallPullRequest(){
        $api = $this->call(ApiService::$urlPRs.'?state=all');

        if ($api) {
            $this->pullRequestRepo->save($api);
        }
    }
}