<?php

$weight = null;
$hight = null;
$width = null;
$type = null;

class Animal
{
	function DesccriptionAnimal()
	{
		echo "It is a living being. It works - don't touch it".PHP_EOL;
	}
}

class Lion extends Animal
{
	function Size($hight, $width)
	{
		echo 'I\'m a lion and my hight is'.$hight.' cm. Also I have width (cm) - '.$width.PHP_EOL;
	}

	function PressOnEarth($weight)
	{
		echo 'I am not so heavy. My weight is '.$weight.' kg'.PHP_EOL;
	}
}

class Mamont extends Animal
{
	function Size($hight, $width)
	{
		echo 'I\'m a mamont and my hight is'.$hight.' cm. Also I have width (cm) - '.$width.PHP_EOL;
	}

	function PressOnEarth($weight)
	{
		echo 'I am not so heavy. My weight is '.$weight.' kg'.PHP_EOL;
	}
}

class Monkey extends Animal
{
	function Size($hight, $width)
	{
		echo 'I\'m a monkey and my hight is'.$hight.' cm. Also I have width (cm) - '.$width.PHP_EOL;
	}

	function PressOnEarth($weight)
	{
		echo 'I am not so heavy. My weight is '.$weight.' kg'.PHP_EOL;
	}
}

class Shark extends Animal
{
	function Size($hight, $width)
	{
		echo 'I\'m a shark and my hight is'.$hight.' cm. Also I have width (cm) - '.$width.PHP_EOL;
	}

	function Weight($weight)
	{
		echo 'I am not so heavy. My weight is '.$weight.' kg'.PHP_EOL;
	}

	function Type($type)
	{
		echo "Type: $type";
	}
}

$Animal = new Animal;
$Lion = new Lion ($hight, $width, $weight);
$Mamont = new Mamont ($hight, $width, $weight);
$Monkey = new Monkey ($hight, $width, $weight);
$Shark = new Shark ($hight, $width, $weight, $type);

$Animal->DesccriptionAnimal();
$Lion->Size(140, 220);
$Lion->PressOnEarth(160);
$Mamont->Size(340, 460);
$Mamont->PressOnEarth(3700);
$Monkey->Size(170, 90);
$Monkey->PressOnEarth(96);
$Shark->Size(110, 430);
$Shark->Weight(600);
$Shark->Type('fish');



