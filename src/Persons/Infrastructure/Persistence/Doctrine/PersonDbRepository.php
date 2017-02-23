<?php
/**
 * PersonRepository Class
 *
 * @package Persons\Domain\Infrastructure\Persistence\Db
 * @author Jose Guillermo <jguillermo@outlook.com>
 * @copyright (c) 2017, Orbis
 */
namespace Persons\Infrastructure\Persistence\Doctrine;

use Common\Adapter\Persistence\Doctrine\DoctrineRepository;
use MisaCore\Domain\Base\Exception\RepNotFoundException;
use Persons\Domain\Repository\PersonRepository;

class PersonDbRepository extends DoctrineRepository implements PersonRepository
{
    /**
     * {@inheritdoc}
     */
    public function findAll($filter)
    {
        return $this->getAllQuery($filter)->getArrayResult();
    }

    /**
     * {@inheritdoc}
     */
    public function findById($personId)
    {
        $data = $this->getAllQuery(['id' => $personId,'limit' => 1])->getArrayResult();
        if (count($data) == 0) {
            throw new RepNotFoundException("Person not Found");
        }
        return $data[0];
    }

    private function getAllQuery($filter)
    {
        $qbd = $this->repository->createQueryBuilder('p')
            ->select('p');

        if (! empty($filter['id'])) {
            $qbd->where('p.id = :personId')
                ->setParameter('personId', $filter['id']);
        }

        if (! empty($filter['limit'])) {
            $qbd->setMaxResults($filter['limit']);
        }

        if (! empty($filter['order'])) {
            $qbd->addOrderBy($filter['order']);
        }

        return $qbd->getQuery();
    }
}
