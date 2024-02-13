<x-layout>
    <div x-data="crearOrden" class="container pt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <header class="pb-3 d-flex justify-content-between align-items-center">
                    <h1 class="display-6 lead">Nueva Orden</h1>
                    <a href="/" class="btn">Regresar</a>
                </header>
                <form @submit.prevent="guardarOrden()" >
                    <div class="pb-3">
                        <label for="lbl-product">Producto</label>
                        <select required x-model="orden.productoId" id="" class="form-select" id="lbl-product">
                            <option value="">Selecione un producto</option>
                            <template x-for="product in productos">
                                <option :value="product.id" x-text="product.nombre"></option>
                            </template>
                        </select>
                    </div>
                    <div class="pb-3">
                        <label for="lbl-cantidad">Cantidad</label>
                        <input type="number" x-model.number="orden.cantidad" class="form-control" id="lbl-cantidad">
                    </div>
                    <div class="pb-3">
                        <label for="lbl-unit-price">Precio Unitario</label>
                        <input type="text" x-model="orden.precioUnitario" class="form-control" id="lbl-unit-price">
                    </div>
                    <div class="text-end pt-3">
                        <button type="submit" class="btn btn-dark px-5">
                            Guardar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @push('scripts')
        <script>
            document.addEventListener('alpine:init', () => {
                Alpine.data('crearOrden', () => ({
                    productos: [],
                    orden: {
                        productoId: 0,
                        cantidad: 1,
                        precioUnitario: 0
                    },
                    init() {
                        this.obtenerProductos()
                    },
                    async obtenerProductos() {
                        try {
                            const res = await fetch('/api/productos')
                            if (res.status < 200 && res.status >= 300) throw res
                            const { data } = await res.json()

                            this.productos = data
                        } catch (error) {
                            alert('No fue posible cargar los productos')
                        }
                    },
                    async guardarOrden() {
                        try {
                            const res = await fetch('/api/ordenes', {
                                method: 'POST',
                                headers: {
                                    Accept: 'application/json',
                                    'Content-Type': 'application/json'
                                },
                                body: JSON.stringify({
                                    precio_unitario: parseFloat(this.orden.precioUnitario),
                                    cantidad: this.orden.cantidad,
                                    producto_id: this.orden.productoId
                                })
                            })
                            console.log(res.status)
                            if (res.status < 200 || res.status >= 300) throw res

                            window.location.href = '/'
                        } catch (error) {
                            alert('No fue posible crear la orden')
                        }
                    }
                }))
            })
        </script>
    @endpush
</x-layout>
