<div class="alert alert-{{ $type }}">
    <!-- Simplicity is the essence of happiness. - Cedric Bledsoe -->
     {{ $message }}  {{ $alertType }} {{ $size }}
     {{ $siteName}}
</div>

<span class="alert-title">{{ $title }}</span>

<div {{ $attributes }}>
            <div class="alert alert-{{ $type }}">
                {{ $message }}
            </div>
            {{ $slot }}
        </div>
