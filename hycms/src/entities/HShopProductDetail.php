<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * HShopProductDetail
 *
 * @ORM\Table(name="h_shop_product_detail")
 * @ORM\Entity
 */
class HShopProductDetail
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
     * @var \DateTime
     *
     * @ORM\Column(name="active_begin_time", type="datetime", nullable=true)
     */
    private $activeBeginTime;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="create_time", type="datetime", nullable=true)
     */
    private $createTime;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", length=65535, nullable=true)
     */
    private $description;

    /**
     * @var integer
     *
     * @ORM\Column(name="product_id", type="integer", nullable=true)
     */
    private $productId;

    /**
     * @var string
     *
     * @ORM\Column(name="language", type="string", length=255, nullable=true)
     */
    private $language;

    /**
     * @var integer
     *
     * @ORM\Column(name="last_select_property_id", type="integer", nullable=true)
     */
    private $lastSelectPropertyId;

    /**
     * @var integer
     *
     * @ORM\Column(name="last_select_property_value", type="integer", nullable=true)
     */
    private $lastSelectPropertyValue;

    /**
     * @var float
     *
     * @ORM\Column(name="list_price", type="float", precision=64, scale=3, nullable=true)
     */
    private $listPrice;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="modify_time", type="datetime", nullable=true)
     */
    private $modifyTime;

    /**
     * @var float
     *
     * @ORM\Column(name="sale_price", type="float", precision=64, scale=3, nullable=true)
     */
    private $salePrice;

    /**
     * @var string
     *
     * @ORM\Column(name="seodescription", type="text", length=65535, nullable=true)
     */
    private $seodescription;

    /**
     * @var string
     *
     * @ORM\Column(name="seokeywords", type="string", length=255, nullable=true)
     */
    private $seokeywords;

    /**
     * @var string
     *
     * @ORM\Column(name="seotitle", type="string", length=255, nullable=true)
     */
    private $seotitle;

    /**
     * @var string
     *
     * @ORM\Column(name="sketch", type="string", length=255, nullable=true)
     */
    private $sketch;

    /**
     * @var string
     *
     * @ORM\Column(name="size", type="string", length=255, nullable=true)
     */
    private $size;

    /**
     * @var string
     *
     * @ORM\Column(name="style", type="string", length=255, nullable=true)
     */
    private $style;

    /**
     * @var string
     *
     * @ORM\Column(name="sub_title", type="string", length=500, nullable=true)
     */
    private $subTitle;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=500, nullable=true)
     */
    private $title;

    /**
     * @var integer
     *
     * @ORM\Column(name="type", type="integer", nullable=true)
     */
    private $type;

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
     * Set activeBeginTime
     *
     * @param \DateTime $activeBeginTime
     * @return HShopProductDetail
     */
    public function setActiveBeginTime($activeBeginTime)
    {
        $this->activeBeginTime = $activeBeginTime;

        return $this;
    }

    /**
     * Get activeBeginTime
     *
     * @return \DateTime 
     */
    public function getActiveBeginTime()
    {
        return $this->activeBeginTime;
    }

    /**
     * Set createTime
     *
     * @param \DateTime $createTime
     * @return HShopProductDetail
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
     * Set description
     *
     * @param string $description
     * @return HShopProductDetail
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
     * Set productId
     *
     * @param integer $productId
     * @return HShopProductDetail
     */
    public function setProductId($productId)
    {
        $this->productId = $productId;

        return $this;
    }

    /**
     * Get productId
     *
     * @return integer 
     */
    public function getProductId()
    {
        return $this->productId;
    }

    /**
     * Set language
     *
     * @param string $language
     * @return HShopProductDetail
     */
    public function setLanguage($language)
    {
        $this->language = $language;

        return $this;
    }

    /**
     * Get language
     *
     * @return string 
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * Set lastSelectPropertyId
     *
     * @param integer $lastSelectPropertyId
     * @return HShopProductDetail
     */
    public function setLastSelectPropertyId($lastSelectPropertyId)
    {
        $this->lastSelectPropertyId = $lastSelectPropertyId;

        return $this;
    }

    /**
     * Get lastSelectPropertyId
     *
     * @return integer 
     */
    public function getLastSelectPropertyId()
    {
        return $this->lastSelectPropertyId;
    }

    /**
     * Set lastSelectPropertyValue
     *
     * @param integer $lastSelectPropertyValue
     * @return HShopProductDetail
     */
    public function setLastSelectPropertyValue($lastSelectPropertyValue)
    {
        $this->lastSelectPropertyValue = $lastSelectPropertyValue;

        return $this;
    }

    /**
     * Get lastSelectPropertyValue
     *
     * @return integer 
     */
    public function getLastSelectPropertyValue()
    {
        return $this->lastSelectPropertyValue;
    }

    /**
     * Set listPrice
     *
     * @param float $listPrice
     * @return HShopProductDetail
     */
    public function setListPrice($listPrice)
    {
        $this->listPrice = $listPrice;

        return $this;
    }

    /**
     * Get listPrice
     *
     * @return float 
     */
    public function getListPrice()
    {
        return $this->listPrice;
    }

    /**
     * Set modifyTime
     *
     * @param \DateTime $modifyTime
     * @return HShopProductDetail
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
     * Set salePrice
     *
     * @param float $salePrice
     * @return HShopProductDetail
     */
    public function setSalePrice($salePrice)
    {
        $this->salePrice = $salePrice;

        return $this;
    }

    /**
     * Get salePrice
     *
     * @return float 
     */
    public function getSalePrice()
    {
        return $this->salePrice;
    }

    /**
     * Set seodescription
     *
     * @param string $seodescription
     * @return HShopProductDetail
     */
    public function setSeodescription($seodescription)
    {
        $this->seodescription = $seodescription;

        return $this;
    }

    /**
     * Get seodescription
     *
     * @return string 
     */
    public function getSeodescription()
    {
        return $this->seodescription;
    }

    /**
     * Set seokeywords
     *
     * @param string $seokeywords
     * @return HShopProductDetail
     */
    public function setSeokeywords($seokeywords)
    {
        $this->seokeywords = $seokeywords;

        return $this;
    }

    /**
     * Get seokeywords
     *
     * @return string 
     */
    public function getSeokeywords()
    {
        return $this->seokeywords;
    }

    /**
     * Set seotitle
     *
     * @param string $seotitle
     * @return HShopProductDetail
     */
    public function setSeotitle($seotitle)
    {
        $this->seotitle = $seotitle;

        return $this;
    }

    /**
     * Get seotitle
     *
     * @return string 
     */
    public function getSeotitle()
    {
        return $this->seotitle;
    }

    /**
     * Set sketch
     *
     * @param string $sketch
     * @return HShopProductDetail
     */
    public function setSketch($sketch)
    {
        $this->sketch = $sketch;

        return $this;
    }

    /**
     * Get sketch
     *
     * @return string 
     */
    public function getSketch()
    {
        return $this->sketch;
    }

    /**
     * Set size
     *
     * @param string $size
     * @return HShopProductDetail
     */
    public function setSize($size)
    {
        $this->size = $size;

        return $this;
    }

    /**
     * Get size
     *
     * @return string 
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * Set style
     *
     * @param string $style
     * @return HShopProductDetail
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
     * Set subTitle
     *
     * @param string $subTitle
     * @return HShopProductDetail
     */
    public function setSubTitle($subTitle)
    {
        $this->subTitle = $subTitle;

        return $this;
    }

    /**
     * Get subTitle
     *
     * @return string 
     */
    public function getSubTitle()
    {
        return $this->subTitle;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return HShopProductDetail
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set type
     *
     * @param integer $type
     * @return HShopProductDetail
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
     * Set version
     *
     * @param \DateTime $version
     * @return HShopProductDetail
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
