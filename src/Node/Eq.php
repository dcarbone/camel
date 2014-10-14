<?php namespace DCarbone\Camel\Node;

/**
 * Class Eq
 * @package DCarbone\Camel\Node
 */
class Eq extends AbstractOperatorNode
{
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->validParents = array(
            'And',
            'Expr1',
            'Expr2',
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

    /**
     * @return string
     */
    public function nodeName()
    {
        return 'Eq';
    }
}