# 🚀 Laravel Image Cropper - Quick Start Guide

Follow these steps to get the **Laravel Cropper (Takeone)** package installed and working in your project in less than 5 minutes.

---

## 🛠 Step 1: Add the Repository

Open your project's `composer.json` and add the custom repository. This is necessary because the package is currently hosted on a private Gitea server.

```json
"repositories": [
    {
        "type": "vcs",
        "url": "https://git.innovator.bh/ghassan/laravel-image-cropper"
    }
]
```

---

## 🛠 Step 2: Install the Package

Run the following command. **Note:** We use `@dev` to bypass the stability check since the package is in development.

```bash
composer require takeone/cropper:@dev
```

---

## 🛠 Step 3: Link Storage

Run this command to make your uploaded images accessible from the web:

```bash
php artisan storage:link
```

---

## 🛠 Step 4: Prepare Your Layout

Add **Bootstrap 5**, **jQuery**, and `@stack('modals')` to your `resources/views/layouts/app.blade.php`:

```html
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Laravel App</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        @yield('content')
    </div>

    <!-- Scripts: jQuery first, then Bootstrap Bundle -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- CRITICAL: This is where the cropper modal will be injected -->
    @stack('modals')
</body>
</html>
```

---

## 🛠 Step 5: Use the Component

In any of your Blade views (e.g., `profile.blade.php`), simply add the component:

```html
@extends('layouts.app')

@section('content')
    <div class="card p-4 shadow-sm">
        <h3>Update Profile Picture</h3>
        <p>Click the button below to upload and crop your photo.</p>
        
        <x-takeone-cropper 
            id="user_avatar" 
            width="300" 
            height="300" 
            shape="circle" 
            folder="avatars"
            filename="user_{{ auth()->id() ?? 'guest' }}"
        />
    </div>
@endsection
```

---

## ✅ Step 6: Test It!

1. Open your browser to the page where you added the component.
2. Click **"Change Photo"**.
3. Select an image from your computer.
4. Use the **Zoom** and **Rotation** sliders to adjust.
5. Click **"Crop & Save Image"**.
6. Check your `public/storage/avatars/` folder to see the result!

---

## 💡 Pro Tips

### Displaying the Image
```html
<img src="{{ asset('storage/avatars/user_guest.png') }}" class="rounded-circle shadow" width="150">
```

### Rectangular Cropping (Banners)
```html
<x-takeone-cropper 
    id="site_banner" 
    width="800" 
    height="300" 
    shape="square" 
    folder="banners"
/>
```

---

**Happy Coding!** 🚀