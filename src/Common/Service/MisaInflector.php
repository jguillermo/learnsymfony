<?php
/**
 * MisaInflector Class
 *
 * @package Persons\Infrastructure\Service
 * @author Jose Guillermo <jguillermo@outlook.com>
 * @copyright (c) 2017, Orbis
 */
namespace Common\Service;

use FOS\RestBundle\Inflector\InflectorInterface;
use Doctrine\Common\Inflector\Inflector;

class MisaInflector implements InflectorInterface
{

    public function pluralize($word)
    {
        $pluralize = [
            'Person' => 'persons'
        ];
        if (isset($pluralize[$word])) {
            return $pluralize[$word];
        } else {
            return Inflector::pluralize($word);
        }
    }
}
