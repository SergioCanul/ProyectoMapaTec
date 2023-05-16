<x-app-layout>
<div class="w-full max-w-xs mx-auto">
    <a href="{{ url('/menuprincipal')}}"><button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" >
        Regresar
      </button></a>
    <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 ">

        <h2 class="mx-auto">Detalles departamento</h2>
        <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" >
            Nombre departamento:
        </label>
        <p class="block text-red-400 text-sm font-bold">
            {{$departamento->nombreDepartamento}}
        </p>
        </div>
        <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" >
            Edificio en que se encuentra:
        </label>
        <p class="block text-red-400 text-sm font-bold">
            {{$departamento->nombreEdificio}}
        </p>
        </div>
        <div class="mb-2">
        <label class="block text-gray-700 text-sm font-bold mb-2" >
        Encargado:
        </label>
        <p class="block text-red-400 text-sm font-bold">
            {{$departamento->encargado}}
        </p>
        </div>
        <div class="mb-2">
        <label class="block text-gray-700 text-sm font-bold mb-2" >
            Puesto de trabajo:
        </label>
        <p class="block text-red-400 text-sm font-bold">
            {{$departamento->puestoTrabajo}}
        </p>
        </div>
        <div class="mb-2">
        <label class="block text-gray-700 text-sm font-bold mb-2" >
            Contacto
        </label>
        <p class="block text-red-400 text-sm font-bold">
            {{$departamento->correo}}
        </p>
        </div>
    </div>
</div>
</x-app-layout>
