# Project Config for Thila Coloma

Hier vind je de configuratie voor sections, fields en andere Craft instellingen.

## Fields (Velden)

### News Section Fields
```yaml
fields:
  newsImage:
    name: "Nieuws Afbeelding"
    handle: "newsImage"
    type: "craft\\fields\\Assets"
    settings:
      useSingleFolder: true
      defaultUploadLocationSource: "volume:news"
      restrictLocation: true
      allowedKinds: ["image"]
      limit: 1

  newsExcerpt:
    name: "Nieuws Samenvatting"
    handle: "newsExcerpt"
    type: "craft\\fields\\PlainText"
    settings:
      placeholder: "Korte samenvatting voor op de homepage..."
      charLimit: 300

  newsContent:
    name: "Nieuws Inhoud"
    handle: "newsContent"
    type: "craft\\fields\\Redactor"
    settings:
      redactorConfig: "Standard.json"
      purifyHtml: true
      cleanupHtml: true

  newsGallery:
    name: "Foto Galerij"
    handle: "newsGallery"
    type: "craft\\fields\\Assets"
    settings:
      useSingleFolder: true
      defaultUploadLocationSource: "volume:news"
      restrictLocation: true
      allowedKinds: ["image"]
```

### Navigation Section Fields
```yaml
fields:
  navigationIcon:
    name: "Navigatie Icoon"
    handle: "navigationIcon"
    type: "craft\\fields\\Assets"
    settings:
      useSingleFolder: true
      defaultUploadLocationSource: "volume:icons"
      restrictLocation: true
      allowedKinds: ["image"]
      limit: 1

  navigationLink:
    name: "Externe Link"
    handle: "navigationLink"
    type: "craft\\fields\\Url"
    settings:
      placeholder: "https://..."

  navigationOrder:
    name: "Volgorde"
    handle: "navigationOrder"
    type: "craft\\fields\\Number"
    settings:
      min: 1
      max: 99
```

### Page Section Fields
```yaml
fields:
  pageImage:
    name: "Pagina Afbeelding"
    handle: "pageImage"
    type: "craft\\fields\\Assets"
    settings:
      useSingleFolder: true
      defaultUploadLocationSource: "volume:pages"
      restrictLocation: true
      allowedKinds: ["image"]
      limit: 1

  pageContent:
    name: "Pagina Inhoud"
    handle: "pageContent"
    type: "craft\\fields\\Redactor"
    settings:
      redactorConfig: "Standard.json"
      purifyHtml: true
      cleanupHtml: true

  pageGallery:
    name: "Pagina Galerij"
    handle: "pageGallery"
    type: "craft\\fields\\Assets"
    settings:
      useSingleFolder: true
      defaultUploadLocationSource: "volume:pages"
      restrictLocation: true
      allowedKinds: ["image"]

  metaDescription:
    name: "Meta Beschrijving"
    handle: "metaDescription"
    type: "craft\\fields\\PlainText"
    settings:
      placeholder: "SEO beschrijving voor zoekmachines..."
      charLimit: 160
```

## Sections (Secties)

### News Section
```yaml
sections:
  news:
    name: "Nieuws"
    handle: "news"
    type: "channel"
    hasUrls: true
    uriFormat: "nieuws/{slug}"
    template: "nieuws/_entry"
    enableVersioning: true
    fieldLayout:
      - tab: "Inhoud"
        fields:
          - title
          - slug
          - newsImage
          - newsExcerpt
          - newsContent
          - newsGallery
      - tab: "SEO"
        fields:
          - metaDescription
```

### Pages Section
```yaml
sections:
  pages:
    name: "Pagina's"
    handle: "pages"
    type: "structure"
    hasUrls: true
    uriFormat: "{slug}"
    template: "pages/_entry"
    maxLevels: 3
    enableVersioning: true
    fieldLayout:
      - tab: "Inhoud"
        fields:
          - title
          - slug
          - pageImage
          - pageContent
          - pageGallery
      - tab: "SEO"
        fields:
          - metaDescription
```

### Navigation Section
```yaml
sections:
  navigation:
    name: "Navigatie"
    handle: "navigation"
    type: "channel"
    hasUrls: false
    enableVersioning: false
    fieldLayout:
      - tab: "Navigatie"
        fields:
          - title
          - navigationIcon
          - navigationLink
          - navigationOrder
```

## Volumes (Bestanden)

```yaml
volumes:
  news:
    name: "Nieuws Bestanden"
    handle: "news"
    type: "craft\\volumes\\Local"
    settings:
      path: "@webroot/uploads/news"
      url: "@web/uploads/news"

  pages:
    name: "Pagina Bestanden"
    handle: "pages"
    type: "craft\\volumes\\Local"
    settings:
      path: "@webroot/uploads/pages"
      url: "@web/uploads/pages"

  icons:
    name: "Iconen"
    handle: "icons"
    type: "craft\\volumes\\Local"
    settings:
      path: "@webroot/uploads/icons"
      url: "@web/uploads/icons"
```

## Globals (Globale instellingen)

```yaml
globals:
  organization:
    name: "Organisatie Informatie"
    handle: "organization"
    fieldLayout:
      - tab: "Algemeen"
        fields:
          - organizationName
          - organizationDescription
          - organizationLocation
          - organizationFounded
          - organizationMemberCount
          - organizationRanking
          - organizationCity
          - organizationLogo
          - organizationMission
```
