<?php
class Placanje{
	public $svrha;
	public $IBANprimatelja;

	public static function projveriIBAN($iban){
		if($iban!==FALSE){
			return TRUE;
		}else{
			return FALSE;
		}
	}
}

interface Get2DBarcode{
	public function generiraj2Dbarcode($objekt);
}

trait placanjeFizicka{
	public function posloziPodatke($objektPodataka){
		return $objektPodataka;
	}
}

trait placanjePravna{
	public function manipulirajSpdvOM($objektPodataka){
		return $objektPodataka;
	}
}

class FizickaOsoba extends Placanje implements Get2DBarcode{
	use placanjeFizicka;

	public $porukaPrimatelju;
	public $datumUplate;

	public function __construct($poruka, $IBAN, $datumUplate){
		$this->porukaPrimatelju=$poruka;
		$this->IBANprimatelja=$IBAN;
		$this->datumUplate=$datumUplate;
	}

	public function generiraj2Dbarcode($objekt){
		return $object;
	}

	public function generirajUplatnicu($iznos){
		if(parent::projveriIBAN($this->IBANprimatelja)){
			return "Evo je uplatnica za $this->IBANprimatelja, sa porukom $this->porukaPrimatelju, a biti ce uplaceno $iznos na dan $this->datumUplate";
		}else{
			return "Dali ste pogresan IBAN kod kreiranja objekta. Otklonite gresku pozivom na (fizicka->IBANprimatelja) sa dolarom ispred";
		}
	}
}

class PravnaOsoba extends Placanje implements Get2DBarcode{
	use placanjePravna;

	public $sjediste;

	public function __construct($sjediste, $IBAN, $svrha){
		$this->sjediste=$sjediste;
		$this->IBANprimatelja=$IBAN;
		$this->svrha=$svrha;
	}

	public function generiraj2Dbarcode($objekt){
		return $object;
	}
	public function generirajUplatnicu($iznos){
		if(parent::projveriIBAN($this->IBANprimatelja)){
			return "Evo tvrtka sa sjedistem $this->sjediste, šalje uplatu $iznos kn sa $this->svrha na IBAN $this->IBANprimatelja";
		}else{
			return "Dali ste pogresan IBAN kod kreiranja objekta. Otklonite gresku pozivom na (pravna->IBANprimatelja) sa dolarom ispred";
		}
	}
}

$fizicka=new FizickaOsoba("Ovo si dobio sad i nikad više", "HR12345678912", "18.02.2022.");
echo $fizicka->generirajUplatnicu(500)."<br>";;

$pravna=new PravnaOsoba("Adresa PO 31", "HR98765432109", "Saljemo vam uplatu");
echo $pravna->generirajUplatnicu(5500)."<br>";;

if(Placanje::projveriIBAN("jlkgfj")){
	echo "dobar IBAN";
}else{
	echo "los IBAN";
}
?>