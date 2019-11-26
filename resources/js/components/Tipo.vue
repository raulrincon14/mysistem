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
                        <li class="breadcrumb-item"><a href="#">Tipo</a>
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
                                    <h5>Tipo</h5>
                                    <span>Agregar, editar y desactivar.</span>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="botona">
                                    <button type="button" @click="abrirModal('tipo','registrar')" class="btn btn-outline-primary btn-sm"><i class="icofont icofont-ui-add"></i>Nuevo</button>
                                </div>
                            </div>
                        </div>

                        <div class="card-block icon-btn">
                          <div class="form-group row">
                              <label class="col-sm-2 col-form-label"></label>
                              <div class="col-sm-4">
                                  <input type="text" autocomplete="off" v-model="buscar" @keyup.enter="listarTipo(1,buscar)" placeholder="Texto a buscar" class="form-control" />
                              </div>
                              <div class="col-sm-4">
                                  <button type="submit" class="btn btn-outline-primary btn-sm"  @click="listarTipo(1,buscar)"><i class="fa fa-search"></i> Buscar </button>
                              </div>
                          </div>
                            <div class="dt-responsive table-responsive">
                                <div class="table-responsive">
                                    <table class="table table-xs">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Nombre</th>
                                                <th>descripcion</th>
                                                <th>Estado</th>
                                                <th>Estado</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="tipo in arrayTipo" :key="tipo.idtipo">
                                                <th v-text="tipo.idtipo"></th>
                                                <td v-text="tipo.ti_nombre"></td>
                                                <td v-text="tipo.ti_desc"></td>
                                                <td>
                                                    <div v-if="tipo.ti_estado">
                                                        <label class="label label-inverse-success">Activo</label>
                                                    </div>
                                                    <div v-else="tipo.ti_estado">
                                                        <label class="label label-inverse-danger">Desactivado</label>
                                                    </div>
                                                </td>
                                                <td>
                                                  <button type="button" @click="abrirModal('tipo','actualizar',tipo)" class="btn waves-effect waves-dark btn-warning btn-outline-warning btn-iconr">
                                                        <i class="ti-marker-alt"></i>
                                                    </button>&nbsp;
                                                    <template v-if="tipo.ti_estado">
                                                      <button type="button" class="btn waves-effect waves-dark btn-danger btn-outline-danger btn-iconr" @click="desactivarTipo(tipo.idtipo)">
                                                          <i class="fa fa-trash"></i>
                                                      </button>
                                                    </template>
                                                    <template v-else="tipo.ti_estado">
                                                      <button type="button" class="btn waves-effect waves-dark btn-info btn-outline-info btn-iconr" @click="activarTipo(tipo.idtipo)">
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
                        <div class="modal-dialog modal-md" role="document">
                          <div class="modal-content">
                            <div class="card">
                                <div class="card-header">
                                    <h5 v-text="tituloModal"></h5>
                                </div>
                                <div class="card-block">
                                    <form action="" method="post" enctype="multipart/form-data">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Nombre (*)</label>
                                        <div class="col-sm-9">
                                            <input type="text" v-model="ti_nombre" autocomplete="off" placeholder="Nombre de Tipo" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Descripción</label>
                                        <div class="col-sm-9">
                                            <input type="text" v-model="ti_desc" class="form-control" placeholder="Breve descripción" />
                                        </div>
                                    </div>
                                    </form>
                                    <div class="form-group row">
                                      <div v-show="errorTipo" class="div-error col-sm-12">
                                        <div class="text-error col-sm-12 text-center">
                                          <div v-for="error in errorMostrarMsj" :key="error" v-text="error">
                                          </div>
                                        </div>
                                      </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="text-center m-t-20">
                                                <button type="button" v-if="tipoAccion==1" class="btn btn-primary waves-effect waves-light m-r-10" @click="registrarTipo()">Guardar
                                                </button>
                                                <button type="button" v-if="tipoAccion==2" class="btn btn-primary waves-effect waves-light m-r-10" @click="actualizarTipo()">Actualizar
                                                </button>
                                                <button type="button" @click="cerrarModal()" class="btn btn-warning waves-effect waves-light">Cerrar
                                                </button>
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
            tipo_id:0,
            ti_nombre: '',
            ti_abre: '',
            arrayTipo: [],
            modal:0,
            tituloModal: '',
            tipoAccion:0,
            errorTipo: 0,
            errorMostrarMsj: [],
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
            buscar: ''
        }
    },
    computed:{
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
        listarTipo(page, buscar) {
            let me = this;
            var url='/tipo?page=' + page + '&buscar=' + buscar;
            axios.get(url).then(function(response) {
                    var respuesta = response.data;
                    me.arrayTipo = respuesta.tipo.data;
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
          me.listarTipo(page, buscar);
        },
        registrarTipo(){
            if (this.validarTipo()) {
              return;
            }

          let me=this;

              axios.post('/tipo/registrar',{
                'ti_nombre' : this.ti_nombre,
                'ti_desc': this.ti_desc
                }).then(function (response) {
                  me.cerrarModal();
                  me.listarTipo(1,'');
                })
                .catch(function (response) {
                  console.log(error);
                });
        },
        actualizarTipo(){
          if (this.validarTipo()) {
            return;
          }

          let me=this;

            axios.put('/tipo/actualizar',{
              'ti_nombre' : this.ti_nombre,
              'ti_desc': this.ti_desc,
              'idtipo': this.tipo_id
              }).then(function (response) {
                me.cerrarModal();
                me.listarTipo(1,'');
              })
              .catch(function (response) {
                console.log(error);
              });
        },
        desactivarTipo(id){
          const swalWithBootstrapButtons = Swal.mixin({
              customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
              },
              buttonsStyling: false
            })

            swalWithBootstrapButtons.fire({
              title: 'Está seguro de desactivar esta categoria?',
              icon: 'warning',
              showCancelButton: true,
              confirmButtonText: 'Aceptar!',
              cancelButtonText: 'Cancelar',
              reverseButtons: true
            }).then((result) => {
              if (result.value) {
                let me=this;

                  axios.put('/tipo/desactivar',{
                    'idtipo': id
                    }).then(function (response) {
                      me.listarTipo(1,'');
                      swalWithBootstrapButtons.fire(
                        'Desactivado',
                        'Fue desactivado con éxito.',
                        'success'
                      )
                    }).catch(function (response) {
                      console.log(error);
                    });

              } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
              ) {

              }
            })
        },
        activarTipo(id){
          const swalWithBootstrapButtons = Swal.mixin({
              customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
              },
              buttonsStyling: false
            })

            swalWithBootstrapButtons.fire({
              title: 'Está seguro de activar esta categoria?',
              icon: 'warning',
              showCancelButton: true,
              confirmButtonText: 'Aceptar!',
              cancelButtonText: 'Cancelar',
              reverseButtons: true
            }).then((result) => {
              if (result.value) {
                let me=this;

                  axios.put('/tipo/activar',{
                    'idtipo': id
                    }).then(function (response) {
                      me.listarTipo(1,'');
                      swalWithBootstrapButtons.fire(
                        'Activado',
                        'Fue activado con éxito.',
                        'success'
                      )
                    }).catch(function (response) {
                      console.log(error);
                    });

              } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
              ) {

              }
            })
        },
        validarTipo(){
          this.errorTipo=0;
          this.errorMostrarMsj=[];
          if (!this.ti_nombre) this.errorMostrarMsj.push("El nombre de la categoria no puede estar vacio.");
          if(this.errorMostrarMsj.length) this.errorTipo = 1;
            return this.errorTipo;
        },
        cerrarModal(){
          this.modal=0;
          this.tituloModal='';
          this.ti_nombre='';
          this.ti_desc='';
          this.tipoAccion=0;
          this.errorTipo = 0;
          this.errorMostrarMsj= [];
        },
        abrirModal(modelo, accion, data = []){
          switch (modelo) {
            case "tipo":{
                switch (accion) {
                  case 'registrar':{
                    this.modal = 1;
                    this.tituloModal = 'Nueva Tipo'
                    this.ti_nombre = '';
                    this.ti_desc = '';
                    this.tipoAccion=1;
                    break;
                  }
                  case 'actualizar':{
                     console.log(data);
                    this.modal = 1;
                    this.tituloModal ='Actualizar Tipo';
                    this.tipoAccion=2;
                    this.tipo_id = data['idtipo'];
                    this.ti_nombre=data['ti_nombre'];
                    this.ti_desc = data['ti_desc'];
                    break;
                  }
                }
            }
          }

        }
    },
    mounted() {
        //  console.log('Component mounted.')
        this.listarTipo(1, this.buscar);
    }
}
</script>
<style media="screen">
/* .modal-content{
  width: 100% !important;
  position: absolute !important;
  border: 0px !important;
}
  .mostrar{
    display: list-item !important;
    opacity: 1 !important;
    position: absolute !important;
    background-color: #3c29297a !important;
  } */
  .div-error{
    color: red !important;
    font-weight: bold;
    height: 10px;
  }
</style>
