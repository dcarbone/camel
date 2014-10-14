<?php namespace DCarbone\Camel\Part;

use DCarbone\Camel\Camel;
use DCarbone\Camel\Node\INode;

/**
 * Class Where
 * @package DCarbone\Camel\Part
 */
class Where extends AbstractPart
{
    /** @var INode */
    protected $rootNode;

    /** @var string */
    protected $nodeNamespace;

    /**
     * Constructor
     *
     * @param Camel $camel
     */
    public function __construct(Camel $camel)
    {
        parent::__construct($camel);

        $this->validChildren = array(
            'and' => 'And',
            'beginswith' => 'BeginsWith',
            'contains' => 'Contains',
            'daterangesoverlap' => 'DateRangesOverlap',
            'eq' => 'Eq',
            'geq' => 'Geq',
            'gt' => 'Gt',
            'in' => 'In',
            'isnotnull' => 'IsNotNull',
            'isnull' => 'IsNull',
            'leq' => 'Leq',
            'lt' => 'Lt',
            'membership' => 'Membership',
            'neq' => 'Neq',
            'notincludes' => 'NotIncludes',
            'or' => 'Or',
        );

        $this->nodeNamespace = preg_replace('\\Part', '\\Node', __NAMESPACE__);
    }

    /**
     * @param string $nodeName
     * @return INode
     * @throws \LogicException
     * @throws \InvalidArgumentException
     */
    public function root($nodeName)
    {
        if (!is_string($nodeName))
            throw new \InvalidArgumentException('Argument 1 expected to be string, '.gettype($nodeName).' seen.');

        if (isset($this->rootNode))
            throw new \LogicException('"Where" nodes can only have a single immediate child element, cannot add "'.$nodeName.'" as a 2nd immediate child.');

        $nodeName = strtolower(trim($nodeName));

        if (isset($this->validChildren[$nodeName]))
        {
            $class = $this->nodeNamespace.'\\'.$this->validChildren[$nodeName];

            $this->rootNode = new $class;
            $this->rootNode->setParent($this);

            return $this->rootNode;
        }

        throw new \InvalidArgumentException('The node "'.$nodeName.'" does not map to a known node type.');
    }

    /**
     * @return \DCarbone\Camel\Node\Eq
     */
    public function eq()
    {
        return $this->root('eq');
    }

    /**
     * @return array
     */
    public function getValidChildren()
    {
        return array_values($this->validChildren);
    }

    /**
     * @return string
     */
    public function nodeName()
    {
        return 'Where';
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return "<Where>\n".(string)$this->rootNode."</Where>\n";
    }
}