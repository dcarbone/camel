camel
=====

A library designed to help facilitate SharePoint CAML query construction

**Build Status**
- master: [![Build Status](https://travis-ci.org/dcarbone/camel.svg?branch=master)](https://travis-ci.org/dcarbone/camel)
- 0.2.*: [![Build Status](https://travis-ci.org/dcarbone/camel.svg?branch=0.2.0)](https://travis-ci.org/dcarbone/camel)

## Inclusion in your Composer application

```json
"require" : {
    "dcarbone/camel" : "0.2.*"
}

## Basic Concept

This library is an attempt to allow an object oriented approach to the creation of SOAP queries, specifically targeted at
SharePoint's SOAP services and CAML query language (hence the name).

## Basic Usage

```php
$camel = new \DCarbone\Camel\Camel('GetListItems');

$camel
    ->addHump(
        $camel->newHump('listName', 'My List Name', array())
    )
    ->addHump(
        $camel->newHump('rowLimit', '1', array())
    )
    ->addHump(
        $camel
            ->newHump('query')
            ->addSubHump($camel
                ->newHump('Query', '', array('xmlns' => ''), true)
                ->addSubHump(
                    $camel->newHump('Where')
                        ->addSubHump(
                            $camel->newHump('Eq', '<FieldRef Name="ColumnName" /><Value Type="Text">Column Value</Value>')
                        )
                )
                ->addSubHump(
                    $camel->newHump('OrderBy')
                ))
    );
```

This can then be utilized in one of the following ways:

### As XML
```php
$xml = $camel->getAsXML();
```

### As [\SimpleXMLElement](http://php.net/manual/en/class.simplexmlelement.php)
```php
$sxe = $camel->sxe;
```

### As [\SOAPClient](http://php.net/manual/en/class.soapclient.php) Argument Array
```php
$array = $camel->toSoapClientArgumentArray()
```

More documentation forthcoming.