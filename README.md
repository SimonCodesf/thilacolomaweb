# Thila Coloma Website

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
