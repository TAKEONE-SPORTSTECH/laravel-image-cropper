# 📦 Laravel Cropper (Takeone)

A professional, multi-instance image cropping component for Laravel built on top of **Cropme**. This package allows you to easily add image upload, cropping, and deletion functionality with support for circular and rectangular viewports.

---

## 🛠 1. Installation

### Add Repository

Add the following to your **main project's** `composer.json` file to allow Composer to find your package:

JSON
```
"repositories": [
    {
        "type": "vcs",
        "url": "https://git.innovator.bh/ghassan/laravel-image-cropper"
    }
],
```

### Require Package

Run the following command in your terminal:

BASH
```
composer require takeone/cropper
```

### Setup Storage

The package saves images to the public disk. Link it to your project:

BASH
```
php artisan storage:link
```

---

## 🚀 2. Usage

### Layout Setup

Ensure your main layout file (e.g., `resources/views/layouts/app.blade.php`) includes **Bootstrap 5**, **jQuery**, and the `@stack('modals')` directive.

```html
<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    @yield('content')

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    @stack('modals')
</body>
</html>

```

### Adding the Component

Each instance of the cropper requires a **unique ID**.

#### Profile Picture (Circle)

html
```
<x-takeone-cropper 
    id="avatar" 
    width="300" 
    height="300" 
    shape="circle" 
    folder="profiles" 
    filename="user_1_avatar" 
/>
```

#### Banner Image (Rectangle)

html
```
<x-takeone-cropper 
    id="banner" 
    width="600" 
    height="200" 
    shape="square" 
    folder="banners" 
    filename="homepage_hero" 
/>

```

---

## ⚙️ 3. Attributes Reference

| Attribute | Default | Description |
| --- | --- | --- |
| `id` | **Required** | A unique string to identify the instance. |
| `width` | `300` | Width of the cropping area (pixels). |
| `height` | `300` | Height of the cropping area (pixels). |
| `shape` | `circle` | Use `circle` for rounds or `square` for rectangle. |
| `folder` | `uploads` | Destination folder inside `storage/app/public/`. |
| `filename` | `cropped_{time}` | The name of the saved image file (no extension). |

---

## 🗑 4. Removing Images

The component includes a built-in **Remove** button (Trash Icon) next to the change button.

1. Click the **Trash Icon**.
2. Confirm the deletion in the browser alert.
3. The package will delete the file from `storage/app/public/{folder}/{filename}`.
4. The page reloads automatically to refresh the view.

---

## 🛠 5. Troubleshooting

**Modal doesn't appear?**

* Verify that `@stack('modals')` is placed at the very bottom of your HTML, after Bootstrap's JS.

**Image doesn't show after upload?**

* Ensure you ran `php artisan storage:link`.
* Verify the file exists in `public/storage/{folder}/`.

**Buttons do nothing?**

* Check the browser console (F12) for `jQuery is not defined` or `bootstrap is not defined`.

---

Would you like me to help you with the Git commands to push this to your `innovator.bh` repository?
