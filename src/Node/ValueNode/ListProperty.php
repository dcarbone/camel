<?php namespace DCarbone\Camel\Node\ValueNode;

/**
 * Class ListProperty
 * @package DCarbone\Camel\Node
 *
 * http://msdn.microsoft.com/en-us/library/office/ff625786(v=office.15).aspx
 */
class ListProperty extends AbstractValueNode
{
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->allowableAttributeMap = array(
            'autohyperlink' => 'AutoHyperLink',
            'autohyperlinknoencoding' => 'AutoHyperLinkNoEncoding',
            'autonewline' => 'AutoNewLine',
            'default' => 'Default',
            'expandxml' => 'ExpandXML',
            'htmlencode' => 'HTMLEncode',
            'select' => 'Select',
            'stripws' => 'StripWS',
            'urlencode' => 'URLEncode',
            'urlencodeasurl' => 'URLEncodeAsURL',
        );

        $this->allowableParents = array('Value');
    }

    /**
     * @return string
     */
    public function nodeName()
    {
        return 'ListProperty';
    }
}