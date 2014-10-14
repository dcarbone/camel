<?php namespace DCarbone\Camel\Node;

use DCarbone\Camel\Part\AbstractPart;

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
     * @param INode|AbstractPart $parent
     * @return $this
     * @throws \InvalidArgumentException
     */
    public function setParent($parent)
    {
        if (!($parent instanceof AbstractPart) && !($parent instanceof INode))
            throw new \InvalidArgumentException('Argument 1 expected to be instance of AbstractPart or INode.');

        $this->parent = $parent;
        return $this;
    }
}