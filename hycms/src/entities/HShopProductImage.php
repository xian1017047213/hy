<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * HShopProductImage
 * @ORM\Table(name="h_shop_product_image")
 * @ORM\Entity
 */
class HShopProductImage
{
    /**
	 *
	 * @ORM\Column(name="id", type="integer", nullable=false)
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="IDENTITY")
	 */
    private $id;

    /**
     * @var \DateTime
     */
    private $createTime;

    /**
     * @var string
     */
    private $description;

    /**
     * @var integer
     */
    private $itemId;

    /**
     * @var string
     */
    private $itemProperties;

    /**
     * @var \DateTime
     */
    private $modifyTime;

    /**
     * @var string
     */
    private $picUrl;

    /**
     * @var integer
     */
    private $position;

    /**
     * @var integer
     */
    private $propertyId;

    /**
     * @var integer
     */
    private $propertyValueId;

    /**
     * @var string
     */
    private $imgType;

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
     * Set createTime
     *
     * @param \DateTime $createTime
     * @return HShopProductImage
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
     * @return HShopProductImage
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
     * Set itemId
     *
     * @param integer $itemId
     * @return HShopProductImage
     */
    public function setItemId($itemId)
    {
        $this->itemId = $itemId;

        return $this;
    }

    /**
     * Get itemId
     *
     * @return integer 
     */
    public function getItemId()
    {
        return $this->itemId;
    }

    /**
     * Set itemProperties
     *
     * @param string $itemProperties
     * @return HShopProductImage
     */
    public function setItemProperties($itemProperties)
    {
        $this->itemProperties = $itemProperties;

        return $this;
    }

    /**
     * Get itemProperties
     *
     * @return string 
     */
    public function getItemProperties()
    {
        return $this->itemProperties;
    }

    /**
     * Set modifyTime
     *
     * @param \DateTime $modifyTime
     * @return HShopProductImage
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
     * @return HShopProductImage
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
     * Set position
     *
     * @param integer $position
     * @return HShopProductImage
     */
    public function setPosition($position)
    {
        $this->position = $position;

        return $this;
    }

    /**
     * Get position
     *
     * @return integer 
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * Set propertyId
     *
     * @param integer $propertyId
     * @return HShopProductImage
     */
    public function setPropertyId($propertyId)
    {
        $this->propertyId = $propertyId;

        return $this;
    }

    /**
     * Get propertyId
     *
     * @return integer 
     */
    public function getPropertyId()
    {
        return $this->propertyId;
    }

    /**
     * Set propertyValueId
     *
     * @param integer $propertyValueId
     * @return HShopProductImage
     */
    public function setPropertyValueId($propertyValueId)
    {
        $this->propertyValueId = $propertyValueId;

        return $this;
    }

    /**
     * Get propertyValueId
     *
     * @return integer 
     */
    public function getPropertyValueId()
    {
        return $this->propertyValueId;
    }

    /**
     * Set imgType
     *
     * @param string $imgType
     * @return HShopProductImage
     */
    public function setImgType($imgType)
    {
        $this->imgType = $imgType;

        return $this;
    }

    /**
     * Get imgType
     *
     * @return string 
     */
    public function getImgType()
    {
        return $this->imgType;
    }

    /**
     * Set version
     *
     * @param \DateTime $version
     * @return HShopProductImage
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
