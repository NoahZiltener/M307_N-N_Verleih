# M307_N&N_Verleih
## Einleitung
Im Modul 307 haben wir ein Projekt erhalten, welches uns für die letzten 2 1/2 Tage beschäftigen soll. Dieses Projekt zähl mit
der schriftlichen Prüfung zur unserer Endnote. Wir (Noah Ziltener und Nick Durrer) haben uns dazu entschieden dieses Projekt zusammen zu machen, da wir beide verschiedene Stärken haben und denken diese gut in die Projektarbeit einfliessen lassen können. Der Auftrag ist es eine Website für eine Videotheke zu erstellen, mit den gelernten Wissen des Kurses. Die Webseite ist dazu da, für Mitarbeiter, Aufträge einfacher zu erfassen und zu bearbeiten. Zudem soll die Website eine Darstellung aller aktiven Aufträge haben.
## Sitemap
| Home | Create | Update |
| -----| ------ | ------ |
| /home | /create | /update |
| Zeit alle offene Ausleihungen | Diese Seite dient zum erstellen von neuen Ausleihungen | Auf dieser Seite können bestehende Ausleihungen bearbeitet werden |
## Konzeptionierung
### Formulare
#### Home View
![Picture Homescreen](res/WelcomeScreen.png)
#### Edit View
![Picture EditView](res/EditScreen.png)
| Bezeichnung | Information | Typ |
| ----------- | ----------- | --- |
| Vorname | Vorname des Kunden |Text|
| Name | Name des Kunden |Text|
| Telefon | Telefonnummer des Kunden |Text|
| Email | Email des Kunden |Text|
| Mitgliedschaftsstatus | Mitgliedschaftsstatus des Kunden |Combobox|
| Ausleihfrist | Ausleihfrist des Filmes |Text|
| Film | Film welcher der Kunde ausgelehnt hat |Combobox|
| Status | Status des Filmes |Combobox|
#### Create View
![Picture CreatView](res/AusleihScreen.png)
| Bezeichnung | Information | Typ |
| ----------- | ----------- | --- |
| Vorname | Vorname von Kunden |Text|
| Name | Name des Kunden |Text|
| Telefon | Telefonnummer des Kunden |Text|
| Email | Email des Kunden |Text|
| Mitgliedschaftsstatus | Mitgliedschaftsstatus des Kunden |Combobox|
| Film | Film welcher der Kunde auslehnen möchte |Combobox|
### Validierung
#### Create View Validierung
| Formularfeld | Validierung | zwingend |
| ----------- | ----------- | :---: |
| Vorname | Keine Sonder Zeichen |✅|
| Name | Keine Sonder Zeichen |✅|
| Telefon | Nur Nummern, Leerzeichen, (), +/- ||
| Email | Muss @ enthalten |✅|
| Mitgliedschaftsstatus | - |✅|
| Film | - |✅|
#### Edit View Validierung
| Formularfeld | Validierung | zwingend |
| ----------- | ----------- | :---: |
| Vorname | Keine Sonder Zeichen |✅|
| Name | Keine Sonder Zeichen |✅|
| Telefon | Nur Nummern, Leerzeichen, (), +/- ||
| Email | Muss @ enthalten |✅|
| Mitgliedschaftsstatus | - |✅|
| Film | - |✅|
| Ausleihfrist | - ||
| Status | - |✅|
### Datenbank
#### movies
| Bezeichnung | Typ |
| ----------- | ----------- |
| movieid | int PRIMARY KEY AUTO_INCREMENT |
| title | varchar(255) NOT NULL|
#### loans
| Bezeichnung | Typ |
| ----------- | ----------- |
| loanid | int PRIMARY KEY AUTO_INCREMENT |
| firstname | varchar(50) NOT NULL|
| lastname | varchar(50) NOT NULL|
| phone | varchar(50)|
| email | varchar(80) NOT NULL|
| loandate | date not null |
| returndate | date not null |
| returned | boolean not null |
| fk_movie | int not null |
#### memberships 
| Bezeichnung | Typ |
| ----------- | ----------- |
| membershipid | int PRIMARY KEY AUTO_INCREMENT |
| membership	 | varchar(255) NOT NULL |
| loanperiod | int NOT NULL |
### Testfälle
#### Testfälle 1
```
GEGEBEN       Erstellen Seite ist geöffnet und alle Daten sind korrekt eingegeben
WENN          ich drücke auf den Erstellen Button
DANN          wird der Videoausleih in der Datenbank erstellt und ich werde auf die Home Seite umgeleitet
```
(07.05.2020, 12:06) Test erfolgreich von Nick durchegführt 
#### Testfälle 2
```
GEGEBEN       Ein Videoausleih ist auf der Bearbeitungsseite geöffnet
WENN          ich ändere den Namen des Kunden und speichere den Ausleih
DANN          der Videoausleih wir in der Datenbank geändert und ich werde auf die Home Seite umgeleitet wo der Name verändert beim Videoausleih steht
```
(07.05.2020, 12:08) Test erfolgreich von Nick durchegführt
#### Testfälle 3
```
GEGEBEN       Die URL der Homeseite ist im Browser eingeben
WENN          ich lade die Seite 
DANN          sehe ich alle Ausleihen die noch nicht abgeschlossen sind
```
(07.05.2020, 12:09) Test erfolgreich von Nick durchegführt
#### Testfälle 4
```
GEGEBEN       Die Erstellen Seite ist geöffnet
WENN          ich den Mitgliedstatus auswähle
DANN          sehe ich das Rückgabedatum
```
(07.05.2020, 12:10) Test erfolgreich von Nick durchegführt
#### Testfälle 5
```
GEGEBEN       Home Seite ist geöffnet
WENN          eine Ausleihung das Rückgabedatum verpasst hat 
DANN          wird das mit einem passendem Emoji angezeigt
```
(07.05.2020, 12:11) Test erfolgreich von Nick durchegführt
#### Testfälle 6
```
GEGEBEN       Home Seite ist geöffnet
WENN          eine Ausleihung noch in der Zeitspanne ist (noch nicht zurückgebracht werden muss) 
DANN          wird das mit einem passendem Emoji angezeigt
```
(07.05.2020, 12:11) Test erfolgreich von Nick durchegführt
#### Testfälle 7
```
GEGEBEN       Erstellen Seite ist geöffnet
WENN          ich das Formular ohne Eingaben absende
DANN          werden die Error Meldungen angezeigt
```
(07.05.2020, 12:12) Test erfolgreich von Nick durchegführt
#### Testfälle 8
```
GEGEBEN       Update Seite ist geöffnet
WENN          ich alle Daten aus den Textboxen lösche und dan den Button speichern drücke
DANN          werden die Error Meldungen angezeigt
```
(07.05.2020, 12:13) Test erfolgreich von Nick durchegführt
#### Testfälle 9
```
GEGEBEN       Home Seite ist geöffnet 
WENN          ich 2 Ausleihungen erstelle mit jeweils anderen Mitgliedschaftsstatus
DANN          wird die Ausleihung welche zuerst fählig wird zuoberst angezeigt der Tabelle
```
(07.05.2020, 12:14 Test erfolgreich von Nick durchegführt
#### Testfälle 10
```
GEGEBEN       Update Seite ist geöffnet
WENN          ich den Status der Ausleihe auf "zurückgegeben" ändere
DANN          wird diese nicht mehr angezeigt auf der Homeseite
```
(07.05.2020, 12:15 Test erfolgreich von Nick durchegführt
### Roadmap
| 05.05.2020            | 06.05.2020                     | 07.05.2020                             |
|-----------------------|--------------------------------|----------------------------------------|
|                       | Noah : Datenbank aufsetzten    | Noah:  Createseite (Controller)                   | 
|                       | Models                         | Updateseite (Controller)                                |
|                       | Createseite (View)             |                                 |
|                       | Nick: Alle Seiten Vorbereiten  | Nick: Welcomeseite (Controller)  | 
|                       | Router    |                       Updateseite(View                 |
|                       | Welcomeseite (View) |                                        | 
|                       |                                |                                        | 
| Git Repo erstellen    | Noah: Createseite (Controller)          | Noah: Testing | 
| Mokups erstellen       | Nick: Welcomeseite (Controller)            | Feinschliff               |
| Testfälle erstellen     | 14:30Uhr Zwischengespräch mit Auftraggeber | Nick: Testing       |
| Validierung beschrieben |         |               Feinschliff     | 
