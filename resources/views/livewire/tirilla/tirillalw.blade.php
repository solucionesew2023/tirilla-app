<div>
    <!-- Modal tirilla de pago -->
    <form {{-- action="descargar-tirilla" method="POST" --}}>
        <div class="p-8 max-h-70">
            @if ($alerta)
                <div class="p-2 mb-4 font-semibold text-white bg-yellow-300 border border-yellow-600">
                    No existe tirilla de pago para esa consulta; vuelva a intentar para otra fecha.
                </div>
            @endif
            {{-- @csrf --}}
            <div class="grid grid-cols-2 gap-2">
                <p class="font-medium text-slate-500">
                    @error('cedula') <span class="text-red-400 error">La cedula es obligatoria</span> @enderror
                    <input wire:model.lazy="cedula" type="number" placeholder="Ingrese la cedula" required
                        class="block w-full px-4 py-3 mb-3 leading-tight text-gray-700 border rounded appearance-none bg-gray-50 border-sky-500 focus:outline-none focus:bg-white">
                        
                </p>


                <p class="font-medium text-slate-500">
                    @error('movil') <span class="text-red-400 error">El movil es requerido</span> @enderror
                    <input wire:model.lazy="movil" type="tel" placeholder="Ingrese Movil" required
                        class="block w-full px-4 py-3 mb-3 leading-tight text-gray-700 border rounded appearance-none bg-gray-50 border-sky-500 focus:outline-none focus:bg-white">
                        
                </p>
                {{-- <input type="datetime" name="fecha"  value="{{ date("m-Y");}}"> --}}
            </div>
            <p class="font-medium text-slate-500">
                @error('email') <span class="text-red-400 error">Debe ingresar un email</span> @enderror
                <input wire:model.lazy="email" type="email" placeholder="Ingrese el email" required
                    class="block w-full px-4 py-3 mb-3 leading-tight text-gray-700 border rounded appearance-none bg-gray-50 border-sky-500 focus:outline-none focus:bg-white">
                    
            </p>
            <div class="p-2">
                @error('anio') <span class="text-red-400 error">Debe seccionar un año </span> @enderror
                <fieldset class="p-3 border border-gray-200">
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
                    @error('listaMes') <span class="text-red-400 error">Debe seleccionar minimo un mes </span> @enderror
                    <p>
                    <fieldset class="p-3 border border-gray-200">
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
                    @error('listaMes') <span class="text-red-400 error">Debe seleccionar minimo un mes </span> @enderror
                    <p>
                    <fieldset class="p-3 border border-gray-200">
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
            <div class="flex p-4 mt-5 mb-1 text-sm text-yellow-700 bg-yellow-100 rounded-lg" role="alert">
                <svg class="inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20"
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

            <div id="myImgT" style="display:none" class="flex p-4 mt-5 mb-1 text-sm text-yellow-700 rounded-lg"
                role="alert">
                <div class="grid grid-cols-2 gap-2">
                    Cargando información ...
                    <img src="img/progress.gif" height="48" width="48" alt="">
                </div>
            </div>
        </div>
        <!-- Modal footer -->

        <div class="flex items-center justify-end px-4 py-2 space-x-4 bg-gray-100 border-t border-t-gray-500">
            <button class="px-4 py-2 text-white transition bg-gray-500 rounded-md hover:bg-gray-700"
                onclick="closeModal('modalT')">
                Cerrar
            </button>
            <button wire:click.prevent="consultarTirilla()"
                class="px-4 py-2 text-white transition rounded-md bg-sky-500 hover:bg-sky-700">
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
