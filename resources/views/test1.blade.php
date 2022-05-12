<?php

$a = 10;
$b = '10';
$c = 0;
$d = 0;

if ($a === $b) {
    echo $a . ' they r full equal, so their types r similar <br>';
} else if ($a == $b) {
    echo $a . $b . ' they r equal by value, 
    but their types may be different <br>';
} //else ($a !== $b)
else {
    $b = 20;
    echo '<br>';
    echo $a . $b . '<br>';
}

var_dump($a + $b);

echo '<br>' . ($a + $b);
echo '<br><br><br>';
$arr = array(4, 3, 2, 5, 7);

foreach ($arr as $item) {
    echo '<br>' . $item;
    echo '<br>' . $c += $item;

}

echo '<br><br><br>';
$arr_size = count($arr);
for ($i = 0; $i < $arr_size; $i++) {
    echo '<br>' . $arr[$i];
    echo '<br>' . $d += $arr[$i];
}

if ($c === $d) {
    echo '<br>it works correct, u r awesome';
}

echo '<br><br><br>';

$mobiles = [
    'Iphone 13 Pro' => '1500$',
    'Samsung S22 Plus' => '1200$',
    'Xiaomi Note 10' => '600$',
    'Ayya' => "0$"
];

foreach ($mobiles as $mobile => $price) {
    echo "$mobile costs $price<br>";
}

class Singleton
{
    private static $instances = null;

    private function __construct()
    {
    }

    public function __clone()
    {
    }

    static public function getInstance()
    {
        if (is_null(self::$instances)) {
            self::$instances = new static();
        }

        return self::$instances;
    }

}

$single = Singleton::getInstance();
$singlet = Singleton::getInstance();
if ($single === $singlet)
{
    echo "<br>It's same instance<br>";
}
else
{
    echo "<br>It's not same instances<br>";
}

class Person
{
    private $name;
    private $surname;

    public function __construct($name, $surname)
    {
        $this->name = $name;
        $this->surname = $surname;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getSurname()
    {
        return $this->surname;
    }

    public function setSurname($surname)
    {
        $this->surname = $surname;
    }
}

class Student extends Person
{
    private $group;
    private $university;

    public function __construct($group, $university)
    {
        parent::__construct($this->getName(), $this->getSurname());
        $this->group = $group;
        $this->university = $university;
    }

    public function setUniversity($university)
    {
        $this->university = $university;
    }

    public function getUniversity()
    {
        return $this->university;
    }

    public function getGroup()
    {
        return $this->group;
    }

    public function setGroup($group)
    {
        $this->group = $group;
    }
}

$s= new Person('Andrew', 'Giant');
echo $s->getSurname();








