<div class="w3-container">

<style type="text/css">
div {
    text-align: justify;
    text-justify: inter-word;
} 
</style>

<h1>Anleitung zum digitalen Hydrantenplan</h1>

<br><br>
<p>Dieser Artikel beschreibt den Grund für einen eigenen (digitalisierten) Hydrantenplan und bietet anschließend eine Anleitung zur Erstellung eines solchen Planes.</p>

<br><br>
<h2><u>Einleitung</u></h2>

<h3>1. Der Hydrantenplan</h3>
<div class="w3-row">
	<div class="w3-twothird" style="padding-right:20px">
		Ein Löschwasserentnahmestellenplan beinhaltet, wie sein Name bereits verrät, alle für Feuerwehren im Einsatzfall relevanten Löschwasserentnahmestellen wie z.B. Unter- und Überflur-Hydranten, Löschwasserbecken und -Zisternen, Flüsse, Teichs usw. Ein solcher Plan ermöglicht der Einsatzleitung während eines Brandeinsatzes die nächstgelegenen bzw. verfügbaren Löschwasserentnahmestellen sehr schnell zu lokalisieren und somit relativ rasch Löschwasser (kurz LöWa) zum Brandobjekt zu bringen.<br />
		Löschwasserentnahmestellenpläne sind jedoch nicht nur für den Einsatzfall (=abwehrender Brandschutz) relevant, vielmehr werden sie auch im vorbeugenden Brandschutz eingesetzt um Löschwasser-Berechnungen für Objekte durchzuführen oder komplette Ortsteile zu analysieren. Leider bieten LöWa-Pläne auch einen kleinen Nachteil: Die meisten ausgegebenen LöWa-Pläne beinhalten zwar Hydranten, jedoch ist das dazugehörige Ortswasser-Leitungsnetz nicht eingezeichnet. Der Zusammenhang von Hydranten mit einer oder mehreren unterirdischen Zubringerleitungen ist im vorbeugenden Brandschutz von großer Wichtigkeit. Die Angabe des Durchmessers eines Hydranten bzw. der damit verbundenen maximalen Durchflussmenge von LöWa reicht im Normalfall nicht aus. Befindet sich der Hydrant auf einer Ringleitung, wo von zwei Seiten Wasser zuströmt, oder auf einer Stichleitung? Welche Leitungsdurchmesser (=max. Durchflussmenge) bieten die einzelnen Wasserleitungen? Wieviele (im Einsatzfall verwendete) Hydranten befinden sich auf einer gemeinsamen Leitung oder sind voneinander abhängig? Um diese Fragen zu beantworten ist es essentiell den Zusammenhang von Hydranten und dem Ortswassernetz zu kennen.<br />
		Hydranten sind nur in jenen Ortschaften vorhanden, wo auch Trink- bzw. Leitungswasser vorhanden ist, d.h. wo auch eine Ortswasserleitung gegeben ist. Somit werden im Feuerwehrwesen, vor allem zwecks Übersichtlichkeit im Einsatzfall, eigene Pläne verwendet, die Hydranten und das Leitungssystem beinhalten. Die sogenannten Hydrantenpläne werden meist vom zuständigen Wassermeister (Gemeinde) pro Ortschaft erstellt, in denen Hydranten vorhanden sind.
	</div>
	<div class="w3-third">
		<img src="hydrantenplan/karlstetten_2015.png" width="100%" />
		<p>Abbildung 1: Original-Hydrantenplan Gemeinde Karlstetten, Stand 2015</p>
	</div>
</div>
<br>
<h3>2. Digitaler Hydrantenplan</h3>
<div class="w3-row">
	Immer mehr Feuerwehren neigen dazu, ihre LöWa-Pläne zu digitalisieren. Dies bietet mehrere Vorteile, vor allem im Hinblick auf die Nutzung von digitalen Medien wie Tablet, Handy oder Infoscreens zum Anzeigen von Einsatzdetails. Weiters gibt es bereits Pilotprojekte, die die GeoDaten sämtlicher LöWa-Objekte im Einsatzfall heranziehen und somit abhängig von der Adresse des Brandobjekts automatisch das vorhandene LöWa berechnen und die verfügbaren LöWa-Entnahmestellen anzeigen oder sogar ausdrucken. Somit kann sich der ausrückende Fahrzeugkommandant oder Einsatzleiter bereits bei Anfahrt vorbereiten.<br />
	Es gibt mittlerweile Programme und auch mobile Apps wie <a href="http://www.wasserkarte.info" target="_blank">www.wasserkarte.info</a> und <a href="http://www.hydrantenmap.de" target="_blank">www.hydrantenmap.de</a> die es Feuerwehren ermöglichen Hydranten digital zu erfassen. Leider bietet keine dieser Software-Applikationen die Möglichkeit auch das so wichtige Wasserleitungsnetz zu erfassen.<br />
	Wir haben daher an einer innovativen Version gearbeitet, bei der OpenStreetMap.org als Basis für sämtliche GeoDaten verwendet wird. OpenStreetMap ist ein freies Projekt, das für jeden frei nutzbar und somit auch gratis ist. 
</div>

<br><br>
<h2><u>Anleitung</u></h2>
Wie kommt man nun zu einem eigenen digitalen Hydrantenplan?
<br><br>
<div class="w3-row">
	<h3>1. Hydranten in OpenFireMap eintragen</h3>
	<div class="w3-twothird" style="padding-right:20px">
		In OpenStreetMap (kurz OSM) sind die einzelnen Objekte (z.B. Häuser, Straßen, Gewässer, Hydranten) eigenen Layern zugeordnet. Diese Layer dienen der Anzeige und können einzeln für die jeweilige Ansicht aktiviert oder deaktiviert werden. Auf <a href="http://www.openstreetmap.org" target="_blank">www.openstreetmap.org</a> ist der Hydranten-Layer standardmäßig deaktiviert, da dieser für den Standardnutzer (z.B. für Straßen-Navigation) nicht benötigt wird. Darum gibt es eine eigene Seite <a href="http://www.openfiremap.org" target="_blank">www.openfiremap.org</a>, wo die Layer zum Anzeigen von Feuerwehrhäusern und Hydranten aktiviert sind – es wird jedoch die gleiche Basis, also OSM verwendet. Seit kurzen gibt es auch die Seite <a href="http://www.osmhydrant.org/de" target="_blank">www.osmhydrant.org/de</a>, die sogar Bereichsgrenzen der Hydranten anzeigt.<br />
		Jedermann darf neue Objekte in OSM eintragen oder Objekte verändern. Dazu muss man sich lediglich auf <a href="http://www.openstreetmap.org" target="_blank">www.openstreetmap.org</a> einen Benutzeraccount anlegen. Es gibt jedoch auch OSM-Administratoren, die jegliche Änderungen genehmigen (müssen), dies dient lediglich der Sicherheit der Daten.<br />
		Zum Bearbeiten von OSM-Kartenmaterial empfiehlt sich das Programm JOSM (<a href="https://josm.openstreetmap.de" target="_blank">josm.openstreetmap.de</a>), das lokal am PC installiert wird. Nach erfolgreicher Installation muss nach Start der Applikation ein Kartenbereich ausgewählt werden. Dieser Kartenbereich wird zwischenzeitlich am PC downgeloaded und kann somit editiert werden, nachdem die Änderungen abgeschlossen sind wird dieser Bereich wieder in OSM hochgeladen. Zum Hochladen ist eine Authentifizierung mittels Benutzeraccount + Angabe einer kurzen Textbeschreibung über die getätigten Änderungen zwecks Nachvollziehbarkeit notwendig.<br />
	</div>
	<div class="w3-third">
		<img src="hydrantenplan/openfiremap.png" width="100%" />
		<p>Abbildung 2: Ausschnitt aus OpenFireMap.org</p>
	</div>
</div>

<div class="w3-row">
	Um nun neue Hydranten mittels JOSM einzutragen ist es notwendig einen Punkt auf der Karte zu zeichnen (mittels Doppelklick, sonst entsteht eine Linie). Danach müssen zu diesem Punkt folgende Attribute hinzugefügt werden, damit aus dem Punkt ein Hydrant wird:
	<ul style="font-family:monospace">
		<li>emergency=fire_hydrant</li>
		<li>fire_hydrant:type=pillar (wenn Überflurhydrant) oder</li>  fire_hydrant:type=underground (wenn Unterflurhydrant)
		<li>fire_hydrant:diameter=80</li> (wobei "80" für die Angabe des Durchmessers in mm steht)
		<li>name=xxx</li> (optionale Angabe, wobei "xxx" für den Namen des jeweiligen Hydranten steht z.B. "Hubertgasse 1a")
	</ul>
	Die Angabe dieser Attribute kann hier nachgelesen werden: <a href="http://wiki.openstreetmap.org/wiki/DE:Tag:emergency%3Dfire_hydrant" target="_blank">wiki.openstreetmap.org/wiki/DE:Tag:emergency=fire_hydrant</a>
	<br><br>
	Achtung: Nach Hochladen der Hydranten in OSM, kann es bis zu 24h dauern bis die Hydranten tatsächlich auf <a href=">www.openfiremap.org" target="_blank">www.openfiremap.org</a> sichtbar sind.
</div>

<br>

<div class="w3-row">
		<h3>2. Wasserleitungen eintragen</h3>
		Das Wasserleitungsnetz eines Ortes kann ebenfalls in OSM erfasst werden. Da sich Ortswasserleitungen normalerweise unter der Erde befinden, werden diese nicht in OpenStreetMap oder OpenFireMap angezeigt.
		Das Einzeichnen vom Leitungsnetz funktioniert analog zur Hydranten-Anlage mittels JOSM Applikation, lediglich werden statt Punkten zusammenhängende Linien eingezeichnet. Wiederum ist es notwendig pro Linie (pro Leitungszweig) folgende Attribute zu vergeben:
		<ul style="font-family:monospace">
			<li>man_made=pipeline</li>
			<li>type=water</li>
			<li>location=underground</li>
			<li>diameter=100</li>  (wobei "100" für den Leitungsdurchmesser steht)
		</ul>
		Die Attribute wurden hier bezogen: <a href="http://wiki.openstreetmap.org/wiki/Proposed_features/water_network" target="_blank">wiki.openstreetmap.org/wiki/Proposed_features/water_network</a>
	<br>
	<br>
		<img src="hydrantenplan/josm_waterpipes.png" style="max-width:500px; width:100%" />
		<p>Abbildung 3: Leitungsnetz mittels JOSM einzeichnen</p>
</div>

<br>

<div class="w3-row">
	<h3>3. Hydrantenplan aus eingetragenen Hydranten + unterirdischen Wasserleitungen erzeugen</h3>
	<div class="w3-twothird" style="padding-right:20px">
		Um nun einen Plan zu erstellen, in welchen die nicht-sichtbaren Wasserleitungen sichtbar gemacht werden, ist die Desktop-Applikation Maperitive (<a href="http://maperitive.net" target="_blank">maperitive.net</a>) notwendig. Nach Installation + Start des Programmes ist es lediglich notwendig die bereits vorher durch JOSM abgespeicherte .osm-Datei mittels Drag-and-Drop in die "Commander"-Line des Programmes hineinzuziehen. Nun ist die aktuelle Kartenansicht im Programm ersichtlich. Die Anzeige der Layer und dazugehörigen Objekte in Maperitive geschieht über sogenannte Rules. Daher muss noch ein eigenes Rules-File in das Programm erneut mittels Drag-and-Drop hineinzuziehen. Das aktuell verwendete Rules-File der FF-Karlstetten kann <a href="hydrantenplan/ofm_print.mrules" target="_blank">hier</a> heruntergeladen und darf natürlich auch verwendet werden. <br />
		Danach sollte bereits der resultierende Hydrantenplan ersichtlich sein. Der jeweilige Bildschirmausschnitt kann dann mittels Export-Funktion im Tools-Menü entweder als Bitmap- oder SVG-Grafik exportiert werden. <br />
		Eine vollständige Dokumentation des Tools ist hier einsehbar: <a href="http://wiki.openstreetmap.org/wiki/DE:Maperitive" target="_blank">wiki.openstreetmap.org/wiki/DE:Maperitive</a> 
	</div>
	<div class="w3-third">
		<img src="hydrantenplan/output.png" width="100%" />
		<p>Abbildung 4: Resultierender Hydrantenplan</p>
	</div>
</div>

<br><br>
<div class="w3-row">
<h2><u>Fazit</u></h2>
<p>Hydrantenpläne können von Maperitive auch im SVG-Format exportiert werden. Dieses Vektorgrafik-Format ermöglicht es die Pläne in jeglichen Größenformaten auszudrucken bzw. abzuspeichern, ohne dabei an Bildqualität zu verlieren. </p>
</div>

</div>