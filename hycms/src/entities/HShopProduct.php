<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * HShopProduct
 *
 * @ORM\Table(name="h_shop_product")
 * @ORM\Entity
 */
class HShopProduct
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
     * @var string
     *
     * @ORM\Column(name="code", type="string", length=255, nullable=true)
     */
    private $code;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="create_time", type="datetime", nullable=true)
     */
    private $createTime;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="delist_time", type="datetime", nullable=true)
     */
    private $delistTime;

    /**
     * @var integer
     *
     * @ORM\Column(name="industry_id", type="integer", nullable=true)
     */
    private $industryId;

    /**
     * @var integer
     *
     * @ORM\Column(name="isaddtag", type="integer", nullable=true)
     */
    private $isaddtag;

    /**
     * @var integer
     *
     * @ORM\Column(name="isaddcategory", type="integer", nullable=true)
     */
    private $isaddcategory;

    /**
     * @var integer
     *
     * @ORM\Column(name="status", type="integer", nullable=true)
     */
    private $status;

    /**
     * @var string
     *
     * @ORM\Column(name="style", type="string", length=255, nullable=true)
     */
    private $style;

    /**
     * @var integer
     *
     * @ORM\Column(name="type", type="integer", nullable=true)
     */
    private $type;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="list_time", type="datetime", nullable=true)
     */
    private $listTime;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="modify_time", type="datetime", nullable=true)
     */
    private $modifyTime;

    /**
     * @var string
     *
     * @ORM\Column(name="pic_url", type="string", length=600, nullable=true)
     */
    private $picUrl;

    /**
     * @var integer
     *
     * @ORM\Column(name="shop_id", type="integer", nullable=true)
     */
    private $shopId;

    /**
     * @var integer
     *
     * @ORM\Column(name="template_id", type="integer", nullable=true)
     */
    private $templateId;

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
     * Set code
     *
     * @param string $code
     * @return HShopProduct
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
     * Set createTime
     *
     * @param \DateTime $createTime
     * @return HShopProduct
     */
    public function setCreateTime($createTime)
    {
        $this->createTime = $createTime;

        return $this;
    }

    /**
     * Get createTime
     *
     * @return \DateTime 
     */
    public function getCreateTime()
    {
        return $this->createTime;
    }

    /**
     * Set delistTime
     *
     * @param \DateTime $delistTime
     * @return HShopProduct
     */
    public function setDelistTime($delistTime)
    {
        $this->delistTime = $delistTime;

        return $this;
    }

    /**
     * Get delistTime
     *
     * @return \DateTime 
     */
    public function getDelistTime()
    {
        return $this->delistTime;
    }

    /**
     * Set industryId
     *
     * @param integer $industryId
     * @return HShopProduct
     */
    public function setIndustryId($industryId)
    {
        $this->industryId = $industryId;

        return $this;
    }

    /**
     * Get industryId
     *
     * @return integer 
     */
    public function getIndustryId()
    {
        return $this->industryId;
    }

    /**
     * Set isaddtag
     *
     * @param integer $isaddtag
     * @return HShopProduct
     */
    public function setIsaddtag($isaddtag)
    {
        $this->isaddtag = $isaddtag;

        return $this;
    }

    /**
     * Get isaddtag
     *
     * @return integer 
     */
    public function getIsaddtag()
    {
        return $this->isaddtag;
    }

    /**
     * Set isaddcategory
     *
     * @param integer $isaddcategory
     * @return HShopProduct
     */
    public function setIsaddcategory($isaddcategory)
    {
        $this->isaddcategory = $isaddcategory;

        return $this;
    }

    /**
     * Get isaddcategory
     *
     * @return integer 
     */
    public function getIsaddcategory()
    {
        return $this->isaddcategory;
    }

    /**
     * Set status
     *
     * @param integer $status
     * @return HShopProduct
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
     * Set style
     *
     * @param string $style
     * @return HShopProduct
     */
    public function setStyle($style)
    {
        $this->style = $style;

        return $this;
    }

    /**
     * Get style
     *
     * @return string 
     */
    public function getStyle()
    {
        return $this->style;
    }

    /**
     * Set type
     *
     * @param integer $type
     * @return HShopProduct
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return integer 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set listTime
     *
     * @param \DateTime $listTime
     * @return HShopProduct
     */
    public function setListTime($listTime)
    {
        $this->listTime = $listTime;

        return $this;
    }

    /**
     * Get listTime
     *
     * @return \DateTime 
     */
    public function getListTime()
    {
        return $this->listTime;
    }

    /**
     * Set modifyTime
     *
     * @param \DateTime $modifyTime
     * @return HShopProduct
     */
    public function setModifyTime($modifyTime)
    {
        $this->modifyTime = $modifyTime;

        return $this;
    }

    /**
     * Get modifyTime
     *
     * @return \DateTime 
     */
    public function getModifyTime()
    {
        return $this->modifyTime;
    }

    /**
     * Set picUrl
     *
     * @param string $picUrl
     * @return HShopProduct
     */
    public function setPicUrl($picUrl)
    {
        $this->picUrl = $picUrl;

        return $this;
    }

    /**
     * Get picUrl
     *
     * @return string 
     */
    public function getPicUrl()
    {
        return $this->picUrl;
    }

    /**
     * Set shopId
     *
     * @param integer $shopId
     * @return HShopProduct
     */
    public function setShopId($shopId)
    {
        $this->shopId = $shopId;

        return $this;
    }

    /**
     * Get shopId
     *
     * @return integer 
     */
    public function getShopId()
    {
        return $this->shopId;
    }

    /**
     * Set templateId
     *
     * @param integer $templateId
     * @return HShopProduct
     */
    public function setTemplateId($templateId)
    {
        $this->templateId = $templateId;

        return $this;
    }

    /**
     * Get templateId
     *
     * @return integer 
     */
    public function getTemplateId()
    {
        return $this->templateId;
    }

    /**
     * Set version
     *
     * @param \DateTime $version
     * @return HShopProduct
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
