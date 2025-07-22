# Thila Coloma Website

Een moderne, responsieve website voor scoutsgroep Thila Coloma uit Mechelen. De website is gebouwd met een modulaire architectuur die CMS-integratie mogelijk maakt.

## 🚀 Features

### Huidige Functionaliteiten
- **Responsief Design**: Werkt perfect op desktop, tablet en mobiel
- **Dynamische Content**: JSON-gebaseerde content management
- **Interactieve Slideshow**: Nieuwsberichten met automatische rotatie
- **Modulaire Architectuur**: Herbruikbare componenten voor toekomstige uitbreiding

### Pagina's
1. **Home**: Overzicht nieuwsberichten en snelle navigatie
2. **Over Ons**: Missie, geschiedenis en jaarthema
3. **Thilala**: PDF viewer voor maandelijkse blad
4. **Kalender**: Overzicht evenementen en kampen
5. **Takken**: Alle leeftijdsgroepen met details
6. **Verhuur**: Lokalen en materiaal verhuur
7. **Meer**: Contact, documenten, galerij en FAQ

## 📁 Project Structuur

```
thilacolomaweb/
├── index.html                 # Homepage
├── pages/                     # Alle subpagina's
│   ├── over.html             # Over ons pagina
│   ├── thilala.html          # Thilala PDF viewer
│   ├── kalender.html         # Evenementen kalender
│   ├── takken.html           # Scouts takken
│   ├── verhuur.html          # Verhuur informatie
│   └── meer.html             # Contact, FAQ, etc.
├── assets/
│   ├── css/                  # Stylesheet bestanden
│   │   ├── variables.css     # CSS variabelen
│   │   ├── main.css         # Basis styling
│   │   ├── pages.css        # Pagina-specifieke styling
│   │   ├── navigation.css   # Navigatie styling
│   │   └── responsive.css   # Responsive breakpoints
│   ├── js/                  # JavaScript bestanden
│   │   ├── slideshow.js     # Basis slideshow functionaliteit
│   │   └── news-slideshow.js # Dynamische nieuws slideshow
│   ├── images/              # Afbeeldingen
│   │   ├── icons/           # SVG iconen
│   │   ├── slideshow/       # Slideshow afbeeldingen
│   │   └── gallery/         # Galerij foto's
│   └── documents/           # PDF's en downloads
├── components/               # Herbruikbare componenten
│   └── page-template.js     # Template systeem
└── data/
    └── site-config.json     # Alle website data
```

## 🛠️ Setup & Installatie

### Lokale Development
```bash
# Clone repository
git clone https://github.com/username/thilacolomaweb.git

# Open in VS Code of andere editor
cd thilacolomaweb

# Gebruik een lokale server (bijvoorbeeld Live Server extensie in VS Code)
# Of gebruik Python:
python -m http.server 8000

# Open browser: http://localhost:8000
```

### Voor Production
```bash
# Upload alle bestanden naar webserver
# Zorg ervoor dat de server HTTPS ondersteunt
# Test alle functionaliteiten
```

## 📝 Content Management

### Nieuws Berichten Toevoegen
Bewerk `assets/js/news-slideshow.js` en voeg een nieuw object toe aan de `newsData` array:

```javascript
{
    id: 'unieke-id',
    title: 'Titel van het nieuwsbericht',
    datum: '2025-01-15',  // YYYY-MM-DD format
    image: 'assets/images/slideshow/nieuwe-afbeelding.jpg',
    samenvatting: 'Korte samenvatting voor op de homepage',
    inhoud: 'Volledige inhoud van het nieuwsbericht.

Meerdere paragrafen mogelijk.',
    actief: true
}
```

### Takken Informatie Wijzigen
Bewerk `data/site-config.json` in de `takken` sectie:

```json
{
    "id": "tak-id",
    "naam": "Tak Naam",
    "leeftijd": "X-Y jaar",
    "beschrijving": "Beschrijving van de tak",
    "activiteiten": ["activiteit1", "activiteit2"],
    "leiding": [
        {
            "naam": "Naam Leider",
            "totem": "Totem",
            "email": "email@thilacoloma.be",
            "telefoon": "+32 XX XX XX XX"
        }
    ],
    "kleur": "#HEX-kleur"
}
```

### Evenementen Toevoegen
Voeg toe aan de `evenementen` sectie in `data/site-config.json`:

```json
{
    "id": "evenement-id",
    "titel": "Evenement Titel",
    "datum": "2025-01-15",
    "eindDatum": "2025-01-17", // optioneel
    "type": "kamp",
    "tak": "welpen",
    "prijs": 120,
    "beschrijving": "Beschrijving van het evenement",
    "inschrijving": "https://stamhoofd.thilacoloma.be/kampen",
    "medischeFiche": "https://stamhoofd.thilacoloma.be/medische-fiche",
    "deadline": "2025-01-01"
}
```

### Jaarthema Wijzigen
Update de `yearTheme` sectie in `data/site-config.json`:

```json
"yearTheme": {
    "year": 2025,
    "title": "Thema Titel",
    "description": "Beschrijving van het jaarthema",
    "color": "#HEX-kleur"
}
```

## 🎨 Styling & Theming

### CSS Variabelen
Alle kleuren en styling kunnen aangepast worden in `assets/css/variables.css`:

```css
:root {
    --primary-color: #374794;    /* Hoofdkleur */
    --dark-color: #282471;       /* Donkere variant */
    --pink-color: #c0589a;       /* Accent kleur */
    --gold-color: #e6a630;       /* Goud accent */
    --broken-white: rgb(245, 246, 255); /* Achtergrond */
}
```

### Responsive Breakpoints
Responsieve styling staat in `assets/css/responsive.css` en `assets/css/pages.css`.

## 📱 Browser Ondersteuning

- Chrome (laatste 2 versies)
- Firefox (laatste 2 versies)
- Safari (laatste 2 versies)
- Edge (laatste 2 versies)
- Mobiele browsers (iOS Safari, Chrome Mobile)

## 🔧 Toekomstige CMS Integratie

De website is voorbereid voor CMS integratie:

### API Endpoints (voor toekomstig gebruik)
```javascript
// Nieuws berichten
GET /api/news
POST /api/news
PUT /api/news/{id}
DELETE /api/news/{id}

// Takken informatie
GET /api/takken
PUT /api/takken/{id}

// Evenementen
GET /api/evenementen
POST /api/evenementen
PUT /api/evenementen/{id}
DELETE /api/evenementen/{id}

// Site configuratie
GET /api/config
PUT /api/config
```

### Bestandslocaties voor CMS
- **Afbeeldingen uploads**: `assets/images/uploads/`
- **Document uploads**: `assets/documents/uploads/`
- **PDF bestanden**: `assets/documents/`

## 📞 Support & Contact

Voor technische vragen over de website:
- **Email**: website@thilacoloma.be
- **GitHub Issues**: Voor bug reports en feature requests

Voor inhoudelijke vragen:
- **Email**: info@thilacoloma.be

## 📄 Licentie

© 2025 Thila Coloma Mechelen. Alle rechten voorbehouden.

---

**Laatste update**: Juli 2025
**Versie**: 1.0.0

Een moderne website voor scoutsgroep Thila Coloma uit Mechelen.

## 📁 Project Structuur

```
website/
├── index.html              # Hoofdpagina
├── README.md               # Project documentatie
├── pages/                  # Subpagina's
│   └── thilala.html       # Clubblad viewer
├── assets/                 # Alle website assets
│   ├── css/               # Stylesheets
│   │   ├── variables.css  # CSS variabelen
│   │   ├── fonts.css      # Font definities
│   │   ├── main.css       # Basis stijlen
│   │   ├── slideshow.css  # Slideshow component
│   │   ├── navigation.css # Navigatie component
│   │   └── responsive.css # Mobile/tablet styling
│   ├── js/                # JavaScript bestanden
│   │   └── slideshow.js   # Slideshow functionaliteit
│   ├── fonts/             # Webfonts
│   │   ├── EdmondsansRegular_web.woff
│   │   ├── EdmondsansMedium_web.woff
│   │   └── EdmondsansBold_web.woff
│   ├── images/            # Afbeeldingen
│   │   ├── slideshow/     # Slideshow afbeeldingen
│   │   ├── icons/         # SVG iconen
│   │   ├── Logo_TC_ WIT.png
│   │   └── Banner-10.png
│   └── documents/         # PDF documenten
│       └── test.pdf
├── data/                  # Data bestanden (CMS-ready)
│   ├── slideshow.json     # Slideshow content
│   └── site-config.json   # Site configuratie
└── components/            # Herbruikbare componenten (toekomstig)
```

## 🎨 Design System

### Kleurenpalet
- **Primair**: `#374794` (Thila blauw)
- **Donker**: `#282471` (Donkerblauw)
- **Accent**: `#c0589a` (Roze/paars)
- **Goud**: `#e6a630`
- **Achtergrond**: `rgb(245, 246, 255)` (Gebroken wit)

### Typografie
- **Regular**: Edmondsans Regular
- **Medium**: Edmondsans Medium  
- **Bold**: Edmondsans Bold
- **Titels**: Acier Bat Solid (Adobe Fonts)

## 🚀 Features

### Slideshow Component
- Automatische rotatie (15 seconden)
- Touch/click navigatie
- Keyboard toegankelijkheid (pijltjes)
- Gestapeld 3D-effect
- Pause bij hover
- Data-driven content support

### Responsive Design
- Mobile-first benadering
- Breakpoint: 950px
- Touch-vriendelijke interface
- Optimale weergave op alle apparaten

### CMS-Ready
- JSON-gebaseerde content management
- Gestructureerde data bestanden
- Modulaire component architectuur
- Eenvoudig uitbreidbaar

## 📱 Browser Support

- Chrome 60+
- Firefox 55+
- Safari 11+
- Edge 79+

## 🔧 Development

### Local Development
1. Clone het project
2. Open `index.html` in een browser
3. Voor development gebruik een lokale server (bijv. Live Server)

### CSS Architecture
Het project gebruikt een modulaire CSS architectuur:
- `variables.css`: CSS custom properties
- `fonts.css`: Font face declaraties
- `main.css`: Basis layout en styling
- `slideshow.css`: Slideshow component
- `navigation.css`: Navigatie component
- `responsive.css`: Mobile/tablet aanpassingen

### JavaScript
- ES6+ syntax
- Class-based components
- Async/await voor data loading
- Event delegation
- Performance optimized

## 📊 Performance

- Optimized images (WebP support planned)
- CSS splits voor snellere loading
- Font-display: swap voor betere performance
- Minimale JavaScript footprint

## 🔮 Toekomstige Features

### CMS Integratie
- Headless CMS support (Strapi/Contentful)
- Dynamic content loading
- Admin interface
- Multi-language support

### Technische Verbeteringen
- Progressive Web App (PWA)
- Image optimization (WebP/AVIF)
- CSS/JS minification
- Service Worker voor offline support

### Nieuwe Pagina's
- Takken overzicht
- Kalender/events
- Contact pagina
- Foto galerij
- Verhuur systeem

## 📄 License

© 2024 Thila Coloma. Alle rechten voorbehouden.

## 🤝 Contact

Voor vragen over de website:
- Email: info@thilacoloma.be
- Website: www.thilacoloma.be
