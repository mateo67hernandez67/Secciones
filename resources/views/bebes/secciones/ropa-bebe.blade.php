@if ($productos->isEmpty())
    <p class="text-gray-500">No hay existencia de Ropa de Bebe.</p>
@else
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @foreach ($productos as $producto)
            <div class="bg-white rounded-lg shadow p-4">
                <h3 class="font-semibold">{{ $producto->nombre }}</h3>
                <p class="text-sm text-gray-600">{{ $producto->descripcion }}</p>
                <p class="text-pink-600 font-bold">${{ number_format($producto->precio, 0) }}</p>
            </div>
        @endforeach
    </div>
@endif
