<?php
namespace hybase\Repository;
use Doctrine\ORM\EntityRepository;

class MemberRepository extends EntityRepository{
	public function getUserList($number)
	{
		$dql = "SELECT hbu.* FROM HBackUser hbu ORDER BY hbu.id desc";
	
		$query = $this->getEntityManager()->createQuery($dql);
		$query->setMaxResults($number);
		return $query->getResult();
	}
	public function getPwdByUsername($number=30)
	{
		$dql = "SELECT hbu.userName,hbu.userPwd FROM HBackUser hbu ORDER BY hbu.id desc";
	
		$query = $this->getEntityManager()->createQuery($dql);
		$query->setMaxResults($number);
		return $query->getResult();
	}
}
