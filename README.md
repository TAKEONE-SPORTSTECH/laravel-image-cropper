# 📦 Laravel Cropper (Takeone)

A professional, multi-instance image cropping component for Laravel built on top of **Cropme**. This package allows you to easily add image upload, cropping, and deletion functionality with support for circular and rectangular viewports.

---

## ✨ Features

- 📸 **Multi-instance Support** - Use multiple croppers on the same page
- 🔄 **Interactive Cropping** - Zoom, rotate, and position images with ease
- ⭕ **Shape Options** - Support for circle and rectangle viewports
- 🎨 **Bootstrap 5 Integration** - Beautiful, responsive UI out of the box
- 💾 **Automatic Storage** - Images saved directly to Laravel's public disk
- 🗑️ **Delete Functionality** - Built-in remove button with confirmation
- 🚀 **Lightweight** - Uses Cropme.js library (minimal dependencies)

---

## 📋 Requirements

- PHP >= 8.0
- Laravel >= 11.0
- Bootstrap 5.3+
- jQuery 3.6+

---

## 🛠 1. Installation

### Add Repository

Add the following to your **main project's** `composer.json` file to allow Composer to find your package:

```json
"repositories": [
    {
        "type": "vcs",
        "url": "https://git.innovator.bh/ghassan/laravel-image-cropper"
    }
]
```

### Require Package

Run the following command in your terminal:

```bash
composer require takeone/cropper
```

### Setup Storage

The package saves images to the public disk. Link it to your project:

```bash
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

```html
<x-takeone-cropper 
    id="avatar" 
    width="300" 
    height="300" 
    shape="circle" 
    folder="avatars"
    filename="user_{{ auth()->id() }}"
/>
```

#### Banner Image (Rectangle)

```html
<x-takeone-cropper 
    id="banner" 
    width="600" 
    height="200" 
    shape="square" 
    folder="banners"
    filename="banner_{{ time() }}"
/>
```

### Displaying the Cropped Image

After uploading, access your image:

```php
<img src="{{ asset('storage/avatars/user_1.png') }}" alt="Profile Picture" class="rounded-circle">
```

### Custom Filenames with Timestamps

```html
<x-takeone-cropper 
    id="user-avatar" 
    filename="user_{{ auth()->id() }}_{{ time() }}"
    width="200" 
    height="200" 
/>
```

---

## ⚙️ 3. Attributes Reference

| Attribute | Default | Description |
|-----------|---------|-------------|
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
- Verify that `@stack('modals')` is placed at the very bottom of your HTML, after Bootstrap's JS.

**Image doesn't show after upload?**
- Ensure you ran `php artisan storage:link`.
- Verify the file exists in `public/storage/{folder}/`.

**Buttons do nothing?**
- Check the browser console (F12) for `jQuery is not defined` or `bootstrap is not defined`.

---

## 🤝 Contributing

Contributions, issues, and feature requests are welcome! Feel free to check the [issues page](https://git.innovator.bh/ghassan/laravel-image-cropper/issues).

---

## 📄 License

This package is open-sourced software licensed under the [MIT license](LICENSE).

---

## 👤 Author

**Ghassan Yusuf**  
- Email: ghassan.yousif.83@gmail.com
- Repository: [https://git.innovator.bh/ghassan/laravel-image-cropper](https://git.innovator.bh/ghassan/laravel-image-cropper)

---

**Made with ❤️ for the Laravel Community**