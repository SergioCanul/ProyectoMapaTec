@if(@Auth::user()->hasRole('admin'))
<x-app-layout>
<div class="container-fluid">
    <div class="row justify-content-center mt-10">
        <div class="col-md-12">
            @livewire('menu-admin')
        </div>
    </div>
</div>
</x-app-layout>
@else
<div class="container-fluid">
    <div class="row justify-content-center mt-10">
        <div class="col-md-12">
            Solo acceso para Admins
        </div>
    </div>
</div>
@endif
