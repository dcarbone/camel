<?php namespace DCarbone\Camel;

use DCarbone\Camel\Part\GroupBy;
use DCarbone\Camel\Part\OrderBy;
use DCarbone\Camel\Part\Where;

/**
 * Class Camel
 * @package DCarbone\Camel
 */
class Camel
{
    /** @var \DCarbone\Camel\Part\Where */
    protected $where;

    /** @var \DCarbone\Camel\Part\OrderBy */
    protected $orderBy;

    /** @var \DCarbone\Camel\Part\GroupBy */
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
     * @return \DCarbone\Camel\Part\GroupBy
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
