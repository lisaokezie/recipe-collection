# Rezeptsammlung

## Beschreibung

Die Rezeptsammlung ist ein Tool zum Verwalten und Teilen von Koch- und Backrezepten. Eingeloggte Nutzer können Rezepte mit Titel, Beschreibung, Kategorie, Zeitaufwand, Portionen, Zutatenliste und Zubereitung erstellen. Der Verfasser eines Rezepts kann dieses bearbeiten und löschen. Jeder eingeloggte Nutzer kann Rezepte kommentieren. Alle Nutzer und Gäste der Seite können nach Rezepten suchen, nach Kategorien filtern und Rezepte als PDF herunterladen.

**Zielsetzung**

Die Rezeptsammlung als Tool, das lokal oder auf dem eigenen Server gehostet werden kann, um Rezepte mit Freunden und Familie auszutauschen. 

**Zusammenfassung aller Features**

- Rezepte erstellen, bearbeiten und löschen
- Rezeptbild hochladen
- Rezepte kommentieren
- Rezepte suchen
- Nach Kategorien filtern
- Kategorien erstellen
- Rezept als PDF herunterladen
- Nutzer Authentifizierung / Login-System

## Installation der Anwendung mit XAMPP

1. Die zip-Datei entpacken und im htdocs Verzeichnis von XAMPP ablegen

2. XAMPP starten und in PHPmyAdmin eine leere Datenbank mit dem Namen **recipe_collection** anlegen

3. Das Projekt in einem beliebigem Code-Editor öffnen

4. Ein Terminal im Projektverzeichnis starten und den Befehl ``php artisan serve`` ausführen

5. Im Browser die laufende App unter http://127.0.0.1:8000/init öffnen

   **Wichtig!** Beim ersten Starten der App muss **/init** aufgerufen werden, um die Datenbanktabellen zu erstellen und mit Beispieldaten zu befüllen. Zusätzlich wird der Storage-Ordner der App neu verlinkt.

   **Hinweis: Die beiligende *recipe_collection.sql* Datei muss nicht verwendet werden!**

   Nun sollte die App unter http://127.0.0.1:8000 laufen und einige Beispielrezepte angezeigt werden.

## Verwendete Techniken

**PHP Framework:** Laravel 7

**Datenbank:** MySQL

**Styles:** Bootstrap

**Packages**

- [**DOMPDF**](https://github.com/barryvdh/laravel-dompdf) zum Erstellen von PDF Dateien aus einem HTML Dokument
- [**Laravel UI**](https://github.com/laravel/ui) für Nutzer-Authentifizierung  und Frontend Scaffolding

### Datenbank

Die Daten der Anwendung werden in einer MySQL Datenbank gespeichert. Die Tabellen werden mit den **Migrationsdateien** von Laravel initialisiert. CRUD Vorgänge werden mithilfe von Eloquent durchgeführt. 

**Aufbau**

Die Datenbank 'recipe_collection' besteht aus den sieben Tabellen Rezepte, Kategorien, Zutaten, Zutatenliste, Nutzer, Einheiten und Kommentare. 

## Aufbau

### app/HTTP/Controllers

#### /Auth

Enthält alle Controller die zur Verwaltung von User-Login und Registrierung benötigt werden. Sie werden vom Laravel/ui Package generiert.

#### /CategoryController

Enthält die Funktionen ``index()`` (Anzeigen aller Kategorien), ```create()``` (Anzeigen des Formulars zum Erstellen einer neuen Kategorie) und ``store()`` (Erstellen einer Kategorie aus den Angaben des Nutzers, sofern nicht bereits eine Kategorie mit diesem Namen existiert).

#### /CommentController

Der Controller besitzt eine ``store()`` Methode die durch die Beziehung zum Recipe Model einen Kommentar mit den User Daten erstellt. Die ``validatedData()`` Methode überprüft, ob der Nutzer einen Namen für die Kategore eingegeben hat.

#### /HomeController

Er zeigt das Dashboard des eingeloggten Nutzers an und verweist auf die Middleware zur Authentifizierung.

#### /RecipeController

Enthält die Funktion ``index()`` zum Anzeigen aller Rezepte bzw. Rezepte mit einer bestimmten Kategorie. Die ``create()`` Methode verweist auf das Formular zum Erstellen eines neuen Rezepts. Mit ``store()`` wird mit einer Transaktion ein neues Rezept in Abhängigkeit der Zutatenliste erstellt. Die ``show()`` Methode zeigt die Detailansicht eines Rezepts an. ``update()`` speichert die Änderungen an einem Rezept. ``destroy()`` löscht ein Rezept aus der Datenbank. Die beiden Funktionen ``validateData()`` und ``validatedIngredients()`` validieren jeweils die Rezeptangaben und die Zutatenliste. ``saveIngredientlist()`` erstellt die Zuatenliste in Abhängikeit zum Recipe Model. ``storeImage()`` speicher ein Rezeptbild im Storage der App. ``downloadPDF()`` wandelt das HTML in ein PDF um und startet einen Download.

### Models

Die Klassen Category, Comment, Ingredient, Ingriedientlist, Recipe, Unit und User legen jeweils die Beziehung zwischen den Models fest.

### /public

Enthält CSS, JavaScript und Favicons. Im storage/uploads Verzeichnis werden die hochgeladenen Rezeptbilder gespeichert.

### /resources

#### /views

In diesem Verzeichnis liegen alle Bladetemplates. Die Datei ***template/app.blade.php*** enthält das Grundgerüst, welches von den anderen Templates verwendet wird. 

### /routes

#### /web.php

Diese Datei enthält alle Routen der App mit ihren jeweiligen Funktionen 

## Quellen

- [Google Fonts](https://fonts.google.com)

- [Materialdesign Icons](https://material.io/resources/icons/?style=baseline)

- [DOMPDF](https://github.com/barryvdh/laravel-dompdf) 

- Beispielbilder: [Pixabay](https://pixabay.com/de/), [Pexels](https://www.pexels.com/de-de/)
