# PHP_CafePHP

# Enkel struktur

## Cafe PHP byggd efter "Enkelt struktur"

Detta projekt är byggt efter en slags "Anpassad enkel struktur", eller enbart "Enkel struktur". Det är en struktur som är skapad specifikt för ett visst projekt och inte nödvändigtvis baserad på ett befintligt ramverk eller en standardiserad struktur.

En sådan struktur hittas ofta på Internet, och används såväl av profesionella (förbluffande ofta) som mindre erfarna. På filnivå kan en sådan struktur se ut ungefär så här (lite mer utökat och inte helt överenstämmande  för just aktuellt projekt; Café PHP i en kostym av "Enkel struktur"):

```
- configure/
  - config.php
- public_html/
  - index.php
  - css/
  - js/
  - images/
  - templates/
    - header.php
    - footer.php
    - article_template.php
  - blog/
    - index.php
    - write.php
    - view.php
    - manage.php
  - comments/
    - add_comment.php
    - edit_comment.php
  - admin/
    - index.php
    - manage_articles.php
    - manage_comments.php
- includes/
  - database.php
  - authentication.php
  - roles.php
- models/
  - article.php
  - comment.php

```

### Kort beskrivning av mappar och filer
- public_html/ innehåller allt som är tillgängligt för besökare via webben. I denna mapp finns också undermappar för bloggen, kommentarer och administrativa funktioner.

- public_html/templates/ innehåller dina HTML-templates, inklusive header.php, footer.php och en article_template.php som används för att generera bloggartiklarnas layout.

- public_html/blog/ innehåller PHP-filer för att hantera bloggrelaterade funktioner, inklusive att visa bloggartiklar (index.php) och skriva nya artiklar (write.php).

- public_html/comments/ innehåller PHP-filer för att hantera kommentarer, inklusive att lägga till och redigera kommentarer.

- public_html/admin/ innehåller PHP-filer för administrativa funktioner som endast är tillgängliga för "Manager"-rollen. Här kan du hantera artiklar och kommentarer.

- includes/ innehåller PHP-filer som innehåller allmänna funktioner, t.ex. databasanslutning och autentisering.

- models/ kan innehålla PHP-filer som representerar dina dataobjekt, t.ex. article.php och comment.php, som hjälper dig att hantera bloggartiklar och kommentarer.


## Fördelar

- Med full, om än tillfällig, kontroll över strukturen kan den anpassas exakt efter projektets behov och krav. Några strikta konventioner behöver inte följas.

- Strukturen är ofta lätt att förstå och hantera, särskilt för ensamutvecklare och om projektet är relativt litet.

- Minimal inlärningskurva. Om du inte är bekant med ett specifikt ramverk behövs inte heller inlärning av andra struktur och konventioner vilket kan spara tid och möjliggöra snabbare utveckling.

## Nackdelar

- Brist på standardisering gör att andra utvecklare som går in i projektet i framtiden behöva tid att förstå och anpassa sig till din specifika struktur. Och du kan glömma.

- För mycket större projekt kan en sådan struktur sakna vissa organisatoriska och arkitektoniska fördelar som erbjuds av ramverk. Det kan bli svårare att hantera projektets komplexitet när det växer.

- Man kan behöva att själv implementera många grundläggande funktioner och säkerhetsåtgärder som ofta annars är inbyggda i populära ramverk.
