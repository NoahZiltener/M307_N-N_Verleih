# M307_N&N_Verleih
## Inhaltsverzeichnis
## Einleitung
## Konzeptionierung
### Formulare
#### Home View
![Picture Homescreen](https://github.com/SwissPvP2003/M307_N-N_Verleih/blob/master/documation/WelcomeScreen.png)
#### Edit View
![Picture EditView](https://github.com/SwissPvP2003/M307_N-N_Verleih/blob/master/documation/EditScreen.png)
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
![Picture CreatView](https://github.com/SwissPvP2003/M307_N-N_Verleih/blob/master/documation/AusleihScreen.png)
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
| Telefon | Keine Sonder Zeichen ||
| Email | Keine Sonder Zeichen |✅|
| Mitgliedschaftsstatus | - |✅|
| Film | - |✅|
#### Edit View Validierung
| Formularfeld | Validierung | zwingend |
| ----------- | ----------- | :---: |
| Vorname | Keine Sonder Zeichen |✅|
| Name | Keine Sonder Zeichen |✅|
| Telefon | Keine Sonder Zeichen ||
| Email | Keine Sonder Zeichen |✅|
| Mitgliedschaftsstatus | - |✅|
| Film | - |✅|
| Ausleihfrist | - ||
| Status | - |✅|
### Datenbank
#### movies
| Bezeichnung | Typ |
| ----------- | ----------- |
| id | int(11) |
| title | varchar(255) NOT NULL|
#### loans
| Bezeichnung | Typ |
| ----------- | ----------- |
| id | int |
| firstname | varchar(255) NOT NULL|
| lastname | varchar(255) NOT NULL|
| email | varchar(255) NOT NULL|
| loandate | date |
| returndate | date |
| movie | int |
| status | bool |

#### memberships 
| Bezeichnung | Typ |
| ----------- | ----------- |
| id | int |
| membership	 | varchar(255) NOT NULL |
| loan_period | int |
### Testfälle
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
| Testfälle erstellen     | 14:30Uhr Zwischengespräch mit Auftraggeber | Nick: Testing                                       |
| Validierung beschrieben |         |                                        | Feinschliff
