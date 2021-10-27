<!doctype html>
<html lang="{{ LaravelLocalization::getCurrentLocale() }}"
dir="{{ LaravelLocalization::getCurrentLocale() }}"
>
<head>
    <meta charset="utf-8">
    <title>Titre de la page</title>
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
</head>
<body>
<div>
    <h1>
        {{__("Title")}}
    </h1>
    <p>
        {{ LaravelLocalization::getCurrentLocale() }}
    </p>
    <p>
        {{ LaravelLocalization::getCurrentLocaleName() }}
    </p>
    <ul>
        @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
            <li>
                <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                    {{ $properties['native'] }}
                </a>
            </li>
        @endforeach
    </ul>
</div>
</body>
</html>
