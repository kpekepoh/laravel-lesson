<?php



// =====
interface Builder
{
    public function setValue1($value);
    public function setValue2($value);
    public function getResult();
}


 
// =====
class ConBuilder implements Builder
{
    private $value1;
    private $value2;

    public function setValue1($value)
    {
        $this->value1 = $value;
    }

    public function setValue2($value)
    {
        $this->value2 = $value;
    }

    public function getResult()
    {
        return new myObject($this->value1, $this->value2);
    }
}


// =====
class SomeClass
{
    private $builder;

    public function setBuilder(Builder $builder)
    {
        $this->builder = $builder;
    }

    public function buildObject()
    {
        $this->builder->setValue1('Value 1');
        $this->builder->setValue2('Value 2');

        return $this->builder->getResult();
    }
}

// =====

$builder = new ConBuilder();
$someclass = new SomeClass();
$someclass->setBuilder($builder);

$object = $someclass->buildObject();