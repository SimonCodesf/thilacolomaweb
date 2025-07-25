#!/usr/bin/env php
<?php

/**
 * Create test data for Thila Coloma website
 */

use craft\elements\Entry;
use craft\console\Application;

// Bootstrap Craft
define('CRAFT_BASE_PATH', dirname(__DIR__));
require_once CRAFT_BASE_PATH . '/vendor/autoload.php';

$app = new Application([
    'id' => 'craft-console',
    'basePath' => CRAFT_BASE_PATH,
    'vendorPath' => CRAFT_BASE_PATH . '/vendor',
]);

try {
    echo "Creating test data for Thila Coloma website...\n\n";
    
    // Get sections
    $homepageSection = Craft::$app->sections->getSectionByHandle('homepageContent');
    $slideshowSection = Craft::$app->sections->getSectionByHandle('slideshow');
    
    if (!$homepageSection) {
        echo "❌ Homepage content section not found\n";
        exit(1);
    }
    
    if (!$slideshowSection) {
        echo "❌ Slideshow section not found\n";
        exit(1);
    }
    
    // Create homepage content entry
    echo "📄 Creating homepage content...\n";
    $homepageEntry = Entry::find()->section('homepageContent')->one();
    
    if (!$homepageEntry) {
        $homepageEntry = new Entry();
        $homepageEntry->sectionId = $homepageSection->id;
        $homepageEntry->typeId = $homepageSection->getEntryTypes()[0]->id;
        $homepageEntry->title = 'Homepage Content';
        
        // Set field values if fields exist
        $homepageEntry->setFieldValue('siteTitle', 'Thila Coloma');
        $homepageEntry->setFieldValue('siteDescription', 'Thila Coloma is een gemengde jeugdbeweging die in 1975 werd opgericht en ondertussen tot de grootste scoutsgroep van Mechelen is uitgegroeid. Ruim 400 jongeren voelen zich bij ons thuis. Hiermee zijn we de 5de grootste scoutsgroep van Vlaanderen.');
        $homepageEntry->setFieldValue('siteLocation', 'Ons terrein ligt tussen de Jubellaan en de Geerdegemstraat.');
        
        if (Craft::$app->elements->saveElement($homepageEntry)) {
            echo "✅ Homepage content created successfully\n";
        } else {
            echo "❌ Failed to create homepage content\n";
        }
    } else {
        echo "ℹ️  Homepage content already exists\n";
    }
    
    // Create slideshow entries
    echo "\n🎬 Creating slideshow entries...\n";
    
    $slideshowData = [
        [
            'title' => 'Pizzabak',
            'beschrijving' => 'TC organiseert weer een pizzabak voor onze nieuwe lokalen! Wij maken overheerlijke ambachtelijke pizza\'s die jullie 24 november kunnen komen ophalen op de scouts en thuis gewoon nog even moeten afbakken.',
            'image' => '1image.jpg'
        ],
        [
            'title' => 'Belofteweekend', 
            'beschrijving' => 'Het belofteweekend komt er weer aan! Vergeet zeker niet in te schrijven via stamhoofd, de deadline is 30 november.',
            'image' => '2image.jpg'
        ],
        [
            'title' => 'TC\'s Cadeaupakket',
            'beschrijving' => 'Nog op zoek naar het perfecte cadeau voor onder de kerstboom? Verras je geliefden met ons cadeaupakket met typisch Mechelse lekkernijen!',
            'image' => '3image.jpg'
        ]
    ];
    
    foreach ($slideshowData as $index => $data) {
        $existingEntry = Entry::find()->section('slideshow')->title($data['title'])->one();
        
        if (!$existingEntry) {
            $entry = new Entry();
            $entry->sectionId = $slideshowSection->id;
            $entry->typeId = $slideshowSection->getEntryTypes()[0]->id;
            $entry->title = $data['title'];
            
            // Set field values
            $entry->setFieldValue('titel', $data['title']);
            $entry->setFieldValue('beschrijving', $data['beschrijving']);
            
            if (Craft::$app->elements->saveElement($entry)) {
                echo "✅ Created slideshow entry: {$data['title']}\n";
            } else {
                echo "❌ Failed to create slideshow entry: {$data['title']}\n";
            }
        } else {
            echo "ℹ️  Slideshow entry already exists: {$data['title']}\n";
        }
    }
    
    echo "\n🎉 Test data creation completed!\n";
    
} catch (Exception $e) {
    echo "❌ Error: " . $e->getMessage() . "\n";
    exit(1);
}
