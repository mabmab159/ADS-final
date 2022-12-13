@extends("plantillas.plantilla")
@section("contenido")
<div class="usuariosContainer" style="flex-direction: column; overflow: hidden">
    <div class="form" style="padding: 20px;">
        <form method="post" action="{{route("filtrarReporte")}}">
            @csrf
            <div class="usuario-box" style="height: fit-content; min-height: auto">
                <h2>Registro de reportes</h2>
                <div class="text-box" style="margin: 10px 0">
                    <label style="font-size: 20px">Fecha inicio</label>
                    <input name="inicio" type="date">
                </div>
                <div class="text-box" style="margin: 10px 0">
                    <label style="font-size: 20px">Fecha fin</label>
                    <input name="fin" type="date">
                </div>
                <div class="btnUsuario">
                    <button type="submit">Filtrar</button>
                </div>
            </div>
        </form>
    </div>
    <div class="tableContainer" style="display: flex; width: 100%; padding-top: 0">
        <div style="width: 50%; padding: 15px;">
            <h2 style="margin: 20px 0">Ingresos por alquiler</h2>
            <table cellspacing="0" style="min-height: 300px">
                <thead>
                <tr>
                    <td>Id</td>
                    <td>Numero de habitación</td>
                    <td>Precio</td>
                    <td>Cliente</td>
                    <td>DNI</td>
                </tr>
                </thead>
                <tbody>
                @foreach($alquileres as $alquiler)
                    <tr>
                        <td>{{$alquiler->id}}</td>
                        <td>{{$alquiler->numero_habitacion}}</td>
                        <td>{{$alquiler->precio}}</td>
                        <td>{{$alquiler->cliente}}</td>
                        <td>{{$alquiler->dni}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div style="width: 50%; padding: 15px;">
            <h2 style="margin: 20px 0">Ingresos por ventas adicionales</h2>
            <table cellspacing="0" style="min-height: 300px">
                <thead>
                <tr>
                    <td>Id</td>
                    <td>Nombre de producto</td>
                    <td>Cantidad</td>
                    <td>Precio</td>
                    <td>Cliente</td>
                    <td>DNI</td>
                </tr>
                </thead>
                <tbody>
                @foreach($ventas as $venta)
                    <tr>
                        <td>{{$venta->id}}</td>
                        <td>{{$venta->nombre}}</td>
                        <td>{{$venta->cantidad}}</td>
                        <td>{{$venta->precio}}</td>
                        <td>{{$venta->cliente}}</td>
                        <td>{{$venta->dni}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection