<div class="flex space-x-8">
    <x-nav-link :href="route('dashboard.summary')" :active="request()->routeIs('dashboard.summary')">Summary</x-nav-link>
    <x-nav-link :href="route('dashboard.stock')" :active="request()->routeIs('dashboard.stock')">Stock</x-nav-link>
    <x-nav-link :href="route('dashboard.chart')" :active="request()->routeIs('dashboard.chart')">Chart</x-nav-link>
</div>
