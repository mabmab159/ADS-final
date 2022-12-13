@extends("plantillas.plantilla")
@section("contenido")
    <div class="ventasContainer usuariosContainer">
        <form method="post" action="{{route("realizarVenta")}}">
            @csrf
            <div class="formClienteVenta">
                <div class="formVentas">
                    <h2>Ventas</h2>
                    <div class="ventas-box">
                        <label>Cliente</label>
                        <input name="cliente" placeholder="Ingrese cliente" minlength="1">
                    </div>
                    <div class="ventas-box">
                        <label>DNI</label>
                        <input name="dni" placeholder="Ingrese DNI" type="number" min="10000000" max="99999999">
                    </div>
                    <div class="btnVentas">
                        <button type="submit">Guardar</button>
                    </div>
                </div>
                <div class="formProductoVentas">
                    <div class="tableContainer">
                        <table cellspacing="0">
                            <thead>
                            <tr>
                                <td style="width: 357.61px">Nombre</td>
                                <td style="width: 138.38px">Precio</td>
                                <td style="width: 98.19px">Stock</td>
                                <td style="width: 189.02px">Cantidad</td>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td style="padding: 0" colspan="4">
                                    <div style="max-height: 600px; overflow-y: overlay">
                                        <table style="border: none;">
                                            @foreach($productos as $producto)
                                                <tr>
                                                    <td><input style="border: 0" name="nombre"
                                                               value="{{$producto->nombre}}" readonly>
                                                    </td>
                                                    <td>S/.<input style="border: 0" name="precio"
                                                                  value="{{$producto->precio}}"></td>
                                                    <td>
                                                        <input style="border: 0" value="{{$producto->stock}}"
                                                               name="stock" readonly>
                                                    </td>
                                                    <td><input type="number" min=0
                                                               max={{$producto->stock}} name="producto{{$producto->id}}"
                                                        >
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
            </div>
        </form>
    </div>
@endsection
