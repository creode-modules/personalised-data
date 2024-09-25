# Creode Personalised Data
This package is designed to be used on sites where dynamic data needs to be hydrated into the page at certain intervals. This is useful for sites that are built with a static site generator, or where the initial page load is slow due to the amount of data that needs to be loaded.

## Installation
```bash
composer require creode/personalised-data
```

## Usage
The package is designed to be used with a Laravel application. The package provides a Blade directive that can be used to define the data that needs to be loaded into the page after the initial page load.

### Blade Directive
The Blade directive is `@personalisedData` and will handle the registration of the initialisation script and needs to be placed within your blade layout file.

```blade
@personalisedData
```

### Registering data
Data to be returned from the personalised data module can be defined by attaching a callable with a key and return data to the attach function of the `Creode\PersonalisedData\Services\PersonalisedData` service class.

```php
use Creode\PersonalisedData\Services\PersonalisedData;

PersonalisedData::attach('product_comparisons', function() {
    $productIds = app(StorageInterface::class)->get();
    return ProductRepository::with(['featuredImage', 'category'])->find($productIds);
});
```

### Hydrating data
The data attribute fires off a JavaScript window event, with a detail parameter containing all of the personalised data. Once loaded submodules can listen to and act upon to attach the data to the page.

```javascript
document.addEventListener('getPersonalisedDataComplete', (e) => {
    for (let product of e.detail.product_comparisons) {
        store.add(product);
    }
});
```
