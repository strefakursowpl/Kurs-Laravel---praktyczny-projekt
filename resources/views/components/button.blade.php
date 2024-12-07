<button {{ $attributes->class([
    'p-3 text-white rounded-md',
    'bg-green-500' => $type === 'success',
    'bg-yellow-500' => $type === 'danger',
    'bg-red-500' => $type === 'error',
    'opacity-50' => $attributes->has('disabled')
]) }} >
    {{ $slot }}
</button>
