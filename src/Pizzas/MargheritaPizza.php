<?php

declare(strict_types=1);

namespace PizzaStore\Pizzas;

use PizzaStore\Pizza;

class MargheritaPizza extends Pizza
{
    public function __construct()
    {
        $this->name = 'Маргарита';
        $this->sauce = 'томатный';
        $this->toppings = ['моцарелла', 'помидоры', 'базилик'];
    }
}