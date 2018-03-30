<div class="col-lg-6">
    <div class="card">
        <div class="header">
            <h5 class="title"><small>INCIDENCIAS POR PARTIDO</small></h5>
        </div>
        <div class="content">
            <ul class="list-unstyled team-members">
                <li>
                    <div class="row">
                        <div class="col-xs-3">
                            <div class="avatar">
                                <img src="<?php echo $this->request->webroot?>Paper/img/partidos_png/PT.png" alt="Circle Image" class="img-circle img-no-padding img-responsive">
                            </div>
                        </div>
                        <div class="col-xs-4">
                            Incidencias
                            <br>
                            <span class="text-success"><small>1</small></span>
                        </div>
                        
                    </div>
                </li>
                <li>
                    <div class="row">
                        <div class="col-xs-3">
                            <div class="avatar">
                                <img src="<?php echo $this->request->webroot?>Paper/img/partidos_png/PAN.png" alt="Circle Image" class="img-circle img-no-padding img-responsive">>
                            </div>
                        </div>
                        <div class="col-xs-4">
                            Incidencias
                            <br>
                            <span class="text-success"><small>3</small></span>
                        </div>
                        
                    </div>
                </li>
                <li>
                    <div class="row">
                        <div class="col-xs-3">
                            <div class="avatar">
                                <img src="<?php echo $this->request->webroot?>Paper/img/partidos_png/VER.png" alt="Circle Image" class="img-circle img-no-padding img-responsive">>
                            </div>
                        </div>
                        <div class="col-xs-4">
                            Incidencias
                            <br>
                            <span class="text-success"><small>1</small></span>
                        </div>
                        
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
<div class="col-lg-6">
        
        <h5 class="info-text"><small>REPORTAR INCIDENCIA</small> </h5>
        <div class="col-sm-10 col-sm-offset-1">
        <div class="form-group">
            <select class="form-control">
                <option selected="">- Seleccionar Partido -</option>
                <option>PAN</option>
                <option>PRI</option>
                <option>PRD</option>
                <option>PVE</option>
                <option>PT</option>
                <option>MOV</option>
                <option>NA</option>
                <option>MOR</option>
                <option>PES</option>
            </select>
            </div>
        </div>
        <div class="col-sm-10 col-sm-offset-1">
        <div class="form-group">
            <select class="form-control">
                <option  selected="">- Seleccionar Incidencia-</option>
                <option>La casilla se instaló antes de las 7:00 a.m.</option>
                <option>Faltó material Electoral</option>
                <option>Se impidió el acceso de los REPRESENTANTES</option>
                <option>Otro</option>
            </select>
            </div>
        </div>
        
        <div class="col-sm-10 col-sm-offset-1">
            <div class="form-group">
                <label>OTRA INCIDENCIA</label>
                <textarea class="form-control" placeholder="" rows="2"></textarea>
            </div>
        </div>
        <div class="col-sm-12 ">
            <button type="button" class="btn btn-info btn-fill btn-xs pull-right">Agregar Incidencia</button>
        </div>
        
</div>