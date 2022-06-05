      
<x-app-layout>
    <p>Hola</p>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
     <div class="p-6 bg-white border-b border-gray-200" style=" width:510px; margin-top: 150px; margin-left:34%; margin-right: 50%;padding:auto">
        <div style="display: flex;">
            <button style="background-color:orange; border-radius: 16px; margin-right:30px;" > <a href="/empleados"><img src= "../img/empleados.png" width="150px" height="150px"></a> </button>
            <button style="background-color:orange; border-radius: 16px; margin-right:30px; "> <a href="/clientes"><img src= "../img/clientes.png" width="150px" height="150px"></a> </button>
            <button style="background-color:orange; border-radius: 16px; "> <a href="/averias"><img src= "../img/averias.png" width="150px" height="150px"></a> </button>

        </div>    
        <div style="display: flex;">
            <button style="background-color:orange; border-radius: 16px; margin-right:30px; margin-top:30px;"> <a href="/materiales"><img src= "../img/materiales.png" width="150px" height="150px"></a> </button>
            <button style="background-color:orange; border-radius: 16px; margin-right:30px; margin-top:30px; " > <a href="/partes"><img src= "../img/partes.png" width="150px" height="150px"></a> </button>
            <button style="background-color:orange; border-radius: 16px;  margin-top:30px; "> <a href="/averias"><img src= "../img/averias.png" width="150px" height="150px"></a></button>
        </div> 
    </div> 
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in!
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 
