<?php namespace DCarbone\Camel\Hump;

use DCarbone\Camel\Camel;
use DCarbone\Camel\Node\INode;

/**
 * Class Where
 * @package DCarbone\Camel\Hump
 *
 * http://msdn.microsoft.com/en-us/library/office/ms414805(v=office.15).aspx
 */
class Where extends AbstractHump
{
    /** @var INode */
    protected $rootNode;

    /** @var array */
    protected $nodeClassMap = array();

    /**
     * Constructor
     *
     * @param Camel $camel
     */
    public function __construct(Camel $camel)
    {
        parent::__construct($camel);

        $this->validChildren = array(
            'or'                => 'Or',
            'and'               => 'And',
            'beginswith'        => 'BeginsWith',
            'contains'          => 'Contains',
            'daterangesoverlap' => 'DateRangesOverlap',
            'eq'                => 'Eq',
            'geq'               => 'Geq',
            'gt'                => 'Gt',
            'in'                => 'In',
            'isnotnull'         => 'IsNotNull',
            'isnull'            => 'IsNull',
            'includes'          => 'Includes',
            'leq'               => 'Leq',
            'lt'                => 'Lt',
            'membership'        => 'Membership',
            'neq'               => 'Neq',
            'notincludes'       => 'NotIncludes',
        );
        
        $this->nodeClassMap = array(
            'Or'                => '\\DCarbone\\Camel\\Node\\LogicalJoin\\OrNode',
            'And'               => '\\DCarbone\\Camel\\Node\\LogicalJoin\\AndNode',
            'BeginsWith'        => '\\DCarbone\\Camel\\Node\\ComparisonOperator\\BeginsWith',
            'Contains'          => '\\DCarbone\\Camel\\Node\\ComparisonOperator\\Contains',
            'DateRangesOverlap' => '\\DCarbone\\Camel\\Node\\ComparisonOperator\\DateRangesOverlap',
            'Eq'                => '\\DCarbone\\Camel\\Node\\ComparisonOperator\\Eq',
            'Geq'               => '\\DCarbone\\Camel\\Node\\ComparisonOperator\\Geq',
            'Gt'                => '\\DCarbone\\Camel\\Node\\ComparisonOperator\\Gt',
            'In'                => '\\DCarbone\\Camel\\Node\\ComparisonOperator\\In',
            'IsNotNull'         => '\\DCarbone\\Camel\\Node\\ComparisonOperator\\IsNotNull',
            'IsNull'            => '\\DCarbone\\Camel\\Node\\ComparisonOperator\\IsNull',
            'Includes'          => '\\DCarbone\\Camel\\Node\\ComparisonOperator\\Includes',
            'Leq'               => '\\DCarbone\\Camel\\Node\\ComparisonOperator\\Leq',
            'Lt'                => '\\DCarbone\\Camel\\Node\\ComparisonOperator\\Lt',
            'Membership'        => '\\DCarbone\\Camel\\Node\\ComparisonOperator\\Membership',
            'Neq'               => '\\DCarbone\\Camel\\Node\\ComparisonOperator\\Neq',
            'NotIncludes'       => '\\DCarbone\\Camel\\Node\\ComparisonOperator\\NotIncludes',
        );
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
            throw new \LogicException('"Where" nodes can only have a single immediate child element.  Current child name: '.
                $this->rootNode->nodeName().'".  Cannot add "' . $nodeName . '" as a 2nd immediate child.');

        $nodeName = strtolower(trim($nodeName));

        if (isset($this->validChildren[$nodeName]))
        {
            $class = $this->nodeClassMap[$this->validChildren[$nodeName]];

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
     * @return \DCarbone\Camel\Node\LogicalJoin\OrNode
     */
    public function orNode()
    {
        return $this->root('or');
    }

    /**
     * @return \DCarbone\Camel\Node\ComparisonOperator\BeginsWith
     */
    public function beginsWith()
    {
        return $this->root('beginswith');
    }

    /**
     * @return \DCarbone\Camel\Node\ComparisonOperator\Contains
     */
    public function contains()
    {
        return $this->root('contains');
    }

    /**
     * @return \DCarbone\Camel\Node\ComparisonOperator\DateRangesOverlap
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
     * @return \DCarbone\Camel\Node\ComparisonOperator\Geq
     */
    public function geq()
    {
        return $this->root('geq');
    }

    /**
     * @return \DCarbone\Camel\Node\ComparisonOperator\Gt
     */
    public function gt()
    {
        return $this->root('gt');
    }

    /**
     * @return \DCarbone\Camel\Node\ComparisonOperator\In
     */
    public function in()
    {
        return $this->root('in');
    }

    /**
     * @return \DCarbone\Camel\Node\ComparisonOperator\Includes
     */
    public function includes()
    {
        return $this->root('includes');
    }

    /**
     * @return \DCarbone\Camel\Node\ComparisonOperator\IsNotNull
     */
    public function isNotNull()
    {
        return $this->root('isnotnull');
    }

    /**
     * @return \DCarbone\Camel\Node\ComparisonOperator\IsNull
     */
    public function isNull()
    {
        return $this->root('isnull');
    }

    /**
     * @return \DCarbone\Camel\Node\ComparisonOperator\Leq
     */
    public function leq()
    {
        return $this->root('leq');
    }

    /**
     * @return \DCarbone\Camel\Node\ComparisonOperator\Lt
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
     * @return \DCarbone\Camel\Node\ComparisonOperator\Neq
     */
    public function neq()
    {
        return $this->root('neq');
    }

    /**
     * @return \DCarbone\Camel\Node\ComparisonOperator\NotIncludes
     */
    public function notIncludes()
    {
        return $this->root('notincludes');
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