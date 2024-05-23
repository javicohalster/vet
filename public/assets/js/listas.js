$(document).ready(function() {
	listar_doctores()
    listar_recepcionistas()
    listar_personas()
    listar_pacientes()
    listar_especialidades()
    listar_permisos()
    listar_roles()
    listar_citas_pendientes()
    listar_citas_atendidas()
    listar_pacientes_proxima_cita()
  
})

var listar_permisos = function()
{
    var table = $('#table_permisos').DataTable({
        "headers": {'X-CSRF-TOKEN':$('input[name=_token]').attr('content')},
        "processing": true,
        "serverSide": true,
        "order": [[ 1, "asc" ]],
        "ajax": {
             "url": "permisos/show",
            },
        "pagingType": "simple_numbers",
        "lengthMenu": [
            [10, 25, 50, -1],
            [10, 25, 50, "Todos"]
        ],
        "language": {
            url: "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
        },
        "responsive": true,
        "columns":[
            {data: 'action', name: 'action', orderable: false, searchable: false},
            {data: 'name', name: 'name'}
        ]
    })
}
var listar_roles = function()
{
    var table = $('#table_roles').DataTable({
        "headers": {'X-CSRF-TOKEN':$('input[name=_token]').attr('content')},
        "processing": true,
        "serverSide": true,
        "order": [[ 1, "asc" ]],
        "ajax": {
             "url": "roles/show",
            },
        "pagingType": "simple_numbers",
        "lengthMenu": [
            [10, 25, 50, -1],
            [10, 25, 50, "Todos"]
        ],
        "language": {
            url: "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
        },
        "responsive": true,
        "columns":[
            {data: 'action', name: 'action', orderable: false, searchable: false},
            {data: 'name', name: 'name'}
        ]
    })
}
var listar_especialidades = function()
{
    var table = $('#table_especialidades').DataTable({
        "headers": {'X-CSRF-TOKEN':$('input[name=_token]').attr('content')},
        "processing": true,
        "serverSide": true,
        "order": [[ 1, "asc" ]],
        "ajax": {
             "url": "especialidades/show",
            },
        "pagingType": "simple_numbers",
        "lengthMenu": [
            [10, 25, 50, -1],
            [10, 25, 50, "Todos"]
        ],
        "language": {
            url: "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
        },
        "responsive": true,
        "columns":[
            {data: 'action', name: 'action', orderable: false, searchable: false},
            {data: 'nombre', name: 'nombre'}
        ]
    })
}
var listar_doctores = function()
{
    var table = $('#table_doctores').DataTable({
        "headers": {'X-CSRF-TOKEN':$('input[name=_token]').attr('content')},
        "processing": true,
        "serverSide": true,
        "order": [[ 3, "asc" ]],
        "ajax": {
             "url": "doctores/show",
            },
        "pagingType": "full_numbers",
        "lengthMenu": [
            [10, 25, 50, -1],
            [10, 25, 50, "Todos"]
        ],
        "language": {
            url: "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
        },
        "responsive": true,
        "columns":[
            {data: 'action', name: 'action', orderable: false, searchable: false},
            {data: 'rut', name: 'rut'},
            {data: 'nombres', name: 'nombres'},
            {data: 'apellidos', name: 'apellidos'},
            {data: 'email', name: 'email'}
        ]
	})
}
var listar_recepcionistas = function()
{
    var table = $('#table_recepcionistas').DataTable({
        "headers": {'X-CSRF-TOKEN':$('input[name=_token]').attr('content')},
        "processing": true,
        "serverSide": true,
        "order": [[ 3, "asc" ]],
        "ajax": {
             "url": "recepcionistas/show",
            },
        "pagingType": "simple_numbers",
        "lengthMenu": [
            [10, 25, 50, -1],
            [10, 25, 50, "Todos"]
        ],
        "language": {
            url: "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
        },
        "responsive": true,
        "columns":[
            {data: 'action', name: 'action', orderable: false, searchable: false},
            {data: 'rut', name: 'rut'},
            {data: 'nombres', name: 'nombres'},
            {data: 'apellidos', name: 'apellidos'},
            {data: 'email', name: 'email'}
        ]
	})
}
var listar_citas_pendientes = function()
{
    var table = $('#pendientes').DataTable({
        "headers": {'X-CSRF-TOKEN':$('input[name=_token]').attr('content')},
        "processing": true,
        "serverSide": true,
        "bInfo": false,
        "order": [[ 1, "desc" ]],
        "ajax": {
             "url": "consultas/show",
            },
        "pagingType": "full_numbers",
        "lengthMenu": [
            [10, 25, 50, -1],
            [10, 25, 50, "Todos"]
        ],
        "language": {
            url: "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json",
        },
        "responsive": true,
        "columns":[
            {data: 'action', name: 'action', orderable: false, searchable: false, class:"text-left"},
            {data: 'fecha_inicio', name: 'fecha_inicio'},
            {data: 'paciente', name: 'paciente.apellidos'},
            {data: 'propietario', name: 'paciente.nombres'},
            {data: 'doctor', name: 'doctor.apellidos'},
            {data: 'especialidad', name: 'especialidad.nombre'},
        ],
	})
}
var listar_citas_atendidas = function()
{
    var table = $('#table_atendidos').DataTable({
        "headers": {'X-CSRF-TOKEN':$('input[name=_token]').attr('content')},
        "processing": true,
        "serverSide": true,
        "bInfo": false,
        "order": [[ 1, "desc" ]],
        "ajax": {
             "url": "consultas-carga",
            },
        "pagingType": "full_numbers",
        "lengthMenu": [
            [10, 25, 50, -1],
            [10, 25, 50, "Todos"]
        ],
        "language": {
            url: "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json",
        },
        "responsive": true,
        "columns":[
            {data: 'action', name: 'action', orderable: false, searchable: false, class:"text-left"},
            {data: 'fecha_inicio', name: 'fecha_inicio'},
            {data: 'paciente', name: 'paciente.apellidos'},
            {data: 'propietario', name: 'paciente.nombres'},
            {data: 'doctor', name: 'doctor.apellidos'},
            {data: 'especialidad', name: 'especialidad.nombre'},
        ],
    })
}
var listar_pacientes = function()
{
  
    var table = $('#pacientes').DataTable({
        "headers": {'X-CSRF-TOKEN':$('input[name=_token]').attr('content')},
        "processing": true,
        "serverSide": true,
        "order": [[ 3, "asc" ]],
        "ajax": {
             "url": "pacientes/show",
            },

        "pagingType": "simple_numbers",
        "lengthMenu": [
            [10, 25, 50, -1],
            [10, 25, 50, "Todos"]
        ],
        "language": {
            url: "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
        },
        "responsive": true,
        "columns":[
            {data: 'action', name: 'action', orderable: false, searchable: false, class:"text-left"},
            {data: 'id', name: 'id'},
            {data: 'nombres', name: 'nombres'},
            {data: 'apellidos', name: 'apellidos'},
            {data: 'telefono', name: 'telefono'},
            {data: 'sangre', name: 'sangre'},
            {data: 'vih', name: 'vih'},
            {data: 'nacimiento', name: 'nacimiento'},
            {data: 'edad', name: 'nacimiento'},
            {data: 'fecha_ult_atencion', name: 'fecha_ult_atencion',searchable: true,orderable: true, class:"text-left"},
        ]
	})
}

var listar_pacientes_proxima_cita = function()
{
        var table = $('#proxima_cita').DataTable({
        "headers": {'X-CSRF-TOKEN':$('input[name=_token]').attr('content')},
        "processing": true,
        "serverSide": true,
        "order": [[ 3, "asc" ]],
        "ajax": {
             "url": "revisar/show",
            },

        "pagingType": "simple_numbers",
        "lengthMenu": [
            [10, 25, 50, -1],
            [10, 25, 50, "Todos"]
        ],
        "language": {
            url: "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
        },
        "responsive": true,
        "columns":[
            {data: 'id', name: 'id'},
            {data: 'nombres', name: 'nombres'},
            {data: 'apellidos', name: 'apellidos'},
            {data: 'telefono', name: 'telefono'},
            {data: 'sangre', name: 'sangre'},
            {data: 'vih', name: 'vih'},
            {data: 'nacimiento', name: 'nacimiento'},
            {data: 'edad', name: 'nacimiento'},
            {data: 'fecha_ult_atencion', name: 'fecha_ult_atencion'},
            {data: 'fechasiguientecita', name: 'fechasiguientecita',searchable: true,orderable: true, class:"text-left"},
            
        ]
	})
}
var listar_personas = function()
{
    var table = $('#personas').DataTable({
        "headers": {'X-CSRF-TOKEN':$('input[name=_token]').attr('content')},
        "processing": true,
        "serverSide": true,
        "order": [[ 2, "asc" ]],
        "ajax": {
             "url": "personas/show",
            },
        "pagingType": "simple_numbers",
        "lengthMenu": [
            [10, 25, 50, -1],
            [10, 25, 50, "Todos"]
        ],
        "language": {
            url: "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
        },
        "responsive": true,
        "columns":[
            {data: 'action', name: 'action', orderable: false, searchable: false, class:"text-left"},
            {data: 'rut', name: 'rut'},
            {data: 'nombres', name: 'nombres'},
            {data: 'apellidos', name: 'apellidos'},
            {data: 'email', name: 'email'},
            
        ],
    })
}
