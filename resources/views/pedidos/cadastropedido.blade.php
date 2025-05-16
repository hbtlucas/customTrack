<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Cadastrar Pedido') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('pedidos.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="id_cliente" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Cliente</label>
                            <select name="id_cliente" id="id_cliente" class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" required>
                                <option value="">Selecione um cliente</option>
                                @foreach ($clientes as $cliente)
                                    <option value="{{ $cliente->id_cliente }}" {{ old('id_cliente') == $cliente->id_cliente ? 'selected' : '' }}>{{ $cliente->nome_cliente }} ({{ $cliente->email }})</option>
                                @endforeach
                            </select>
                            @error('id_cliente') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-4">
                            <label for="id_produto" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Produto</label>
                            <select name="id_produto" id="id_produto" class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" required>
                                <option value="">Selecione um produto</option>
                                @foreach ($produtos as $produto)
                                    <option value="{{ $produto->id_produto }}" {{ old('id_produto') == $produto->id_produto ? 'selected' : '' }}>{{ $produto->nome_produto }}</option>
                                @endforeach
                            </select>
                            @error('id_produto') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-4">
                            <label for="quantidade" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Quantidade</label>
                            <input type="number" name="quantidade" id="quantidade" value="{{ old('quantidade') }}" class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" placeholder="Digite a quantidade" required>
                            @error('quantidade') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-4">
                            <label for="id_forma_pagamento" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Forma de Pagamento</label>
                            <select name="id_forma_pagamento" id="id_forma_pagamento" class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" required>
                                <option value="1" {{ old('id_forma_pagamento') == '1' ? 'selected' : '' }}>Pix</option>
                                <option value="2" {{ old('id_forma_pagamento') == '2' ? 'selected' : '' }}>Cartão de Crédito</option>
                                <option value="3" {{ old('id_forma_pagamento') == '3' ? 'selected' : '' }}>Cartão de Débito</option>
                                <option value="4" {{ old('id_forma_pagamento') == '4' ? 'selected' : '' }}>Dinheiro Físico</option>
                            </select>
                            @error('id_forma_pagamento') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-4">
                            <label for="status_pedido" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Status do Pedido</label>
                            <input type="text" name="status_pedido" id="status_pedido" value="{{ old('status_pedido', 'andamento') }}" class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" placeholder="Digite o status do pedido (ex.: Andamento)" required>
                            @error('status_pedido') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-4">
                            <label for="status_pagamento" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Status do Pagamento</label>
                            <input type="text" name="status_pagamento" id="status_pagamento" value="{{ old('status_pagamento', 'andamento') }}" class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" placeholder="Digite o status do pagamento (ex.: Aprovado)" required>
                            @error('status_pagamento') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                        </div>
                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                            Cadastrar
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>