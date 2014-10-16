<?php namespace DCarbone\Camel\Node;

use DCarbone\Camel\Hump\AbstractHump;

/**
 * Class AbstractNode
 * @package DCarbone\Camel\Node
 */
abstract class AbstractNode implements INode
{
    /** @var mixed */
    protected $parent;

    /** @var array */
    protected $validParents = array();

    /** @var array */
    protected $outputAttributeMap = array();

    /** @var array */
    protected $validAttributeMap = array();

    /**
     * @param INode|AbstractHump $parent
     * @return $this
     * @throws \InvalidArgumentException
     */
    public function setParent($parent)
    {
        if (!($parent instanceof AbstractHump) && !($parent instanceof INode))
            throw new \InvalidArgumentException('Argument 1 expected to be instance of AbstractHump or INode.');

        if (in_array($parent->nodeName(), $this->getValidParents(), true))
        {
            $this->parent = $parent;
            return $this;
        }

        throw new \InvalidArgumentException(sprintf(
            'Node "%s" cannot be added to passed parent "%s".  Valid Parent Nodes: ["%s"].',
            $this->nodeName(),
            $parent->nodeName(),
            implode('", "', $this->getValidParents())
        ));
    }

    /**
     * @return array
     */
    public function getValidParents()
    {
        return $this->validParents;
    }

    /**
     * @return array
     */
    public function getValidAttributes()
    {
        return array_values($this->validAttributeMap);
    }

    /**
     * @param string $name
     * @param string $value
     * @throws \InvalidArgumentException
     * @return $this
     */
    public function attribute($name, $value)
    {
        if (!is_string($name))
            throw new \InvalidArgumentException('Argument 1 expected to be string, ' . gettype($name) . ' seen.');

        $name = strtolower(trim($name));
        if ('' === $name || !isset($this->validAttributeMap[$name]))
        {
            throw new \InvalidArgumentException(sprintf(
                'Attribute "%s" does not match any known attribute for node "%s".' .
                '  Available Attributes: ["%s"]',
                $name,
                $this->nodeName(),
                implode('", "', $this->getValidAttributes())
            ));
        }

        $this->outputAttributeMap[$this->validAttributeMap[$name]] = $value;

        return $this;
    }

    /**
     * @return mixed
     */
    public function end()
    {
        return $this->parent;
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

        if (!($this instanceof IParentNode) && !($this instanceof IValueNode))
            return $xml." />\n";

        $xml .= ">";

        if ($this instanceof IValueNode)
            $xml .= $this->getNodeValue();

        if ($this instanceof IParentNode)
        {
            foreach($this->children() as $node)
            {
                /** @var \DCarbone\Camel\Node\INode $node */
                $xml .= (string)$node;
            }
        }

        return $xml."</{$nodeName}>\n";
    }
}