      

     <div class="p-6 bg-white border-b border-gray-200" style=" height:100%; display:flex; align-items:center; justify-content:center; ">
     <div>   
     <div style="display: flex;">
            <button style="background-color:orange; border-radius: 16px; margin-right:30px;" > <a href="/empleados"><img src= "../img/empleados.png" width="150px" height="150px"></a> </button>
            <button style="background-color:orange; border-radius: 16px; margin-right:30px; "> <a href="/clientes"><img src= "../img/clientes.png" width="150px" height="150px"></a> </button>
            <button style="background-color:orange; border-radius: 16px; "> <a href="/averias"><img src= "../img/averias.png" width="150px" height="150px"></a> </button>

        </div>    
        <div style="display: flex;">
            <button style="background-color:orange; border-radius: 16px; margin-right:30px; margin-top:30px;"> <a href="/materiales"><img src= "../img/materiales.png" width="150px" height="150px"></a> </button>
            <button style="background-color:orange; border-radius: 16px; margin-right:30px; margin-top:30px; " > <a href="/partes"><img src= "../img/partes.png" width="150px" height="150px"></a> </button>
            <button style="background-color:orange; border-radius: 16px; margin-right:30px; margin-top:30px; width:150px height:150px" >
  <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            
                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                                     <img src= "../img/salir.png" width="150px" height="150px">
                                                      

                            </x-dropdown-link>
                        </form>
  </button>
        </div> 
    </div>

    
