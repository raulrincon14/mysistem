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
                        <li class="breadcrumb-item"><a href="#!">Usuarios</a>
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
                                    <h5>Usuarios</h5>
                                    <span>Agregar, editar y desactivar.</span>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="botona">

                                    <button type="button" @click="abrirModal('usuario','registrar')" class="btn btn-outline-primary btn-sm"><i class="icofont icofont-ui-add"></i>Nuevo</button>
                                </div>
                            </div>
                        </div>

                        <div class="card-block icon-btn">
                          <div class="form-group row">
                              <label class="col-sm-2 col-form-label"></label>
                              <div class="col-sm-4">
                                  <input type="text" autocomplete="off" v-model="buscar" v-on:keyup="listarUsuario(1,buscar)" @keyup.enter="listarUsuario(1,buscar)" placeholder="Texto a buscar" class="form-control" />
                              </div>
                              <div class="col-sm-4">
                                  <button type="submit" class="btn btn-outline-primary btn-sm"  @click="listarUsuario(1,buscar)"><i class="fa fa-search"></i> Buscar </button>
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
                                                <th>Usuario</th>
                                                <th>Estado</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="usuario in arrayUsuario" :key="usuario.idusuario">
                                                <th v-text="usuario.idusuario"></th>
                                                <td>
                                                  <div v-if="usuario.usu_doc === '1'">
                                                    Sin Doc
                                                  </div>
                                                  <div v-else-if="usuario.usu_doc === '2'">
                                                    DNI
                                                  </div>
                                                  <div v-else>
                                                    Pasaporte
                                                  </div>
                                                </td>
                                                <td v-text="usuario.usu_numdoc"></td>
                                                <td v-text="usuario.usu_nombre"></td>
                                                <td>
                                                    <div v-if="usuario.usu_estado">
                                                        <label class="label label-inverse-success">Activo</label>
                                                    </div>
                                                    <div v-else="usuario.usu_estado">
                                                        <label class="label label-inverse-danger">Desactivado</label>
                                                    </div>
                                                </td>
                                                <td>
                                                  <button type="button" @click="abrirModal('usuario','actualizar',usuario)" class="btn waves-effect waves-dark btn-info btn-outline-info btn-iconr">
                                                        <i class="fa fa-eye"></i>
                                                    </button>&nbsp;
                                                  <button type="button" @click="abrirModal('usuario','actualizar',usuario)" class="btn waves-effect waves-dark btn-warning btn-outline-warning btn-iconr">
                                                        <i class="ti-marker-alt"></i>
                                                    </button>&nbsp;
                                                    <template v-if="usuario.usu_estado">
                                                      <button type="button" class="btn waves-effect waves-dark btn-danger btn-outline-danger btn-iconr" @click="desactivarProveedor(usuario.idusuario)">
                                                          <i class="fa fa-trash"></i>
                                                      </button>
                                                    </template>
                                                    <template v-else="usuario.usu_estado">
                                                      <button type="button" class="btn waves-effect waves-dark btn-info btn-outline-info btn-iconr" @click="activarProveedor(usuario.idusuario)">
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
                                                      <template v-if="selectdoc == 2">
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
                                                    <input type="text" class="form-control" v-model="usu_nombre">
                                                  </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 m-b-5">
                                                <div class="form-group form-primary">
                                                  <label class="col-sm col-form-label">Ciudad *</label>
                                                  <div class="col-sm">
                                                    <input type="text" class="form-control" v-model="usu_ciudad">
                                                  </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-8 m-b-5">
                                                <div class="form-group form-primary">
                                                  <label class="col-sm col-form-label">Dirección *</label>
                                                  <div class="col-sm">
                                                    <input type="text" class="form-control" name="" v-model="usu_direc">
                                                  </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-4 m-b-3">
                                                <div class="form-group form-primary">
                                                  <label class="col-sm col-form-label">Telef / Celular *</label>
                                                  <div class="col-sm">
                                                    <input type="text" class="form-control" name="" v-model="usu_cel">
                                                  </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6 m-b-3">
                                                <div class="form-group form-primary">
                                                  <label class="col-sm col-form-label">Descripción</label>
                                                  <div class="col-sm">
                                                      <input type="text" class="form-control" name="" v-model="usu_desc">
                                                  </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 m-b-5">
                                                <div class="form-group form-primary">
                                                  <label class="col-sm col-form-label">F. Nacimiento *</label>
                                                  <div class="col-sm">
                                                    <input type="date" class="form-control" name="" v-model="usu_nac" placeholder="F. Nacimiento">
                                                  </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="form-group row">
                                      <div v-show="errorUsuario" class="div-error col-sm-12">
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
                                            <button type="button" v-if="tipoAccion==1" class="btn btn-primary waves-effect waves-light m-r-10" @click="registrarUsuario()">Guardar
                                            </button>
                                            <button type="button" v-if="tipoAccion==2" class="btn btn-primary waves-effect waves-light m-r-10" @click="actualizarUsuario()">Actualizar
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
            usuario_id:0,
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
            usu_nombre: '',
            usu_doc: '',
            usu_numdoc: '',
            usu_ciudad: '',
            usu_direc: '',
            usu_cel: '',
            usu_desc: '',
            usu_nac: '',
            usu_usuario: '',
            usu_pass: '',
            usu_estado: '',
            selectdoc: 2,
            numerodoc: null,
            arrayUsuario: [],
            modal:0,
            tituloModal: '',
            tipoAccion:0,
            errorUsuario: 0,
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
        listarUsuario(page, buscar) {
            let me = this;
            var url='/usuario?page=' + page + '&buscar=' + buscar;
            axios.get(url).then(function(response) {
              // console.log(data);
                    var respuesta = response.data;
                    // console.log(respuesta);
                    me.arrayUsuario = respuesta.usuario.data;
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
          me.listarUsuario(page, buscar);
        },
        registrarUsuario(){
            if (this.validarUsuario()) {
              return;
            }
            // if (this.seRepite()) {
            //   return;
            // };
            // this.seRepite();
          let me=this;

              axios.post('/usuario/registrar',{

                'usu_doc' : this.selectdoc,
                'usu_numdoc': this.numebus,
                'usu_nombre': this.usu_nombre,
                'usu_ciudad' : this.usu_ciudad,
                'usu_direc' : this.usu_direc,
                'usu_cel' : this.usu_cel,
                'usu_desc':this.usu_desc,
                'usu_nac' : this.usu_nac,
                'usu_usuario' : this.numebus,
                'usu_pass' : this.numebus,
                // 'idusuario' : this.idusuario
                // console.log(this.idcliente);
                }).then(function (response) {
                  // console.log(response);
                  me.cerrarModal();
                  me.listarUsuario(1,'');
                })
                .catch(function (response) {
                  console.log(error);
                });
        },
        actualizarUsuario(){
          if (this.validarUsuario()) {
            return;
          }

          let me=this;
            axios.put('/usuario/actualizar',{
              'idusuario': this.usuario_id,
              'usu_doc' : this.selectdoc,
              'usu_numdoc': this.numebus,
              'usu_nombre': this.usu_nombre,
              'usu_ciudad' : this.usu_ciudad,
              'usu_direc' : this.usu_direc,
              'usu_cel' : this.usu_cel,
              'usu_desc':this.usu_desc,
              'usu_nac' : this.usu_nac,

              }).then(function (response) {
                console.log(response);
                me.cerrarModal();
                me.listarUsuario(1,'');
              })
              .catch(function (response) {
                console.log(error);
              });
        },
        desactivarProveedor(id){
          Swal.fire({
            title: 'Está seguro de desactivar este proveedor?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Aceptar'
          }).then((result) => {
            if (result.value) {
              let me=this;

                axios.put('/proveedor/desactivar',{
                  'idproveedor': id
                  }).then(function (response) {
                    me.listarProveedor(1,'');
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
        activarProveedor(id){
          Swal.fire({
            title: 'Está seguro de activar este Proveedor?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Aceptar'
          }).then((result) => {
            if (result.value) {
              let me=this;
              axios.put('/proveedor/activar',{
                        'idproveedor': id
                        }).then(function (response) {
                          me.listarProveedor(1,'');
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
        validarUsuario(){
          this.errorProveedor=0;
          this.errorMostrarMsj=[];
          // this.errorRegistrar = false;
          if (!this.usu_nombre) this.errorProveedor= +1;
          if (!this.usu_ciudad) this.errorProveedor= +1;
          if (!this.usu_direc) this.errorProveedor= +1;
          if (!this.usu_cel) this.errorProveedor= +1;
          if (!this.usu_nac) this.errorProveedor= +1;
          if (!this.numebus) this.errorProveedor= +1;
          if (this.errorProveedor > 0) {
            mensaje('warning','Ingresar los campos que estan con asterisco (*)');
            return this.errorRegistrar = true;
          }
        },

        mostrarDato(){
          if (this.numebus=='') {
            mensaje('warning','Ingrese el número a buscar');
            return
          }
          if (this.selectdoc == 2) {
            this.estadob=true;
            this.loadingg=true;
            var ad=this.numebus;
            let me = this;
            if (this.selectdoc==2) {
                var as='dni';
            }

            var url='/service/'+as+'/'+ad;

            axios.get(url).then(function(response) {
              // console.log(data);
              if(response.data.success) {
                var respuesta = response.data;
                // console.log(respuesta);
                me.usu_nombre = respuesta.data.name;
                // me._razon = respuesta.data.trade_name;
                // me.depa_s = respuesta.data.department_id;
                // me.llenarProvincia();
                // me.provincia_s = respuesta.data.province_id;
                // me.llenarDistrito();
                // me.distrito_s = respuesta.data.district_id;
                // me.pro_direccion = respuesta.data.address;
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
          this.errorProveedor = 0;
          this.errorMostrarMsj= [];
          this.arrayProvincia= [];
          this.arrayDistrito= [];
          this.depa_s=0;
          this.provincia_s=0;
          this.distrito_s=0;
          this.numebus='';
        },
        limpiar(){
          this.pro_doc='';
          this.pro_docnum='';
          this.pro_nombre='';
          this.pro_razon='';
          this.pro_pais='';
          this.pro_departamento='';
          this.pro_provincia='';
          this.pro_distrito='';
          this.idproveedor='';
          this.pro_direccion='';
          this.pro_telefono='';
          this.pro_email='';
          this.web='';
        },
        abrirModal(modelo, accion, data = []){
          switch (modelo) {
            case "usuario":{
                switch (accion) {
                  case 'registrar':{
                    this.modal = 1;
                    this.tituloModal = 'Nuevo Usuario'
                    this.tipoAccion=1;
                    this.limpiar();
                    break;
                  }
                  case 'actualizar':{
                     // console.log(data);
                    this.modal = 1;
                    this.tituloModal ='Actualizar Usuario';
                    this.tipoAccion = 2;
                    this.usuario_id = data['idusuario'];
                    this.usu_nombre = data['usu_nombre'];
                    this.numebus = data['usu_numdoc'];
                    this.usu_ciudad = data['usu_ciudad'];
                    this.usu_direc = data['usu_direc'];
                    this.usu_cel = data['usu_cel'];
                    this.usu_desc = data['usu_desc'];
                    this.usu_nac = data['usu_nac'];
                    break;
                  }
                }
            }
          }
          // this.selectDepartamentos();
          //this.selectProvincias();
          // this.selectDistritos();
        }
    },
    mounted() {
        //  console.log('Component mounted.')
        this.listarUsuario(1, this.buscar);
    }
}
</script>
<style media="screen">

</style>
