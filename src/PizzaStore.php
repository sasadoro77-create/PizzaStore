<?php

declare(strict_types=1);

namespace PizzaStore;

abstract class PizzaStore
{
    public function orderPizza(string $type): void
    {
        $pizza = $this->createPizza($type);
        
        if ($pizza === null) {
            echo "Извините, пиццу типа '{$type}' мы не готовим" . PHP_EOL;
            return;
        }
        
        $pizza->prepare();
        $pizza->cut();
    }

    abstract protected function createPizza(string $type): ?Pizza;
}