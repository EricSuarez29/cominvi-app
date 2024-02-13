<x-layout>
    <div x-data="ordenes" class="container pt-5">
        <header class="pb-3">
            <div class="d-flex justify-content-between align-items-center">
                <h1 class="display-6 lead">Ordenes</h1>
                <a href="{{ route('orden.crear') }}" class="btn btn-dark">Nueva Orden</a>
            </div>
            <div class="row">
                <div class="col-12 pb-1">
                    <span>Filtros</span>
                </div>
                <div class="col-3">
                    <select @change="obtenerOrdenes()" x-model="filtros.categoria" class="form-select">
                        <option value="">Categorías</option>
                        <option value="Smartphones">Smartphones</option>
                    </select>
                </div>
            </div>
        </header>
        <table class="table">
            <thead>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Precio Unitario</th>
                <th>Total</th>
                <th>Fecha</th>
            </thead>
            <tbody>
                <template x-for="orden in data">
                    <tr>
                        <td x-text="orden.nombre"></td>
                        <td x-text="orden.cantidad"></td>
                        <td x-text="orden.precioUnitario"></td>
                        <td x-text="orden.importeTotal"></td>
                        <td x-text="new Date(orden.fecha).toLocaleDateString()"></td>
                    </tr>
                </template>
            </tbody>
        </table>
    </div>
    @push('scripts')
        <script>
            document.addEventListener('alpine:init', () => {
                Alpine.data('ordenes', () => ({
                    data: [],
                    filtros: {
                        categoria: ''
                    },
                    init() {
                        this.obtenerOrdenes()
                    },
                    async obtenerOrdenes() {
                        try {
                            let url = '/api/ordenes'
                            if (this.filtros.categoria) {
                                url = `${url}?categoria=${this.filtros.categoria}`
                            }

                            const res = await fetch(url, {
                                headers: {
                                    Accept: 'application/json'
                                }
                            });

                            if (res.status < 200 && res.status >= 300) throw res
                            const { data } = await res.json()

                            this.data = data
                        } catch (error) {
                            alert('No fue posible cargar las ordenes')
                        }
                    }
                }))
            })
        </script>
    @endpush
</x-layout>
