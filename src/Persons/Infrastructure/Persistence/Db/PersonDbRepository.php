<?php
/**
 * PersonRepository Class
 *
 * @package Persons\Domain\Infrastructure\Persistence\Db
 * @author Jose Guillermo <jguillermo@outlook.com>
 * @copyright (c) 2017, Orbis
 */
namespace Persons\Infrastructure\Persistence\Db;

use Common\Adapter\Persistence\Doctrine\DoctrineRepository;
use Persons\Domain\Repository\PersonRepository;

class PersonDbRepository extends DoctrineRepository  implements PersonRepository
{
    /**
     * {@inheritdoc}
     */
    public function getAll($filter)
    {
        return $this->getAllQuery($filter)->getArrayResult();
    }

    private function getAllQuery($filter)
    {
        $qbd = $this->repository->createQueryBuilder('pt')
            ->select('pt');

        if(!empty($filter['limit'])) {
            $qbd->setMaxResults($filter['limit']);
        }

        if(!empty($filter['order'])) {
            $qbd->addOrderBy($filter['order']);
        }

        return $qbd->getQuery();
    }

}