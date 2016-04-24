<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * HArchiveContent
 *
 * @ORM\Table(name="h_archive_content")
 * @ORM\Entity
 */
class HArchiveContent
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="head_id", type="integer", nullable=true)
     */
    private $headId;

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="text", length=65535, nullable=true)
     */
    private $content;

    /**
     * @var string
     *
     * @ORM\Column(name="static_url", type="string", length=255, nullable=true)
     */
    private $staticUrl;

    /**
     * @var string
     *
     * @ORM\Column(name="code", type="string", length=255, nullable=true)
     */
    private $code;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255, nullable=true)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=255, nullable=true)
     */
    private $status;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="version", type="datetime", nullable=true)
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
     * Set headId
     *
     * @param integer $headId
     * @return HArchiveContent
     */
    public function setHeadId($headId)
    {
        $this->headId = $headId;

        return $this;
    }

    /**
     * Get headId
     *
     * @return integer 
     */
    public function getHeadId()
    {
        return $this->headId;
    }

    /**
     * Set content
     *
     * @param string $content
     * @return HArchiveContent
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string 
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set staticUrl
     *
     * @param string $staticUrl
     * @return HArchiveContent
     */
    public function setStaticUrl($staticUrl)
    {
        $this->staticUrl = $staticUrl;

        return $this;
    }

    /**
     * Get staticUrl
     *
     * @return string 
     */
    public function getStaticUrl()
    {
        return $this->staticUrl;
    }

    /**
     * Set code
     *
     * @param string $code
     * @return HArchiveContent
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
     * Set type
     *
     * @param string $type
     * @return HArchiveContent
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set status
     *
     * @param string $status
     * @return HArchiveContent
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return string 
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set version
     *
     * @param \DateTime $version
     * @return HArchiveContent
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
