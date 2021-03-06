<?php namespace DCarbone\Camel\Node;

/**
 * Interface IParentNode
 * @package DCarbone\Camel\Node
 */
interface IParentNode
{
    /**
     * @return array
     */
    public function children();

    /**
     * @return array
     */
    public function getAllowableChildren();

    /**
     * @param INode $node
     * @return $this
     */
    public function append(INode $node);

    /**
     * @return int
     */
    public function minimumChildren();

    /**
     * @return int
     */
    public function maximumChildren();
}