@foreach ($errors->all() as $error)
    <div class="mb-2 bg-red-100 border border-red-200 text-sm text-red-800 rounded-lg p-4 dark:bg-red-800/10 dark:border-red-900 dark:text-red-500"
        role="alert" tabindex="-1" aria-labelledby="hs-soft-color-danger-label">
        {{ $error }}
    </div>
@endforeach
