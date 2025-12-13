<?php

declare(strict_types=1);

namespace Pizza;

/**
 * Конкретная реализация магазина с большим выбором пицц
 */
class MyPizzaStore extends PizzaStore
{
    /**
     * Создание пиццы
     *
     * @param string $type Тип пиццы
     * @return Pizza Созданная пицца
     */
    protected function createPizza(string $type): Pizza
    {
        return match ($type) {
            'margherita' => new MargheritaPizza(),
            'pepperoni' => new PepperoniPizza(),
            'carbonara' => new CarbonaraPizza(),
           
          
            default => throw new \InvalidArgumentException("Неизвестный тип пиццы: {$type}"),
        };
    }
    
    /**
     * Получить меню доступных пицц
     *
     * @return array<string, string>
     */
    public function getMenu(): array
    {
        return [
            'margherita' => 'Маргарита',
            'pepperoni' => 'Пепперони',
            'carbonara' => 'Карбонара',
            
           
        ];
    }
}