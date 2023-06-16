<div>
    <!-- Modal tirilla de pago -->
    <form {{-- action="descargar-tirilla" method="POST" --}}>
        <div class="max-h-70 p-8">
            @if ($alerta)
                <div class="p-2 bg-yellow-300 text-white font-semibold mb-4 border border-yellow-600">
                    No existe tirilla de pago para esa consulta; vuelva a intentar para otra fecha.
                </div>
            @endif
            {{-- @csrf --}}
            <div class="grid grid-cols-2 gap-2">
                <p class="text-slate-500 font-medium">
                    <input wire:model.lazy="cedula" type="number" placeholder="Ingrese la cedula" required
                        class="appearance-none block w-full bg-gray-50 text-gray-700 border border-sky-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white">
                </p>

                <p class="text-slate-500 font-medium">
                    <input wire:model.lazy="movil" type="tel" placeholder="Ingrese Movil" required
                        class="appearance-none block w-full bg-gray-50 text-gray-700 border border-sky-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white">
                </p>
                {{-- <input type="datetime" name="fecha"  value="{{ date("m-Y");}}"> --}}
            </div>
            <p class="text-slate-500 font-medium">
                <input wire:model.lazy="email" type="email" placeholder="Ingrese el email" required
                    class="appearance-none block w-full bg-gray-50 text-gray-700 border border-sky-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white">
            </p>
            <div class="p-2">
                <fieldset class="border border-gray-200 p-3">
                    <legend>Seleccione el año</legend>
                    <div>
                        <input type="radio" wire:model="anio" value="1" checked /><label class="mx-2">Año
                            Actual</label>
                        <input type="radio" wire:model="anio" value="2" /><label class="mx-2">Año
                            Anterior</label>
                    </div>
                    <div>
                    </div>
                </fieldset>
            </div>
            @if ($anio == 1)
                <div>

                    <p>
                    <fieldset class="border border-gray-200 p-3">
                        <legend>Seleccione el Mes</legend>
                        <div class="grid grid-cols-3 gap-3">
                            {{-- @foreach ($config->category as $value) --}}

                            @if(1 < $mesActual)
                            <label><input wire:model='listaMes' type="checkbox" value="1" /> Enero</label>
                            @endif
                            @if(2 < $mesActual)
                            <label><input wire:model='listaMes' type="checkbox" value="2" /> Febrero</label>
                            @endif
                            @if(3 < $mesActual)
                            <label><input wire:model='listaMes' type="checkbox" value="3" /> Marzo</label>
                            @endif
                            @if(4 < $mesActual)
                            <label><input wire:model='listaMes' type="checkbox" value="4" /> Abril</label>
                            @endif
                            @if(5 < $mesActual)
                            <label><input wire:model='listaMes' type="checkbox" value="5" /> Mayo</label>
                            @endif
                            @if(6 < $mesActual)
                            <label><input wire:model='listaMes' type="checkbox" value="6" /> Junio</label>
                            @endif
                            @if(7 < $mesActual)
                            <label><input wire:model='listaMes' type="checkbox" value="7" /> Julio</label>
                            @endif
                            @if(8 < $mesActual)
                            <label><input wire:model='listaMes' type="checkbox" value="8" /> Agosto</label>
                            @endif
                            @if(9 < $mesActual)
                            <label><input wire:model='listaMes' type="checkbox" value="9" /> Septiembre</label>
                            @endif
                            @if(10 < $mesActual)
                            <label><input wire:model='listaMes' type="checkbox" value="10" /> Octubre</label>
                            @endif
                            @if( 11 < $mesActual)
                            <label><input wire:model='listaMes' type="checkbox" value="11" /> Noviembre</label>
                            @endif
                            @if(12 < $mesActual)
                            <label><input wire:model='listaMes' type="checkbox" value="12" /> Diciembre</label>
                            @endif
                            {{-- @endforeach --}}
                        </div>
                    </fieldset>
                    </p>
                </div>
            @elseif($anio == 2)
                <div>
                    <p>
                    <fieldset class="border border-gray-200 p-3">
                        <legend>Seleccione el Mes</legend>
                        <div class="grid grid-cols-3 gap-3">
                            {{-- @foreach ($config->category as $value) --}}
                            <label><input wire:model='listaMes' type="checkbox" value="10" /> Octubre</label>
                            <label><input wire:model='listaMes' type="checkbox" value="11" /> Noviembre</label>
                            <label><input wire:model='listaMes' type="checkbox" value="12" /> Diciembre</label>
                            {{-- @endforeach --}}
                        </div>
                    </fieldset>
                    </p>
                </div>
            @endif
            <div class="flex bg-yellow-100 rounded-lg p-4 mt-5 mb-1 text-sm text-yellow-700" role="alert">
                <svg class="w-5 h-5 inline mr-3" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                        clip-rule="evenodd"></path>
                </svg>
                <div>
                    <span class="font-medium">Atencion!</span> La tirilla de pago se enviara automaticamente al
                    correo digitado.
                </div>
            </div>

            <div id="myImgT" style="display:none" class="flex rounded-lg p-4 mt-5 mb-1 text-sm text-yellow-700"
                role="alert">
                <div class="grid grid-cols-2 gap-2">
                    Cargando información ...
                    <img src="img/progress.gif" height="48" width="48" alt="">
                </div>
            </div>
        </div>
        <!-- Modal footer -->

        <div class="px-4 py-2 border-t bg-gray-100 border-t-gray-500 flex justify-end items-center space-x-4">
            <button class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-700 transition"
                onclick="closeModal('modalT')">
                Cerrar
            </button>
            <button wire:click.prevent="consultarTirilla()"
                class="bg-sky-500 text-white px-4 py-2 rounded-md hover:bg-sky-700 transition">
                Descargar Tirilla
            </button>
        </div>
    </form>
    <!-- MOdal de spiner -->
    <div wire:loading.delay.longer wire:target="consultarTirilla" class="relative z-10" aria-labelledby="modal-title"
        role="dialog" aria-modal="true">
        <x-spiner></x-spiner>
    </div>
</div>
