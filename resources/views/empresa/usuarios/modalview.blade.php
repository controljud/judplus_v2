<div class="modal fade" id="modal-view-usuario">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title" id="titViewUsuario">Usuário</h3>
            </div>
            <div class="modal-body" id="mdView">
                <div class="row">
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <img id="titViewImg" class="profile-user-img img-responsive img-circle" src="{{env('APP_URL')}}/image/user.jpg" alt="User profile picture">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-12">
                                <h4 id="titViewEmail"></h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <h4 id="titViewTipoUsuario"></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left btViewFechar" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>