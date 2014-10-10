camel
=====

A library designed to help facilitate SharePoint CAML query construction

**Build Status**
- master: [![Build Status](https://travis-ci.org/dcarbone/camel.svg?branch=master)](https://travis-ci.org/dcarbone/camel)
- 0.2.*: [![Build Status](https://travis-ci.org/dcarbone/camel.svg?tag=0.2.0)](https://travis-ci.org/dcarbone/camel)

## Inclusion in your Composer application

```json
"require" : {
    "dcarbone/camel" : "0.2.*"
}
```

## Basic Concept

This library is an attempt to allow an object oriented approach to the creation of SOAP queries, specifically targeted at
SharePoint's SOAP services and CAML query language (hence the name).

## Basic Usage

```php
$camel = Camel::init('GetListItems');

$camel
    ->addHump(
        Hump::init('listName', 'My List Name', array())
    )
    ->addHump(
        Hump::init('rowLimit', '1', array())
    )
    ->addHump(
        Hump::init('query')
            ->addSubHump(
                Hump::init('Query', '', array('xmlns' => ''), true)
                ->addSubHump(
                    Hump::init('Where')
                        ->addSubHump(
                            Hump::init('Eq', '<FieldRef Name="ColumnName" /><Value Type="Text">Column Value</Value>')
                        )
                )
                ->addSubHump(
                    Hump::init('OrderBy')
                ))
    );
```

This can then be utilized in one of the following ways:

### As XML String
```php
$xml = (string)$camel;
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
