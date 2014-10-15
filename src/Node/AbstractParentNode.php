<?php namespace DCarbone\Camel\Node;

/**
 * Class AbstractParentNode
 * @package DCarbone\Camel\Node
 */
abstract class AbstractParentNode extends AbstractNode implements IParentNode
{
    /** @var array */
    protected $children = array();

    /** @var array */
    protected $validChildren = array();

    /**
     * @return array
     */
    public function children()
    {
        return $this->children;
    }

    /**
     * @return array
     */
    public function getValidChildren()
    {
        return $this->validChildren;
    }

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