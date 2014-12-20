camel
=====

A library designed to help facilitate SharePoint CAML query construction

**Build Status**
- master: [![Build Status](https://travis-ci.org/dcarbone/camel.svg?branch=master)](https://travis-ci.org/dcarbone/camel)

## Install

```json
"require" : {
    "dcarbone/camel" : "0.4.*"
},
```

## Initialization

To begin, simply create a new Camel.

```php
use \DCarbone\Camel\Camel;

$camel = new Camel();
```

## Humps

Once you have created your Camel, you start adding humps!

There are 3 types of humps:

- [Where](https://github.com/dcarbone/camel/tree/master/src/Hump/Where.php)
- [OrderBy](https://github.com/dcarbone/camel/tree/master/src/Hump/OrderBy.php)
- [GroupBy](https://github.com/dcarbone/camel/tree/master/src/Hump/GroupBy.php)

You may add them to your Camel in one of two ways:

```php
// Returns a \DCarbone\Camel\Hump\Where instance that is attached to $camel
$camel->where();

// Alternatively...
$where = new \DCarbone\Camel\Hump\Where();
$camel->setWhere($where);
```

The same applies for all humps, and both are perfectly acceptable ways of going about it.

## Nodes

There are 3 primary types of nodes:

- [ComparisonOperator](https://github.com/dcarbone/camel/tree/master/src/Node/ComparisonOperator)
- [LogicalJoin](https://github.com/dcarbone/camel/tree/master/src/Node/LogicalJoin)
- [ValueNode](https://github.com/dcarbone/camel/tree/master/src/Node/ValueNode)

Here is a quick breakdown of each:

### ComparisonOperator

These will probably be the most commonly used nodes in your Camel.  I believe I have implemented every
possible Comparison Operator supported by the SharePoint CAML query system.  If I missed one, let me know!

### LogicalJoin

There are only two of these:

- [AndNode](https://github.com/dcarbone/camel/tree/master/src/Node/LogicalJoin/AndNode.php)
- [OrNode](https://github.com/dcarbone/camel/tree/master/src/Node/LogicalJoin/OrNode.php)

To keep things DRY, I have most of the logic necessary for these nodes in their base class:

- [AbstractLogicalJoinNode](https://github.com/dcarbone/camel/tree/master/src/Node/AbstractLogicalJoinNode.php)

### ValueNode

These nodes are typically only used inside of the aforementioned ComparisonOperator nodes, and
allow you to compare an input value to a column / etc. in your list.

Each ComparisonOperator has a distinct list of allowable ValueNodes, so check their class definition
to see what they are.

## Simple Example

Lets say you have a SharePoint list that looks somewhat like this:

| Title | Age | Gender | Profession |
| ----- | --- | ------ | ---------- |
| Daniel | 28 | Male | Software Developer |
| Krystal | 29 | Female | Genetics Researcher |
| Elizabeth | 25 | Female | Project Manager |
| David | 59 | Male | Oncologist |
| Beatrice | 22 Female | Med Student |
| Anna | 20 | Female | Retail |

And you want to get all the females back.  You could do something like this:

```php
$camel->where()
    ->eq()
        ->fieldRef()->attribute('name', 'Gender')->end()
        ->value()->attribute('type', 'Text')->nodeValue('female');

$queryXML = (string)$camel;
```

The above would produce the following:

```xml
<Query xmlns="">
  <Where>
    <Eq>
      <FieldRef Name="Gender" />
      <Value Type="Text">female</Value>
    </Eq>
  </Where>
</Query>
```

You can also do logical joins.

```php
$camel->where()
    ->orNode()
        ->eq()
            ->fieldRef()->attribute('name', 'Title')->end()
            ->value()->attribute('type', 'Text')->nodeValue('Daniel')->end()
        ->end()
        ->eq()
            ->fieldRef()->attribute('name', 'Title')->end()
            ->value()->attribute('type', 'Text')->nodeValue('Krystal')->end();
```

The above will produce:

```xml
<Query xmlns="">
  <Where>
    <Or>
      <Eq>
        <FieldRef Name="Title" />
        <Value Type="Text">Daniel</Value>
      </Eq>
      <Eq>
        <FieldRef Name="Title" />
        <Value Type="Text">Krystal</Value>
      </Eq>
    </Or>
  </Where>
</Query>
```

You may also nest to your heart's content.

```php
$camel->where()
    ->orNode()
        ->eq()
            ->fieldRef()->attribute('name', 'Title')->end()
            ->value()->attribute('type', 'Text')->nodeValue('Daniel')->end()
        ->end()
        ->orNode()
            ->eq()
                ->fieldRef()->attribute('name', 'Title')->end()
                ->value()->attribute('type', 'Text')->nodeValue('Elizabeth')->end()
            ->end()
            ->orNode()
                ->eq()
                    ->fieldRef()->attribute('name', 'Title')->end()
                    ->value()->attribute('type', 'Text')->nodeValue('Beatrice')->end()
                ->end()
                ->orNode()
                    ->eq()
                        ->fieldRef()->attribute('name', 'Title')->end()
                        ->value()->attribute('type', 'Text')->nodeValue('Anna')->end()
                    ->end()
                    ->eq()
                        ->fieldRef()->attribute('name', 'Title')->end()
                        ->value()->attribute('type', 'Text')->nodeValue('David');
```

Which produces:

```xml
<Query xmlns="">
  <Where>
    <Or>
      <Eq>
        <FieldRef Name="Title" />
        <Value Type="Text">Daniel</Value>
      </Eq>
      <Or>
        <Eq>
          <FieldRef Name="Title" />
          <Value Type="Text">Elizabeth</Value>
        </Eq>
        <Or>
          <Eq>
            <FieldRef Name="Title" />
            <Value Type="Text">Beatrice</Value>
          </Eq>
          <Or>
            <Eq>
              <FieldRef Name="Title" />
              <Value Type="Text">Anna</Value>
            </Eq>
            <Eq>
              <FieldRef Name="Title" />
              <Value Type="Text">David</Value>
            </Eq>
          </Or>
        </Or>
      </Or>
    </Or>
  </Where>
</Query>
```

## Conclusion and Future Development

At the moment, this library serves my needs.  If you find this library useful and would like to see
something added or changed, please let me know!
