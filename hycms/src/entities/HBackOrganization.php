<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * HBackUser
 *
 * @ORM\Table(name="h_back_organization")
 * @ORM\Entity
 */
class HBackOrganization
{
    /**
	 *
	 * @ORM\Column(name="id", type="integer", nullable=false)
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="IDENTITY")
	 */
    private $id;

    /**
     * @ORM\Column(name="code",type="string")
     */
    private $code;

    /**
     * @ORM\Column(name="description",type="string")
     */
    private $description;

    /**
     * @ORM\Column(name="name",type="string")
     */
    private $name;

    /**
     * @ORM\Column(name="org_type_id",type="integer")
     */
    private $orgTypeId;

    /**
     * @ORM\Column(name="status",type="integer")
     */
    private $status;

    /**
     * @ORM\Column(name="version",type="string")
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
     * Set code
     *
     * @param string $code
     * @return HBackOrganization
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get code
     *
     * @return string 
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return HBackOrganization
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return HBackOrganization
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set orgTypeId
     *
     * @param integer $orgTypeId
     * @return HBackOrganization
     */
    public function setOrgTypeId($orgTypeId)
    {
        $this->orgTypeId = $orgTypeId;

        return $this;
    }

    /**
     * Get orgTypeId
     *
     * @return integer 
     */
    public function getOrgTypeId()
    {
        return $this->orgTypeId;
    }

    /**
     * Set status
     *
     * @param integer $status
     * @return HBackOrganization
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return integer 
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set version
     *
     * @param \DateTime $version
     * @return HBackOrganization
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
