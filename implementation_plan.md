# Helper Workflow: Logic for Multivendor E-commerce

## 1. Project Overview
We are building a **Multivendor E-commerce Platform** ("Kettle" branded in the sample, but genericized structure).
*   **Tech Stack**: Laravel 12, Livewire (Volt), TailwindCSS.
*   **Design**: Premium, Pastel/Light aesthetic, Glassmorphism, Clean Typography (Outfit/Inter).

## 2. Database Architecture
### Users Table
*   `id`, `name`, `email`, `password`
*   `role`: enum('admin', 'vendor', 'customer') - Default 'customer'

### Shops Table
*   `id`, `user_id` (FK), `name`, `slug`, `description`, `logo_url`, `banner_url`
*   `status`: enum('pending', 'active', 'suspended')
*   `timestamps`

### Categories Table
*   `id`, `name`, `slug`, `image_url`
*   `parent_id` (for subcategories)

### Products Table
*   `id`, `shop_id` (FK), `category_id` (FK), `name`, `slug`
*   `description` (long text), `short_description`
*   `price` (decimal), `sale_price` (nullable)
*   `sku`, `stock_quantity`
*   `image_url` (primary), `gallery` (json)
*   `status`: enum('draft', 'published', 'archived')

## 3. Frontend Pages (Livewire/Volt)
1.  **Home** (`/`):
    *   Hero Section (Gradient background, floating product image).
    *   Features Section ("Why Choose Us").
    *   Product Spotlight ("Elegant Kettle" specs).
    *   Product Grid ("Our Products").
    *   Footer.
2.  **Shop Page** (`/shop/{slug}`): Vendor profile and their products.
3.  **Product Detail** (`/product/{slug}`): Detailed view, add to cart.
4.  **Cart/Checkout**: Standard flow.
5.  **Dashboards**:
    *   **Admin**: Approve vendors, manage categories.
    *   **Vendor**: Manage shop, products, orders.
    *   **Customer**: Order history.

## 4. Branding & Design (Tailwind Analysis)
*   **Primary Colors**: Soft Beige (`#FDFBF7`), Pastel Blue (`#E6F0F3`), Muted Gold/Bronze (`#CEB5A7`) for accents.
*   **Typography**:
    *   Headings: `Outfit` or `Playfair Display` (Elegant Serif/Sans hybrid).
    *   Body: `Inter` or `DM Sans`.
*   **UI Elements**: Rounded corners (xl/2xl), Soft shadows, Pill buttons.

## 5. First Steps
1.  [x] Verify environment.
2.  [ ] Fix `composer` dependencies (likely corruption in `vendor`).
3.  [ ] Install Laravel Breeze (Livewire).
4.  [ ] Setup Migrations.
5.  [ ] Scaffold "Home" layout matching the image.
