/**
 * Navigation Component
 * Renders navigation buttons from site configuration
 */
class Navigation {
    constructor(containerId, configUrl = 'data/site-config.json') {
        this.container = document.getElementById(containerId);
        this.configUrl = configUrl;
        this.init();
    }

    async init() {
        try {
            const config = await this.loadConfig();
            this.render(config.navigation);
        } catch (error) {
            console.error('Navigation initialization failed:', error);
        }
    }

    async loadConfig() {
        const response = await fetch(this.configUrl);
        return await response.json();
    }

    render(navigationItems) {
        if (!this.container) return;

        // Sort by order
        const sortedItems = navigationItems.sort((a, b) => a.order - b.order);

        this.container.innerHTML = sortedItems.map(item => `
            <a href="${item.link}" 
               class="nav-button" 
               style="background-color: ${item.color}"
               aria-label="${item.title}">
                <img src="${item.icon}" alt="${item.title} icoon">
                <h3>${item.title}</h3>
            </a>
        `).join('');
    }
}

/**
 * Site Configuration Manager
 * Manages global site configuration
 */
class SiteConfig {
    constructor(configUrl = 'data/site-config.json') {
        this.configUrl = configUrl;
        this.config = null;
    }

    async load() {
        try {
            const response = await fetch(this.configUrl);
            this.config = await response.json();
            return this.config;
        } catch (error) {
            console.error('Failed to load site config:', error);
            return null;
        }
    }

    get(key) {
        return this.config ? this.config[key] : null;
    }

    getOrganization() {
        return this.get('organization');
    }

    getNavigation() {
        return this.get('navigation');
    }
}

// Export for potential module use
if (typeof module !== 'undefined' && module.exports) {
    module.exports = { Navigation, SiteConfig };
}
