# LaminasDemoProject
https://getlaminas.org/

## Beschreibung Aufsetzung Projekt
Kleine Code demo im LaminasProject ehemalig Zend-Framework mit dem ich bisher gearbeitet habe aber außer dem Namespace hat sich nicht super viel geändert.
Im Betrieb haben wir bisher zwar "nur" Zend3 benutzt und sind noch nicht auf Laminas migriert. Aber ich dachte ich mache es einfach in der aktuellen Version gerade weil auch z.B.: die neuen Composer versionen nicht mehr mit den alten Zend-Versionen kompatibel sind und das dass ganze Unnötig kompliziert macht.
Framework basiert auf MVC Pattern das in den meißten großen PHP-Frameworks verwendet wird. 
Projekt lässt sich über Composer hinzufügen was empfohlen ist da man ja auch eventuell im Laufe der Entwicklung ein dutzend andere dependcies hinzufügen will und sich diese einfach über den Composer installieren lassen. ($ composer create-project -s dev laminas/laminas-mvc-skeleton path/to/install)

Das Projekt habe ich aktuell local über Apache gehostet bzw. XAMPP dafür benutzt. 
Benötigt wird auf jeden Fall ein Http-Server mit dem SSH möglich ist um auf der Shell den Composer auszuführen. 

Eine kleine Anleitung um das Projekt bei sich lokal zu testen kann ich mir noch überlegen oder auch einer Vagrant wäre möglich wobei ich da dementsprechend das Vagrantfile anpassen muss gerade wegen des Composers und der Datenbank sodass nach einem Vagrant up nichts mehr gemacht werden muss. 

Da das Hosten online etwas komplexer ist und wir ja auch keinen Umfang besprochen haben, habe ich jetzt einfach entsprechend Screenshots der Anwendung mit hochgeladen und den Code dementsprechend kommentiert. 

## Beschreibung Idee Projekt
Einfach eine kleine Demo um zu zeigen wie ich bisher ungefähr gearbeitet habe und wie ich auch im Betrieb beispielsweiße Modulle aufgebaut habe, die natürlich am Ende deutlich komplexer wurden wie das kleine Beispiel jetzt. 
Dafür habe ich ein Userdata Modul angelegt in dem man eine Tabelle angezeigt bekommt die die Daten der User in der Datenbank enthält. 
<br>

Zusätzlich habe ich 3 Tabellen mit User, Role und Permissions angelegt in den folgende Beziehungen herrschen: <br>
User N-1 Role <br>
Role 1-N Permissions <br>
<br>

Weitere Ideen wo mir jetzt einfach die Zeit für die Umsetzung gefehlt hatt wären jetzt noch: <br>
- Such und FilterFunktionen um sich bestimmte User anzeigen zu lassen. <br>
- Die angezeigeten User anhand der Rolle und der dazugehörigen Permissions auch zu filtern. <br> 
- Userdaten als PDF runterzuladen, dies soll aber auch nur mit entsprechender Berichtigung möglich sein. <br>

## Homescreen der Anwendung 
Standardmäßig im Application Modul von wo aus man auf andere Module weiterverlinken kann.

![ScreenHome](https://user-images.githubusercontent.com/49024358/109636311-b4bd4a80-7b4b-11eb-995b-4601ece5c9d3.PNG)

## Main view des Userdatamoduls 
Dort werden aktuell die Userinfos gelistet. Die User und ensprechende Datensätze habe ich per Datenbankupdate in SQL erstellt. Gibt natürlich möglichkeiten über die Anwendung diese zu manipulieren und auch neue hinzzufügen bzw. Daten zu löschen.
Weiterhin könnte man auch Wizards zum editieren oder für sonstige Aktionen per JavaScript bzw. entsprechendes Framework noch hinzufügen und auch sonstige Grafische Oberflächen wie Charts usw.. Wobei das natürlich im Frontend stattfinden würde und die Daten entsprechend über Die ControllerActions angefordert werden und man diese anhand von JSON wieder an das Frontend übergeben kann. 

![ScreenUserInfo](https://user-images.githubusercontent.com/49024358/109636305-b2f38700-7b4b-11eb-9069-936b975ee214.PNG)

Zuzüglich gibt es was eventuell benötigte Berichtigungen anggeht in PHP libraries (wie z.B.:http://phprbac.net/)  um dies zu ermöglchen sodass beispielsweiße User auf bestimmte Actions keinen Zugriff haben. In anderen Programmiersprachen ist dies oft schon mit integriert. 
