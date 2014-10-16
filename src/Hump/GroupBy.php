<?php namespace DCarbone\Camel\Hump;

use DCarbone\Camel\Node\FieldRef;

/**
 * Class GroupBy
 * @package DCarbone\Camel\Hump\Query
 *
 * http://msdn.microsoft.com/en-us/library/office/ms415157(v=office.15).aspx
 */
class GroupBy extends AbstractSimpleHump
{
    /** @var bool */
    protected $collapse = false;

    /**
     * Constructor
     */
    public function __construct()
    {
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
        $xml = '<GroupBy Collapse="'.($this->collapse ? 'TRUE' : 'FALSE').'">'."\n";

        foreach($this->children as $field)
        {
            /** @var \DCarbone\Camel\Node\FieldRef $field */
            $xml .= (string)$field;
        }

        return $xml."</GroupBy>\n";
    }
}