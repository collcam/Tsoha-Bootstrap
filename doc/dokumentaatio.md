#Johdanto#

Muistilista on ytimekkäästi sanottuna muistiväline, joka sopii kaikille varhaisdementiasta kärsiville, kuten opiskelijoille joille deadlinen pitäminen tuntuu olevan mahdotonta.

Muistilista muodostuu askareista. Askareelle voidaan antaa tärkeysluokka 1-5 jossa 1 on tärkein ja viisi vähäpätöisin. Lisäksi askare voidaan luokitella ryhmiin esim työ, puhelin numero, koti, ostos yms. Askare voi kuulua enemmän kuin yhteen ryhmään esim tärkeä työ puhelin numero voi kuulua sekä työ että puhelin numero ryhmiin. Tärkeysluokka tai ryhmän valitseminen eivät ole välttämättömiä.

Muistilistaan kirjaudutaan omilla tunnuksilla jolloin kaikilla on henkilökohtainen oma muistilistansa, ettet tule vahingossakaan tehdyksi kaverisi kurssityötä.
Ympäristönä toimii users-pallin Apachella. Tuettu ohjelmointikieli on PHP. Kyseessä on vain yhdellä kannalla toimiva työ.

##Toiminnot##

Käyttäjän toiminnot:


-Kirjautuminen 

-Askareen lisäys,muokkaus ja poisto

-Askareen tärkeysluokan lisäys ja poisto

-Askareen lisääminen ryhmään

-Aiheryhmät voivat olla sisäkkäisiä

-Askareella voi olla usampi aiheryhmä mutta vain yksi tärkeysluokka.

Ylläpitäjän toiminnot:


-Kirjautuminen

-käyttäjien hallinta: selaus ja poisto


##Käyttäjäryhmät##

Käyttäjä
    Yksittäinen henkilö joka on rekisteröitynyt muistilistan käyttäjäksi.
    Kaikki käyttäjät kuuluvat ähän ryhmään, jottei kukaan saa lupaa tarkastella muiden 
    muistilistoja.
    
Ylläpitäjä
    Henkilö joka on vastuussa ylläpidosta. Hän voi olla myös käyttäjä, mutta 
    ylläpitäjänö kirjautuessaan hän ei pääse käsiksi omiin muistilistoihinsa joten 
    hänen on kirjauduttava toisella käyttäjätunnuksella ollaseen käyttäjä. Ylläpitäjä 
    hallinnoi käyttäjiä ja voi poistaa niitä tarvittaessa.
    
        
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
    
Ylläpitäjän käyttötapaukset:

    1. Kirjautuminen sisään
    
    2. Käyttäjien hallinnointi: Ylläpitäjä näkee käyttäjien tiedot kuten salasanat yms. 
    ja voi poistaa käyttäjiä.
        
##Tietosisältökuvaus (muotoa atribuutti: arvojoukko: kuvailu)

**Tietokohde: Käyttäjä**
                
*Käyttäjä on rekisteröitynyt Muistilistan asiakas. Hänellä on pakko olla nimi, tunnus sekä salasana.*

Nimi : merkkijono max 70 merkkiä : Henkilön etu ja sukunimi    

Tunnus : merkkijono max 10 merkkiä : Käyttäjätunnus               

Salasana :merkkijono max 10 merkkiä : Kirjautumisen salasana



**Tietokohde: Askare** 

*Askareella on pakko olla nimi sekä Laatimis aika. Askareella ei tarvitse olla askareaihetta mikäli sillä ei ole yhtäkään aihetta. Tärkeysluokitusta tai askareen päivämäärää ei ole pakko tehdä. Lisätiedot voi myös halutessaan jättää tyhjäksi.*

Nimi : merkkijono max 70 merkkiä : Askareen nimi

Askareaihe: List askareryhmistä : Askareen aiherymien lista mikäli niitä on

Tärkeysluokka: integer arvo 1-5 : 1 on tärkein ja 5 vähäpätöisin.

Laatimis Aika: timestamp: Askareen laatimis aika

Lisätiedot: merkkijono max 200 merkkiä: Askareeseen liittyviä mahdollisia lisätietoja  esim. osoite



**Tietokohde: Aihe**

*Aihe ei ole pakollinen. Askareelle voidaan antaa useampi aihe joita käytetään askareaiheessa.*

Nimi: merkkijono max 70 merkkiä : Askareryhmän nimi esim. työ, puhelin numero


**Tietokohde: Askareaihe**

*Askareaihe on liitostaulu askareesta ja aiheesta. Sliitetään askareeseen jolla on vähintään yksi askareryhmä. Askareryhmälista voi vastata useamman askareen askareryhmälistaa.* 

Lista: List askareryhmistä : askareryhmien lista

**Tietokohde: Tärkeysluokka**

*Askareelle voi halutessaan antaa tärkeysluokan. Askareella voi olla vain yksi tärkeysluokka ja se on integer arvo 1-5.

Tärkeysluokka: integer arvo 1-5: Tärkeysluokka askareelle missä 1 on tärkein ja 5 vähäpätöisin

               
**Tietokohde: Ylläpitäjä**

*Ylläpitäjällä on oltava nimi, tunnus sekä salasana*

Nimi: merkkijono max 70 merkkiä: Ylläpitäjän nimi 

Tunnus : merkkijono max 10 merkkiä : Käyttäjätunnus               

Salasana :merkkijono max 10 merkkiä : Kirjautumisen salasana

