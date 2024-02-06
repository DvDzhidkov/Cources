<?php
class DataStorage
{
    public $intArray = [];
    private $strArray = [];

    public function  add($value)
    {
        $dataType = gettype($value);
        if($dataType == 'integer'){
            $this->intArray[] = $value;
        } elseif ($dataType == 'string'){
            $this->strArray[] = $value;
        } else echo "Bad value";
    }
    public function getInt_byStack(): int
    {
        return array_shift($this->intArray);
    }
    public function getInt_byQueve(): int
    {
        return array_pop($this->intArray);
    }
    public function getStr_byStack(): string
    {
        return array_shift($this->strArray);
    }
    public function getStr_byQueve(): string
    {
        return array_pop($this->strArray);
    }
    public function isEmpty()
    {
        return $this->count() === 0;
    }
    public function count()
    {
        return count($this->intArray).PHP_EOL;
        return count($this->strArray).PHP_EOL;
    }
    public function destroy()
    {
        $this->intArray = [];
        $this->strArray = [];
    }
}

$result = new DataStorage();
for($i = 1; $i <= 25; $i++) {
    $result->add($i);
}
//
echo $result->getInt_byQueve().PHP_EOL;
echo $result->getInt_byStack().PHP_EOL;
$result->add("fuhwiekjfn");
$result->add('sdfgrgfdrgf');
$result->add('asaszxcdfbdgh');
$result->add('afqefw');
$result->add('kllkdkln');
$result->add(122);
$result->add(123);
$result->add(124);
$result->add(125);
$result->add(12.7);
var_dump($result);
$result->getStr_byQueve();
$result->getStr_byStack();
var_dump($result);
$result->destroy();