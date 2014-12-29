<?php namespace DCarbone\Camel\Node\ValueNode;

/**
 * Class XML
 * @package DCarbone\Camel\Node
 *
 * http://msdn.microsoft.com/en-us/library/office/ms480514(v=office.15).aspx
 */
class XML extends AbstractValueNode
{
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->allowableParents = array(
            'BeginsWith',
            'Contains',
            'DateRangesOverlap',
            'Eq',
            'Geq',
            'Gt',
            'In',
            'Includes',
            'IsNotNull',
            'IsNull',
            'Leq',
            'Lt',
            'Neq',
            'NotIncludes',
            'Value',
        );
    }

    /**
     * @return string
     */
    public function nodeName()
    {
        return 'XML';
    }
}