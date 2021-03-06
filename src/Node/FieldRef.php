<?php namespace DCarbone\Camel\Node;

/**
 * Class FieldRef
 * @package DCarbone\Camel\Node
 *
 * http://msdn.microsoft.com/en-us/library/office/ms442728(v=office.15).aspx
 */
class FieldRef extends AbstractNode
{
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->allowableParents = array(
            'BeginsWith',
            'Contains',
            'DateRangesOverlap',
            'Eq',
            'FieldRefs',
            'Geq',
            'GroupBy',
            'Gt',
            'In',
            'Includes',
            'IsNotNull',
            'IsNull',
            'Leq',
            'Lt',
            'Neq',
            'NotIncludes',
            'OrderBy'
        );

        $this->allowableAttributeMap = array(
            'alias' => 'Alias',
            'ascending' => 'Ascending',
            'createurl' => 'CreateURL',
            'displayname' => 'DisplayName',
            'explicit' => 'Explicit',
            'format' => 'Format',
            'id' => 'ID',
            'key' => 'Key',
            'list' => 'List',
            'lookupid' => 'LookupId',
            'name' => 'Name',
            'reftype' => 'RefType',
            'showfield' => 'ShowField',
            'textonly' => 'TextOnly',
            'type' => 'Type',
        );
    }

    /**
     * @return string
     */
    public function nodeName()
    {
        return 'FieldRef';
    }
}