<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * HArchiveHead
 *
 * @ORM\Table(name="h_archive_head")
 * @ORM\Entity
 */
class HArchiveHead
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
     * @var integer
     *
     * @ORM\Column(name="type", type="integer", nullable=true)
     */
    private $type;

    /**
     * @var integer
     *
     * @ORM\Column(name="status", type="integer", nullable=true)
     */
    private $status;

    /**
     * @var string
     *
     * @ORM\Column(name="sortank", type="string", length=255, nullable=true)
     */
    private $sortank;

    /**
     * @var string
     *
     * @ORM\Column(name="flag", type="string", length=255, nullable=true)
     */
    private $flag;

    /**
     * @var string
     *
     * @ORM\Column(name="ismake", type="string", length=255, nullable=true)
     */
    private $ismake;

    /**
     * @var string
     *
     * @ORM\Column(name="channel", type="string", length=255, nullable=true)
     */
    private $channel;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255, nullable=true)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="subtitle", type="string", length=255, nullable=true)
     */
    private $subtitle;

    /**
     * @var string
     *
     * @ORM\Column(name="tag", type="string", length=255, nullable=true)
     */
    private $tag;

    /**
     * @var string
     *
     * @ORM\Column(name="arcrank", type="string", length=255, nullable=true)
     */
    private $arcrank;

    /**
     * @var string
     *
     * @ORM\Column(name="click", type="string", length=255, nullable=true)
     */
    private $click;

    /**
     * @var string
     *
     * @ORM\Column(name="money", type="string", length=255, nullable=true)
     */
    private $money;

    /**
     * @var string
     *
     * @ORM\Column(name="color", type="string", length=255, nullable=true)
     */
    private $color;

    /**
     * @var string
     *
     * @ORM\Column(name="writer", type="string", length=255, nullable=true)
     */
    private $writer;

    /**
     * @var string
     *
     * @ORM\Column(name="source", type="string", length=255, nullable=true)
     */
    private $source;

    /**
     * @var string
     *
     * @ORM\Column(name="litpic", type="string", length=255, nullable=true)
     */
    private $litpic;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="modify_time", type="datetime", nullable=true)
     */
    private $modifyTime;

    /**
     * @var integer
     *
     * @ORM\Column(name="pubdate", type="integer", nullable=true)
     */
    private $pubdate;

    /**
     * @var integer
     *
     * @ORM\Column(name="senddate", type="integer", nullable=true)
     */
    private $senddate;

    /**
     * @var integer
     *
     * @ORM\Column(name="mid", type="integer", nullable=true)
     */
    private $mid;

    /**
     * @var string
     *
     * @ORM\Column(name="keywords", type="string", length=255, nullable=true)
     */
    private $keywords;

    /**
     * @var string
     *
     * @ORM\Column(name="lastports", type="string", length=255, nullable=true)
     */
    private $lastports;

    /**
     * @var string
     *
     * @ORM\Column(name="scores", type="string", length=255, nullable=true)
     */
    private $scores;

    /**
     * @var string
     *
     * @ORM\Column(name="goodpost", type="string", length=255, nullable=true)
     */
    private $goodpost;

    /**
     * @var string
     *
     * @ORM\Column(name="badpost", type="string", length=255, nullable=true)
     */
    private $badpost;

    /**
     * @var integer
     *
     * @ORM\Column(name="voteid", type="integer", nullable=true)
     */
    private $voteid;

    /**
     * @var string
     *
     * @ORM\Column(name="notpost", type="string", length=255, nullable=true)
     */
    private $notpost;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="filename", type="string", length=255, nullable=true)
     */
    private $filename;

    /**
     * @var string
     *
     * @ORM\Column(name="dutyadmin", type="string", length=255, nullable=true)
     */
    private $dutyadmin;

    /**
     * @var integer
     *
     * @ORM\Column(name="trackid", type="integer", nullable=true)
     */
    private $trackid;

    /**
     * @var string
     *
     * @ORM\Column(name="mtype", type="string", length=255, nullable=true)
     */
    private $mtype;

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
     * @return HArchiveHead
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
     * @param integer $type
     * @return HArchiveHead
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
     * Set status
     *
     * @param integer $status
     * @return HArchiveHead
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
     * Set sortank
     *
     * @param string $sortank
     * @return HArchiveHead
     */
    public function setSortank($sortank)
    {
        $this->sortank = $sortank;

        return $this;
    }

    /**
     * Get sortank
     *
     * @return string 
     */
    public function getSortank()
    {
        return $this->sortank;
    }

    /**
     * Set flag
     *
     * @param string $flag
     * @return HArchiveHead
     */
    public function setFlag($flag)
    {
        $this->flag = $flag;

        return $this;
    }

    /**
     * Get flag
     *
     * @return string 
     */
    public function getFlag()
    {
        return $this->flag;
    }

    /**
     * Set ismake
     *
     * @param string $ismake
     * @return HArchiveHead
     */
    public function setIsmake($ismake)
    {
        $this->ismake = $ismake;

        return $this;
    }

    /**
     * Get ismake
     *
     * @return string 
     */
    public function getIsmake()
    {
        return $this->ismake;
    }

    /**
     * Set channel
     *
     * @param string $channel
     * @return HArchiveHead
     */
    public function setChannel($channel)
    {
        $this->channel = $channel;

        return $this;
    }

    /**
     * Get channel
     *
     * @return string 
     */
    public function getChannel()
    {
        return $this->channel;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return HArchiveHead
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
     * Set subtitle
     *
     * @param string $subtitle
     * @return HArchiveHead
     */
    public function setSubtitle($subtitle)
    {
        $this->subtitle = $subtitle;

        return $this;
    }

    /**
     * Get subtitle
     *
     * @return string 
     */
    public function getSubtitle()
    {
        return $this->subtitle;
    }

    /**
     * Set tag
     *
     * @param string $tag
     * @return HArchiveHead
     */
    public function setTag($tag)
    {
        $this->tag = $tag;

        return $this;
    }

    /**
     * Get tag
     *
     * @return string 
     */
    public function getTag()
    {
        return $this->tag;
    }

    /**
     * Set arcrank
     *
     * @param string $arcrank
     * @return HArchiveHead
     */
    public function setArcrank($arcrank)
    {
        $this->arcrank = $arcrank;

        return $this;
    }

    /**
     * Get arcrank
     *
     * @return string 
     */
    public function getArcrank()
    {
        return $this->arcrank;
    }

    /**
     * Set click
     *
     * @param string $click
     * @return HArchiveHead
     */
    public function setClick($click)
    {
        $this->click = $click;

        return $this;
    }

    /**
     * Get click
     *
     * @return string 
     */
    public function getClick()
    {
        return $this->click;
    }

    /**
     * Set money
     *
     * @param string $money
     * @return HArchiveHead
     */
    public function setMoney($money)
    {
        $this->money = $money;

        return $this;
    }

    /**
     * Get money
     *
     * @return string 
     */
    public function getMoney()
    {
        return $this->money;
    }

    /**
     * Set color
     *
     * @param string $color
     * @return HArchiveHead
     */
    public function setColor($color)
    {
        $this->color = $color;

        return $this;
    }

    /**
     * Get color
     *
     * @return string 
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * Set writer
     *
     * @param string $writer
     * @return HArchiveHead
     */
    public function setWriter($writer)
    {
        $this->writer = $writer;

        return $this;
    }

    /**
     * Get writer
     *
     * @return string 
     */
    public function getWriter()
    {
        return $this->writer;
    }

    /**
     * Set source
     *
     * @param string $source
     * @return HArchiveHead
     */
    public function setSource($source)
    {
        $this->source = $source;

        return $this;
    }

    /**
     * Get source
     *
     * @return string 
     */
    public function getSource()
    {
        return $this->source;
    }

    /**
     * Set litpic
     *
     * @param string $litpic
     * @return HArchiveHead
     */
    public function setLitpic($litpic)
    {
        $this->litpic = $litpic;

        return $this;
    }

    /**
     * Get litpic
     *
     * @return string 
     */
    public function getLitpic()
    {
        return $this->litpic;
    }

    /**
     * Set modifyTime
     *
     * @param \DateTime $modifyTime
     * @return HArchiveHead
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
     * Set pubdate
     *
     * @param integer $pubdate
     * @return HArchiveHead
     */
    public function setPubdate($pubdate)
    {
        $this->pubdate = $pubdate;

        return $this;
    }

    /**
     * Get pubdate
     *
     * @return integer 
     */
    public function getPubdate()
    {
        return $this->pubdate;
    }

    /**
     * Set senddate
     *
     * @param integer $senddate
     * @return HArchiveHead
     */
    public function setSenddate($senddate)
    {
        $this->senddate = $senddate;

        return $this;
    }

    /**
     * Get senddate
     *
     * @return integer 
     */
    public function getSenddate()
    {
        return $this->senddate;
    }

    /**
     * Set mid
     *
     * @param integer $mid
     * @return HArchiveHead
     */
    public function setMid($mid)
    {
        $this->mid = $mid;

        return $this;
    }

    /**
     * Get mid
     *
     * @return integer 
     */
    public function getMid()
    {
        return $this->mid;
    }

    /**
     * Set keywords
     *
     * @param string $keywords
     * @return HArchiveHead
     */
    public function setKeywords($keywords)
    {
        $this->keywords = $keywords;

        return $this;
    }

    /**
     * Get keywords
     *
     * @return string 
     */
    public function getKeywords()
    {
        return $this->keywords;
    }

    /**
     * Set lastports
     *
     * @param string $lastports
     * @return HArchiveHead
     */
    public function setLastports($lastports)
    {
        $this->lastports = $lastports;

        return $this;
    }

    /**
     * Get lastports
     *
     * @return string 
     */
    public function getLastports()
    {
        return $this->lastports;
    }

    /**
     * Set scores
     *
     * @param string $scores
     * @return HArchiveHead
     */
    public function setScores($scores)
    {
        $this->scores = $scores;

        return $this;
    }

    /**
     * Get scores
     *
     * @return string 
     */
    public function getScores()
    {
        return $this->scores;
    }

    /**
     * Set goodpost
     *
     * @param string $goodpost
     * @return HArchiveHead
     */
    public function setGoodpost($goodpost)
    {
        $this->goodpost = $goodpost;

        return $this;
    }

    /**
     * Get goodpost
     *
     * @return string 
     */
    public function getGoodpost()
    {
        return $this->goodpost;
    }

    /**
     * Set badpost
     *
     * @param string $badpost
     * @return HArchiveHead
     */
    public function setBadpost($badpost)
    {
        $this->badpost = $badpost;

        return $this;
    }

    /**
     * Get badpost
     *
     * @return string 
     */
    public function getBadpost()
    {
        return $this->badpost;
    }

    /**
     * Set voteid
     *
     * @param integer $voteid
     * @return HArchiveHead
     */
    public function setVoteid($voteid)
    {
        $this->voteid = $voteid;

        return $this;
    }

    /**
     * Get voteid
     *
     * @return integer 
     */
    public function getVoteid()
    {
        return $this->voteid;
    }

    /**
     * Set notpost
     *
     * @param string $notpost
     * @return HArchiveHead
     */
    public function setNotpost($notpost)
    {
        $this->notpost = $notpost;

        return $this;
    }

    /**
     * Get notpost
     *
     * @return string 
     */
    public function getNotpost()
    {
        return $this->notpost;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return HArchiveHead
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
     * Set filename
     *
     * @param string $filename
     * @return HArchiveHead
     */
    public function setFilename($filename)
    {
        $this->filename = $filename;

        return $this;
    }

    /**
     * Get filename
     *
     * @return string 
     */
    public function getFilename()
    {
        return $this->filename;
    }

    /**
     * Set dutyadmin
     *
     * @param string $dutyadmin
     * @return HArchiveHead
     */
    public function setDutyadmin($dutyadmin)
    {
        $this->dutyadmin = $dutyadmin;

        return $this;
    }

    /**
     * Get dutyadmin
     *
     * @return string 
     */
    public function getDutyadmin()
    {
        return $this->dutyadmin;
    }

    /**
     * Set trackid
     *
     * @param integer $trackid
     * @return HArchiveHead
     */
    public function setTrackid($trackid)
    {
        $this->trackid = $trackid;

        return $this;
    }

    /**
     * Get trackid
     *
     * @return integer 
     */
    public function getTrackid()
    {
        return $this->trackid;
    }

    /**
     * Set mtype
     *
     * @param string $mtype
     * @return HArchiveHead
     */
    public function setMtype($mtype)
    {
        $this->mtype = $mtype;

        return $this;
    }

    /**
     * Get mtype
     *
     * @return string 
     */
    public function getMtype()
    {
        return $this->mtype;
    }

    /**
     * Set version
     *
     * @param \DateTime $version
     * @return HArchiveHead
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
