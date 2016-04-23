<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * HShopProductCategory
 * @ORM\Table(name="h_shop_product_category")
 * @ORM\Entity
 */
class HShopProductCategory
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
    private $categoryId;

    /**
     * @var \DateTime
     */
    private $createTime;

    /**
     * @var integer
     */
    private $isDefault;

    /**
     * @var integer
     */
    private $productId;

    /**
     * @var \DateTime
     */
    private $modifyTime;

    /**
     * @var integer
     */
    private $sequence;

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
     * Set categoryId
     *
     * @param integer $categoryId
     * @return HShopProductCategory
     */
    public function setCategoryId($categoryId)
    {
        $this->categoryId = $categoryId;

        return $this;
    }

    /**
     * Get categoryId
     *
     * @return integer 
     */
    public function getCategoryId()
    {
        return $this->categoryId;
    }

    /**
     * Set createTime
     *
     * @param \DateTime $createTime
     * @return HShopProductCategory
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
     * Set isDefault
     *
     * @param integer $isDefault
     * @return HShopProductCategory
     */
    public function setIsDefault($isDefault)
    {
        $this->isDefault = $isDefault;

        return $this;
    }

    /**
     * Get isDefault
     *
     * @return integer 
     */
    public function getIsDefault()
    {
        return $this->isDefault;
    }

    /**
     * Set productId
     *
     * @param integer $productId
     * @return HShopProductCategory
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
     * @return HShopProductCategory
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
     * Set sequence
     *
     * @param integer $sequence
     * @return HShopProductCategory
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
     * Set version
     *
     * @param \DateTime $version
     * @return HShopProductCategory
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
