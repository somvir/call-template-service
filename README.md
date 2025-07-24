# Secure Call-Template Service

## Setup

1. Clone the repository
2. Run `composer install`
3. Copy `.env.example` to `.env` and configure database
4. Run migrations: `php artisan migrate`
5. Run seeders: `php artisan db:seed`

## Running Tests

```bash
php artisan test


API Endpoints (Controller)
POST  /api/register
    -request (name, email, password, password_confirmation, company_id, is_admin {1,0})
POST  /api/login
    -request (email, password)
POST /api/v1/templates
     -request (name, prompt)
GET /api/v1/templates
GET /api/v1/templates/{id}
PUT /api/v1/templates/{id}
DELETE /api/v1/templates/{id}

