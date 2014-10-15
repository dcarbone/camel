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
     * @return Where
     */
    public function where()
    {
        if (!isset($this->where))
            $this->where = new Where($this);

        return $this->where;
    }

    /**
     * @return OrderBy
     */
    public function orderBy()
    {
        if (!isset($this->orderBy))
            $this->orderBy = new OrderBy($this);

        return $this->orderBy;
    }

    /**
     * @return \DCarbone\Camel\Hump\GroupBy
     */
    public function groupBy()
    {
        if (!isset($this->groupBy))
            $this->groupBy = new GroupBy($this);

        return $this->groupBy;
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
