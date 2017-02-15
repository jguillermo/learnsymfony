<?php

namespace Common\Adapter\Persistence\Doctrine;

use Doctrine\ORM\EntityManager;

/**
 * Class DoctrineRepository
 *
 * @package Aptitus\Common\Adapter\Persistence\Doctrine
 * @author Andy Ecca <andy.ecca@gmail.com>
 * @copyright (c) 2016, Orbis
 */
class DoctrineRepository
{
    protected $em;
    protected $entityName;
    protected $repository;

    public function __construct(EntityManager $em, $entityName)
    {
        $this->em = $em;
        $this->entityName = $entityName;
        $this->repository = $this->em->getRepository($entityName);
    }

    public function getEntityManager()
    {
        return $this->em;
    }

    public function getTableName()
    {
        return $this->em->getClassMetadata($this->entityName)->getTableName();
    }

    public function findRawById($id)
    {
        $stmt = $this->em->getConnection()->prepare("SELECT * FROM {$this->getTableName()} WHERE id=:id");
        $stmt->bindParam('id', $id);
        $stmt->execute();

        return $stmt->fetch();
    }
}
