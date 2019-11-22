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
                        <li class="breadcrumb-item"><a href="#!">Categoría</a>
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
                                    <h5>Categorías</h5>
                                    <span>Agregar, editar y desactivar.</span>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="botona">
                                    <button type="button" @click="abrirModal('categoria','registrar')" class="btn btn-outline-primary btn-sm"><i class="icofont icofont-ui-add"></i>Nuevo</button>
                                </div>
                            </div>
                        </div>

                        <div class="card-block icon-btn">
                          <div class="form-group row">
                              <label class="col-sm-2 col-form-label"></label>
                              <div class="col-sm-4">
                                  <input type="text" autocomplete="off" v-model="buscar" @keyup.enter="listarCategoria(1,buscar)" placeholder="Texto a buscar" class="form-control" />
                              </div>
                              <div class="col-sm-4">
                                  <button type="submit" class="btn btn-outline-primary btn-sm"  @click="listarCategoria(1,buscar)"><i class="fa fa-search"></i> Buscar </button>
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
                                            <tr v-for="categoria in arrayCategoria" :key="categoria.idcategoria">
                                                <th v-text="categoria.idcategoria"></th>
                                                <td v-text="categoria.ca_nombre"></td>
                                                <td v-text="categoria.ca_desc"></td>
                                                <td>
                                                    <div v-if="categoria.ca_estado">
                                                        <label class="label label-inverse-success">Activo</label>
                                                    </div>
                                                    <div v-else="categoria.ca_estado">
                                                        <label class="label label-inverse-danger">Desactivado</label>
                                                    </div>
                                                </td>
                                                <td>
                                                  <button type="button" @click="abrirModal('categoria','actualizar',categoria)" class="btn waves-effect waves-dark btn-warning btn-outline-warning btn-iconr">
                                                        <i class="ti-marker-alt"></i>
                                                    </button>&nbsp;
                                                    <template v-if="categoria.ca_estado">
                                                      <button type="button" class="btn waves-effect waves-dark btn-danger btn-outline-danger btn-iconr" @click="desactivarCategoria(categoria.idcategoria)">
                                                          <i class="fa fa-trash"></i>
                                                      </button>
                                                    </template>
                                                    <template v-else="categoria.ca_estado">
                                                      <button type="button" class="btn waves-effect waves-dark btn-info btn-outline-info btn-iconr" @click="activarCategoria(categoria.idcategoria)">
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
                                            <input type="text" v-model="ca_nombre" autocomplete="off" placeholder="Nombre de Categoria" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Descripción</label>
                                        <div class="col-sm-9">
                                            <input type="text" v-model="ca_desc" class="form-control" placeholder="Breve descripción" />
                                        </div>
                                    </div>
                                    </form>
                                    <div class="form-group row">
                                      <div v-show="errorCategoria" class="div-error col-sm-12">
                                        <div class="text-error col-sm-12 text-center">
                                          <div v-for="error in errorMostrarMsj" :key="error" v-text="error">
                                          </div>
                                        </div>
                                      </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="text-center m-t-20">
                                                <button type="button" v-if="tipoAccion==1" class="btn btn-primary waves-effect waves-light m-r-10" @click="registrarCategoria()">Guardar
                                                </button>
                                                <button type="button" v-if="tipoAccion==2" class="btn btn-primary waves-effect waves-light m-r-10" @click="actualizarCategoria()">Actualizar
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
            categoria_id:0,
            ca_nombre: '',
            ca_desc: '',
            arrayCategoria: [],
            modal:0,
            tituloModal: '',
            tipoAccion:0,
            errorCategoria: 0,
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
        listarCategoria(page, buscar) {
            let me = this;
            var url='/categoria?page=' + page + '&buscar=' + buscar;
            axios.get(url).then(function(response) {
                    var respuesta = response.data;
                    me.arrayCategoria = respuesta.categoria.data;
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
          me.listarCategoria(page, buscar);
        },
        registrarCategoria(){
            if (this.validarCategoria()) {
              return;
            }

          let me=this;

              axios.post('/categoria/registrar',{
                'ca_nombre' : this.ca_nombre,
                'ca_desc': this.ca_desc
                }).then(function (response) {
                  me.cerrarModal();
                  me.listarCategoria(1,'');
                })
                .catch(function (response) {
                  console.log(error);
                });
        },
        actualizarCategoria(){
          if (this.validarCategoria()) {
            return;
          }

          let me=this;

            axios.put('/categoria/actualizar',{
              'ca_nombre' : this.ca_nombre,
              'ca_desc': this.ca_desc,
              'idcategoria': this.categoria_id
              }).then(function (response) {
                me.cerrarModal();
                me.listarCategoria(1,'');
              })
              .catch(function (response) {
                console.log(error);
              });
        },
        desactivarCategoria(id){
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

                  axios.put('/categoria/desactivar',{
                    'idcategoria': id
                    }).then(function (response) {
                      me.listarCategoria(1,'');
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
        activarCategoria(id){
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

                  axios.put('/categoria/activar',{
                    'idcategoria': id
                    }).then(function (response) {
                      me.listarCategoria(1,'');
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
        validarCategoria(){
          this.errorCategoria=0;
          this.errorMostrarMsj=[];
          if (!this.ca_nombre) this.errorMostrarMsj.push("El nombre de la categoria no puede estar vacio.");
          if(this.errorMostrarMsj.length) this.errorCategoria = 1;
            return this.errorCategoria;
        },
        cerrarModal(){
          this.modal=0;
          this.tituloModal='';
          this.ca_nombre='';
          this.ca_desc='';
          this.tipoAccion=0;
          this.errorCategoria = 0;
          this.errorMostrarMsj= [];
        },
        abrirModal(modelo, accion, data = []){
          switch (modelo) {
            case "categoria":{
                switch (accion) {
                  case 'registrar':{
                    this.modal = 1;
                    this.tituloModal = 'Nueva Categoria'
                    this.ca_nombre = '';
                    this.ca_desc = '';
                    this.tipoAccion=1;
                    break;
                  }
                  case 'actualizar':{
                     console.log(data);
                    this.modal = 1;
                    this.tituloModal ='Actualizar Categoría';
                    this.tipoAccion=2;
                    this.categoria_id = data['idcategoria'];
                    this.ca_nombre=data['ca_nombre'];
                    this.ca_desc = data['ca_desc'];
                    break;
                  }
                }
            }
          }

        }
    },
    mounted() {
        //  console.log('Component mounted.')
        this.listarCategoria(1, this.buscar);
    }
}
</script>
<style media="screen">
.modal-content{
  width: 100% !important;
  position: absolute !important;
  border: 0px !important;
}
  .mostrar{
    display: list-item !important;
    opacity: 1 !important;
    position: absolute !important;
    background-color: #3c29297a !important;
  }
  .div-error{
    color: red !important;
    font-weight: bold;
    height: 10px;
  }
</style>
