<div class="modal fade" id="form_product" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Formulario producto</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">

                    @component('components.errors')@endcomponent

                    <div class="row">

                        {{ csrf_field() }}


                        <div class="col-md-12 form-group mb-3">
                            <label for="name">Producto</label>
                            <input class="form-control" id="name" name="name" type="text"/>
                        </div>

                        <div class="col-md-12 form-group mb-3">
                            <label for="name">Precio</label>
                            <input class="form-control" required id="price" name="price" type="number"/>
                        </div>

                        <div class="col-md-12 form-group mb-3">
                            <div class="input-group mb-3">
                                <div class="custom-file">
                                    <input class="custom-file-input"
                                           id="file"
                                           name="file"
                                           type="file"
                                           aria-describedby="inputGroupFileAddon01"/>
                                    <label class="custom-file-label" for="inputGroupFile01">Elegir archivo</label>
                                </div>
                            </div>
                        </div>


                    </div>

                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                    <button class="btn btn-primary ml-2" type="submit">Registrar producto</button>
                </div>
            </form>
        </div>
    </div>
</div>
