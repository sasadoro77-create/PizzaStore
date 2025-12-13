<?php

echo "=== ПРИЛОЖЕНИЕ PIZZA STORE ===\n\n";

// 1. Подключаем библиотеку Pizza
$pizzaPath = __DIR__ . '/../PizzaProject/src';

if (!is_dir($pizzaPath)) {
    die(" Ошибка: Библиотека PizzaProject не найдена: $pizzaPath\n");
}

echo "Загружаем библиотеку PizzaProject...\n";

// Основные файлы библиотеки
$files = [
    'Pizza.php',
    'PizzaStore.php',
    'PepperoniPizza.php',
    'MargheritaPizza.php',
    'CarbonaraPizza.php'
];

foreach ($files as $file) {
    $fullPath = $pizzaPath . '/' . $file;
    if (file_exists($fullPath)) {
        require_once $fullPath;
        echo " $file\n";
    } else {
        die(" Файл не найден: $fullPath\n");
    }
}

echo "\n Библиотека загружена\n";

// 2. Проверяем, какие классы загрузились
echo "\nДоступные классы:\n";
foreach (get_declared_classes() as $class) {
    if (strpos($class, 'Pizza') !== false) {
        echo "- $class\n";
    }
}

echo "\n" . str_repeat("=", 50) . "\n";



class MyPizzaStore extends \Pizza\PizzaStore
{
    protected function createPizza(string $type): \Pizza\Pizza
    {
        return match($type) {
            'pepperoni' => new \Pizza\PepperoniPizza(),
            'margherita' => new \Pizza\MargheritaPizza(),
            'carbonara' => new \Pizza\CarbonaraPizza(),
            default => throw new InvalidArgumentException("Неизвестный тип: $type")
        };
    }
}

// 4. Тестируем
echo "\n ТЕСТИРУЕМ НАШ МАГАЗИН:\n\n";

try {
    $store = new MyPizzaStore();
    echo "✓ Магазин создан\n\n";
    
    $tests = [
        'pepperoni' => 'Пепперони',
        'margherita' => 'Маргарита',
        'carbonara' => 'Карбонара'
    ];
    
    foreach ($tests as $type => $name) {
        echo "Заказ: $name\n";
        echo str_repeat("-", 30) . "\n";
        $pizza = $store->orderPizza($type);
        echo " Готово: " . $pizza->getName() . "\n\n";
    }
    
    echo str_repeat("=", 50) . "\n";
    echo " ВСЁ РАБОТАЕТ! Магазин готов к работе!\n";
    
} catch (Error $e) {
    echo "\n ОШИБКА: " . $e->getMessage() . "\n";
    echo "   Файл: " . $e->getFile() . "\n";
    echo "   Строка: " . $e->getLine() . "\n";
}