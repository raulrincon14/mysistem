@extends('auth.contenido')

@section('login')
  <div class="col-sm-12">
    <div class="row justify-content-center h-100">
   <div class="col-sm-8 align-self-center text-center">
     <br> <br>
    <div class="cardr">
      <div class="row">
        <div class="col-md">
        <div class="card-block">
          <div class="row m-b-12">
              <div class="col-md-12">
                  <h3 class="text-center fuenteb">RINCOSOFT - SOFTWARE DE VENTA <img src="images/fondos/logo.png"  width="50"alt=""> </h3>
                  <hr class="hrr">
              </div>
          </div>
          <div class="row">
                  <div class="col-md-5"><img src="images/fondos/login.png" alt="" width="80%"></div>
                  <div class="col-md-6">
                    <form class="md-float-material form-material" method="POST" action="{{ route('login') }}" />
                    {{ csrf_field() }}
                          <div class="form-group form-primary {{$errors->has('usuario' ? 'is-invalid' : '')}}">
                                    <input type="text" name="usuario" id="usuario" class="form-control" required="" autocomplete="off" />
                                    <span class="form-bar"></span>
                                    <label class="float-label fuenteb">Usuario</label>
                                        {!!$errors->first('usuario','<span class="invalid-feedback">:message</span>')!!}
                                </div>
                                <div class="form-group form-primary">
                                    <input type="password" name="password" id="password" class="form-control" required="" />
                                    <span class="form-bar"></span>
                                    <label class="float-label fuenteb">Contraseña</label>
                                </div>
                                <div class="row m-t-25 text-left">

                                </div>
                                <div class="row m-t-30">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary btn-md btn-block waves-effect waves-light text-center m-b-20">INGRESAR</button>
                                    </div>
                                </div>
                    </form></div>
                  </div>
                  <div class="alert alert-danger col-md-12" style="
                      margin-bottom: 1px;
                      padding-bottom: 5px;
                      padding-top: 5px;
                      padding-left: 20px;
                  ">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <i class="icofont icofont-close-line-circled"></i>
                                        </button>
                                        <div class="fuenteb">
                                        <strong>ERROR: </strong> Ingrese sus datos porfavor!
                                        </div>

                                    </div>
                    <hr class="hrr" style="
                    margin-top: 10px;
                    margin-bottom: 10px; ">
                    <div class="text-center">
                      <b class="fuenteb">Desarrollado por: <a href="http://www.rincosoft.com/"><b class="fuenteb">RINCOSOFT</b></a></dt>
                      <p class="fuenteb m-b-0  ">"La oportunidad de nuestro futuro, la vemos en el éxito de nuestros clientes"</p>
                    </div>
                </div>


        </div>
        </div>
      </div>
    </div>
    <br>

  </div>
    </div>

@endsection
