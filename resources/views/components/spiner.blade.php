<!-- Modal para el spiner-->

<div class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-75"></div>

<div class="fixed inset-0 z-10 overflow-y-auto">
    <div class="flex items-end justify-center min-h-full p-4 text-center sm:items-center sm:p-0">

        <div
            class="relative overflow-hidden text-left transition-all transform bg-white rounded-lg shadow-xl sm:my-8 sm:w-full sm:max-w-lg">
            <div class="px-4 pt-5 pb-4 bg-white sm:p-6 sm:pb-4">
                <div class="sm:flex sm:items-start">
                    <div
                        class="flex items-center justify-center flex-shrink-0 w-12 h-12 mx-auto bg-red-100 rounded-full sm:mx-0 sm:h-10 sm:w-10">
                        <!-- Heroicon name: outline/exclamation-triangle -->
                        <svg class="w-6 h-6 text-red-600 animate-spin" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99" />
                        </svg>
                    </div>
                    <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                        <h3 class="text-lg font-bold leading-6 text-gray-900" id="modal-title">Enviando Solicitud...
                        </h3>
                        <div class="mt-2 text-red-400">
                            Por favor espere
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
