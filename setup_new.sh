#!/bin/bash

# Craft CMS Setup Script voor Thila Coloma

echo "🚀 Craft CMS Setup voor Thila Coloma wordt gestart..."

# Check if we're in the right directory
if [ ! -f "composer.json" ]; then
    echo "❌ Error: Dit script moet uitgevoerd worden in de craft/ directory"
    exit 1
fi

# Check if Composer is installed
if ! command -v composer &> /dev/null; then
    echo "❌ Error: Composer is niet geïnstalleerd. Installeer eerst Composer."
    exit 1
fi

# Check if PHP is installed and version
if ! command -v php &> /dev/null; then
    echo "❌ Error: PHP is niet geïnstalleerd."
    exit 1
fi

PHP_VERSION=$(php -r "echo PHP_MAJOR_VERSION.'.'.PHP_MINOR_VERSION;")
if [ "$(printf '%s\n' "8.1" "$PHP_VERSION" | sort -V | head -n1)" != "8.1" ]; then
    echo "❌ Error: PHP 8.1 of hoger is vereist. Huidige versie: $PHP_VERSION"
    exit 1
fi

echo "✅ PHP versie $PHP_VERSION gevonden"

# Install Composer dependencies
echo "📦 Composer dependencies installeren..."
composer install --no-dev --optimize-autoloader

if [ $? -ne 0 ]; then
    echo "❌ Error: Composer install gefaald"
    exit 1
fi

echo "✅ Composer dependencies geïnstalleerd"

# Check if .env exists, if not copy from example
if [ ! -f ".env" ]; then
    echo "📝 .env file aanmaken..."
    cp .env.example .env
    echo "⚠️  Vergeet niet je database instellingen te configureren in .env"
else
    echo "✅ .env file bestaat al"
fi

# Generate security key if not set
if ! grep -q "CRAFT_SECURITY_KEY=" .env || grep -q "CRAFT_SECURITY_KEY=$" .env; then
    echo "🔐 Security key genereren..."
    ./craft setup/security-key
    echo "✅ Security key gegenereerd"
fi

# Make storage directory writable
echo "📁 Storage directory permissies instellen..."
chmod -R 755 storage/
chmod -R 755 web/cpresources/ 2>/dev/null || mkdir -p web/cpresources && chmod -R 755 web/cpresources/

echo "✅ Permissies ingesteld"

# Check database connection
echo "🔌 Database connectie testen..."
if ./craft setup/db-creds; then
    echo "✅ Database connectie succesvol"
    
    # Run Craft install
    echo "⚙️  Craft CMS installeren..."
    ./craft install
    
    if [ $? -eq 0 ]; then
        echo "🎉 Craft CMS is succesvol geïnstalleerd!"
        echo ""
        echo "📋 Volgende stappen:"
        echo "1. Configureer je webserver om naar de web/ directory te wijzen"
        echo "2. Ga naar /admin om in te loggen"
        echo "3. Maak de benodigde sections en fields aan (zie INSTALLATION.md)"
        echo "4. Migreer je bestaande content"
        echo ""
        echo "🌐 Lokale development server starten met: php -S localhost:8080 -t web/"
    else
        echo "❌ Craft installatie gefaald"
        exit 1
    fi
else
    echo "❌ Database connectie gefaald. Controleer je .env instellingen."
    echo "💡 Tip: Zorg ervoor dat je database bestaat en de credentials correct zijn."
    exit 1
fi
