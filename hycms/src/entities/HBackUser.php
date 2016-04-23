<?php
use Doctrine\ORM\Mapping as ORM;

/**
 * HBackUser
 *
 * @ORM\Table(name="h_back_user")
 * @ORM\Entity
 */
class HBackUser {
	
	/**
	 * @ORM\Column(name="id", type="integer", nullable=false)
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="IDENTITY")
	 */
	private $id;
	
	/**
	 * @ORM\Column(name="create_time",type="datetime")
	 */
	private $createTime;
	
	/**
	 * @ORM\Column(name="last_login_time",type="datetime")
	 */
	private $lastLoginTime;
	
	/**
	 * @ORM\Column(name="login_ip",type="string")
	 */
	private $loginIp;
	
	/**
	 * @ORM\Column(name="phone_num",type="string")
	 */
	private $phoneNum;
	
	/**
	 * @ORM\Column(name="user_name",type="string", nullable=false)
	 */
	private $userName;
	
	/**
	 * @ORM\Column(name="user_pwd",type="string", nullable=false)
	 */
	private $userPwd;
	
	/**
	 * @ORM\Column(name="user_email",type="string")
	 */
	private $userEmail;
	
	/**
	 * @ORM\Column(name="uname",type="string")
	 */
	private $uname;
	/**
	 * @ORM\Column(name="status",type="integer")
	 */
	private $status;
	
	/**
	 * @ORM\Column(name="tname",type="string")
	 */
	private $tname;
	
	/**
	 * @ORM\Column(name="type",type="integer")
	 */
	private $type;
	
	/**
	 * @ORM\Column(name="version",type="datetime")
	 */
	private $version;
	
	/**
	 * Get id
	 *
	 * @return integer
	 */
	public function getId() {
		return $this->id;
	}
	
	/**
	 * Set createTime
	 *
	 * @param \DateTime $createTime        	
	 * @return HBackUser
	 */
	public function setCreateTime($createTime) {
		$this->createTime = $createTime;
		
		return $this;
	}
	
	/**
	 * Get createTime
	 *
	 * @return \DateTime
	 */
	public function getCreateTime() {
		return $this->createTime;
	}
	
	/**
	 * Set lastLoginTime
	 *
	 * @param \DateTime $lastLoginTime        	
	 * @return HBackUser
	 */
	public function setLastLoginTime(\DateTime $lastLoginTime) {
		$this->lastLoginTime = $lastLoginTime;
		return $this;
	}
	
	/**
	 * Get lastLoginTime
	 *
	 * @return \DateTime
	 */
	public function getLastLoginTime() {
		return $this->lastLoginTime;
	}
	
	/**
	 * Set loginIp
	 *
	 * @param string $loginIp        	
	 * @return HBackUser
	 */
	public function setLoginIp($loginIp) {
		$this->loginIp = $loginIp;
		
		return $this;
	}
	
	/**
	 * Get loginIp
	 *
	 * @return string
	 */
	public function getLoginIp() {
		return $this->loginIp;
	}
	
	/**
	 * Set phoneNum
	 *
	 * @param string $phoneNum        	
	 * @return HBackUser
	 */
	public function setPhoneNum($phoneNum) {
		$this->phoneNum = $phoneNum;
		
		return $this;
	}
	
	/**
	 * Get phoneNum
	 *
	 * @return string
	 */
	public function getPhoneNum() {
		return $this->phoneNum;
	}
	
	/**
	 * Set userName
	 *
	 * @param string $userName        	
	 * @return HBackUser
	 */
	public function setUserName($userName) {
		$this->userName = $userName;
		
		return $this;
	}
	
	/**
	 * Get userName
	 *
	 * @return string
	 */
	public function getUserName() {
		return $this->userName;
	}
	
	/**
	 * Set userPwd
	 *
	 * @param string $userPwd        	
	 * @return HBackUser
	 */
	public function setUserPwd($userPwd) {
		$this->userPwd = $userPwd;
		
		return $this;
	}
	
	/**
	 * Get userPwd
	 *
	 * @return string
	 */
	public function getUserPwd() {
		return $this->userPwd;
	}
	
	/**
	 * Set userEmail
	 *
	 * @param string $userEmail        	
	 * @return HBackUser
	 */
	public function setUserEmail($userEmail) {
		$this->userEmail = $userEmail;
		
		return $this;
	}
	
	/**
	 * Get userEmail
	 *
	 * @return string
	 */
	public function getUserEmail() {
		return $this->userEmail;
	}
	
	/**
	 * Set uname
	 *
	 * @param string $uname        	
	 * @return HBackUser
	 */
	public function setUname($uname) {
		$this->uname = $uname;
		
		return $this;
	}
	
	/**
	 * Get uname
	 *
	 * @return string
	 */
	public function getUname() {
		return $this->uname;
	}
	/**
	 * Set status
	 *
	 * @param integer $status        	
	 * @return HBackUser
	 */
	public function setStatus($status) {
		$this->status = $status;
		
		return $this;
	}
	
	/**
	 * Get status
	 *
	 * @return integer
	 */
	public function getStatus() {
		return $this->status;
	}
	
	/**
	 * Set tname
	 *
	 * @param string $tname        	
	 * @return HBackUser
	 */
	public function setTname($tname) {
		$this->tname = $tname;
		
		return $this;
	}
	
	/**
	 * Get tname
	 *
	 * @return string
	 */
	public function getTname() {
		return $this->tname;
	}
	
	/**
	 * Set type
	 *
	 * @param string $type        	
	 * @return HBackUser
	 */
	public function setType($type) {
		$this->type = $type;
		
		return $this;
	}
	
	/**
	 * Get type
	 *
	 * @return string
	 */
	public function getType() {
		return $this->type;
	}
	
	/**
	 * Set version
	 *
	 * @param \DateTime $version        	
	 * @return HBackUser
	 */
	public function setVersion($version) {
		$this->version = $version;
		
		return $this;
	}
	
	/**
	 * Get version
	 *
	 * @return string
	 */
	public function getVersion() {
		return $this->version;
	}
}
