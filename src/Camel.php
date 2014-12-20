<?php namespace DCarbone\Camel;

use DCarbone\Camel\Hump\GroupBy;
use DCarbone\Camel\Hump\OrderBy;
use DCarbone\Camel\Hump\Where;

/**
 * Class Camel
 * @package DCarbone\Camel
 *
 * http://msdn.microsoft.com/en-us/library/office/ms467521(v=office.15).aspx
 */
class Camel
{
    /** @var \DCarbone\Camel\Hump\Where */
    protected $where;

    /** @var \DCarbone\Camel\Hump\OrderBy */
    protected $orderBy;

    /** @var \DCarbone\Camel\Hump\GroupBy */
    protected $groupBy;

    /**
     * Clear all resources
     */
    public function clear()
    {
        unset($this->where);
        unset($this->orderBy);
        unset($this->groupBy);
    }

    /**
     * @return Where
     */
    public function where()
    {
        if (!isset($this->where))
        {
            $this->where = new Where();
            $this->where->setCamel($this);
        }

        return $this->where;
    }

    /**
     * @param Where $where
     * @return $this
     */
    public function setWhere(Where $where)
    {
        $this->where = $where;
        $this->where->setCamel($this);

        return $this;
    }

    /**
     * @return OrderBy
     */
    public function orderBy()
    {
        if (!isset($this->orderBy))
        {
            $this->orderBy = new OrderBy();
            $this->orderBy->setCamel($this);
        }

        return $this->orderBy;
    }

    /**
     * @param OrderBy $orderBy
     * @return $this
     */
    public function setOrderBy(OrderBy $orderBy)
    {
        $this->orderBy = $orderBy;
        $this->orderBy->setCamel($this);

        return $this;
    }

    /**
     * @return \DCarbone\Camel\Hump\GroupBy
     */
    public function groupBy()
    {
        if (!isset($this->groupBy))
        {
            $this->groupBy = new GroupBy();
            $this->groupBy->setCamel($this);
        }

        return $this->groupBy;
    }

    /**
     * @param GroupBy $groupBy
     * @return $this
     */
    public function setGroupBy(GroupBy $groupBy)
    {
        $this->groupBy = $groupBy;
        $this->groupBy->setCamel($this);

        return $this;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        $xml = '<Query xmlns="">'."\n";

        if (isset($this->where))
            $xml .= (string)$this->where;

        if (isset($this->groupBy))
            $xml .= (string)$this->groupBy;

        if (isset($this->orderBy))
            $xml .= (string)$this->orderBy;

        return $xml.'</Query>';
    }
}
