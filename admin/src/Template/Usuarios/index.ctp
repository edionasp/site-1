<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-content">
                        <h4 class="card-title">Buscar</h4>
                        
                        <form>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group form-group-min">
                                        <label>Nome</label>
                                        <input class="form-control" type="text">
                                        <span class="material-input"></span></div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-group-min">
                                        <label>Usuário</label>
                                        <input class="form-control" type="text">
                                        <span class="material-input"></span></div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-group-min">
                                        <label>E-mail</label>
                                        <input class="form-control" type="email">
                                    <span class="material-input"></span></div>
                                </div>
                                
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group form-group-min">
                                         <label>Mostrar</label> <br/>
                                        <select class="form-control" data-style="select-with-transition" title="Choose City" data-size="7" tabindex="-98">
                                            <option value="2">Todos</option>
                                            <option value="3">Somente Ativos</option>
                                            <option value="4">Somente Inativos</option>
                                        </select>
                                        <span class="material-input"></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-group-min">
                                         <label>Grupo</label> <br/>
                                        <select class="form-control" data-style="select-with-transition" title="Choose City" data-size="7" tabindex="-98">
                                            <option value="2">Todos</option>
                                            <option value="3">Administrador</option>
                                            <option value="4">Gerente</option>
                                            <option value="4">Comunicação</option>
                                            <option value="4">Compras</option>
                                            <option value="4">Jurídico</option>
                                        </select>
                                        <span class="material-input"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group form-button">
                            <button type="submit" class="btn btn-fill btn-success pull-right">Buscar<div class="ripple-container"></div></button>
                                <button type="submit" class="btn btn-fill btn-warning pull-right">Novo<div class="ripple-container"></div></button>
                            </div>
                        </form>
                        
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card">
                   
                    <div class="card-content table-responsive">
                        <h4 class="card-title">Lista de Usuários</h4>
                        <table class="table">
                            <thead class="text-primary">
                                <tr>
                                    <th style="width: 25%">Nome</th>
                                    <th>Usuário</th>
                                    <th>E-mail</th>
                                    <th>Ativo</th>
                                    <th>Grupo</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="width: 30%">Plinio Jose Naves</td>
                                    <td style="width: 15%">pnaves</td>
                                    <td style="width: 20%">pliniopjn@gmail.com</td>
                                    <td>Não</td>
                                    <td>Comunicação</td>
                                    <td class="td-actions text-right">
                                        <button type="button" rel="tooltip" class="btn btn-primary btn-round" title="">
                                            <i class="material-icons">edit</i>
                                        </button>
                                        <button type="button" rel="tooltip" class="btn btn-danger btn-round" title="">
                                            <i class="material-icons">close</i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Fábio Bugança</td>
                                    <td>fabio</td>
                                    <td>fabio@flymedia.com.br</td>
                                    <td>Não</td>
                                    <td>Comunicação</td>
                                    <td class="td-actions text-right">
                                        <button type="button" rel="tooltip" class="btn btn-primary btn-round" title="">
                                            <i class="material-icons">edit</i>
                                        </button>
                                        <button type="button" rel="tooltip" class="btn btn-danger btn-round" title="">
                                            <i class="material-icons">close</i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Franciana</td>
                                    <td>Franciana</td>
                                    <td>comunicacao@coqueiral.mg.gov.br</td>
                                    <td>Sim</td>
                                    <td>Administrador</td>
                                    <td class="td-actions text-right">
                                        <button type="button" rel="tooltip" class="btn btn-primary btn-round" title="">
                                            <i class="material-icons">edit</i>
                                        </button>
                                        <button type="button" rel="tooltip" class="btn btn-danger btn-round" title="">
                                            <i class="material-icons">close</i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Guilherme</td>
                                    <td>Guilherme</td>
                                    <td>ti@coqueiral.mg.gov.br</td>
                                    <td>Sim</td>
                                    <td>Administrador</td>
                                    <td class="td-actions text-right">
                                        <button type="button" rel="tooltip" class="btn btn-primary btn-round" title="">
                                            <i class="material-icons">edit</i>
                                        </button>
                                        <button type="button" rel="tooltip" class="btn btn-danger btn-round" title="">
                                            <i class="material-icons">close</i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Fábio Valentim</td>
                                    <td>maitabom</td>
                                    <td>frotas@coqueiral.mg.gov.br</td>
                                    <td>Sim</td>
                                    <td>Administrador</td>
                                    <td class="td-actions text-right">
                                        <button type="button" rel="tooltip" class="btn btn-primary btn-round" title="">
                                            <i class="material-icons">edit</i>
                                        </button>
                                        <button type="button" rel="tooltip" class="btn btn-danger btn-round" title="">
                                            <i class="material-icons">close</i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Rognei Lázaro</td>
                                    <td>dindico</td>
                                    <td>compras@coqueiral.mg.gov.br</td>
                                    <td>Sim</td>
                                    <td>Compras</td>
                                    <td class="td-actions text-right">
                                        <button type="button" rel="tooltip" class="btn btn-primary btn-round" title="">
                                            <i class="material-icons">edit</i>
                                        </button>
                                        <button type="button" rel="tooltip" class="btn btn-danger btn-round" title="">
                                            <i class="material-icons">close</i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 30%">Plinio Jose Naves</td>
                                    <td style="width: 15%">pnaves</td>
                                    <td style="width: 20%">pliniopjn@gmail.com</td>
                                    <td>Não</td>
                                    <td>Comunicação</td>
                                    <td class="td-actions text-right">
                                        <button type="button" rel="tooltip" class="btn btn-primary btn-round" title="">
                                            <i class="material-icons">edit</i>
                                        </button>
                                        <button type="button" rel="tooltip" class="btn btn-danger btn-round" title="">
                                            <i class="material-icons">close</i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Fábio Bugança</td>
                                    <td>fabio</td>
                                    <td>fabio@flymedia.com.br</td>
                                    <td>Não</td>
                                    <td>Comunicação</td>
                                    <td class="td-actions text-right">
                                        <button type="button" rel="tooltip" class="btn btn-primary btn-round" title="">
                                            <i class="material-icons">edit</i>
                                        </button>
                                        <button type="button" rel="tooltip" class="btn btn-danger btn-round" title="">
                                            <i class="material-icons">close</i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Franciana</td>
                                    <td>Franciana</td>
                                    <td>comunicacao@coqueiral.mg.gov.br</td>
                                    <td>Sim</td>
                                    <td>Administrador</td>
                                    <td class="td-actions text-right">
                                        <button type="button" rel="tooltip" class="btn btn-primary btn-round" title="">
                                            <i class="material-icons">edit</i>
                                        </button>
                                        <button type="button" rel="tooltip" class="btn btn-danger btn-round" title="">
                                            <i class="material-icons">close</i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Guilherme</td>
                                    <td>Guilherme</td>
                                    <td>ti@coqueiral.mg.gov.br</td>
                                    <td>Sim</td>
                                    <td>Administrador</td>
                                    <td class="td-actions text-right">
                                        <button type="button" rel="tooltip" class="btn btn-primary btn-round" title="">
                                            <i class="material-icons">edit</i>
                                        </button>
                                        <button type="button" rel="tooltip" class="btn btn-danger btn-round" title="">
                                            <i class="material-icons">close</i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Fábio Valentim</td>
                                    <td>maitabom</td>
                                    <td>frotas@coqueiral.mg.gov.br</td>
                                    <td>Sim</td>
                                    <td>Administrador</td>
                                    <td class="td-actions text-right">
                                        <button type="button" rel="tooltip" class="btn btn-primary btn-round" title="">
                                            <i class="material-icons">edit</i>
                                        </button>
                                        <button type="button" rel="tooltip" class="btn btn-danger btn-round" title="">
                                            <i class="material-icons">close</i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Rognei Lázaro</td>
                                    <td>dindico</td>
                                    <td>compras@coqueiral.mg.gov.br</td>
                                    <td>Sim</td>
                                    <td>Compras</td>
                                    <td class="td-actions text-right">
                                        <button type="button" rel="tooltip" class="btn btn-primary btn-round" title="">
                                            <i class="material-icons">edit</i>
                                        </button>
                                        <button type="button" rel="tooltip" class="btn btn-danger btn-round" title="">
                                            <i class="material-icons">close</i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 30%">Plinio Jose Naves</td>
                                    <td style="width: 15%">pnaves</td>
                                    <td style="width: 20%">pliniopjn@gmail.com</td>
                                    <td>Não</td>
                                    <td>Comunicação</td>
                                    <td class="td-actions text-right">
                                        <button type="button" rel="tooltip" class="btn btn-primary btn-round" title="">
                                            <i class="material-icons">edit</i>
                                        </button>
                                        <button type="button" rel="tooltip" class="btn btn-danger btn-round" title="">
                                            <i class="material-icons">close</i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Fábio Bugança</td>
                                    <td>fabio</td>
                                    <td>fabio@flymedia.com.br</td>
                                    <td>Não</td>
                                    <td>Comunicação</td>
                                    <td class="td-actions text-right">
                                        <button type="button" rel="tooltip" class="btn btn-primary btn-round" title="">
                                            <i class="material-icons">edit</i>
                                        </button>
                                        <button type="button" rel="tooltip" class="btn btn-danger btn-round" title="">
                                            <i class="material-icons">close</i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Franciana</td>
                                    <td>Franciana</td>
                                    <td>comunicacao@coqueiral.mg.gov.br</td>
                                    <td>Sim</td>
                                    <td>Administrador</td>
                                    <td class="td-actions text-right">
                                        <button type="button" rel="tooltip" class="btn btn-primary btn-round" title="">
                                            <i class="material-icons">edit</i>
                                        </button>
                                        <button type="button" rel="tooltip" class="btn btn-danger btn-round" title="">
                                            <i class="material-icons">close</i>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        
                    </div>
                     <div class="card-content">
                        <div class="material-datatables">
                            <div class="row">
                                <div class="col-sm-5">
                                    <div class="dataTables_paginate paging_full_numbers" id="datatables_info">50 usuários encontrados</div>
                                </div>
                                <div class="col-sm-7 text-right">
                                    <div class="dataTables_paginate paging_full_numbers" id="datatables_paginate">
                                        <ul class="pagination pagination-success" style="margin: 0">
                                            <li class="paginate_button first" id="datatables_first"><a href="#" aria-controls="datatables" data-dt-idx="0" tabindex="0">Primeiro</a></li>
                                            <li class="paginate_button previous" id="datatables_previous"><a href="#" aria-controls="datatables" data-dt-idx="1" tabindex="0">Anterior</a></li>
                                            <li class="paginate_button active"><a href="#" aria-controls="datatables" data-dt-idx="2" tabindex="0">1</a></li><li class="paginate_button "><a href="#" aria-controls="datatables" data-dt-idx="3" tabindex="0">2</a></li>
                                            <li class="paginate_button "><a href="#" aria-controls="datatables" data-dt-idx="4" tabindex="0">3</a></li><li class="paginate_button "><a href="#" aria-controls="datatables" data-dt-idx="5" tabindex="0">4</a></li>
                                            <li class="paginate_button next" id="datatables_next"><a href="#" aria-controls="datatables" data-dt-idx="6" tabindex="0">Próximo</a></li>
                                            <li class="paginate_button last" id="datatables_last"><a href="#" aria-controls="datatables" data-dt-idx="7" tabindex="0">Último</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>