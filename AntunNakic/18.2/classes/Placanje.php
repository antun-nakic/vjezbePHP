<?php
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
