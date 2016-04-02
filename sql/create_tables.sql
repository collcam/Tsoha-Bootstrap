-- Lisää CREATE TABLE lauseet tähän tiedostoon
create table Kayttaja(
kayttajatunnus serial primary key,
nimi varchar(70) not null,
salasana varchar(20) not null
);

create table Yllapitaja(
kayttajatunnus serial primary key,
nimi varchar(70) not null,
salasana varchar(20) not null
);

create table Askare(
id int primary key unique,
nimi varchar(70) not null,
laatimisaika timestamp not null,
tarkeysluokka int,
lisatiedot varchar(100)


);

create table Aihe(
id int primary key unique,
aihe varchar(70) not null
);

create table Tarkeysluokka(
luokka int primary key
);

create table Askareaihe(
askare int not null,
aihe int not null,


foreign key(askare) references Askare(id),
foreign key(aihe) references Aihe(id)
);


