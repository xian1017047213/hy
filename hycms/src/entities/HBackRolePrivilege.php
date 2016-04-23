<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * HBackRolePrivilege
 * @ORM\Table(name="h_back_role_privilege")
 * @ORM\Entity
 */
class HBackRolePrivilege
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
    private $privilegeId;

    /**
     * @var integer
     */
    private $roleId;

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
     * Set privilegeId
     *
     * @param integer $privilegeId
     * @return HBackRolePrivilege
     */
    public function setPrivilegeId($privilegeId)
    {
        $this->privilegeId = $privilegeId;

        return $this;
    }

    /**
     * Get privilegeId
     *
     * @return integer 
     */
    public function getPrivilegeId()
    {
        return $this->privilegeId;
    }

    /**
     * Set roleId
     *
     * @param integer $roleId
     * @return HBackRolePrivilege
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
     * Set version
     *
     * @param \DateTime $version
     * @return HBackRolePrivilege
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
