<div>
    @livewireStyles()
    <div class="row justify-content-between align-items-center">
        <h3 class="col-auto">Lista de Postulaciones</h3>
        <div class="col-auto">
            <a href="{{ route('create') }}" class="btn btn-primary">
                <i data-feather="plus-square"></i>
                Nueva Postulación
            </a>
        </div>
    </div>
<div class="row mt-3">
    <div class="stretch-card">
        <div class="card">
            <div class="card-body">
                <table id="products" class="w-100 table table-striped">
                    <div class="row justify-content-between align-items-center">
                    </div>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($invitations as $invitation)
                            <tr>
                                <td>{{ $invitation->id }}</td>
                                <td>{{ $invitation->user->name }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@livewireScripts()
</div>
