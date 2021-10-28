<div class="modal fade" id="form_order" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="POST" action="{{ route('orders.store') }}">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Registrar una nueva orden</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">

                    @component('components.errors')@endcomponent


                    <div class="row">

                        {{ csrf_field() }}

                        <input type="hidden" id="product_id" name="product_id">

                        <div class="col-md-12 form-group mb-3">
                            <label for="name">Producto</label>
                            <input class="form-control" disabled id="product_name" name="product_name" type="text"/>
                        </div>

                        <div class="col-md-12 form-group mb-3">
                            <label for="name">Nombre</label>
                            <input class="form-control" required id="name" name="name" type="text"/>
                        </div>

                        <div class="col-md-6 form-group mb-3">
                            <label for="code">Correo electronico</label>
                            <input class="form-control" required id="email" name="email" type="email"/>
                        </div>

                        <div class="col-md-6 form-group mb-3">
                            <label for="code">Telefono</label>
                            <input class="form-control" required id="movil" name="movil" type="text"/>
                        </div>

                        <div class="col-md-6 form-group mb-3">
                            <label for="code">Direccion y barrio</label>
                            <input class="form-control" required id="address" name="address" type="text"/>
                        </div>


                        <div class="col-md-6 form-group mb-3">
                            <label for="code">Ciudad, Departamento</label>
                            <input class="form-control" required id="city" name="city" type="text"/>
                        </div>


                    </div>

                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                    <button class="btn btn-primary ml-2" type="submit">Registrar orden</button>
                </div>
            </form>
        </div>
    </div>
</div>
