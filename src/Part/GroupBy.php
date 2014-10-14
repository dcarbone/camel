<?php namespace DCarbone\Camel\Part;

use DCarbone\Camel\Camel;
use DCarbone\Camel\Node\FieldRef;

/**
 * Class GroupBy
 * @package DCarbone\Camel\Part\Query
 */
class GroupBy extends AbstractSimplePart
{
    /** @var bool */
    protected $collapse = false;

    /**
     * Constructor
     *
     * @param Camel $camel
     */
    public function __construct(Camel $camel)
    {
        parent::__construct($camel);

        $this->validChildren = array('FieldRef');
    }

    /**
     * @return string
     */
    public function nodeName()
    {
        return 'GroupBy';
    }

    /**
     * @param string $fieldName
     * @return FieldRef
     */
    public function fieldRef($fieldName = null)
    {
        $field = new FieldRef();

        if (null !== $fieldName)
            $field->attribute('name', $fieldName);

        $this->append($field);

        return end($this->children);
    }

    /**
     * @return $this
     */
    public function shouldCollapse()
    {
        $this->collapse = true;

        return $this;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        $xml = '<GroupBy Collapse="'.($this->collapse ? 'TRUE' : 'FALSE').'" />'."\n";

        foreach($this->children as $field)
        {
            /** @var \DCarbone\Camel\Node\FieldRef $field */
            $xml .= (string)$field;
        }

        return $xml."</GroupBy>\n";
    }
}