<?php namespace DCarbone\Camel\Node;

/**
 * Class ListProperty
 * @package DCarbone\Camel\Node
 */
class ListProperty extends AbstractNode
{
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->validAttributeMap = array(
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

        $this->validParents = array('Value');
    }

    /**
     * @return string
     */
    public function nodeName()
    {
        return 'ListProperty';
    }
}