<?php namespace DCarbone\Camel\Part;

use DCarbone\Camel\Camel;
use DCarbone\Camel\Node\FieldRef;

/**
 * Class OrderBy
 * @package DCarbone\Camel\Part
 */
class OrderBy extends AbstractSimplePart
{
    /** @var bool */
    protected $override = false;

    /** @var bool */
    protected $useIndexForOrderBy = false;

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
        return 'OrderBy';
    }

    /**
     * @return $this
     */
    public function shouldOverride()
    {
        $this->override = true;

        return $this;
    }

    /**
     * @return $this
     */
    public function shouldUseIndexForOrderBy()
    {
        $this->useIndexForOrderBy = true;

        return $this;
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
     * @return string
     */
    public function __toString()
    {
        $xml = '<OrderBy '.
            'Override="'.($this->override ? 'TRUE' : 'FALSE').'" '.
            'UseIndexForOrderBy="'.($this->useIndexForOrderBy ? 'TRUE' : 'FALSE')."\">\n";

        foreach($this->children as $field)
        {
            /** @var \DCarbone\Camel\Node\FieldRef $field */
            $xml .= (string)$field;
        }

        return $xml."</OrderBy>\n";
    }
}