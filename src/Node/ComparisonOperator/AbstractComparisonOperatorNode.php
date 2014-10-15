<?php namespace DCarbone\Camel\Node\ComparisonOperator;

use DCarbone\Camel\Node\AbstractParentNode;
use DCarbone\Camel\Node\FieldRef;
use DCarbone\Camel\Node\Value;
use DCarbone\Camel\Node\XML;

/**
 * Class AbstractComparisonOperatorNode
 * @package DCarbone\Camel\Node\ComparisonOperator
 */
abstract class AbstractComparisonOperatorNode extends AbstractParentNode
{
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->validParents = array(
            'And',
            'Or',
            'Where',
        );

        $this->validChildren = array(
            'FieldRef',
            'Value',
            'XML',
        );
    }

    /**
     * @return FieldRef
     */
    public function fieldRef()
    {
        $node = new FieldRef();
        $this->append($node);
        return end($this->children);
    }

    /**
     * @return Value
     */
    public function value()
    {
        $node = new Value();
        $this->append($node);
        return end($this->children);
    }

    /**
     * @return XML
     */
    public function xml()
    {
        $node = new XML();
        $this->append($node);
        return end($this->children);
    }
}