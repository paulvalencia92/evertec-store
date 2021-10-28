<div class="modal fade" id="form_my_orders" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="POST" action="{{ route('orders.search') }}">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Buscar tus ordenes</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">

                    {{ csrf_field() }}

                    <div class="form-group mb-3">
                        <label for="code">Correo electronico</label>
                        <input class="form-control"
                               autocomplete="off"
                               required id="email"
                               value="{{ session('search[email]') }}"
                               name="search"
                               type="email"/>
                    </div>


                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                    <button class="btn btn-primary ml-2" type="submit">Buscar</button>
                </div>
            </form>
        </div>
    </div>
</div>
