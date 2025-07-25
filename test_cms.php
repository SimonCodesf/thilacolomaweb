<?php
/**
 * Simple script to create homepage content via Craft console
 */

use craft\console\Application;
use craft\elements\Entry;

// Bootstrap Craft console
$app = require __DIR__ . '/vendor/craftcms/cms/bootstrap/console.php';

// Create a simple entry for testing
echo "Testing Craft CMS connection...\n";

try {
    $sections = \Craft::$app->getSections()->getAllSections();
    echo "Found " . count($sections) . " sections:\n";
    foreach ($sections as $section) {
        echo "- " . $section->name . " (handle: " . $section->handle . ")\n";
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
