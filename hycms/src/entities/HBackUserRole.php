<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * HBackUserRole
 * @ORM\Table(name="h_back_user_role")
 * @ORM\Entity
 */
class HBackUserRole
{
   /**
	 *
	 * @ORM\Column(name="id", type="integer", nullable=false)
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="IDENTITY")
	 */
    private $id;

    /**
     * @var integer
     */
    private $orgId;

    /**
     * @var integer
     */
    private $roleId;

    /**
     * @var integer
     */
    private $userId;

    /**
     * @var \DateTime
     */
    private $version;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set orgId
     *
     * @param integer $orgId
     * @return HBackUserRole
     */
    public function setOrgId($orgId)
    {
        $this->orgId = $orgId;

        return $this;
    }

    /**
     * Get orgId
     *
     * @return integer 
     */
    public function getOrgId()
    {
        return $this->orgId;
    }

    /**
     * Set roleId
     *
     * @param integer $roleId
     * @return HBackUserRole
     */
    public function setRoleId($roleId)
    {
        $this->roleId = $roleId;

        return $this;
    }

    /**
     * Get roleId
     *
     * @return integer 
     */
    public function getRoleId()
    {
        return $this->roleId;
    }

    /**
     * Set userId
     *
     * @param integer $userId
     * @return HBackUserRole
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * Get userId
     *
     * @return integer 
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * Set version
     *
     * @param \DateTime $version
     * @return HBackUserRole
     */
    public function setVersion($version)
    {
        $this->version = $version;

        return $this;
    }

    /**
     * Get version
     *
     * @return \DateTime 
     */
    public function getVersion()
    {
        return $this->version;
    }
}
