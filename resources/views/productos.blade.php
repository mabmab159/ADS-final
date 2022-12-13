@extends("plantillas.plantilla")
@section("contenido")
    <div class="productosContainer usuariosContainer">
    @if(isset($producto))
        <form method="post" action="{{route("crearProducto")}}">
            @csrf
            <div class="formProductos">
                <h2>Crear producto</h2>
                <div style="display: none">
                    <label>id</label>
                    <input name="id" value="{{$producto->id}}">
                </div>
                <div class="productos-box">
                    <label>Nombre producto</label>
                    <input name="nombre" value="{{$producto->nombre}}" autocomplete="off" placeholder="Ingrese Producto">
                </div>
                @error("nombre")
                    <span>Rellenar campo</span>
                @enderror
                <div class="productos-box">
                    <label>Precio</label>
                    <input name="precio" value="{{$producto->precio}}" autocomplete="off" placeholder="Ingrese precio">
                </div>
                @error("precio")
                    <span>Dato erroneo</span>
                @enderror
                <div class="productos-box">
                    <label>Stock</label>
                    <input name="stock" value="{{$producto->stock}}" autocomplete="off" placeholder="Ingrese Stock">
                </div>
                @error("stock")
                    <span>Dato erroneo</span>
                @enderror
                <div class="btnProductos">
                    <button type="submit">Guardar</button>
                </div>
            </div>

        </form>
    @else
        <form method="post" action="{{route("crearProducto")}}">
            @csrf
          <div class="formProductos">
          <h2>Crear producto</h2>
            <div style="display: none">
                    <label>id</label>
                    <input name="id" value="0">
                </div>
                <div class="productos-box">
                    <label>Nombre producto</label>
                    <input name="nombre" placeholder="Ingrese Producto" autocomplete="off">
                </div>
                @error("nombre")
                    <span>Rellenar campo</span>
                @enderror
                <div class="productos-box">
                    <label>Precio</label>
                    <input name="precio" placeholder="Ingrese precio" autocomplete="off">
                </div>
                @error("precio")
                    <span>Dato erroneo</span>
                @enderror
                <div class="productos-box">
                    <label>Stock</label>
                    <input name="stock" placeholder="Ingrese stock" autocomplete="off">
                </div>
                @error("stock")
                    <span>Dato erroneo</span>
                @enderror
                <div class="btnProductos">
                    <button type="submit">Registrar</button>
                </div>
          </div>
        </form>
    @endif
    <div class="tableContainer">
        <table cellspacing="0">
            <thead>
            <tr>
                <td style="width: 98.72px;">Nº</td>
                <td style="width: 441.69px;">Nombre</td>
                <td style="width: 170.91px;">Precio</td>
                <td style="width: 121.27px;">Stock</td>
                <td colspan="2">Acciones</td>
            </tr>
            </thead>
            <tbody>
                <tr>
                    <td style="padding: 0" colspan="5">
                        <div style="max-height: 600px; overflow-y: overlay">
                            <table style="border: none;">
                            @foreach($productos as $producto)
                                <tr>
                                    <td>{{$producto->id}}</td>
                                    <td>{{$producto->nombre}}</td>
                                    <td>S/.{{$producto->precio}}</td>
                                    <td>{{$producto->stock}}</td>
                                    <td class="subFormContainer">
                                        <form method="post" action="{{route("editarProducto")}}">
                                            @csrf
                                            <input name="id" value="{{$producto->id}}" style="display: none">
                                            <button class="editButton">Editar</button>
                                        </form>
                                    </td>
                                    <td class="subFormContainer">
                                        <form method="post" action="{{route("eliminarProducto")}}">
                                            @csrf
                                            <input name="id" value="{{$producto->id}}" style="display: none">
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
