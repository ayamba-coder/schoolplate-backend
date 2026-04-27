# Workspace Instructions for SchoolPlate Backend

## Foundational Context

This is a Laravel application for the SchoolPlate backend, built with the following ecosystem packages and versions:

- PHP: 8.4.1
- Laravel Framework: v13
- Filament: v5
- Livewire: v4
- Sanctum: v4
- Pest: v4
- Pint: v1

## Build and Test Commands

- **Install dependencies**: `composer install`
- **Run migrations**: `php artisan migrate`
- **Start development server**: `php artisan serve`
- **Run tests**: `php artisan test --compact`
- **Format code**: `vendor/bin/pint --dirty --format agent`

## Architecture Decisions

- Uses Laravel with Filament for admin panel management.
- Models include User, Student, Restaurant, Institution, etc., with relationships.
- API routes in `routes/api.php`, web routes in `routes/web.php`.
- Authentication via Sanctum.
- Notifications via KycNotification.
- Observers for KycUsersObserver.

## Project-Specific Conventions

- Follow Laravel best practices: use Eloquent relationships, avoid raw DB queries, use Form Requests for validation.
- Use descriptive variable/method names (e.g., `isRegisteredForDiscounts`).
- Reuse existing components before creating new ones.
- Use Pint for code formatting.
- Use Pest for testing, with feature tests preferred.
- For APIs, use Eloquent API Resources.
- Use queued jobs for time-consuming operations.
- Use environment variables in config files, not directly in code.

## Potential Pitfalls

- Do not change application dependencies without approval.
- Always use `search-docs` for version-specific Laravel documentation.
- Avoid N+1 query problems with eager loading.
- Use proper type declarations and PHPDoc blocks.
- For Filament: use static `make()` methods, `Get` and `Set` for reactive fields, `Repeater` for HasMany relationships.
- Testing: use factories, `actingAs()` for panel tests, `livewire()` for component tests.

## Key Files and Directories

- `app/Models/`: Eloquent models (e.g., [app/Models/User.php](app/Models/User.php))
- `app/Http/Controllers/`: Controllers for API and web
- `resources/`: Views (though minimal for API backend)
- `routes/`: Route definitions
- `database/migrations/`: Database schema
- `tests/`: Pest tests
- `AGENTS.md`: Detailed guidelines for Laravel Boost and development rules

## Existing Documentation

- [AGENTS.md](AGENTS.md): Comprehensive guidelines for Laravel development, including Boost tools and conventions.
- [README.md](README.md): Project overview and setup instructions.

For detailed rules, refer to [AGENTS.md](AGENTS.md). Use `search-docs` for Laravel ecosystem documentation.