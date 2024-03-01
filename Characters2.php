<?php

abstract class Weapon
{
    protected string $weaponName;
    protected const BASEDAMAGE = 1;
    protected int $damage;

    public function __construct(string $weaponName)
    {
        $this->weaponName = $weaponName;
    }

    public function getWeaponName(): string
    {
        return $this->weaponName;
    }

    public function getDamage(): int
    {
        return $this->damage;
    }

    abstract public function calculateDamage(): void;
}

class Bow extends Weapon
{
    public function __construct(string $weaponName)
    {
        parent::__construct($weaponName);
        $this->calculateDamage();
    }

    public function calculateDamage(): void
    {
        $this->damage = parent::BASEDAMAGE * 180;
    }
}

class Crossbow extends Weapon
{
    public function __construct(string $weaponName)
    {
        parent::__construct($weaponName);
        $this->calculateDamage();
    }

    public function calculateDamage(): void
    {
        $this->damage = parent::BASEDAMAGE * 270;
    }
}

class Magic_staff extends Weapon
{
    public function __construct(string $weaponName)
    {
        parent::__construct($weaponName);
        $this->calculateDamage();
    }

    public function calculateDamage(): void
    {
    $this->damage = parent::BASEDAMAGE * 750;
    }
}

class Sword extends Weapon
{
    public function __construct(string $weaponName)
    {
        parent::__construct($weaponName);
        $this->calculateDamage();
    }

    public function calculateDamage(): void
    {
        $this->damage = parent::BASEDAMAGE * 480;
    }
}

class Pistol extends Weapon
{
    public function __construct(string $weaponName)
    {
        parent::__construct($weaponName);
        $this->calculateDamage();
    }

    public function calculateDamage(): void
    {
        $this->damage = parent::BASEDAMAGE * 370;
    }
}

abstract class Character
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
        $this->setWeapon($weapon);
    }

    public function getCharacterName(): string
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

    public function setWeapon(Weapon $weapon): void
    {
        $this->weapon = $weapon;
    }

    public function getInfoWeapon(): string
    {
        return "Weapon: {$this->weapon->getWeaponName()} | Damage: {$this->weapon->getDamage()}" . PHP_EOL;
    }

    abstract public function sayOnWin(): string;

    abstract public function sayOnLose(): string;

    public function say(): string
    {
        $phrases = [
            "I'll crush you!",
            "Prepare to meet your end!",
            "You don't stand a chance against me!"
        ];
        return $phrases[array_rand($phrases)];
    }
}

class Bowman extends Character
{
    public function __construct(float|int $Endurance, float|int $Health, string $characterName, Weapon $weapon)
    {
        parent::__construct($Endurance, $Health, $characterName, $weapon);
    }

    public function sayOnWin(): string
    {
        $phrases = [
            "Victory is mine!",
            "Another one bites the dust!",
            "Bowman reigns supreme!"
        ];
        return $phrases[array_rand($phrases)];
    }

    public function sayOnLose(): string
    {
        $phrases = [
            "I'll get you next time!",
            "This isn't over!",
            "Retreat for now..."
        ];
        return $phrases[array_rand($phrases)];
    }
}

class Magician extends Character
{
    public function __construct(float|int $Endurance, float|int $Health, string $characterName, Weapon $weapon)
    {
        parent::__construct($Endurance, $Health, $characterName, $weapon);
    }

    public function sayOnWin(): string
    {
        $phrases = [
            "You were no match for my magic!",
            "Behold the power of the arcane!",
            "Another victory for the Magician!"
        ];
        return $phrases[array_rand($phrases)];
    }

    public function sayOnLose(): string
    {
        $phrases = [
            "My powers failed me...",
            "I underestimated you...",
            "I'll need to train harder..."
        ];
        return $phrases[array_rand($phrases)];
    }
}

class Warrior extends Character
{
    public function say(): string
    {
        $phrases = [
            "For honor and glory!",
            "I will defend the realm!",
            "None shall pass!"
        ];
        return $phrases[array_rand($phrases)];
    }

    public function sayOnWin(): string
    {
        $phrases = [
            "Victory is ours!",
            "We have triumphed!",
            "The enemy has been vanquished!"
        ];
        return $phrases[array_rand($phrases)];
    }

    public function sayOnLose(): string
    {
        $phrases = [
            "Defeated, but not broken!",
            "We will rise again!",
            "The fight is not over yet!"
        ];
        return $phrases[array_rand($phrases)];
    }
}


$crossbow = new Crossbow('Crossbow', 270);
$magicStaff = new Magic_staff('Magic Staff', 750);
$sword = new Sword('Sword', 480);
$pistol = new Pistol('Pistol', 370);

$Magician = new Magician(2700, 3000, 'Magician', $magicStaff);
$Warrior = new Warrior(1900, 2400, 'Warrior', $sword);
$Bowman = new Bowman(1000, 1300, 'Bowman', $crossbow);

// Виведення інформації про персонажів
echo $Magician->getCharacterName() . ' | ' . $Magician->getHealth() . ' | ' . $Magician->getEndurance() . ' | ' . $Magician->getInfoWeapon() . ' | ' . PHP_EOL;
echo $Magician->say() . ' | ' . $Magician->sayOnWin() . ' | ' . $Magician->sayOnLose() . ' | ' . PHP_EOL;

echo $Warrior->getCharacterName() . ' | ' . $Warrior->getHealth() . ' | ' . $Warrior->getEndurance() . ' | ' . $Warrior->getInfoWeapon() . ' | ' . PHP_EOL;
echo $Warrior->say() . ' | ' . $Warrior->sayOnWin() . ' | ' . $Warrior->sayOnLose() . ' | ' . PHP_EOL;

echo $Bowman->getCharacterName() . ' | ' . $Bowman->getHealth() . ' | ' . $Bowman->getEndurance() . ' | ' . $Bowman->getInfoWeapon() . ' | ' . PHP_EOL;
echo $Bowman->say() . ' | ' . $Bowman->sayOnWin() . ' | ' . $Bowman->sayOnLose() . ' | ' . PHP_EOL;