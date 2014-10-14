<?php namespace DCarbone\Camel\Part;

use DCarbone\Camel\Node\INode;

/**
 * Class AbstractSimplePart
 * @package DCarbone\Camel\Part
 */
abstract class AbstractSimplePart extends AbstractPart
{
    /** @var array */
    protected $children = array();

    /**
     * @param INode $node
     * @return $this
     * @throws \InvalidArgumentException
     */
    public function append(INode $node)
    {
        if (in_array($node->nodeName(), $this->validChildren))
        {
            $node->setParent($this);
            $this->children[] = $node;

            return $this;
        }

        throw new \InvalidArgumentException(sprintf(
            'Node "%s" cannot be added to "%s".  Valid child nodes: ["%s"].',
            $node->nodeName(),
            $this->nodeName(),
            implode('", "', $this->getValidChildren())
        ));
    }
}