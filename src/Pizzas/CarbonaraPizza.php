<?php

declare(strict_types=1);

namespace PizzaStore\Pizzas;

use PizzaStore\Pizza;

class CarbonaraPizza extends Pizza
{
    public function __construct()
    {
        $this->name = 'Карбонара';
        $this->sauce = 'сливочный';
        $this->toppings = ['бекон', 'яйца', 'пармезан', 'лук'];
    }
}