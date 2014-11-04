<?php namespace DCarbone\Camel\Node;

/**
 * Interface INode
 * @package DCarbone\Camel\Node
 */
interface INode
{
    /**
     * @return string
     */
    public function nodeName();

    /**
     * @param mixed $parent
     * @return $this
     */
    public function setParent($parent);

    /**
     * @return array
     */
    public function getValidParents();

    /**
     * @return array
     */
    public function getValidAttributes();

    /**
     * @param $name
     * @param string $value
     * @return $this
     */
    public function attribute($name, $value);

    /**
     * @return mixed
     */
    public function end();
}
