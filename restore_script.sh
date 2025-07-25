#!/bin/bash

# Script om backup bestanden te herstellen
cd "/Users/simon/Documents/GitHub/thilacolomaweb/restored backups/"

echo "=== BACKUP BESTAND MAPPING ==="

# Detecteer automatisch alle backup bestanden en hun doelpaden
echo "=== GEDETECTEERDE BACKUP BESTANDEN ==="

# Maak een lijst van alle backup files en hun doelen
backup_files=()
target_paths=()

for file in *; do
    if [ -f "$file" ]; then
        # Extract het originele pad uit de eerste regel
        original_path=$(head -1 "$file" 2>/dev/null | grep -o 'file://[^"]*' | sed 's|file://||')
        if [ -n "$original_path" ]; then
            # Verwijder /craft/ prefix en pas aan naar juiste projectpad
            target_path=$(echo "$original_path" | sed 's|.*/craft/||g')
            target_path="/Users/simon/Documents/GitHub/thilacolomaweb/$target_path"
            
            backup_files+=("$file")
            target_paths+=("$target_path")
            
            echo "Backup: $file -> Target: $target_path"
        fi
    fi
done

echo ""
echo "=== BESTAND HERSTEL PROCES ==="

# Vraag bevestiging
read -p "Wil je doorgaan met het herstellen van deze bestanden? (y/N): " confirm
if [[ $confirm != [yY] ]]; then
    echo "Herstel geannuleerd."
    exit 0
fi

# Herstel elk bestand
restored_count=0
failed_count=0

for ((i=0; i<${#backup_files[@]}; i++)); do
    backup_file="${backup_files[$i]}"
    target_path="${target_paths[$i]}"
    
    echo "Bezig met herstellen: $backup_file -> $target_path"
    
    # Maak target directory aan als het niet bestaat
    target_dir=$(dirname "$target_path")
    if [ ! -d "$target_dir" ]; then
        echo "  Aanmaken directory: $target_dir"
        mkdir -p "$target_dir"
    fi
    
    # Extract de werkelijke bestandsinhoud (skip de eerste regel met metadata)
    if tail -n +2 "$backup_file" > "$target_path" 2>/dev/null; then
        echo "  ✅ Succesvol hersteld: $target_path"
        ((restored_count++))
    else
        echo "  ❌ Fout bij herstellen: $target_path"
        ((failed_count++))
    fi
    echo ""
done

echo "=== HERSTEL SAMENVATTING ==="
echo "Succesvol hersteld: $restored_count bestanden"
echo "Mislukt: $failed_count bestanden"
echo ""

if [ $restored_count -gt 0 ]; then
    echo "🎉 Website backup succesvol hersteld!"
    echo "Je kunt nu je website testen."
else
    echo "⚠️  Geen bestanden konden worden hersteld."
fi
