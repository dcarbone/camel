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
    protected $allowableParents = array();

    /** @var array */
    protected $outputAttributeMap = array();

    /** @var array */
    protected $allowableAttributeMap = array();

    /**
     * @param INode|AbstractHump $parent
     * @return $this
     * @throws \InvalidArgumentException
     */
    public function setParent($parent)
    {
        if (!($parent instanceof AbstractHump) && !($parent instanceof INode))
            throw new \InvalidArgumentException('Argument 1 expected to be instance of AbstractHump or INode.');

        if (in_array($parent->nodeName(), $this->getAllowableParents(), true))
        {
            $this->parent = $parent;
            return $this;
        }

        throw new \InvalidArgumentException(sprintf(
            'Node "%s" cannot be added to passed parent "%s".  Valid Parent Nodes: ["%s"].',
            $this->nodeName(),
            $parent->nodeName(),
            implode('", "', $this->getAllowableParents())
        ));
    }

    /**
     * @return array
     */
    public function getAllowableParents()
    {
        return $this->allowableParents;
    }

    /**
     * @return array
     */
    public function getAllowableAttributes()
    {
        return array_values($this->allowableAttributeMap);
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
        if ('' === $name || !isset($this->allowableAttributeMap[$name]))
        {
            throw new \InvalidArgumentException(sprintf(
                'Attribute "%s" does not match any known attribute for node "%s".' .
                '  Available Attributes: ["%s"]',
                $name,
                $this->nodeName(),
                implode('", "', $this->getAllowableAttributes())
            ));
        }

        $this->outputAttributeMap[$this->allowableAttributeMap[$name]] = $value;

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
            /*
             * I would much prefer to throw an exception here, however: https://bugs.php.net/bug.php?id=53648
             *
             * As a result, a warning is the best I can do currently.
             */

            $min = $this->minimumChildren();

            if ($min > 0 && ($count = count($this->children())) < $min)
            {
                $msg = sprintf('Node "%s" must have at least "%d" children, only "%d" seen.  Current node definition: "%s"',
                    $this->nodeName(),
                    $min,
                    $count,
                    $xml);
                trigger_error($msg, E_USER_NOTICE);
                return '';
            }

            foreach($this->children() as $node)
            {
                /** @var \DCarbone\Camel\Node\INode $node */
                $xml .= (string)$node;
            }
        }

        return $xml."</{$nodeName}>\n";
    }
}