-- Lisää CREATE TABLE lauseet tähän tiedostoon
create table Kayttaja(
kayttajatunnus varchar(70) primary key,
nimi varchar(70) not null,
salasana varchar(20) not null,
yllapitaja boolean default false
);

create table Askare(
id serial primary key ,
nimi varchar(70) not null,
laatimisaika Date not null,
tarkeysluokka int,
lisatiedot varchar(100)
);

create table Aihe(
id serial primary key,
nimi varchar(70) not null
);

create table Tarkeysluokka(
luokka INTEGER primary key
);

create table Askareaihe(
askare_id INTEGER REFERENCES Askare(id) ,
aihe_id INTEGER REFERENCES Aihe(id),
);


