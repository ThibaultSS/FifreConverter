# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project Overview

FifreConverter is a Laravel 12 application that converts letters (A-G) into a 6-character code ("fifre" notation) and displays them in a vertical grid format. Users enter words using only letters A-G via a form, and the app converts each letter to a 6-character binary-like string (using `0` and `X`), then rotates the output to display vertically.

## Commands

- **Dev server:** `composer dev` (runs artisan serve, queue, pail, and vite concurrently)
- **Setup:** `composer setup`
- **Tests:** `composer test` or `php artisan test`
- **Single test:** `php artisan test --filter=TestName`
- **Lint/format:** `./vendor/bin/pint`
- **Build frontend:** `npm run build`
- **Frontend dev:** `npm run dev`

## Architecture

- **Single controller app:** `ConvertController` handles all conversion logic via `POST /print`
- **Flow:** Form submits `letters[]` array → `makeArray()` splits each string into chars → `convertArray()` maps each letter to its 6-char fifre code → `printVertical()` rotates the horizontal codes into vertical column output
- **Views:** `home.blade.php` is the only custom view — contains the form and JS for dynamically adding input lines
- **No database models in use** — this is a stateless conversion tool
- **Testing:** Uses Pest (v4)

## Fifre Encoding Map

Letters A-G each map to a 6-character string of `0` and `X` (defined in `ConvertController::convertLetter()`). Only letters A-G and spaces are valid input (enforced by regex pattern on form inputs).
