<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * HBackMenu
 *
 * @ORM\Table(name="h_back_menu")
 * @ORM\Entity
 */
class HBackMenu
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
     * @ORM\Column(name="icon",type="string")
     */
    private $icon;

    /**
     *  @ORM\Column(name="level",type="integer")
     */
    private $level;

    /**
     * @ORM\Column(name="name",type="string")
     */
    private $name;

    /**
     * @ORM\Column(name="parent_id",type="integer")
     */
    private $parentId;

    /**
     * @ORM\Column(name="status",type="integer")
     */
    private $status;

    /**
     * @ORM\Column(name="sequence",type="integer")
     */
    private $sequence;

    /**
     * @ORM\Column(name="url",type="string")
     */
    private $url;

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
     * @return HBackMenu
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
     * Set icon
     *
     * @param string $icon
     * @return HBackMenu
     */
    public function setIcon($icon)
    {
        $this->icon = $icon;

        return $this;
    }

    /**
     * Get icon
     *
     * @return string 
     */
    public function getIcon()
    {
        return $this->icon;
    }

    /**
     * Set level
     *
     * @param integer $level
     * @return HBackMenu
     */
    public function setLevel($level)
    {
        $this->level = $level;

        return $this;
    }

    /**
     * Get level
     *
     * @return integer 
     */
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return HBackMenu
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
     * Set parentId
     *
     * @param integer $parentId
     * @return HBackMenu
     */
    public function setParentId($parentId)
    {
        $this->parentId = $parentId;

        return $this;
    }

    /**
     * Get parentId
     *
     * @return integer 
     */
    public function getParentId()
    {
        return $this->parentId;
    }

    /**
     * Set status
     *
     * @param integer $status
     * @return HBackMenu
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
     * Set sequence
     *
     * @param integer $sequence
     * @return HBackMenu
     */
    public function setSequence($sequence)
    {
        $this->sequence = $sequence;

        return $this;
    }

    /**
     * Get sequence
     *
     * @return integer 
     */
    public function getSequence()
    {
        return $this->sequence;
    }

    /**
     * Set url
     *
     * @param string $url
     * @return HBackMenu
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url
     *
     * @return string 
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set version
     *
     * @param \DateTime $version
     * @return HBackMenu
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
