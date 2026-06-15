# JDX Starter Theme - Project Guide

## Overview
WordPress starter theme built on Underscores (_s) framework. Uses Tailwind CSS, Carbon Fields for custom fields, and vanilla JavaScript.

**Author:** Ryan Gass, The Moment
**Text Domain:** `jdxstarter`

---

## Directory Structure

```
inc/                          # Core PHP functionality
├── carbon-fields/            # All custom field configurations
│   ├── options/              # Theme-wide settings (header, footer, social)
│   ├── blocks/               # Custom Gutenberg blocks
│   ├── heros/                # Hero section fields by template type
│   ├── pages/                # Page-specific fields (e.g., cf-page-front.php)
│   ├── posts/                # Post meta fields
│   ├── users/                # User profile fields
│   └── templates/            # Template-specific fields
├── admin-settings/           # Admin CSS/JS
├── menus.php                 # Menu registration
├── styles_scripts.php        # Asset enqueuing
├── overrides.php             # WP core overrides & helpers
├── blocks.php                # Gutenberg config
├── carbon-fields.php         # CF loader (includes all cf files)
├── shortcodes.php            # Custom shortcodes
└── login.php                 # Login page customization

templates/                    # Page templates
├── page-front.php            # Homepage template
├── page-template.php         # Generic page template
└── template-parts/           # Reusable components
    ├── heros/                # Hero templates (home, default, blog, single)
    └── blog/                 # Blog components

styles_scripts/
├── src/
│   ├── css/
│   │   ├── global/           # Global styles (imported via _site.css)
│   │   │   ├── _site.css     # Main import file
│   │   │   ├── global.css    # General site styles
│   │   │   ├── typography.css
│   │   │   ├── buttons.css
│   │   │   ├── header-nav.css
│   │   │   ├── hero.css
│   │   │   ├── footer.css
│   │   │   └── forms.css
│   │   ├── blog.css
│   │   └── pages.css
│   └── js/
│       └── scripts.js        # Main JavaScript
└── dist/                     # Compiled assets (don't edit directly)

assets/
├── images/
├── videos/
└── reusable-code/            # Code snippets/utilities
```

---

## Naming Conventions

### PHP
- **Theme functions:** `jdxstarter_` prefix (e.g., `jdxstarter_scripts()`)
- **Carbon Fields functions:** `crb_` prefix (e.g., `crb_load()`)
- **Variables:** snake_case (e.g., `$bg_image`, `$banner_heading`)
- **Carbon Fields files:** `cf-{scope}.php` (e.g., `cf-page-front.php`, `cf-home-hero.php`)

### CSS/HTML
- **IDs:** Descriptive kebab-case (e.g., `#banner`, `#footer-cta`, `#home-hero`)
- **Classes:** Kebab-case (e.g., `.post-image`, `.hamb-line`, `.hero-content`)
- **Section wrappers:** Use semantic IDs that describe the section purpose

### Carbon Fields Keys
- Descriptive, lowercase with underscores
- Examples: `heading`, `bg_image`, `banner_button_text`, `pre_heading`, `cta_url`

---

## Carbon Fields Patterns

### File Structure
```php
<?php
use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action('carbon_fields_register_fields', function() {
    Container::make('post_meta', __('Container Title', 'jdxstarter'))
        ->where('post_type', '=', 'page')
        ->where('post_template', '=', 'templates/page-example.php')
        ->add_fields([
            Field::make('text', 'field_name', __('Field Label', 'jdxstarter')),
            Field::make('image', 'image_field', __('Image', 'jdxstarter')),
            Field::make('rich_text', 'content', __('Content', 'jdxstarter')),
        ]);
});
```

### Field Retrieval
```php
// Post meta
$heading = carbon_get_post_meta(get_the_ID(), 'heading');
$bg_image = wp_get_attachment_image_url(carbon_get_post_meta(get_the_ID(), 'bg_image'), 'full');

// Theme options
$phone = carbon_get_theme_option('phone');
$social_facebook = carbon_get_theme_option('social_facebook');

// User meta
$headshot = carbon_get_user_meta($author_id, 'headshot');
```

### Common Field Types Used
- `Field::make('text', ...)` - Single line text
- `Field::make('textarea', ...)` - Multi-line text
- `Field::make('rich_text', ...)` - WYSIWYG editor
- `Field::make('image', ...)` - Image upload (returns attachment ID)
- `Field::make('color', ...)` - Color picker
- `Field::make('checkbox', ...)` - Boolean toggle
- `Field::make('complex', ...)` - Repeater fields

### Registering New CF Files
After creating a new CF file, include it in `inc/carbon-fields.php`:
```php
require get_template_directory() . '/inc/carbon-fields/{subfolder}/cf-{name}.php';
```

---

## Template Patterns

### Page Template Header
```php
<?php
/**
 * Template Name: Template Display Name
 *
 * @package jdxstarter
 */

get_header();
?>
```

### Including Template Parts
```php
// Hero sections
get_template_part('templates/template-parts/heros/hero', 'home');
get_template_part('templates/template-parts/heros/hero', 'default');

// Other components
get_template_part('templates/template-parts/blog/post', 'card');
```

### Section Structure
```php
<section id="section-name" class="py-16 lg:py-24">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto text-center">
            <?php if ($heading): ?>
                <h2 class="text-3xl lg:text-4xl font-bold mb-6"><?php echo esc_html($heading); ?></h2>
            <?php endif; ?>

            <?php if ($content): ?>
                <div class="prose mx-auto">
                    <?php echo wp_kses_post($content); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
```

---

## CSS Patterns

### File Organization
- Global styles go in `styles_scripts/src/css/global/`
- Import new files in `_site.css`:
```css
@import 'newfile.css';
```

### Custom Properties (defined in global.css)
```css
--space-2 through --space-9  /* Spacing scale */
```

### Tailwind + Custom CSS
Mix Tailwind utilities with custom CSS where needed:
```css
.hero-section {
    @apply py-16 lg:py-24 bg-cover bg-center;

    .hero-content {
        @apply max-w-4xl mx-auto text-center;
    }
}
```

### After Adding/Modifying CSS
Run build command to compile:
```bash
npm run build     # Production (minified)
npm run watch     # Development (watch mode)
```

---

## JavaScript Patterns

### Location
Main JS file: `styles_scripts/src/js/scripts.js`

### Pattern
```javascript
document.addEventListener('DOMContentLoaded', function() {
    // Your code here
});
```

### Libraries Available
- jQuery (WordPress bundled)
- Slick Carousel (loaded via CDN)

---

## Menu Locations

Three registered menus in `inc/menus.php`:
1. `menu-primary` - Main navigation
2. `menu-footer` - Footer navigation
3. `menu-utility` - Utility/top bar menu

---

## Theme Options

Located in `inc/carbon-fields/options/cf-theme-options.php`:

### Header Options
- `utility_menu` (checkbox) - Show utility menu
- `fixed_header` (checkbox) - Fixed header positioning

### Footer Options
- `phone` - Phone number
- `footer_tagline` - Tagline text
- `footer_bg_color` - Background color
- `footer_bg_image` - Background image
- `footer_logo` - Footer logo
- `footer_button_text` - CTA button text
- `footer_legal` - Legal/copyright text

### Social Options
- `social_headline` - Social section heading
- `social_facebook`, `social_linkedin`, `social_instagram` - Social URLs

---

## Hero System

Each page type can have its own hero configuration:

| Template | Hero CF File | Hero Template Part |
|----------|--------------|-------------------|
| Homepage | `cf-home-hero.php` | `hero-home.php` |
| Default pages | `cf-default-hero.php` | `hero-default.php` |
| Blog archive | `cf-blog-hero.php` | `hero-blog.php` |
| Single posts | `cf-single-hero.php` | `hero-single.php` |

### Common Hero Fields
- `heading` - Main heading
- `content` - Rich text content
- `bg_image` - Background image
- `banner_button_text` - CTA text
- `banner_button_url` - CTA link

---

## Build Commands

```bash
npm run build     # Compile CSS for production
npm run watch     # Watch and compile during development
```

---

## Important Files to Check

When starting work on this project, these files give quick context:
- `functions.php` - See what's included
- `inc/carbon-fields.php` - See all registered CF files
- `styles_scripts/src/css/global/_site.css` - See all CSS imports
- `theme.json` - Color palette and block editor settings

---

## Color Palette (from theme.json)

- Primary: `#C8102E`
- Secondary: `#002855`
- Light Grey: `#f7f7f7`
- Dark Grey: `#707070`
- Black: `#1d1d1d`

---

## Quick Reference

### Add a new page template
1. Create template file in `templates/` with header comment
2. Create CF file in `inc/carbon-fields/pages/` if needed
3. Include CF file in `inc/carbon-fields.php`
4. Create template parts in `templates/template-parts/` as needed

### Add a new section to an existing page
1. Add fields to existing CF file or create new one
2. Add markup to template file using existing section patterns
3. Add CSS to appropriate file in `styles_scripts/src/css/`
4. Run `npm run build`

### Add a new hero type
1. Create CF file in `inc/carbon-fields/heros/`
2. Include in `inc/carbon-fields.php`
3. Create template part in `templates/template-parts/heros/`
4. Call via `get_template_part()` in page template
