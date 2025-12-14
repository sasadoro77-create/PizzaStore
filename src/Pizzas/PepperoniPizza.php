<?php

declare(strict_types=1);

namespace PizzaStore\Pizzas;

use PizzaStore\Pizza;

class PepperoniPizza extends Pizza
{
    public function __construct()
    {
        $this->name = 'Пепперони';
        $this->sauce = 'томатный';
        $this->toppings = ['пепперони', 'моцарелла', 'орегано'];
    }
}