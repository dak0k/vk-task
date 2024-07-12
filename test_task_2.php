<?php

abstract class Animal {
  protected string $name;

  public function __construct($name) {
    $this->name = $name;
  }

  abstract public function makeSound(): string;

  public function getName(): string {
    return $this->name;
  }
}

class Dog extends Animal {
  protected string $breed;
  protected string $locale;

  public function __construct(string $name, string $locale = 'en') {
    parent::__construct($name);
    $this->locale = $locale;
    $this->setBreed();
  }

  public function makeSound(): string {
    return $this->locale === 'en' ? 'Woof' : 'Гав';
  }

  protected function setBreed(): void
  {
    $breeds = [
        'ru' => 'Лабрадор',
        'en' => 'Labrador'
    ];
    $this->breed = $breeds[$this->locale];
  }

  public function getBreed(): string {
    return $this->breed;
  }
}

class Cat extends Animal {
  protected string $locale;

  public function __construct(string $name, string $locale = 'en') {
    parent::__construct($name);
    $this->locale = $locale;
  }

  public function makeSound(): string {
    return $this->locale === 'en' ? 'Meow': 'Мяу';
  }

  public function getType(): string {
    return $this->locale === 'en' ? 'Cat' : 'Кошка';
  }
}

//$rex = new Dog("Rex", "Labrador");
//$stooped = new Dog("Stooped");
//$murka = new Cat("Murka");
//
//echo "Dog " . $rex->getName() . " says " . $rex->sound() . "\n";
//echo "Dog " . $rex->getName() . " says " . $rex->sound() . "\n";
//echo "Cat " . $murka->getName() . " says " . $murka->sound() . "\n";

// Ожидаемый результат работы программы
// Labrador Rex says Woof
// Dog Stooped says Woof
// Cat Murka says Meow
?>
