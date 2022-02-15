<?php
abstract class Djevojka
{
    public $karakteristika1;
    public $karakteristika2;
    public $karakteristika3;

    function __construct($k1, $k2, $k3)
    {
        $this->karakteristika1 = $k1;
        $this->karakteristika2 = $k2;
        $this->karakteristika3 = $k3;
    }

    abstract function lakiranjeNoktiju(): string;
}

class Selo extends Djevojka
{
    function __construct($k1, $k2, $k3)
    {
        $k1 = "pre" . $k1;
        $k2 = "manje" . $k2;
        parent::__construct($k1, $k2, $k3);
    }

    function lakiranjeNoktiju(): string
    {
        return "Ne zanima me!";
    }
}

class Grad extends Djevojka
{
    function __construct($k1, $k2, $k3)
    {
        $k2 = "pre" . $k2;
        $k3 = "manje" . $k3;
        parent::__construct($k1, $k2, $k3);
    }

    function lakiranjeNoktiju(): string
    {
        return "To mi je jako zanimljivo!";
    }
}


$sara = new Selo("Pametna", "Snalažljiva", "Lijepa");
$larisa = new Grad("Pametna", "Snalažljiva", "Lijepa");
echo "Sara sa sela: " . $sara->karakteristika1 . " " . $sara->karakteristika2 . " " . $sara->karakteristika3;
echo "<br/>";
echo "Larisa iz grada: " . $larisa->karakteristika1 . " " . $larisa->karakteristika2 . " " . $larisa->karakteristika3;
