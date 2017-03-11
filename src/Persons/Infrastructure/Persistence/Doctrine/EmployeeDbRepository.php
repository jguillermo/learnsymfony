<?php

namespace Persons\Infrastructure\Persistence\Doctrine;

use Common\Adapter\Persistence\Doctrine\DoctrineRepository;
use MisaCore\Domain\Base\Exception\RepNotFoundException;
use Persons\Domain\Entity\Employee;
use Persons\Domain\Repository\EmployeeRepository;

/**
 * PersonRepository Class
 *
 * @package Persons\Domain\Infrastructure\Persistence\Db
 * @author Jose Guillermo <jguillermo@outlook.com>
 * @copyright (c) 2017, Orbis
 *
 */
class EmployeeDbRepository extends DoctrineRepository implements EmployeeRepository
{

    /**
     * {@inheritdoc}
     */
    public function listAll($filter)
    {
        return $this->getAllQuery($filter)->getArrayResult();
    }

    /**
     * {@inheritdoc}
     */
    public function listById($employeeId)
    {
        $data = $this->getAllQuery(['id' => $employeeId])->getArrayResult();
        if (count($data) == 0) {
            throw new RepNotFoundException("Person not Found");
        }
        return $data[0];
    }

    private function getAllQuery($filter)
    {
        $qbd = $this->repository->createQueryBuilder('e')
            ->select('e', 'p')
            ->join('e.person', 'p', 'WITH');

        if (! empty($filter['id'])) {
            $qbd->where('e.id = :employeeId')
                ->setParameter('employeeId', $filter['id']);
        }

        if (! empty($filter['limit'])) {
            $qbd->setMaxResults($filter['limit']);
        }

        if (! empty($filter['order'])) {
            $qbd->addOrderBy($filter['order']);
        }

        return $qbd->getQuery();
    }

    /**
     * @param Employee $employee
     * @return bool
     */
    public function persist(Employee $employee)
    {
        $this->em->persist($employee);
        $this->em->flush();
        return true;
    }
}
