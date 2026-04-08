# Mini CRM Admin Panel

A Laravel 13 CRUD application for managing Companies and Employees with authentication, API endpoints, and professional UI built with Tailwind CSS.

## Features

- ✅ **Authentication** - Admin login with Breeze
- ✅ **CRUD Operations** - Create, Read, Update, Delete for Companies & Employees
- ✅ **Database Validation** - FormRequest validation classes
- ✅ **Pagination** - 10 items per page
- ✅ **Logo Storage** - Upload and store company logos in public storage
- ✅ **API Endpoints** - RESTful API with employee count attribute
- ✅ **Responsive UI** - Tailwind CSS styling
- ✅ **Eloquent Relationships** - Companies → Employees relationships

## Requirements

- PHP 8.5+
- MySQL 5.7+
- Node.js & npm
- Composer

## Installation

### 1. Clone & Setup

```bash
cd holeeMonth/MiniCRM-Admin
composer install
npm install
```

### 2. Environment Configuration

```bash
cp .env.example .env
php artisan key:generate
```

**Update `.env` with your database credentials:**

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=minicrm_admin
DB_USERNAME=root
DB_PASSWORD=your_password
```

### 3. Database Setup

```bash
php artisan migrate
php artisan db:seed
```

This creates:
- Users table with admin seeder
- Companies table
- Employees table

### 4. Create Storage Symlink

```bash
php artisan storage:link
```

This enables public access to uploaded logos.

### 5. Build Frontend Assets

```bash
npm run build
```

For development with live reload:

```bash
npm run dev
```

### 6. Start the Application

```bash
php artisan serve
```

The app will be available at: **http://127.0.0.1:8000**

## Default Admin Credentials

- **Email:** `admin@admin.com`
- **Password:** `password`

## Project Structure

```
app/
├── Http/Controllers/
│   ├── CompanyController.php      # CRUD for companies
│   └── EmployeeController.php     # CRUD for employees
├── Http/Requests/
│   ├── StoreCompanyRequest.php    # Validation for create
│   ├── UpdateCompanyRequest.php   # Validation for update
│   ├── StoreEmployeeRequest.php   # Validation for create
│   └── UpdateEmployeeRequest.php  # Validation for update
└── Models/
    ├── Company.php                # Company model with relationships
    └── Employee.php               # Employee model with relationships

database/
├── migrations/
│   ├── create_companies_table.php
│   └── create_employees_table.php
└── seeders/
    └── UserSeeder.php             # Seeds admin user

resources/views/
├── companies/                      # Company CRUD views
│   ├── index.blade.php
│   ├── create.blade.php
│   ├── edit.blade.php
│   └── show.blade.php
├── employees/                      # Employee CRUD views
│   ├── index.blade.php
│   ├── create.blade.php
│   ├── edit.blade.php
│   └── show.blade.php
└── layouts/
    └── navigation.blade.php       # Navigation with links

routes/
├── web.php                        # Web routes for CRUD
└── api.php                        # API routes
```

## Database Schema

### Companies Table
- `id` - Primary key
- `name` - Company name (required)
- `email` - Company email (optional)
- `logo` - Logo path in storage/app/public (optional, min 100x100)
- `website` - Company website URL (optional)
- `timestamps` - Created/updated timestamps

### Employees Table
- `id` - Primary key
- `first_name` - First name (required)
- `last_name` - Last name (required)
- `company_id` - Foreign key to companies (required)
- `email` - Employee email (optional)
- `phone` - Employee phone (optional)
- `timestamps` - Created/updated timestamps

## Web Routes

### Companies
- `GET /companies` - List all companies (paginated, 10/page)
- `GET /companies/create` - Show create form
- `POST /companies` - Store new company
- `GET /companies/{id}` - Show company details
- `GET /companies/{id}/edit` - Show edit form
- `PUT /companies/{id}` - Update company
- `DELETE /companies/{id}` - Delete company

### Employees
- `GET /employees` - List all employees (paginated, 10/page)
- `GET /employees/create` - Show create form
- `POST /employees` - Store new employee
- `GET /employees/{id}` - Show employee details
- `GET /employees/{id}/edit` - Show edit form
- `PUT /employees/{id}` - Update employee
- `DELETE /employees/{id}` - Delete employee

## API Endpoints

### Get Company with Employees

**Request:**
```http
GET /api/companies/{id}
```

**Response:**
```json
{
  "id": 1,
  "name": "Tech Corp",
  "email": "contact@techcorp.com",
  "website": "https://techcorp.com",
  "logo": "logos/abc123.jpg",
  "employee_count": 3,
  "employees": [
    {
      "id": 1,
      "first_name": "John",
      "last_name": "Doe",
      "company_id": 1,
      "email": "john@techcorp.com",
      "phone": "1234567890"
    },
    ...
  ]
}
```

## Testing with Postman

1. **Open Postman**
2. **Create a new request:**
   - Method: `GET`
   - URL: `http://127.0.0.1:8000/api/companies/1`
3. **Click Send**

You should receive JSON with company data and employee count.

## Validation Rules

### Company Validation
- `name` - Required, string
- `email` - Optional, valid email format
- `logo` - Optional, image file, minimum 100x100 pixels
- `website` - Optional, valid URL

### Employee Validation
- `first_name` - Required, string
- `last_name` - Required, string
- `company_id` - Required, must exist in companies table
- `email` - Optional, valid email format
- `phone` - Optional, string

## Features Walkthrough

### Adding a Company
1. Navigate to **Companies** in navbar
2. Click **+ Add Company**
3. Fill in details (Name is required)
4. Upload logo (optional, min 100x100)
5. Click **Create**

### Adding an Employee
1. Navigate to **Employees** in navbar
2. Click **+ Add Employee**
3. Select company from dropdown (required)
4. Fill in first/last names (required)
5. Add email and phone (optional)
6. Click **Create**

### Viewing Company Details
1. Go to **Companies** list
2. Click **View** on any company
3. See all company info and associated employees
4. Click **Edit Company** or **View Company** as needed

## Troubleshooting

### Logos not displaying?
```bash
php artisan storage:link
```

### CSS not working?
```bash
npm run build
```

### Database connection error?
- Check `.env` database credentials
- Ensure MySQL is running
- Run `php artisan migrate`

### 404 on /api/companies/{id}?
- Check the company ID exists in database
- Verify database migrations ran successfully

## License

This project is open source and available under the MIT license.

