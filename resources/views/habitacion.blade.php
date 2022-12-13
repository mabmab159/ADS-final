@extends("plantillas.plantilla")
@section("contenido")
<div class="usuariosContainer">
    @if(isset($habitacion))
            <form method="post" action="{{route("crearHabitacion")}}">
                @csrf
                <div class="formHabitacion">
                    <h2>Habitaciones</h2>
                    <div style="display: none">
                        <label>id</label>
                        <input name="id" value="{{$habitacion->id}}" >
                    </div>
                    <div class="habitacion-box">
                        <label>N° Hab</label>
                        <input name="numero_habitacion" value="{{$habitacion->numero_habitacion}}" autocomplete="off" placeholder="Ingrese N° Hab" min="1" type="number">
                    </div>
                    <div class="habitacion-box">
                        <label>Piso</label>
                        <input name="piso" value="{{$habitacion->piso}}"autocomplete="off" placeholder="Ingrese N° de piso" min="1" type="number">
                    </div>
                    @error("piso")
                        <span>Campo obligatorio*</span>
                    @enderror
                    <div class="habitacion-box">
                        <label>Precio</label>
                        <input name="precio" value="{{$habitacion->precio}}"autocomplete="off" placeholder="Ingrese el precio" min="1" type="number">
                    </div>
                    @error("precio")
                        <span>Campo obligatorio*</span>
                    @enderror
                    <div class="btnHabitacion">
                        <button type="submit">Guardar</button>
                    </div>
                </div>
            </form>
        @else
            <form method="post" action="{{route("crearHabitacion")}}">
                @csrf
                <div class="formHabitacion">
                    <h2>Crear habitación</h2>
                    <div style="display: none">
                        <label>Id</label>
                        <input name="id" value="0">
                    </div>
                    <div class="habitacion-box">
                        <label>N° Hab</label>
                        <input name="numero_habitacion" autocomplete="off" placeholder="Ingrese N° Hab" min="1" type="number">
                    </div>
                    @error("numero_habitacion")
                        <span>Numero de habitación ya usado</span>
                    @enderror
                    <div class="habitacion-box">
                        <label>Piso</label>
                        <input name="piso" autocomplete="off" placeholder="Ingrese N° de piso" min="1" type="number">
                    </div>
                    @error("piso")
                        <span>Campo obligatorio*</span>
                    @enderror
                    <div class="habitacion-box">
                        <label>Precio</label>
                        <input name="precio" autocomplete="off" placeholder="Ingrese el precio" min="1" type="number">
                    </div>
                    @error("precio")
                        <span>Campo obligatorio*</span>
                    @enderror
                    <div class="btnHabitacion">
                        <button type="submit">Registrar</button>
                    </div>
                </div>
            </form>
        @endif
        <div class="tableContainer">
            <table cellspacing="0">
                <thead>
                <tr>
                    <td style="width: 163.91px;">Nº</td>
                    <td style="width: 163.91px;">Numero de habitación</td>
                    <td style="width: 163.91px;">Piso</td>
                    <td style="width: 163.91px;">Precio</td>
                    <td colspan="2">Acciones</td>
                </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="padding: 0" colspan="5">
                            <div style="max-height: 600px; overflow-y: overlay">
                                <table style="border: none;">
                                @foreach($habitaciones as $habitacion)
                                    <tr>
                                        <td>{{$habitacion->id}}</td>
                                        <td>{{$habitacion->numero_habitacion}}</td>
                                        <td>{{$habitacion->piso}}</td>
                                        <td>S/.{{$habitacion->precio}}</td>
                                        <td class="subFormContainer">
                                            <form method="post" action="{{route("editarHabitacion")}}">
                                                @csrf
                                                <input name="id" value="{{$habitacion->id}}" style="display: none">
                                                <button class="editButton">Editar</button>
                                            </form>
                                        </td>
                                        <td class="subFormContainer">
                                            <form method="post" action="{{route("eliminarHabitacion")}}">
                                                @csrf
                                                <input name="id" value="{{$habitacion->id}}" style="display: none">
                                                <button class="deleteButton">Eliminar</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </table>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
</div>

@endsection
