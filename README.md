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
| Ausleihfrist | Ausleihfrist des Filmes |Readonly|
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
#### Edit View Validierung
| Formularfeld | Validierung | zwingend |
| ----------- | ----------- | :---: |
| Vorname | Keine Sonder Zeichen |✅|
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
