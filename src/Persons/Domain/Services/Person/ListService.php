<?php
/**
 * ListService Class
 *
 * @package Persons\Domain\Services\Person
 * @author Jose Guillermo <jguillermo@outlook.com>
 * @copyright (c) 2017, Orbis
 */
namespace Persons\Domain\Services\Person;

use Persons\Domain\Repository\PersonRepository;

class ListService
{
    /** @var  PersonRepository */
    private $personRepository;

    /**
     * ListService constructor.
     * @param PersonRepository $personRepository
     */
    public function __construct(PersonRepository $personRepository)
    {
        $this->personRepository = $personRepository;
    }

    public function findAll($filter)
    {
        return $this->personRepository->findAll($filter);
    }

    public function findById($personId)
    {
        return $this->personRepository->findById($personId);
    }
}