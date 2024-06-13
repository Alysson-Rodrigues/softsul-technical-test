<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    @vite('resources/css/app.css')
</head>

<body class="font-normal">
    <main class="flex flex-col justify-center h-screen w-full items-center bg-background">
        <h1 class="text-4xl font-bold text-primary">Welcome to Laravel</h1>
        <p class="text-lg text-foreground font-normal">This is a Laravel application with Vite and Tailwind CSS</p>
        <x-button message="Test" type="default" class="font-normal" onclick="alert('funciona')" />
        <div>
            @php
                $orders = [
                    [
                        'customerName' => 'Josias Matias',
                        'orderDate' => Carbon\Carbon::now()->subDays(5)->locale('pt_BR')->isoFormat('LL'),
                        'deliveryDate' => Carbon\Carbon::now()->subDays(1)->locale('pt_BR')->isoFormat('LL'),
                        'status' => 'Pendente',
                    ],
                    [
                        'customerName' => 'Maria Josefa',
                        'orderDate' => Carbon\Carbon::now()->subDays(2)->locale('pt_BR')->isoFormat('LL'),
                        'deliveryDate' => Carbon\Carbon::now()->subDays(45)->locale('pt_BR')->isoFormat('LL'),
                        'status' => 'Entregue',
                    ],
                ];
            @endphp
            <x-table.table>
                <x-table.table-caption>Uma lista dos seus últimos pedidos.</x-table.table-caption>
                <x-table.table-header>
                    <x-table.table-row>
                        <x-table.table-head>Nome do Cliente</x-table.table-head>
                        <x-table.table-head>Data do pedido</x-table.table-head>
                        <x-table.table-head>Data da entrega</x-table.table-head>
                        <x-table.table-head class="text-right">Status</x-table.table-head>
                    </x-table.table-row>
                </x-table.table-header>
                <x-table.table-body>
                    @foreach ($orders as $order)
                        <x-table.table-row>
                            <x-table.table-cell class="font-medium">{{ $order['customerName'] }}</x-table.table-cell>
                            <x-table.table-cell>{{ $order['orderDate'] }}</x-table.table-cell>
                            <x-table.table-cell>{{ $order['deliveryDate'] }}</x-table.table-cell>
                            <x-table.table-cell class="text-right">{{ $order['status'] }}</x-table.table-cell>
                        </x-table.table-row>
                    @endforeach
                </x-table.table-body>
                <x-table.table-footer>
                    <x-table.table-row>
                        <x-table.table-cell colspan="3">Total de pedidos</x-table.table-cell>
                        <x-table.table-cell class="text-right">{{ count($orders) }}</x-table.table-cell>
                    </x-table.table-row>
                </x-table.table-footer>
            </x-table.table>
        </div>
    </main>
</body>

</html>
