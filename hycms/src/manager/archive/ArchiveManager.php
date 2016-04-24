<?php

namespace hybase\Manager;

require_once __DIR__ . '/../datamanager/database.php';
class ArchiveManager {
	/*
	 * 默认文章状态为新建状态
	 */
	public static $defaultArchiveStatus = 1;
	function __construct() {
		// print "In BaseClass constructor\n";
	}
	public function saveArchiveDetail($archiveId = NULL, $code, $title, $litpic,$description, $archivebody, $source, $writer) {
		global $entityManager;
		$entityManager->beginTransaction ();
		try {
			$results = $entityManager->getRepository ( 'HArchiveHead' )->findBy ( array (
					'code' => $code
			) );
			$ifCodeExist=false;
			if (sizeof ( $results ) > 0) {
				foreach ($results as $result){
					if ($result->getId()!=$archiveId) {
						return $ifCodeExist=true;
					}
				}
				if ($ifCodeExist) {
					return '文章编码不能重复！';
				}
			}
			if (!empty ( $archiveId )) {
				$archiveHeader = $entityManager->find('HArchiveHead' , $archiveId);
				$archiveHeader->setCode ( $code );
				$archiveHeader->setTitle ( $title );
				$archiveHeader->setLitpic ( $litpic );
				$archiveHeader->setDescription ( $description );
				$archiveHeader->setSource ( $source );
				$archiveHeader->setWriter ( $writer );
				$archiveHeader->setStatus ( self::$defaultArchiveStatus );
				$archiveHeader->setModifyTime( new \DateTime ( "now" ) );
				$archivecontentId=$entityManager->getRepository('HArchiveContent')->findOneBy(array(
						'headId' => $archiveId
				))->getId();
				if (!empty($archivecontentId)&&is_numeric($archivecontentId)) {
				$archivecontent =$entityManager->find('HArchiveContent', $archivecontentId);
				$archivecontent->setHeadId ( $archiveHeader->getId () );
				$archivecontent->setContent ( $archivebody );
				}
				$entityManager->flush ();
				$entityManager->commit ();
				return true;
			}
			$archiveHeader = new \HArchiveHead ();
			$archiveHeader->setCode ( $code );
			$archiveHeader->setTitle ( $title );
			$archiveHeader->setLitpic ( $litpic );
			$archiveHeader->setDescription ( $description );
			$archiveHeader->setSource ( $source );
			$archiveHeader->setWriter ( $writer );
			$entityManager->persist ( $archiveHeader );
			$entityManager->flush ();
			$archivecontent = new \HArchiveContent ();
			$archivecontent->setHeadId ( $archiveHeader->getId () );
			$archivecontent->setContent ( $archivebody );
			$entityManager->persist ( $archivecontent );
			$entityManager->flush ();
			$entityManager->commit ();
			return true;
		} catch ( Exception $e ) {
			$entityManager->rollback ();
			$entityManager->close ();
			return "服务器处理异常！";
		}
	}
	public function findArchiveList($archiveId = NULL, $code = NULL, $title = NULL, $status=NULL , $createStart=NULL,$createEnd=NULL,$archivebody = NULL, $source = NULL, $writer = NULL) {
		global $entityManager;
		$queryBuilder = $entityManager->createQueryBuilder ();
		if ((empty ( $status )) && (empty ( $archiveId )) && (empty ( $code )) && (empty ( $title )) && (empty ( $createStart )) && (empty ( $createEnd )) && (empty ( $archivebody )) && (empty ( $source )) && (empty ( $writer ))) {
			$queryBuilder->select ( array (
					'hah' 
			) )->from ( 'HArchiveHead', 'hah' )->where ( $queryBuilder->expr ()->andX ( $queryBuilder->expr ()->neq ( 'hah.status', '?1' ) ) )->orderBy ( 'hah.id', 'desc' )->setParameter ( 1, 3 );
			$query = $queryBuilder->getQuery ();
			$results = $query->getResult ();
			return $results;
		}
		
		 $queryBuilder = $entityManager->createQueryBuilder ();
		 $code = '%' . $code . '%';
		 $title = '%' . $title . '%';
		 $status = '%' . $status . '%';
		 $createStart=\DateTime::createFromFormat('Y-m-d H:i:s', $createStart);
		if (empty($createEnd)) {
			$createEnd= new \DateTime("now");
		}else {			
			$createEnd=\DateTime::createFromFormat('Y-m-d H:i:s', $createEnd);
		}
		 $queryBuilder->select ( array (
		 'hah'
		 ) )->from ( 'HArchiveHead', 'hah' )->where ( $queryBuilder->expr ()->andX ( 
		 $queryBuilder->expr ()->like ( 'hah.code', '?1' ),
		  $queryBuilder->expr ()->like ( 'hah.title', '?2' ), 
		  $queryBuilder->expr ()->like ( 'hah.status', '?3' ), 
		  $queryBuilder->expr ()->between('hah.version', '?4', '?5') ) )
		  ->orderBy ( 'hah.id', 'desc' )
		  ->setParameter ( 1, $code )
		  ->setParameter ( 2, $title )
		  ->setParameter ( 3, $status )
		  ->setParameter ( 4, $createStart )
		  ->setParameter ( 5, $createEnd );
		 $query = $queryBuilder->getQuery ();
		 $results = $query->getResult ();
		 return $results;
		
	}
	public function updateArchiveStatus($archiveId, $archiveStatus,$sendDate) {
		global $entityManager;
		$entityManager->beginTransaction ();
		try {
			$archiveRow = $entityManager->find ( 'HArchiveHead', $archiveId );
			if (! empty ( $archiveRow )) {
				$archiveRow->setStatus ( $archiveStatus );
				$archiveRow->setSenddate($sendDate);
				$entityManager->flush();
				$entityManager->commit();
				return TRUE;
			}
			return false;
		} catch ( Exception $e ) {
			$entityManager->rollback ();
			$entityManager->close ();
		}
	}
	public function updateArchiveContentStaticUrl($archiveId, $staticUrl) {
		try {
			global $entityManager;
			$archivecontentId = $entityManager->getRepository ( 'HArchiveContent' )->findOneBy ( array (
					'headId' => $archiveId 
			) )->getId ();
			if (! empty ( $archivecontentId ) && is_numeric ( $archivecontentId )) {
				$archivecontent = $entityManager->find ( 'HArchiveContent', $archivecontentId );
				$archivecontent->setStaticUrl ( $staticUrl );
				$entityManager->flush ();
			}
			return true;
		} catch ( Exception $e ) {
			return false;
		}
	}
	public function findArchiveContent($archiveId) {
		global $entityManager;
		$result = $entityManager->getRepository ( 'HArchiveContent' )->findOneBy ( array (
				'headId' => $archiveId 
		) );
		return $result;
	}
	public function findArchiveHead($archiveId, $archiveStatus = null) {
		global $entityManager;
		if (empty ( $archiveStatus )) {
			$result = $entityManager->getRepository ( 'HArchiveHead' )->find ( $archiveId );
		} else {
			$result = $entityManager->getRepository ( 'HArchiveHead' )->findOneBy ( array (
				'id' => $archiveId ,
				'status'=>$archiveStatus
		) );
		}
		return $result;
	}
}

 //$am = new ArchiveManager ();
 //echo $am->updateArchiveStatus(9, 2);