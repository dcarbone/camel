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

    /**
     * @return string
     */
    public function __toString()
    {
        $nodeName = $this->nodeName();

        $xml = "<{$nodeName}";

        foreach($this->outputAttributeMap as $k=>$v)
        {
            $xml .= " {$k}=\"{$v}\"";
        }

        $xml .= ">\n";

        foreach($this->children as $node)
        {
            /** @var \DCarbone\Camel\Node\INode $node */
            $xml .= (string)$node;
        }

        return $xml."</{$nodeName}>\n";
    }
}