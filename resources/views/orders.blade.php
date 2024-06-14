<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Pedidos</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>

<body class="font-normal">
    <main class="flex flex-col p-6 md:lg:p-24 h-screen w-full bg-background">
        <div class="mb-8">
            <h1 class="text-4xl font-bold text-primary">Pedidos</h1>
            <p class="text-lg text-foreground font-normal">Adição, edição e remoção de pedidos</p>
        </div>
        <div class="flex bg-accent whitespace-nowrap rounded-md text-sm font-medium focus-visible:ring-ring p-4">
            <form method="POST" action="{{ route('orders.store') }}" class="w-full">
                @csrf
                <div class="grid grid-cols-4 gap-2 mb-2">
                    <div class="col-span-4 md:lg:col-span-1">
                        <fieldset name="Nome do cliente">
                            <legend class="text-sm font-medium ml-2 mb-1">Nome do cliente</legend>
                            <x-input type="text" name="customer_name" class="col-span-4" />
                        </fieldset>
                    </div>
                    <div class="col-span-4 md:lg:col-span-1">
                        <fieldset name="Data do pedido">
                            <legend class="text-sm font-medium ml-2 mb-1">Data do pedido</legend>
                            <x-input type="date" name="created_at" placeholder="data do pedido" />
                        </fieldset>
                    </div>
                    <div class="col-span-4 md:lg:col-span-1">
                        <fieldset name="Data da entrega">
                            <legend class="text-sm font-medium ml-2 mb-1">Data da entrega</legend>
                            <x-input type="date" name="delivery_date" />
                        </fieldset>
                    </div>
                    <div class="col-span-4 md:lg:col-span-1">
                        <fieldset name="Status">
                            <legend class="text-sm font-medium ml-2 mb-1">Status</legend>
                            <select name="status"
                                class="w-full h-10 px-4 py-2 bg-input border border-input rounded-md">
                                @foreach ($status as $key => $option)
                                    <option value="{{ $key }}">{{ $option }}</option>
                                @endforeach
                            </select>
                        </fieldset>
                    </div>
                </div>
                <div class="col-span-4 md:lg:col-span-1">
                    <x-button type="submit" variant="default">
                        Adicionar Pedido
                    </x-button>
                </div>
            </form>
        </div>
        <div class="flex flex-col bg-accent mt-4 rounded-md">
            <x-table.table>
                <x-table.table-header>
                    <x-table.table-row>
                        <x-table.table-head class="font-bold text-center md:lg:text-left">Nome do
                            Cliente</x-table.table-head>
                        <x-table.table-head class="font-bold text-center">Data do pedido</x-table.table-head>
                        <x-table.table-head class="font-bold text-center">Data da entrega</x-table.table-head>
                        <x-table.table-head class="text-center font-bold">Status</x-table.table-head>
                        <x-table.table-head class="text-right font-bold">Ações</x-table.table-head>

                    </x-table.table-row>
                </x-table.table-header>
                <x-table.table-body>
                    @foreach ($orders as $order)
                        <x-table.table-row>
                            <x-table.table-cell class="font-medium">{{ $order['customer_name'] }}</x-table.table-cell>
                            <x-table.table-cell class="text-center">
                                {{ \Carbon\Carbon::parse($order['created_at'])->locale('pt_BR')->format('d/m/Y') }}
                            </x-table.table-cell>
                            <x-table.table-cell class="text-center">
                                @isset($order['delivery_date'])
                                    {{ \Carbon\Carbon::parse($order['delivery_date'])->locale('pt_BR')->format('d/m/Y') }}
                                @endisset
                                @empty($order['delivery_date'])
                                    Não Entregue
                                @endempty
                            </x-table.table-cell>
                            <x-table.table-cell class="text-center">{{ $order['status'] }}</x-table.table-cell>
                            <x-table.table-cell class="text-right">
                                <div class="flex justify-end">
                                    <form method="POST" action="{{ route('orders.destroy', $order['id']) }}"
                                        class="mr-2">
                                        @csrf
                                        @method('DELETE')
                                        <x-button type="submit" variant="destructive">
                                            Deletar
                                        </x-button>
                                    </form>
                                    <x-button type="button" variant="default" class="edit-button"
                                        data-id="{{ $order['id'] }}" data-name="{{ $order['customer_name'] }}"
                                        data-created="{{ $order['created_at'] }}"
                                        data-delivery="{{ $order['delivery_date'] }}"
                                        data-status="{{ $order['status'] }}">
                                        Editar
                                    </x-button>
                                </div>
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
        @isset($order)
            <div id="editModal" class="hidden fixed z-10 inset-0 overflow-y-auto">
                <div class="flex items-center justify-center min-h-screen bg-black bg-opacity-50">
                    <div class="bg-background p-6 rounded-lg shadow-lg w-3/4 md:lg:w-2/4">
                        <form id="editForm" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="id" id="editId">
                            <div>
                                <label for="editCustomerName">Nome do Cliente</label>
                                <x-input type="text" id="editCustomerName" name="customer_name" class="w-full" />
                            </div>
                            <div>
                                <label for="editCreatedAt">Data do Pedido</label>
                                <x-input type="date" id="editCreatedAt" name="created_at" class="w-full" />
                            </div>
                            <div>
                                <label for="editDeliveryDate">Data da Entrega</label>
                                <x-input type="date" id="editDeliveryDate" name="delivery_date" class="w-full" />
                            </div>
                            <div>
                                <label for="editStatus">Status</label>
                                <select id="editStatus" name="status" selected="{{ $order['status'] }}"
                                    class="w-full h-10 px-4 py-2 bg-input border border-input rounded-md">
                                    @foreach ($status as $key => $option)
                                        <option value="{{ $key }}">{{ $option }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mt-4">
                                <x-button type="submit" variant="default">Salvar</x-button>
                                <x-button type="button" class="close-modal" variant="default">Cancelar</x-button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endisset
    </main>
</body>

</html>
