# Symfony bundle - deklaracja PCC-3
Bundle opiera się o bibliotekę kch/pcc-3-deklaracja i obiekt deklaracji 
PCC-3 przygotowany przez Ministerstwo Finansów zadeklarowany w 
namespace KCH\PCC3\Deklaracja.

Bundle rejestruje dwa service'y:
- konwersja deklaracji PCC-3 w postaci XML do obiektu KCH\PCC3\Deklaracja
- konwersja obiektu KCH\PCC3\Deklaracja do postaci XML

### Instalacja
``
composer require kch/pcc-3-deklaracja-bundle
``

### Użycie kch.bundle.pcc3.declarationtoxml.transformer
```php
$declaration = new \KCH\PCC3\Deklaracja();
$xml = $container->get('kch.bundle.pcc3.declarationtoxml.transformer')->transform($declaration);
```

### Użycie kch.bundle.pcc3.xmltodeclaration.transformer
```php
$xml = '<?xml version="1.0" encoding="UTF-8"?>
<Deklaracja xmlns="http://crd.gov.pl/wzor/2015/12/11/2973/" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance">
    <Naglowek>
        <KodFormularza kodPodatku="PCC" kodSystemowy="PCC-3 (5)" rodzajZobowiazania="Z" wersjaSchemy="1-0E">PCC-3</KodFormularza>
        <WariantFormularza>5</WariantFormularza>
        <CelZlozenia poz="P_6">1</CelZlozenia>
        <Data poz="P_4">2017-10-07</Data>
        <KodUrzedu>1220</KodUrzedu>
    </Naglowek>
	<Podmiot1 rola="Podatnik">
		<OsobaFizyczna>
                <PESEL>90042718072</PESEL>
                    <ImiePierwsze>AAAAAA</ImiePierwsze>
                    <Nazwisko>AAAAAA</Nazwisko>
                    <DataUrodzenia>1990-04-27</DataUrodzenia>
                    <ImieOjca>AAAAAA</ImieOjca>
                    <ImieMatki>BARBARAAAAAAA</ImieMatki>
                </OsobaFizyczna>
            
		<AdresZamieszkaniaSiedziby rodzajAdresu="RAD">
			
                    <AdresPol xmlns="http://crd.gov.pl/xml/schematy/dziedzinowe/mf/2011/06/21/eD/DefinicjeTypy/">
                        <KodKraju>PL</KodKraju>
                        <Wojewodztwo>MAŁOPOLSKIE</Wojewodztwo>
                        <Powiat>OŚWIĘCIM</Powiat>
                        <Gmina>OŚWIĘCIM</Gmina>
                        <Ulica>DĄBROWSKIEGO</Ulica>
                        <NrDomu>11</NrDomu>
                        <NrLokalu>1</NrLokalu>
                        <Miejscowosc>OŚWIĘCIM</Miejscowosc>
                        <KodPocztowy>32-600</KodPocztowy>
                        <Poczta>OŚWIĘCIM</Poczta>
                    </AdresPol>
                    
		</AdresZamieszkaniaSiedziby>
	</Podmiot1>
    <PozycjeSzczegolowe>
        <P_7>5</P_7>
        <P_21>1</P_21>
        <P_22>1</P_22>
        <P_23>1</P_23>
        <P_24>UMOWA KUPNA-SPRZEDAŻY.</P_24>
        <P_25>1348</P_25>
        <P_26>13</P_26>
        <P_47>13</P_47>
        <P_54>13</P_54>
        <P_64>0</P_64>
    </PozycjeSzczegolowe>
	<Pouczenie1>Za podanie nieprawdy lub zatajenie prawdy i przez to narażenie podatku na uszczuplenie grozi odpowiedzialność przewidziana w Kodeksie karnym skarbowym.</Pouczenie1>
    <Pouczenie2>W przypadku niezapłacenia w obowiązującym terminie kwoty podatku od czynności cywilnoprawnych z poz. 54 lub wpłacenia jej w niepełnej wysokości, niniejsza deklaracja stanowi podstawę do wystawienia tytułu wykonawczego, zgodnie z przepisami ustawy z dnia 17 czerwca 1966 r. o postępowaniu egzekucyjnym w administracji (Dz. U. z 2014 r. poz. 1619, z późn. zm.).</Pouczenie2>
</Deklaracja>';

$declaration = $container->get('kch.bundle.pcc3.xmltodeclaration.transformer')->transform($xml); 
```

### Autor
Łukasz Duda