// Page Template Component
class PageTemplate {
    constructor(config = {}) {
        this.config = config;
        this.siteData = null;
        this.loadSiteData();
    }

    async loadSiteData() {
        try {
            const response = await fetch('/data/site-config.json');
            this.siteData = await response.json();
        } catch (error) {
            console.error('Error loading site data:', error);
        }
    }

    createHeader(title = '') {
        return `
            <header class="page-header">
                <div class="header-content">
                    <a href="/index.html" class="logo-link">
                        <img src="/assets/images/Logo_TC_ WIT.png" alt="Thila Coloma Logo">
                        <h1>Thila Coloma</h1>
                    </a>
                    ${title ? `<h2 class="page-title">${title}</h2>` : ''}
                </div>
                <nav class="header-nav">
                    <a href="/index.html">Home</a>
                    <a href="/pages/thilala.html">Thilala</a>
                    <a href="/pages/kalender.html">Kalender</a>
                    <a href="/pages/takken.html">Takken</a>
                    <a href="/pages/verhuur.html">Verhuur</a>
                    <a href="/pages/meer.html">Meer</a>
                </nav>
            </header>
        `;
    }

    createFooter() {
        return `
            <footer class="page-footer">
                <div class="footer-content">
                    <div class="footer-section">
                        <h3>Contact</h3>
                        <p>Thila Coloma Mechelen</p>
                        <p>Jubellaan / Geerdegemstraat</p>
                        <p>Email: info@thilacoloma.be</p>
                    </div>
                    <div class="footer-section">
                        <h3>Sociale Media</h3>
                        <div class="social-links">
                            <a href="#" aria-label="Facebook"><i class="fab fa-facebook"></i></a>
                            <a href="#" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                    <div class="footer-section">
                        <h3>Links</h3>
                        <a href="https://stamhoofd.thilacoloma.be" target="_blank">Stamhoofd</a>
                        <a href="/pages/meer.html#contact">Contact</a>
                    </div>
                </div>
                <div class="footer-bottom">
                    <p>&copy; ${new Date().getFullYear()} Thila Coloma Mechelen</p>
                </div>
            </footer>
        `;
    }

    createPageLayout(content, title = '') {
        return `
            <!DOCTYPE html>
            <html lang="nl">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>${title ? title + ' - ' : ''}Thila Coloma - Scoutsgroep Mechelen</title>
                <link rel="stylesheet" href="/assets/css/variables.css">
                <link rel="stylesheet" href="/assets/css/fonts.css">
                <link rel="stylesheet" href="/assets/css/main.css">
                <link rel="stylesheet" href="/assets/css/pages.css">
                <link rel="stylesheet" href="/assets/css/navigation.css">
                <link rel="stylesheet" href="/assets/css/responsive.css">
                <link rel="stylesheet" href="https://use.typekit.net/rae0xxq.css">
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
            </head>
            <body>
                ${this.createHeader(title)}
                <main class="page-content">
                    ${content}
                </main>
                ${this.createFooter()}
                <script src="/components/components.js"></script>
            </body>
            </html>
        `;
    }
}

// Card Component
class CardComponent {
    static create(data, type = 'default') {
        switch(type) {
            case 'news':
                return this.createNewsCard(data);
            case 'tak':
                return this.createTakCard(data);
            case 'event':
                return this.createEventCard(data);
            case 'verhuur':
                return this.createVerhuurCard(data);
            default:
                return this.createDefaultCard(data);
        }
    }

    static createNewsCard(news) {
        return `
            <div class="news-card card">
                <div class="card-image">
                    <img src="${news.image}" alt="${news.title}">
                </div>
                <div class="card-content">
                    <div class="card-meta">
                        <span class="date">${new Date(news.datum).toLocaleDateString('nl-BE')}</span>
                    </div>
                    <h3>${news.title}</h3>
                    <p>${news.samenvatting}</p>
                    <button class="meer-button" onclick="openNewsDetail('${news.id}')">Meer info</button>
                </div>
            </div>
        `;
    }

    static createTakCard(tak) {
        return `
            <div class="tak-card card" style="border-left: 4px solid ${tak.kleur}">
                <div class="card-content">
                    <h3>${tak.naam}</h3>
                    <div class="tak-leeftijd">${tak.leeftijd}</div>
                    <p>${tak.beschrijving}</p>
                    <div class="tak-activiteiten">
                        <strong>Activiteiten:</strong>
                        ${tak.activiteiten.map(act => `<span class="activiteit-tag">${act}</span>`).join('')}
                    </div>
                    <div class="tak-leiding">
                        <strong>Leiding:</strong>
                        ${tak.leiding.map(leider => `
                            <div class="leider">
                                <span class="leider-naam">${leider.naam} (${leider.totem})</span>
                                <a href="mailto:${leider.email}">${leider.email}</a>
                            </div>
                        `).join('')}
                    </div>
                </div>
            </div>
        `;
    }

    static createEventCard(event) {
        const startDate = new Date(event.datum);
        const endDate = event.eindDatum ? new Date(event.eindDatum) : null;
        const deadlineDate = new Date(event.deadline);
        
        return `
            <div class="event-card card">
                <div class="card-content">
                    <div class="event-type">${event.type}</div>
                    <h3>${event.titel}</h3>
                    <div class="event-details">
                        <div class="event-date">
                            <i class="fas fa-calendar"></i>
                            ${startDate.toLocaleDateString('nl-BE')}
                            ${endDate ? ' - ' + endDate.toLocaleDateString('nl-BE') : ''}
                        </div>
                        <div class="event-price">
                            <i class="fas fa-euro-sign"></i>
                            ${event.prijs}
                        </div>
                        <div class="event-deadline">
                            <i class="fas fa-clock"></i>
                            Inschrijven voor ${deadlineDate.toLocaleDateString('nl-BE')}
                        </div>
                    </div>
                    <p>${event.beschrijving}</p>
                    <div class="event-actions">
                        <a href="${event.inschrijving}" class="btn btn-primary" target="_blank">Inschrijven</a>
                        <a href="${event.medischeFiche}" class="btn btn-secondary" target="_blank">Medische fiche</a>
                    </div>
                </div>
            </div>
        `;
    }

    static createDefaultCard(data) {
        return `
            <div class="card">
                <div class="card-content">
                    <h3>${data.title || data.naam || 'Titel'}</h3>
                    <p>${data.description || data.beschrijving || ''}</p>
                </div>
            </div>
        `;
    }
}

// Export for use in other files
if (typeof module !== 'undefined' && module.exports) {
    module.exports = { PageTemplate, CardComponent };
}
