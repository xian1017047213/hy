<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * HShopProperty
 * @ORM\Table(name="h_shop_property")
 * @ORM\Entity
 */
class HShopProperty
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
     * @ORM\Column(name="edit_type", type="integer")
     */
    private $editType;

    /**
     * @ORM\Column(name="group_code", type="string")
     */
    private $groupCode;

    /**
     * @ORM\Column(name="has_thumb", type="integer")
     */
    private $hasThumb;

    /**
     * @ORM\Column(name="industry_id", type="integer")
     */
    private $industryId;

    /**
     * @ORM\Column(name="is_color_prop", type="boolean")
     */
    private $isColorProp;

    /**
     * @ORM\Column(name="is_common_industry", type="boolean")
     */
    private $isCommonIndustry;

    /**
     * @ORM\Column(name="is_sale_prop", type="boolean")
     */
    private $isSaleProp;

    /**
     * @ORM\Column(name="status", type="integer")
     */
    private $status;

    /**
     * @ORM\Column(name="modify_time", type="datetime")
     */
    private $modifyTime;

    /**
     * @ORM\Column(name="name", type="string")
     */
    private $name;

    /**
     * @ORM\Column(name="required", type="string")
     */
    private $required;

    /**
     * @ORM\Column(name="searchable", type="boolean")
     */
    private $searchable;

    /**
     * @ORM\Column(name="sequence", type="integer")
     */
    private $sequence;

    /**
     * @ORM\Column(name="value_type", type="integer")
     */
    private $valueType;

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
     * @return HShopProperty
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
     * Set editType
     *
     * @param integer $editType
     * @return HShopProperty
     */
    public function setEditType($editType)
    {
        $this->editType = $editType;

        return $this;
    }

    /**
     * Get editType
     *
     * @return integer 
     */
    public function getEditType()
    {
        return $this->editType;
    }

    /**
     * Set groupCode
     *
     * @param string $groupCode
     * @return HShopProperty
     */
    public function setGroupCode($groupCode)
    {
        $this->groupCode = $groupCode;

        return $this;
    }

    /**
     * Get groupCode
     *
     * @return string 
     */
    public function getGroupCode()
    {
        return $this->groupCode;
    }

    /**
     * Set hasThumb
     *
     * @param integer $hasThumb
     * @return HShopProperty
     */
    public function setHasThumb($hasThumb)
    {
        $this->hasThumb = $hasThumb;

        return $this;
    }

    /**
     * Get hasThumb
     *
     * @return integer 
     */
    public function getHasThumb()
    {
        return $this->hasThumb;
    }

    /**
     * Set industryId
     *
     * @param integer $industryId
     * @return HShopProperty
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
     * Set isColorProp
     *
     * @param boolean $isColorProp
     * @return HShopProperty
     */
    public function setIsColorProp($isColorProp)
    {
        $this->isColorProp = $isColorProp;

        return $this;
    }

    /**
     * Get isColorProp
     *
     * @return boolean 
     */
    public function getIsColorProp()
    {
        return $this->isColorProp;
    }

    /**
     * Set isCommonIndustry
     *
     * @param boolean $isCommonIndustry
     * @return HShopProperty
     */
    public function setIsCommonIndustry($isCommonIndustry)
    {
        $this->isCommonIndustry = $isCommonIndustry;

        return $this;
    }

    /**
     * Get isCommonIndustry
     *
     * @return boolean 
     */
    public function getIsCommonIndustry()
    {
        return $this->isCommonIndustry;
    }

    /**
     * Set isSaleProp
     *
     * @param boolean $isSaleProp
     * @return HShopProperty
     */
    public function setIsSaleProp($isSaleProp)
    {
        $this->isSaleProp = $isSaleProp;

        return $this;
    }

    /**
     * Get isSaleProp
     *
     * @return boolean 
     */
    public function getIsSaleProp()
    {
        return $this->isSaleProp;
    }

    /**
     * Set status
     *
     * @param integer $status
     * @return HShopProperty
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
     * Set modifyTime
     *
     * @param \DateTime $modifyTime
     * @return HShopProperty
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
     * Set name
     *
     * @param string $name
     * @return HShopProperty
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
     * Set required
     *
     * @param string $required
     * @return HShopProperty
     */
    public function setRequired($required)
    {
        $this->required = $required;

        return $this;
    }

    /**
     * Get required
     *
     * @return string 
     */
    public function getRequired()
    {
        return $this->required;
    }

    /**
     * Set searchable
     *
     * @param boolean $searchable
     * @return HShopProperty
     */
    public function setSearchable($searchable)
    {
        $this->searchable = $searchable;

        return $this;
    }

    /**
     * Get searchable
     *
     * @return boolean 
     */
    public function getSearchable()
    {
        return $this->searchable;
    }

    /**
     * Set sequence
     *
     * @param integer $sequence
     * @return HShopProperty
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
     * Set valueType
     *
     * @param integer $valueType
     * @return HShopProperty
     */
    public function setValueType($valueType)
    {
        $this->valueType = $valueType;

        return $this;
    }

    /**
     * Get valueType
     *
     * @return integer 
     */
    public function getValueType()
    {
        return $this->valueType;
    }

    /**
     * Set version
     *
     * @param \DateTime $version
     * @return HShopProperty
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
