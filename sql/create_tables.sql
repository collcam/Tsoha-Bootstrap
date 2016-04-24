-- Lisää CREATE TABLE lauseet tähän tiedostoon
create table Kayttaja(
id serial primary key,
kayttajatunnus varchar(70) not null,
nimi varchar(70) not null,
salasana varchar(20) not null,
yllapitaja boolean default false
);
create table Askare(
id serial primary key,
nimi varchar(70) not null,
laatimisaika Date not null,
tarkeysluokka INTEGER,
lisatiedot varchar(100),
kayttaja_id INTEGER REFERENCES Kayttaja(id)
);

create table Aihe(
id serial primary key,
nimi varchar(70) not null
);


create table AskareAihe(
id serial primary key,
askare_id INTEGER REFERENCES Askare(id) on delete cascade,
aihe_id INTEGER REFERENCES Aihe(id) on delete cascade
);






