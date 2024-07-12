<?php

// Доработайте код из test_task_2.php так, чтобы он мог выполняться на сайте с возможностью выбора языка отображения
// Для простоты считаем, что имя животного может быть на любом языке, при этом порода собаки только на выбранном языке
// Пример псевдо-кода такого сайта:

require_once('./test_task_2.php');

class ConfigReader {
    public const LOCALE_RU = 'ru';
    public const LOCALE_EN = 'en';
}

class Controller {
    protected string $locale;

    public function __construct(string $locale) {
        $this->locale = $locale;
    }

    public function index(): void
    {
        $rex = new Dog('Rex', $this->locale);
        $murka = new Cat('Мурка', $this->locale);

        $this->showLine($rex);
        $this->showLine($murka);
    }

    public function showLine(Animal $animal): void
    {
        if ($animal instanceof Dog) {
            echo $animal->getBreed() . " " . $animal->getName() . " " . $this->getSpeakVerb() . " " . $animal->makeSound() . "<br>";
        } elseif ($animal instanceof Cat) {
            echo $animal->getType() . " " . $animal->getName() . " " . $this->getSpeakVerb() . " " . $animal->makeSound() . "<br>";
        }
    }

    protected function getSpeakVerb(): string {
        return $this->locale === 'en' ? 'says' : 'говорит';
    }
}

$controller = new Controller(ConfigReader::LOCALE_RU);
$controller->index();

$controller_en = new Controller(ConfigReader::LOCALE_EN);
$controller_en->index();


// Ожидаемый результат работы программы
// Лабрадор Rex говорит Гав
// Кошка Мурка говорит Мяу
// Labrador Rex says Woof
// Cat Мурка says Meow
