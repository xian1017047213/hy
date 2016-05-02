<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * HShopProductProperties
 * @ORM\Table(name="h_shop_product_properties")
 * @ORM\Entity
 */
class HShopProductProperties
{
    /**
	 *
	 * @ORM\Column(name="id", type="integer", nullable=false)
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="IDENTITY")
	 */
    private $id;

    /**
     * @ORM\Column(name="create_time", type="datetime")
     */
    private $createTime;

    /**
     * @ORM\Column(name="product_id", type="integer")
     */
    private $productId;

    /**
     * @ORM\Column(name="modify_time", type="datetime")
     */
    private $modifyTime;

    /**
     * @ORM\Column(name="pic_url", type="string")
     */
    private $picUrl;

    /**
     * @ORM\Column(name="property_id", type="integer")
     */
    private $propertyId;

    /**
     * @ORM\Column(name="property_value", type="string")
     */
    private $propertyValue;

    /**
     * @ORM\Column(name="property_value_id", type="integer")
     */
    private $propertyValueId;

    /**
     * @ORM\Column(name="version", type="datetime")
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
     * @return HShopProductProperties
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
     * Set productId
     *
     * @param integer $productId
     * @return HShopProductProperties
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
     * Set modifyTime
     *
     * @param \DateTime $modifyTime
     * @return HShopProductProperties
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
     * @return HShopProductProperties
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
     * Set propertyId
     *
     * @param integer $propertyId
     * @return HShopProductProperties
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
     * Set propertyValue
     *
     * @param string $propertyValue
     * @return HShopProductProperties
     */
    public function setPropertyValue($propertyValue)
    {
        $this->propertyValue = $propertyValue;

        return $this;
    }

    /**
     * Get propertyValue
     *
     * @return string 
     */
    public function getPropertyValue()
    {
        return $this->propertyValue;
    }

    /**
     * Set propertyValueId
     *
     * @param integer $propertyValueId
     * @return HShopProductProperties
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
     * Set version
     *
     * @param \DateTime $version
     * @return HShopProductProperties
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
