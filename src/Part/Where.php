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
            throw new \InvalidArgumentException('Argument 1 expected to be string, ' . gettype($nodeName) . ' seen.');

        if (isset($this->rootNode))
            throw new \LogicException('"Where" nodes can only have a single immediate child element, cannot add "' . $nodeName . '" as a 2nd immediate child.');

        $nodeName = strtolower(trim($nodeName));

        if (isset($this->validChildren[$nodeName])) {
            $class = $this->nodeNamespace . '\\' . $this->validChildren[$nodeName];

            $this->rootNode = new $class;
            $this->rootNode->setParent($this);

            return $this->rootNode;
        }

        throw new \InvalidArgumentException('The node "' . $nodeName . '" does not map to a known node type.');
    }

    /**
     * @return \DCarbone\Camel\Node\LogicalJoin\AndNode
     */
    public function andNode()
    {
        return $this->root('and');
    }

    /**
     * @return \DCarbone\Camel\Node\ComparisonOperator\BeginsWith
     */
    public function beginsWith()
    {
        return $this->root('beginswith');
    }

    /**
     * @return \DCarbone\Camel\Node\Contains
     */
    public function contains()
    {
        return $this->root('contains');
    }

    /**
     * @return \DCarbone\Camel\Node\DateRangesOverlap
     */
    public function dateRangesOverlap()
    {
        return $this->root('daterangesoverlap');
    }

    /**
     * @return \DCarbone\Camel\Node\ComparisonOperator\Eq
     */
    public function eq()
    {
        return $this->root('eq');
    }

    /**
     * @return \DCarbone\Camel\Node\Geq
     */
    public function geq()
    {
        return $this->root('geq');
    }

    /**
     * @return \DCarbone\Camel\Node\Gt
     */
    public function gt()
    {
        return $this->root('gt');
    }

    /**
     * @return \DCarbone\Camel\Node\In
     */
    public function in()
    {
        return $this->root('in');
    }

    /**
     * @return \DCarbone\Camel\Node\Includes
     */
    public function includes()
    {
        return $this->root('includes');
    }

    /**
     * @return \DCarbone\Camel\Node\IsNotNull
     */
    public function isNotNull()
    {
        return $this->root('isnotnull');
    }

    /**
     * @return \DCarbone\Camel\Node\IsNull
     */
    public function isNull()
    {
        return $this->root('isnull');
    }

    /**
     * @return \DCarbone\Camel\Node\Leq
     */
    public function leq()
    {
        return $this->root('leq');
    }

    /**
     * @return \DCarbone\Camel\Node\Lt
     */
    public function lt()
    {
        return $this->root('lt');
    }

    /**
     * @return \DCarbone\Camel\Node\ComparisonOperator\Membership
     */
    public function membership()
    {
        return $this->root('membership');
    }

    /**
     * @return \DCarbone\Camel\Node\Neq
     */
    public function neq()
    {
        return $this->root('neq');
    }

    /**
     * @return \DCarbone\Camel\Node\NotIncludes
     */
    public function notIncludes()
    {
        return $this->root('notincludes');
    }

    /**
     * @return \DCarbone\Camel\Node\LogicalJoin\OrNode
     */
    public function orNode()
    {
        return $this->root('or');
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