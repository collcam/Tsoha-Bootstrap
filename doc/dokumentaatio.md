#Johdanto#

Muistilista on ytimekkäästi sanottuna muistiväline, joka sopii kaikille varhaisdementiasta kärsiville, kuten opiskelijoille joille deadlinen pitäminen tuntuu olevan mahdotonta.

Muistilista muodostuu askareista. Askareelle voidaan antaa tärkeysluokka 1-5 jossa 1 on tärkein ja viisi vähäpätöisin. Lisäksi askare voidaan luokitella ryhmiin esim työ, puhelin numero, koti, ostos yms. Askare voi kuulua enemmän kuin yhteen ryhmään esim tärkeä työ puhelin numero voi kuulua sekä työ että puhelin numero ryhmiin. Tärkeysluokka tai ryhmän valitseminen eivät ole välttämättömiä.

Muistilistaan kirjaudutaan omilla tunnuksilla jolloin kaikilla on henkilökohtainen oma muistilistansa, ettet tule vahingossakaan tehdyksi kaverisi kurssityötä.
Ympäristönä toimii users-pallin Apachella. Tuettu ohjelmointikieli on PHP. Kyseessä on vain yhdellä kannalla toimiva työ.

##Toiminnot##

-Kirjautuminen 

-Askareen lisäys,muokkaus ja poisto

-Askareen tärkeysluokan lisäys ja poisto

-Askareen lisääminen ryhmään

-Aiheryhmät voivat olla sisäkkäisiä

-Askareella voi olla usampi aiheryhmä mutta vain yksi tärkeysluokka.

##Käyttäjäryhmät##

Käyttäjä
    Yksittäinen henkilö joka on rekisteröitynyt muistilistan käyttäjäksi.
    Kaikki käyttäjät kuuluvat ähän ryhmään, jottei kukaan saa lupaa tarkastella muiden 
    muistilistoja.
    
##Käyttötapauskuvaukset##

Käyttäjän käyttötapaukset:

    1. Askareen muokkaus: Käyttäjä voi lisätä poistaa tai muokata nykyisiä askareitaan.
    Askareelle voidaan antaa halutessa tärkeysluokka ja aiheryhmiä. Tärkeysluokkia voi 
    valita vain yhden mutta aiheryhmiä voi olla useampia yhdellä askareella.
    
    2. Kirjautuminen: Käyttäjä aluksi kirjautuu jäjestelmään, jotta hän pääsee käsiksi                
    henkilökohtaiseen muistilistaansa. 
    
    3. Muistilistasta haku: Käyttäjä voi hakea Muistilistastaan askaretta aiheryhmän,
    tärkeysluokan tai askareen nimen perusteella. 
    
    4. Muistilistan selaaminen: Käyttäjä voi tarkastella omaa muistilistaansa.
    
    muut käyttötapaukset: rekisteröityminen

