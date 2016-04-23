<?php
namespace hybase\Repository;
use Doctrine\ORM\EntityManager;
class ProductRepository extends EntityManager {
	public function getProductDetailById($id=null) {
		$dql = "SELECT b, e, r FROM Bug b JOIN b.engineer e JOIN b.reporter r ORDER BY b.created DESC";
		
		$query = $this->createQuery($dql);
		$query->setMaxResults ( $number );
		return $query->getResult ();
	}
}