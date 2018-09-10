<?php

/*
 * This file is part of EC-CUBE
 *
 * Copyright(c) LOCKON CO.,LTD. All Rights Reserved.
 *
 * http://www.lockon.co.jp/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Product
 *
 * @ORM\Table(name="dtb_pull_request")
 * @ORM\InheritanceType("SINGLE_TABLE")
 * @ORM\HasLifecycleCallbacks()
 * @ORM\Entity(repositoryClass="App\Repository\ProductRepository")
 */
class PullRequest
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", options={"unsigned":true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="number", type="string", length=55)
     */
    private $number;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string|null
     *
     * @ORM\Column(name="url", type="string", length=255, nullable=true)
     */
    private $url;

    /**
     * @var string|null
     *
     * @ORM\Column(name="user_github_login", type="string", length=55, nullable=true)
     */
    private $user_github_login;

    /**
     * @var string|null
     *
     * @ORM\Column(name="user_github_id", type="string", length=55, nullable=true)
     */
    private $user_github_id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="description", type="string", length=4000, nullable=true)
     */
    private $description;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="pr_created_at", type="datetimetz")
     */
    private $pr_created_at;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="pr_updated_at", type="datetimetz")
     */
    private $pr_updated_at;

    /**
     * @var string
     *
     * @ORM\Column(name="state", type="string", length=25)
     */
    private $state;

    /**
     * @ORM\Column(name="status", type="boolean")
     */
    private $status;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @param string $number
     */
    public function setNumber($number)
    {
        $this->number = $number;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return null|string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param null|string $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }

    /**
     * @return null|string
     */
    public function getUserGithubLogin()
    {
        return $this->user_github_login;
    }

    /**
     * @param null|string $user_github_login
     */
    public function setUserGithubLogin($user_github_login)
    {
        $this->user_github_login = $user_github_login;
    }

    /**
     * @return null|string
     */
    public function getUserGithubId()
    {
        return $this->user_github_id;
    }

    /**
     * @param null|string $user_github_id
     */
    public function setUserGithubId($user_github_id)
    {
        $this->user_github_id = $user_github_id;
    }

    /**
     * @return null|string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param null|string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return \DateTime
     */
    public function getPrCreatedAt()
    {
        return $this->pr_created_at;
    }

    /**
     * @param \DateTime $pr_created_at
     */
    public function setPrCreatedAt($pr_created_at)
    {
        $this->pr_created_at = $pr_created_at;
    }

    /**
     * @return \DateTime
     */
    public function getPrUpdatedAt()
    {
        return $this->pr_updated_at;
    }

    /**
     * @param \DateTime $pr_updated_at
     */
    public function setPrUpdatedAt($pr_updated_at)
    {
        $this->pr_updated_at = $pr_updated_at;
    }

    /**
     * @return string
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * @param string $state
     */
    public function setState($state)
    {
        $this->state = $state;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }
}
