
# EmailHint

EmailHint is a package designed for Laravel that provides correction suggestions for email addresses entered with typing errors. It uses the Levenshtein algorithm to determine the similarity between the entered email and a set of common email domains, suggesting appropriate corrections.

## Installation

To install the package, use Composer:

```bash
composer require steno983/emailhint
```

After installing the package, you can publish the configuration file (if necessary) with:

```bash
php artisan vendor:publish --provider="Steno983\EmailHint\EmailHintServiceProvider"
```

## Configuration

After publishing the configuration file, you can modify the settings in the `config/emailhint.php` file. Here you can define the list of common email domains and set other configurations such as the Levenshtein threshold and domain to exclude from the check process.

## Usage

To use EmailHint, you can rely on the `EmailHintService` service. Here's an example:

```php
use Steno983\EmailHint\Services\EmailHintService;

$email = 'example@gmial.com';
$suggestedEmail = EmailHintService::hint($email);

if ($suggestedEmail) {
    echo "Did you mean: $suggestedEmail";
} else {
    echo "No suggestion available.";
}
```

## Features

- Suggestions for correcting common errors in email addresses.
- Customization of common email domains through the configuration file.
- Customization of the tolerance level for the Levenshtein distance.

## Contributing

Contributions to the package are welcome! Please follow the contribution guidelines:

- Fork the repository.
- Create a new branch for each feature or improvement.
- Submit a pull request with a detailed description.

## License

The EmailHint package is released under the [MIT License](LICENSE).
