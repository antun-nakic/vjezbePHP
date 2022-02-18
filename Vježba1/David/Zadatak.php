<?php

use placanjePravna as GlobalPlacanjePravna;

class Placanje
{
  public $svrha;
  public $IBANprimatelja;

  public static function provjeriIBAN($iban)
  {
    if ($iban !== false) {
      return true;
    } else {
      return false;
    }
  }
}

interface Get2DBarcode
{
  public function generiraj2Dbarcode($objekt);
}

trait placanjeFizicka
{
  public function posloziPodatke($objektPodataka)
  {
    return $objektPodataka;
  }
}

trait placanjePravna
{
  public function manipulirajSpdvOM($objektPodataka)
  {
    return $objektPodataka;
  }
}

class FizickaOsoba extends Placanje implements Get2DBarcode
{
  use placanjeFizicka;

  public $porukaPrimatelju;
  public $datumUplate;
  public function __construct($poruka, $IBAN, $datumUplate)
  {
    $this->porukaPrimatelju = $poruka;
    $this->IBANprimatelja = $IBAN;
    $this->datumUplate = $datumUplate;
  }
  public function generiraj2Dbarcode($objekt)
  {
    return $objekt;
  }

  public function generirajUplatnicu($iznos)
  {
    if (parent::provjeriIBAN($this->IBANprimatelja))
      return "Evo ovo je uplatnica za $this->IBANprimatelja, sa porukom $this->porukaPrimatelju, a biti će uplaćeno $iznos na dan $this->datumUplate";
    else
      return "Dali ste pogrešan Iban kod kreiranja objekta. Otklonite grešku pozivom na (fizicka->IBANprimatelja) sa dolarom ispred";
  }
}

class PravnaOsoba extends Placanje implements Get2DBarcode
{
    use PlacanjePravna;
    public $sjediste;
    public function __construct($sjediste, $IBAN, $svrha)
    {
        $this->sjediste=$sjediste;
        $this->IBANprimatelja=$IBAN;
        $this->svrha=$svrha;
    }

    public function generirajUplatnicu($iznos)
    {
        if (parent::provjeriIBAN($this->IBANprimatelja))
        return "Iznos $iznos biti ce uplacen vašoj tvrtci sa sjedištem u $this->sjediste, sa IBAN-om $this->IBANprimatelja, s sve sa svrhom $this->svrha";
        else 
        return "Dali ste pogrešan Iban kod kreiranja objekta. Otklonite grešku pozivom na (pravna->IBANprimatelja) sa dolarom ispred";
    }
    public function generiraj2Dbarcode($objekt)
    {
        return $objekt;
    }

    
}


$pravna = new PravnaOsoba("Trogir, Kralja Tomislava 1100", "HR4458554557", "Donacije firmi, da ne propadnete");
echo $pravna->generirajUplatnicu(47000000) . "<br/>";

$fizicka = new FizickaOsoba("Ovo si dobio sad i nikad više", "HR12345678912", "18.2.2022.");
echo $fizicka->generirajUplatnicu(500) . "<br/>";


if (Placanje::provjeriIBAN("jfhgfhg")) {
  echo "dobar Iban";
} else {
  echo "loš iban";
}