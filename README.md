# M307_N&N_Verleih
## Inhaltsverzeichnis
## Einleitung
## Konzeptionierung
### Formulare
#### Home View
| Bezeichnung | Information | Typ |
| ----------- | ----------- | --- |
| Vorname | Vorname von Kunden |Text|
#### Edit View
| Bezeichnung | Information | Typ |
| ----------- | ----------- | --- |
| Vorname | Vorname von Kunden |Text|
#### Create View
| Bezeichnung | Information | Typ |
| ----------- | ----------- | --- |
| Vorname | Vorname von Kunden |Text|
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
