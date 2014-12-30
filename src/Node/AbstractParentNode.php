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
    protected $allowableChildren = array();

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
    public function getAllowableChildren()
    {
        return $this->allowableChildren;
    }

    /**
     * @param INode $node
     * @return $this
     * @throws \InvalidArgumentException
     */
    public function append(INode $node)
    {
        if (in_array($node->nodeName(), $this->allowableChildren))
        {
            $max = $this->maximumChildren();

            if ($max > 0 && count($this->children) >= $max)
                throw new \LogicException('Node of type "'.$this->nodeName().'" already has it\'s '.
                    'maximum of "'.$max.'" children.  Cannot append child with definition "'.
                    (string)$node.'"');

            $node->setParent($this);
            $this->children[] = $node;

            return $this;
        }

        throw new \InvalidArgumentException(sprintf(
            'Node "%s" cannot be added to "%s".  Allowable child nodes: ["%s"].',
            $node->nodeName(),
            $this->nodeName(),
            implode('", "', $this->getAllowableChildren())
        ));
    }
}