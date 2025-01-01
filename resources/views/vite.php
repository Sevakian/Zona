<?php

declare(strict_types=1);

use Illuminate\Support\HtmlString;

if (app()->isLocal()) {
    echo new HtmlString(<<<'HTML'
        <script type="module" src="http://localhost:5173/@vite/client"></script>
        <script type="module" src="http://localhost:5173/resources/js/app.ts"></script>
        <script>console.log('Connected to vite!')</script>
    HTML);

    return;
} else {
    echo new HtmlString(<<<'HTML'
        <link rel="stylesheet" href="{{ asset('build/assets/app.css') }}">
        <script type="module" src="{{ asset('build/assets/app.js') }}"></script>
    HTML);

    return;
}
