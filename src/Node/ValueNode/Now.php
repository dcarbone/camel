<?php namespace DCarbone\Camel\Node\ValueNode;

use DCarbone\Camel\Hump\AbstractHump;
use DCarbone\Camel\Node\INode;

/**
 * Class Now
 * @package DCarbone\Camel\Node
 *
 * http://msdn.microsoft.com/en-us/library/office/ms461651(v=office.15).aspx
 */
class Now extends AbstractValueNode
{
    /**
     * @return string
     */
    public function nodeName()
    {
        return 'Now';
    }

    /**
     * @param INode|AbstractHump $parent
     * @return $this
     * @throws \InvalidArgumentException
     */
    public function setParent($parent)
    {
        if (!($parent instanceof AbstractHump) && !($parent instanceof INode))
            throw new \InvalidArgumentException('Argument 1 expected to be instance of AbstractHump or INode.');

        $this->parent = $parent;
        return $this;
    }
}