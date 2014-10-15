<?php namespace DCarbone\Camel\Node;

use DCarbone\Camel\Hump\AbstractHump;

/**
 * Class Now
 * @package DCarbone\Camel\Node
 */
class Now extends AbstractNode
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