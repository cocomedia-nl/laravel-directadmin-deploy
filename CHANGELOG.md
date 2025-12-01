# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

> **Note:** This package is a fork of [thecodeholic/laravel-hostinger-deploy](https://github.com/thecodeholic/laravel-hostinger-deploy), rebranded and adapted for DirectAdmin shared hosting environments. For historical versions (0.1.0-0.4.0), please refer to the [original repository](https://github.com/thecodeholic/laravel-hostinger-deploy).

## [0.1.2] - 2025-12-01

### Changed

-   Further code quality improvements
-   Enhanced documentation

### Fixed

-   Additional bug fixes and stability improvements

## [0.1.1] - 2025-12-01

### Changed

-   Improved code quality and formatting
-   Enhanced service implementations
-   Updated command implementations

### Fixed

-   Minor bug fixes and improvements

## [0.1.0] - 2025-11-27

### Initial Release

This is the first stable release of the DirectAdmin deployment package, forked from the original Hostinger deployment package.

### What's Included

-   Complete DirectAdmin shared hosting deployment support
-   Automated GitHub Actions workflow setup
-   SSH key management and deploy key automation
-   Frontend asset building and deployment
-   Full Laravel environment setup in CI/CD pipeline
-   Enhanced error handling with detailed diagnostics
-   Support for Laravel 11 and 12

### Available Commands

-   `directadmin:deploy` - Deploy Laravel application to DirectAdmin shared hosting
-   `directadmin:setup-cicd` - Setup automated deployment via GitHub API
-   `directadmin:deploy-and-setup-cicd` - All-in-one deployment and CI/CD setup
-   `directadmin:publish-workflow` - Create GitHub Actions workflow file locally

### Required Environment Variables

```env
DIRECTADMIN_SSH_HOST=your-server-ip
DIRECTADMIN_SSH_USERNAME=your-username
DIRECTADMIN_SSH_PORT=22
DIRECTADMIN_SITE_DIR=your-website-folder
GITHUB_API_TOKEN=your-github-token # Optional, for automated setup
```

### Migration from Original Package

If you're migrating from `thecodeholic/laravel-hostinger-deploy`:

1. Update composer.json:

```bash
composer remove thecodeholic/laravel-hostinger-deploy
composer require cocomedia-nl/laravel-directadmin-deploy --dev
```

2. Update your `.env` file:

```diff
- HOSTINGER_SSH_HOST=your-host
- HOSTINGER_SSH_USERNAME=your-username
- HOSTINGER_SSH_PORT=22
- HOSTINGER_SITE_DIR=your-domain.com
+ DIRECTADMIN_SSH_HOST=your-host
+ DIRECTADMIN_SSH_USERNAME=your-username
+ DIRECTADMIN_SSH_PORT=22
+ DIRECTADMIN_SITE_DIR=your-domain.com
```

3. Update your command calls:

```diff
- php artisan hostinger:deploy
+ php artisan directadmin:deploy
```

4. Republish config and workflow:

```bash
php artisan vendor:publish --tag=directadmin-deploy-config --force
php artisan directadmin:publish-workflow
```

5. Update GitHub repository secrets to use the new environment variable names

### Why DirectAdmin?

This package specifically targets DirectAdmin shared hosting environments, providing optimized support for DirectAdmin's directory structure (`domains/your-site/laravel_html`) and deployment patterns. While the original package works with various shared hosting providers, this fork focuses exclusively on DirectAdmin configurations.

### Features

-   **One-command deployment** - `directadmin:deploy-and-setup-cicd` handles everything
-   **Automatic npm build support** - Detects `package.json` and builds frontend assets locally
-   **Built asset copying** - Automatically copies `public/build/` to remote server using rsync
-   **Enhanced error handling** - Detailed error messages with exit codes and command output
-   **Git host key verification** - Automatically adds Git hosts to `known_hosts`
-   **Deploy key automation** - Automatic deploy key management via GitHub API
-   **Interactive deployment** - Conflict resolution and user prompts
-   **Laravel optimizations** - Composer install, migrations, storage link, caching
-   **GitHub Actions integration** - Full CI/CD workflow with tests and asset building
