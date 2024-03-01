<?php

class Weapon
{
    protected string $weaponName;
    protected const Damage = 1;
    public function __construct(string $weaponName)
    {
        $this->weaponName = $weaponName;
    }


    public function getWeaponName(): string
    {
        return $this->weaponName;
    }
    public function getDamage(): int|float
    {
        return static::Damage;
    }
}

class Character
{
    protected string $characterName;
    protected int|float $Endurance;
    protected int|float $Health;
    protected Weapon $weapon;

    public function __construct(float|int $Endurance, float|int $Health, string $characterName, Weapon $weapon)
    {
        $this->characterName = $characterName;
        $this->Endurance = $Endurance;
        $this->Health = $Health;
        $this->weapon = $weapon;
    }

    public function getCharacterName():string
    {
        return $this->characterName;
    }
    public function getHealth(): int|float
    {
        return $this->Health;
    }
    public function getEndurance(): int|float
    {
        return $this->Endurance;
    }
    public function getInfoWeapon()
    {
        $WeaponName = $this->weapon->getWeaponName();
        $Damage = $this->weapon->getDamage();
        return "Weapon: $WeaponName | Damage: $Damage".PHP_EOL;
    }

}


class Bow extends Weapon
{
    protected const Damage = 180;
    public function getWeaponName(): string
    {
        return $this->weaponName;
    }
}
class Crossbow extends Weapon
{
    protected const Damage = 270;
    public function getWeaponName(): string
    {
        return $this->weaponName;
    }
}
class Magic_staff extends Weapon
{
    protected const Damage = 750;
    public function getWeaponName(): string
    {
        return $this->weaponName;
    }
}
class Sword extends Weapon
{
    protected const Damage = 480;
    public function getWeaponName(): string
    {
        return $this->weaponName;
    }
}
class Pistol extends Weapon
{
    protected const Damage = 370;
    public function getWeaponName(): string
    {
        return $this->weaponName;
    }
}

//Типу вирішив зробити про всяк випадок ще і персонажів як окремі класи.
// Але воно на мою думку не практично.
// Аби що тільки якщо буде багато магів і їх видів, воїнів та лучників.

/*class Magician extends Character
{
    protected Weapon $weapon;

    public function __construct(int|float $Endurance, int|float $Health, Weapon $weapon)
    {
        parent::__construct($Endurance, $Health);
        $this->weapon = $weapon;
    }
}
class Warrior extends Character
{
    protected Weapon $weapon;

    public function __construct(int|float $Endurance, int|float $Health, Weapon $weapon)
    {
        parent::__construct($Endurance, $Health);
        $this->weapon = $weapon;
    }
}
class Bowman extends Character
{
    protected Weapon $weapon;

    public function __construct(int|float $Endurance, int|float $Health, Weapon $weapon)
    {
        parent::__construct($Endurance, $Health);
        $this->weapon = $weapon;
    }
}*/

$bow = new Bow('Bow');
$crossbow = new Crossbow('Crossbow');
$magic_staff = new Magic_staff('Magic Staff');
$sword = new Sword('Sword');
$pistol = new Pistol('Pistol');

$Bowman = new Character(1000, 1300, 'Bowman', $bow);
$Magician = new Character(2700, 3000, 'Magician', $magic_staff);
$Warrior = new Character(1900, 2400, 'Bowman', $sword);

echo $Warrior->getCharacterName(). ' | ' . $Warrior->getHealth() . ' | ' . $Warrior->getEndurance() . ' | ' .  $Warrior->getInfoWeapon(). ' | '. PHP_EOL;
echo $Magician->getCharacterName(). ' | ' . $Magician->getHealth() . ' | ' . $Magician->getEndurance() . ' | ' .  $Magician->getInfoWeapon(). ' | '. PHP_EOL;
echo $Bowman->getCharacterName(). ' | ' . $Bowman->getHealth() . ' | ' . $Bowman->getEndurance() . ' | ' .  $Bowman->getInfoWeapon(). ' | '. PHP_EOL;
