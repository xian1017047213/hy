<?php
namespace hybase\Repository;

use Doctrine\ORM\EntityRepository;

require_once __DIR__ . '/../datamanager/database.php';
class UserRespository extends EntityRepository{
	/*
	 * 系统用户类型
	 */
	public static  $sysUserType=1;
	/*
	 *普通用户类型 
	 */
	public static  $genUserType=1;
	/*
	 * 无效用户
	 */
	public static  $effectUserStatus=2;
	/*
	 * 有效用户
	 */
	public static  $invalidUserStatus=1;
	
	public function findUserListByDQL(){
		global $entityManager;
		$queryBuilder=$entityManager->createQueryBuilder();
		$queryBuilder->select(array('hbu')) 
		->from('HBackUser', 'hbu')
		->where($queryBuilder->expr()->orX(
				//$queryBuilder->expr()->eq('hbu.id', '?1'),
				$queryBuilder->expr()->like('hbu.username', '?2')
				))
		->orderBy('hbu.id','desc')
		//->setParameter(1, 1)
		->setParameter(2, admi) ;
		
	}
}