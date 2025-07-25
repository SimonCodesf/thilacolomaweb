<?php
/**
 * Script to create CMS sections and fields for homepage content
 */

// Bootstrap Craft
require_once 'bootstrap.php';

use craft\elements\Entry;
use craft\models\Section;
use craft\models\EntryType;
use craft\models\FieldGroup;
use craft\fields\PlainText;
use craft\fields\Assets;

// Get Craft services
$fieldsService = Craft::$app->getFields();
$sectionsService = Craft::$app->getSections();

echo "Creating CMS sections and fields for homepage...\n";

try {
    // Create field group for homepage
    $fieldGroup = new FieldGroup();
    $fieldGroup->name = 'Homepage Content';
    $fieldsService->saveGroup($fieldGroup);
    echo "✓ Created field group: Homepage Content\n";

    // Create fields
    $siteTitle = new PlainText();
    $siteTitle->name = 'Site Title';
    $siteTitle->handle = 'siteTitle';
    $siteTitle->groupId = $fieldGroup->id;
    $siteTitle->instructions = 'Main title for the homepage';
    $fieldsService->saveField($siteTitle);
    echo "✓ Created field: Site Title\n";

    $siteDescription = new PlainText();
    $siteDescription->name = 'Site Description';
    $siteDescription->handle = 'siteDescription';
    $siteDescription->groupId = $fieldGroup->id;
    $siteDescription->instructions = 'Main description text for the homepage';
    $siteDescription->multiline = true;
    $fieldsService->saveField($siteDescription);
    echo "✓ Created field: Site Description\n";

    $siteLocation = new PlainText();
    $siteLocation->name = 'Site Location';
    $siteLocation->handle = 'siteLocation';
    $siteLocation->groupId = $fieldGroup->id;
    $siteLocation->instructions = 'Location description for the homepage';
    $fieldsService->saveField($siteLocation);
    echo "✓ Created field: Site Location\n";

    // Create homepage content section
    $section = new Section();
    $section->name = 'Homepage Content';
    $section->handle = 'homepageContent';
    $section->type = Section::TYPE_SINGLE;
    $section->siteSettings = [
        1 => [
            'siteId' => 1,
            'enabledByDefault' => true,
            'hasUrls' => false,
            'uriFormat' => null,
            'template' => null,
        ]
    ];

    $sectionsService->saveSection($section);
    echo "✓ Created section: Homepage Content\n";

    // Create entry type for homepage content
    $entryType = new EntryType();
    $entryType->name = 'Homepage Content';
    $entryType->handle = 'homepageContent';
    $entryType->sectionId = $section->id;
    
    // Set field layout
    $fieldLayout = Craft::$app->getFields()->assembleLayout([
        'Homepage Content' => [
            'siteTitle',
            'siteDescription', 
            'siteLocation'
        ]
    ], Entry::class);
    $entryType->setFieldLayout($fieldLayout);

    $sectionsService->saveEntryType($entryType);
    echo "✓ Created entry type: Homepage Content\n";

    // Create the homepage content entry
    $entry = new Entry();
    $entry->sectionId = $section->id;
    $entry->typeId = $entryType->id;
    $entry->title = 'Homepage Content';
    $entry->setFieldValue('siteTitle', 'Thila Coloma');
    $entry->setFieldValue('siteDescription', 'Thila Coloma is een gemengde jeugdbeweging die in 1975 werd opgericht en ondertussen tot de grootste scoutsgroep van Mechelen is uitgegroeid. Ruim 400 jongeren voelen zich bij ons thuis. Hiermee zijn we de 5de grootste scoutsgroep van Vlaanderen.');
    $entry->setFieldValue('siteLocation', 'Ons terrein ligt tussen de Jubellaan en de Geerdegemstraat.');

    if (Craft::$app->getElements()->saveElement($entry)) {
        echo "✓ Created homepage content entry\n";
    } else {
        echo "✗ Failed to create homepage content entry: " . implode(', ', $entry->getErrors()) . "\n";
    }

    echo "\n✅ Homepage CMS setup complete!\n";
    echo "You can now edit the content at: http://thilacolomaweb.ddev.site/admin/entries/homepageContent\n";

} catch (Exception $e) {
    echo "✗ Error: " . $e->getMessage() . "\n";
    echo "Stack trace: " . $e->getTraceAsString() . "\n";
}
