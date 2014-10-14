<?php namespace DCarbone\Camel\Node;

/**
 * Class AbstractOperatorNode
 * @package DCarbone\Camel\Node
 */
abstract class AbstractOperatorNode extends AbstractParentNode
{
    /**
     * @param INode $node
     * @throws \LogicException
     * @return $this
     */
    public function append(INode $node)
    {
        if (count($this->children) >= 2)
            throw new \LogicException('Operator Nodes cannot have more than 2 children.');

        return parent::append($node);
    }
}