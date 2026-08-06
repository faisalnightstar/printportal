# Local Setup

This repository is a PHP application served from the web root at `/Users/faisal/Movies/Movies/public_html`.

## Prerequisites

- macOS
- Homebrew installed
- PHP installed via Homebrew

## Install PHP

If PHP is not installed, run:

```bash
brew install php
```

This will install the Homebrew PHP CLI and the built-in PHP development server.

## Run Locally

From the project root:

```bash
cd /Users/faisal/Movies/Movies/public_html
php -S localhost:8000 -t .
```

Then open:

```text
http://localhost:8000
```

## Verify the Server

A successful start should show output like:

```text
PHP 8.x.x Development Server (http://localhost:8000) started
```

## Stop the Server

If you started the built-in server in the foreground, press `Ctrl+C` to stop it.

If you started it in the background, find the PID and kill it:

```bash
lsof -iTCP:8000 -sTCP:LISTEN -Pn
kill <PID>
```

## Notes

- There is no root `composer.json` file in this repository.
- The web server document root is the current directory (`.`).
- If port `8000` is already in use, pick another port, for example:

```bash
php -S localhost:8080 -t .
```
