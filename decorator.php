<?php



// =====
interface Component
{
    public function operation();
}



// =====
class ConComponent implements Component
{
    public function operation()
    {
        // действие
        return "Первый текст";
    }
}

// =====
abstract class Decorator implements Component
{
    protected $component;

    public function __construct(Component $component)
    {
        $this->component = $component;
    }

    public function operation()
    {
        return $this->component->operation();
    }
}


// =====
class ConDecorator extends Decorator
{
    public function operation()
    {
        
        $result = "Полный текст:";
        
        $result .= parent::operation();

        $result .= "второй текст";

        return $result;
    }
}


// =====
$component = new ConComponent();
$decorator = new ConDecorator($component);
$result = $decorator->operation();