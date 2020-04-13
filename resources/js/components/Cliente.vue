<template>
<div class="pcoded-content">
    <!-- Page-header start -->
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-8">
                </div>
                <div class="col-md-4">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="./index.html"> <i class="fa fa-home"></i> </a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">Cliente</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Page-header end -->
  <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <div class="page-body">
                    <!-- `New` Constructor table start -->
                    <div class="card">
                        <div class="row align-items-center">
                            <div class="col-md-5">
                                <div class="card-header">
                                    <h5>Clientes</h5>
                                    <span>Agregar, editar y desactivar.</span>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="botona">

                                    <button type="button" @click="abrirModal('cliente','registrar')" class="btn btn-outline-primary btn-sm"><i class="icofont icofont-ui-add"></i>Nuevo</button>
                                </div>
                            </div>
                        </div>

                        <div class="card-block icon-btn">
                          <div class="form-group row">
                              <label class="col-sm-2 col-form-label"></label>
                              <div class="col-sm-4">
                                  <input type="text" autocomplete="off" v-on:keyup="listarCliente(1,buscar)" v-model="buscar" @keyup.enter="listarCliente(1,buscar)" placeholder="Texto a buscar" class="form-control" />
                              </div>
                              <div class="col-sm-4">
                                  <button type="submit" class="btn btn-outline-primary btn-sm"  @click="listarCliente(1,buscar)"><i class="fa fa-search"></i> Buscar </button>
                              </div>
                          </div>
                            <div class="dt-responsive table-responsive">
                                <div class="table-responsive">
                                    <table class="table table-xs">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Documento</th>
                                                <th>Numero</th>
                                                <th>Cliente</th>
                                                <th>Estado</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="cliente in arrayCliente" :key="cliente.idcliente">
                                                <th v-text="cliente.idcliente"></th>
                                                <td>
                                                  <div v-if="cliente.cli_doc === '1'">
                                                    Sin Doc
                                                  </div>
                                                  <div v-else-if="cliente.cli_doc === '2'">
                                                    DNI
                                                  </div>
                                                  <div v-else-if="cliente.cli_doc === '3'">
                                                    RUC
                                                  </div>
                                                  <div v-else>
                                                    Pasaporte
                                                  </div>
                                                </td>
                                                <td v-text="cliente.cli_docnum"></td>
                                                <td v-text="cliente.cli_nombre"></td>
                                                <td>
                                                    <div v-if="cliente.cli_estado">
                                                        <label class="label label-inverse-success">Activo</label>
                                                    </div>
                                                    <div v-else="cliente.cli_estado">
                                                        <label class="label label-inverse-danger">Desactivado</label>
                                                    </div>
                                                </td>
                                                <td>
                                                  <button type="button" @click="abrirModal('cliente','actualizar',cliente)" class="btn waves-effect waves-dark btn-info btn-outline-info btn-iconr">
                                                        <i class="fa fa-eye"></i>
                                                    </button>&nbsp;
                                                  <button type="button" @click="abrirModal('cliente','actualizar',cliente)" class="btn waves-effect waves-dark btn-warning btn-outline-warning btn-iconr">
                                                        <i class="ti-marker-alt"></i>
                                                    </button>&nbsp;
                                                    <template v-if="cliente.cli_estado">
                                                      <button type="button" class="btn waves-effect waves-dark btn-danger btn-outline-danger btn-iconr" @click="desactivarCliente(cliente.idcliente)">
                                                          <i class="fa fa-trash"></i>
                                                      </button>
                                                    </template>
                                                    <template v-else="cliente.cli_estado">
                                                      <button type="button" class="btn waves-effect waves-dark btn-info btn-outline-info btn-iconr" @click="activarCliente(cliente.idcliente)">
                                                          <i class="fa fa-check"></i>
                                                      </button>
                                                    </template>

                                                </td>

                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="card-block">
                                    <nav aria-label="Page navigation example justify-content-center">
                                        <ul class="pagination">
                                            <li class="page-item" v-if="pagination.current_page > 1">
                                                <a class="page-link" href="#" aria-label="Previous" @click.prevent="cambiarPagina(pagination.current_page - 1, buscar)">
                                                    <span aria-hidden="true">&laquo;</span>
                                                    <span class="sr-only" >Anterior</span>
                                                </a>
                                            </li>
                                            <li class="page-item" v-for="page in pagesNumber" :key="page" :class="[page == isActived ? 'active' : '']">
                                              <a class="page-link" href="#" @click.prevent="cambiarPagina(page, buscar)" v-text="page"></a>
                                            </li>
                                            <li class="page-item" v-if="pagination.current_page < pagination.last_page">
                                                <a class="page-link" href="#" aria-label="Next"  @click.prevent="cambiarPagina(pagination.current_page + 1, buscar)">
                                                    <span aria-hidden="true">&raquo;</span>
                                                    <span class="sr-only">Siguiente</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- `New` Constructor table end -->
                    <div class="modal fade" id="large-Modal" :class="{'mostrar':modal}" tabindex="-1" role="dialog">
                        <div class="modal-dialog modal-lg" role="document">
                          <div class="modal-content">
                            <div class="card">
                                <div class="card-header">
                                    <h5 v-text="tituloModal"></h5>
                                </div>
                                <div class="card-block">

                                    <form action="#" class="form-material" />
                                        <div class="row">
                                            <div class="col-sm-6 m-b-3">
                                                <div class="form-group form-primary">
                                                  <label class="col-sm col-form-label">Tipo de Doc. (*)</label>
                                                  <div class="col-sm">
                                                    <select name="select" class="form-control" v-model="selectdoc">
                                                        <option value="1">Sin.doc.sin.dni</option>
                                                        <option value="2">DNI</option>
                                                        <option value="3">RUC</option>
                                                        <option value="4">Pasaporte</option>
                                                    </select>
                                                  </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 m-b-5">
                                                <div class="form-group form-primary">
                                                  <label class="col-sm col-form-label">Número (*)</label>
                                                  <div class="col-sm">

                                                    <div class="input-group input-group-button">
                                                    <input type="text" class="form-control" placeholder="" :maxlength=textmax v-model="numebus">
                                                      <template v-if="selectdoc == 2 || selectdoc == 3 ">
                                                        <div class="input-group-append">
                                                          <!-- <el-button type="primary" slot="append" :loading="loading_search" icon="el-icon-search" @click.prevent="searchCustomer"> -->
                                                          <button type="primary" slot="append" class="btn btn-info btn-sm" :loading="true"  @click="mostrarDato()" :disabled='estadob'>
                                                            <template v-if="estadob==true">
                                                              <i class="ti-reload rotate-refresh"></i>
                                                            </template>
                                                            <template v-if="estadob==false">
                                                              <i class="fa fa-search"></i>
                                                            </template>
                                                          <!-- <button type="primary" slot="append" class="btn btn-info btn-sm" :loading="true"  @click="mostrarDato()"><i class="fa fa-search"></i> -->
                                                            <template v-if="selectdoc == 2">
                                                                RENIEC
                                                            </template>
                                                            <template v-if="selectdoc == 3">
                                                                SUNAT
                                                            </template>
                                                            </button>
                                                            </div>
                                                      </template>

                                                          </div>

                                                  </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6 m-b-3">
                                                <div class="form-group form-primary">
                                                  <label class="col-sm col-form-label">Nombre (*)</label>
                                                  <div class="col-sm">
                                                    <input type="text" class="form-control" v-model="cli_nombre">
                                                  </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 m-b-5">
                                                <div class="form-group form-primary">
                                                  <label class="col-sm col-form-label">Nombre Comercial o Razón</label>
                                                  <div class="col-sm">
                                                    <input type="text" class="form-control" v-model="cli_razon">
                                                  </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-4 m-b-3">
                                                <div class="form-group form-primary">
                                                  <label class="col-sm col-form-label">Pais</label>
                                                  <div class="col-sm">
                                                    <select name="select" class="form-control" v-model="pais_s">
                                                        <option value="1" selected>Perú</option>
                                                    </select>
                                                  </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-4 m-b-5">
                                                <div class="form-group form-primary">
                                                  <label class="col-sm col-form-label">Departamento</label>
                                                  <div class="col-sm">
                                                    <select name="select" class="form-control" v-model="depa_s" @click="llenarProvincia()">
                                                        <option value="0" disabled>Seleccionar</option>
                                                        <option v-for="departamentos in arrayDepartamento" :key="departamentos.iddepartamento" :value="departamentos.iddepartamento" v-text="departamentos.depa_nombre"></option>
                                                    </select>
                                                  </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-4 m-b-5">
                                                <div class="form-group form-primary">
                                                  <label class="col-sm col-form-label">Provincia</label>
                                                  <div class="col-sm">
                                                    <select name="select" class="form-control" v-model="provincia_s" @click="llenarDistrito()">
                                                        <option value="0" disabled>Seleccionar</option>
                                                        <option v-for="provincias in arrayProvincia" :key="provincias.idprovincia" :value="provincias.idprovincia" v-text="provincias.vincia_nombre"></option>
                                                    </select>
                                                  </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-4 m-b-3">
                                                <div class="form-group form-primary">
                                                  <label class="col-sm col-form-label">Distrito</label>
                                                  <div class="col-sm">
                                                    <select name="select" class="form-control" v-model="distrito_s">
                                                        <option value="0" disabled>Seleccionar</option>
                                                        <option v-for="distritos in arrayDistrito" :key="distritos.iddistrito" :value="distritos.iddistrito" v-text="distritos.distri_nombre"></option>
                                                    </select>
                                                  </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-8 m-b-5">
                                                <div class="form-group form-primary">
                                                  <label class="col-sm col-form-label">Dirección</label>
                                                  <div class="col-sm">
                                                    <input type="text" class="form-control" name="" v-model="cli_direccion">
                                                  </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-4 m-b-3">
                                                <div class="form-group form-primary">
                                                  <label class="col-sm col-form-label">Telefono / Cel.</label>
                                                  <div class="col-sm">
                                                      <input type="text" class="form-control" name="" v-model="cli_telefono">
                                                  </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-4 m-b-5">
                                                <div class="form-group form-primary">
                                                  <label class="col-sm col-form-label">e-mail</label>
                                                  <div class="col-sm">
                                                    <input type="text" class="form-control" name="" v-model="cli_email">
                                                  </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-4 m-b-5">
                                                <div class="form-group form-primary">
                                                  <label class="col-sm col-form-label">web</label>
                                                  <div class="col-sm">
                                                    <input type="text" class="form-control" name="" v-model="web">
                                                  </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="form-group row">
                                      <div v-show="errorCliente" class="div-error col-sm-12">
                                        <div class="text-error col-sm-12 text-center">
                                          <div v-for="error in errorMostrarMsj" :key="error" v-text="error">
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="text-center m-t-1">
                                            <button type="button" v-if="tipoAccion==1" class="btn btn-primary waves-effect waves-light m-r-10" @click="registrarCliente()">Guardar
                                            </button>
                                            <button type="button" v-if="tipoAccion==2" class="btn btn-primary waves-effect waves-light m-r-10" @click="actualizarCliente()">Actualizar
                                            </button>
                                            <button type="button" @click="cerrarModal()" class="btn btn-warning waves-effect waves-light">Cerrar
                                            </button>
                                        </div>
                                    </div>
                                </div> <p></p>
                                  </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Main-body end -->
            <div id="styleSelector">

            </div>
        </div>

    </div>
</div>

</div>
</div>
</div>
</div>
</div>
</template>

<script>
export default {
    data() {
        return {
            cliente_id:0,
            repetida: 0,
            estadob:false,
            loading: false,
            loadingg:false,
            web: null,
            iddepa:null,
            idprov:null,
            iddistri:null,
            numebus:'',
            pais_s:1,
            depa_s:0,
            distrito_s:0,
            provincia_s:0,
            textomax:'',
            cli_doc: '',
            cli_docnum: '',
            cli_nombre: '',
            cli_razon: '',
            cli_pais: '',
            cli_departamento: '',
            cli_provincia: '',
            cli_distrito: '',
            cli_direccion: '',
            cli_telefono: '',
            cli_email: '',
            cli_web: '',
            cli_estado: '',
            selectdoc: 2,
            numerodoc: null,
            arrayCliente: [],
            modal:0,
            tituloModal: '',
            tipoAccion:0,
            errorCliente: 0,
            errorMostrarMsj: [],
            errorRegistrar: false,
            pagination : {
              'total' : 0,
              'current_page': 0,
              'per_page' : 0,
              'last_page' : 0,
              'from' : 0,
              'to' : 0
            },
            offset: 3,
            criterio: 'nombre',
            arrayDepartamento : [],
            arrayProvincia : [],
            arrayDistrito : [],
            buscar: ''
        }
    },
    computed:{
      textmax: function () {
              if (this.selectdoc == 2) {
                  return 8;
                  loadingg=true;
              }
              if (this.selectdoc == 3) {
                  return 11
              }
          },
      isActived: function(){
          return this.pagination.current_page;
        },
        pagesNumber:function(){
          if(!this.pagination.to){
              return [];
          }

          var from = this.pagination.current_page-this.offset;
          if (from < 1) {
              from = 1;
          }

          var to = from + (this.offset*2);
          if (to >= this.pagination.last_page) {
              to = this.pagination.last_page;
          }

          var pagesArray = [];
          while (from <= to) {
            pagesArray.push(from);
            from++;
          }
          return pagesArray;

        }
    },
    methods: {
      loadData() {
        this.loading = true;

  },
  selectDepartamentos(){
    let me = this;
    var url='/gdepartamentos';
    axios.get(url).then(function(response) {
      // console.log(response);
            var respuesta = response.data;
            me.arrayDepartamento = respuesta.departamentos;
            // console.log(arrayDepartamento);
        })
        .catch(function(error) {
            console.log(error);
        })
        .finally(function() {
            // always executed
        });
  },
  selectProvincias(numb){
    let me=this;
    var url='/departamentos/provincias/'+numb;
    axios.get(url).then(function(response) {
      // console.log(response);
            var respuesta = response.data;
            me.arrayProvincia = respuesta.provincias;
        })
        .catch(function(error) {
            console.log(error);
        })
        .finally(function() {
            // always executed
        });
  },
  selectDistritos(numb){
    let me = this;
    var url='/departamentos/distritos/'+numb;
    axios.get(url).then(function(response) {
      // console.log(response);
            var respuesta = response.data;
            me.arrayDistrito = respuesta.distritos;
        })
        .catch(function(error) {
            console.log(error);
        })
        .finally(function() {
            // always executed
        });
  },
      filtrarPronvincias(){
        let me = this;
        var url='/gdepartamentos';
        axios.get(url).then(function(response) {
          // console.log(response);
                var respuesta = response.data;
                me.arrayDepartamento = respuesta.departamentos;
                // console.log(arrayDepartamento);
            })
            .catch(function(error) {
                console.log(error);
            })
            .finally(function() {
                // always executed
            });
      },
        listarCliente(page, buscar) {
            let me = this;
            var url='/cliente?page=' + page + '&buscar=' + buscar;
            axios.get(url).then(function(response) {
              // console.log(data);
                    var respuesta = response.data;
                    // console.log(respuesta);
                    me.arrayCliente = respuesta.cliente.data;
                    me.pagination = respuesta.pagination;
                })
                .catch(function(error) {
                    console.log(error);
                })
                .finally(function() {
                    // always executed
                });

        },
        cambiarPagina(page, buscar){
          let me=this;

          me.pagination.current_page = page;
          me.listarCliente(page, buscar);
        },
        seRepite(){
          let me = this;
          var url='/clienteb/'+me.numebus;
          axios.get(url).then(function(response) {
            // console.log(response);
                  var respuesta = response.data.respuestan;
                  // console.log(respuesta);
                  // me.repetida = respuesta;
                  if (respuesta == "si") {
                    console.log(respuesta);
              me.repetida = 1;
                    console.log('hola.'+me.repetida);
                    console.log('holaaaa');
                  }else {
                     me.repetida = 0;
                    console.log(repetida);
                  }
                  // console.log(me.repetida);
                  // me.arrayDepartamento = respuesta.departamentos;
                  // console.log(arrayDepartamento);
              })
              .catch(function(error) {
                  console.log(error);
              })
              .finally(function() {
                  // always executed
              });
        },
        seRepitee(){
          // this.seRepitee();
          if (this.repetida < 0) {
            mensaje('error','Si se repite');
            return;
          }else {
              mensaje('success','no se repite');
          }
          // console.log('Buena, paso');

          var pos = this.arrayCliente.indexOf('46916684','clidocnum');
          console.log(pos);
        },
        registrarCliente(){
            if (this.validarCliente()) {
              return;
            }
            // if (this.seRepite()) {
            //   return;
            // };
            // this.seRepite();
          let me=this;

              axios.post('/cliente/registrar',{

                'cli_doc' : this.selectdoc,
                'cli_docnum': this.numebus,
                'cli_nombre': this.cli_nombre,
                'cli_razon' : this.cli_razon,
                'cli_pais' : this.pais_s,
                'cli_departamento' : this.depa_s,
                'cli_provincia' : this.provincia_s,
                'cli_distrito':this.distrito_s,
                'cli_direccion' : this.cli_direccion,
                'cli_telefono' : this.cli_telefono,
                'cli_email' : this.cli_email,
                'cli_web' : this.web,
                'idcliente' : this.idcliente
                // console.log(this.idcliente);
                }).then(function (response) {
                  // console.log(response);
                  me.cerrarModal();
                  me.listarCliente(1,'');
                })
                .catch(function (response) {
                  console.log(error);
                });
        },
        actualizarCliente(){
          if (this.validarCliente()) {
            return;
          }

          let me=this;
            axios.put('/cliente/actualizar',{
              'idcliente': this.cliente_id,
              'cli_doc' : this.selectdoc,
              'cli_docnum': this.numebus,
              'cli_nombre': this.cli_nombre,
              'cli_razon' : this.cli_razon,
              'cli_pais' : this.pais_s,
              'cli_departamento' : this.depa_s,
              'cli_provincia' : this.provincia_s,
              'cli_distrito':this.distrito_s,
              'cli_direccion' : this.cli_direccion,
              'cli_telefono' : this.cli_telefono,
              'cli_email' : this.cli_email,
              'cli_web' : this.web
              }).then(function (response) {
                // console.log(response);
                me.cerrarModal();
                me.listarCliente(1,'');
              })
              .catch(function (response) {
                console.log(error);
              });
        },
        desactivarCliente(id){
          Swal.fire({
            title: 'Está seguro de desactivar este cliente?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Aceptar'
          }).then((result) => {
            if (result.value) {
              let me=this;

                axios.put('/cliente/desactivar',{
                  'idcliente': id
                  }).then(function (response) {
                    me.listarCliente(1,'');
                    Swal.fire(
                      'Desactivado',
                      'Fue desactivado con éxito.',
                      'success'
                     )
                  }).catch(function (response) {
                    console.log(error);
                  });
            }
          })
        },
        activarCliente(id){
          Swal.fire({
            title: 'Está seguro de activar este Cliente?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Aceptar'
          }).then((result) => {
            if (result.value) {
              let me=this;
              axios.put('/cliente/activar',{
                        'idcliente': id
                        }).then(function (response) {
                          me.listarCliente(1,'');
                          Swal.fire(
                            'Activado',
                            'Fue activado con éxito.',
                            'success'
                         )
                        }).catch(function (response) {
                          console.log(error);
                        });
            }
          })
        },
        validarCliente(){
          this.errorCliente=0;
          this.errorMostrarMsj=[];
          // this.errorRegistrar = false;
          if (!this.cli_nombre) this.errorCliente= +1;
          if (!this.numebus) this.errorCliente= +1;
          if (this.errorCliente > 0) {
            mensaje('warning','Ingresar los campos que estan con asterisco (*)');
            return this.errorRegistrar = true;
          }
        },

        mostrarDato(){
          if (this.numebus=='') {
            mensaje('warning','Ingrese el número a buscar');
            return
          }
          if (this.selectdoc == 2 || this.selectdoc == 3) {
            this.estadob=true;
            this.loadingg=true;
            var ad=this.numebus;
            let me = this;
            if (this.selectdoc==2) {
                var as='dni';
            }
            if (this.selectdoc==3) {
                var as='ruc';
            }

            var url='/service/'+as+'/'+ad;

            axios.get(url).then(function(response) {
              // console.log(data);
              if(response.data.success) {
                var respuesta = response.data;
                // console.log(respuesta);
                me.cli_nombre = respuesta.data.name;
                me.cli_razon = respuesta.data.trade_name;
                me.depa_s = respuesta.data.department_id;
                me.llenarProvincia();
                me.provincia_s = respuesta.data.province_id;
                me.llenarDistrito();
                me.distrito_s = respuesta.data.district_id;
                me.cli_direccion = respuesta.data.address;
              }else {
                mensaje('warning',response.data.message);
              }
              me.estadob = false;
              me.loadingg = false;
                })
                .catch(function(error) {
                    console.log(error);
                })
                .finally(function() {
                    // always executed
                });
          }
        },
        llenarProvincia(){
          if (this.depa_s!=0) {
            // this.provincia_s=0;
            let ms=this.depa_s;
            this.selectProvincias(ms);
          }
        },
        llenarDistrito(){
          if (this.provincia_s!=0) {
            let ms=this.provincia_s;
            this.selectDistritos(ms);
          }
        },
        cerrarModal(){
          this.modal=0;
          this.tituloModal='';
          this.ma_nombre='';
          this.ma_desc='';
          this.tipoAccion=0;
          this.errorCliente = 0;
          this.errorMostrarMsj= [];
          this.arrayProvincia= [];
          this.arrayDistrito= [];
          this.depa_s=0;
          this.provincia_s=0;
          this.distrito_s=0;
          this.numebus='';
        },
        limpiar(){
          this.cli_doc='';
          this.cli_docnum='';
          this.cli_nombre='';
          this.cli_razon='';
          this.cli_pais='';
          this.cli_departamento='';
          this.cli_provincia='';
          this.cli_distrito='';
          this.idcliente='';
          this.cli_direccion='';
          this.cli_telefono='';
          this.cli_email='';
          this.cli_web='';
        },
        abrirModal(modelo, accion, data = []){
          switch (modelo) {
            case "cliente":{
                switch (accion) {
                  case 'registrar':{
                    this.modal = 1;
                    this.tituloModal = 'Nuevo Cliente'
                    this.tipoAccion=1;
                    this.limpiar();
                    break;
                  }
                  case 'actualizar':{
                     // console.log(data);
                    this.modal = 1;
                    this.tituloModal ='Actualizar Cliente';
                    this.tipoAccion = 2;
                    this.cliente_id = data['idcliente'];
                    this.cli_nombre = data['cli_nombre'];
                    this.numebus = data['cli_docnum'];
                    this.selectdoc = data['cli_doc'];
                    this.cli_razon = data['cli_razon'];
                    this.depa_s = data['cli_departamento'];
                    this.llenarProvincia();
                    this.provincia_s = data['cli_provincia'];
                    this.llenarDistrito();
                    this.distrito_s = data['cli_distrito'];
                    this.cli_direccion = data['cli_direccion'];
                    this.cli_telefono = data['cli_telefono'];
                    this.cli_email = data['cli_email'];
                    this.web = data['cli_web'];
                    break;
                  }
                }
            }
          }
          this.selectDepartamentos();
          //this.selectProvincias();
          // this.selectDistritos();
        }
    },
    mounted() {
        //  console.log('Component mounted.')
        this.listarCliente(1, this.buscar);
    }
}
</script>
<style media="screen">

</style>
