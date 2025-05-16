<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Anotações') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <!-- Botões de Ação -->
                    <div class="flex flex-wrap gap-4 mb-6">
                        <form action="{{ route('relatorios.cadastro') }}">
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                Adicionar Anotação
                            </button>
                        </form>
                    </div>

                    <!-- Lista de Relatórios -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        @foreach ($relatorios as $relatorio)
                            <div class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-lg shadow-sm">
                                <div class="p-6">
                                    <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">{{ $relatorio->titulo }}</h3>
                                    <p class="text-sm text-gray-600 dark:text-gray-400">Cliente: {{ $relatorio->cliente }}</p>
                                    <p class="mt-2 text-gray-700 dark:text-gray-300">{{ $relatorio->texto }}</p>
                                </div>
                                <div class="p-6 border-t border-gray-200 dark:border-gray-700">
                                    <div class="flex gap-2">
                                        <form action="{{ route('relatorios.edit', ['id' => $relatorio->id]) }}" method="GET">
                                            @csrf
                                            <button type="submit" class="inline-flex items-center px-3 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-500 focus:bg-blue-500 active:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                                Editar
                                            </button>
                                        </form>
                                        <form action="{{ route('relatorios.delete', ['id' => $relatorio->id]) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="inline-flex items-center px-3 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 focus:bg-red-500 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                                Deletar
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>