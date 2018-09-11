<?php

namespace App\Twig;

use Carbon\Carbon;
use Twig\Environment;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class AppExtension extends AbstractExtension
{
    /**
     * {@inheritdoc}
     */
    public function getFilters()
    {
        return [
            new TwigFilter('date_min', [$this, 'date_min'], ['needs_environment' => false]),
        ];
    }

    /**
     * @param Environment $env
     * @param $datetime
     * @return bool|string
     */
    public function date_min(Environment $env, $datetime)
    {
        if (!$datetime) {
            return '';
        }

//        $cb = new \DateTime($datetime);
        return \twig_localized_date_filter($env, $datetime, 'medium', 'short');
    }
}
