<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Pedidos</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    @vite('resources/css/app.css')
</head>

<body class="font-normal">
    <main class="flex flex-col p-6 md:lg:p-24 h-screen w-full bg-background">
        <div class="mb-8">
            <h1 class="text-4xl font-bold text-primary">Pedidos</h1>
            <p class="text-lg text-foreground font-normal">Adição, edição e remoção de pedidos</p>
        </div>
        <div class="flex bg-accent whitespace-nowrap rounded-md text-sm font-medium focus-visible:ring-ring p-4">
            <form method="POST" class="w-full">
                <div class="grid grid-cols-4 gap-2 mb-2">
                    <div class="col-span-4 md:lg:col-span-1">
                        <x-input type="text" name="Teste" placeholder="Nome do cliente" class="col-span-4" />
                    </div>
                    <div class="col-span-4 md:lg:col-span-1">
                        <x-input type="date" name="orderDate" />
                    </div>
                    <div class="col-span-4 md:lg:col-span-1">
                        <x-input type="date" name="deliveryDate" />
                    </div>
                    <div class="col-span-4 md:lg:col-span-1">
                        <x-input type="text" name="status" placeholder="Status" />
                    </div>
                </div>
                <div class="col-span-4 md:lg:col-span-1">
                    <x-button message="Adicionar Pedido" type="default" />
                </div>
            </form>
        </div>
        <div class="flex flex-col bg-accent mt-4 rounded-md">
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
                <x-table.table-header>
                    <x-table.table-row>
                        <x-table.table-head class="font-bold text-center md:lg:text-left">Nome do
                            Cliente</x-table.table-head>
                        <x-table.table-head class="font-bold">Data do pedido</x-table.table-head>
                        <x-table.table-head class="font-bold">Data da entrega</x-table.table-head>
                        <x-table.table-head class="text-center font-bold">Status</x-table.table-head>
                        <x-table.table-head class="text-right font-bold">Ações</x-table.table-head>

                    </x-table.table-row>
                </x-table.table-header>
                <x-table.table-body>
                    @foreach ($orders as $order)
                        <x-table.table-row>
                            <x-table.table-cell class="font-medium">{{ $order['customerName'] }}</x-table.table-cell>
                            <x-table.table-cell>{{ $order['orderDate'] }}</x-table.table-cell>
                            <x-table.table-cell>{{ $order['deliveryDate'] }}</x-table.table-cell>
                            <x-table.table-cell class="text-center">{{ $order['status'] }}</x-table.table-cell>
                            <x-table.table-cell class="text-right">
                                <x-button message="Editar" type="default" class="mb-2 md:lg:m-0" />
                                <x-button message="Remover" type="destructive" />
                            </x-table.table-cell>
                        </x-table.table-row>
                    @endforeach
                </x-table.table-body>
                <x-table.table-footer>
                    <x-table.table-row>
                        <x-table.table-cell colspan="4" class="font-bold">Total de pedidos</x-table.table-cell>
                        <x-table.table-cell class="text-right font-bold">{{ count($orders) }}</x-table.table-cell>
                    </x-table.table-row>
                </x-table.table-footer>
            </x-table.table>
        </div>
    </main>
</body>

</html>
