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
                                                  <button class="btn waves-effect waves-dark btn-warning btn-outline-warning btn-iconr">
                                                        <i class="ti-marker-alt"></i>
                                                    </button>&nbsp;
                                                    <button class="btn waves-effect waves-dark btn-danger btn-outline-danger btn-iconr">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </td>

                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="card-block">
                                    <nav aria-label="Page navigation example justify-content-center">
                                        <ul class="pagination">
                                            <li class="page-item">
                                                <a class="page-link" href="#" aria-label="Previous">
                                                    <span aria-hidden="true">&laquo;</span>
                                                    <span class="sr-only">Previous</span>
                                                </a>
                                            </li>
                                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                                            <li class="page-item active"><a class="page-link" href="#">2</a></li>
                                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                                            <li class="page-item">
                                                <a class="page-link" href="#" aria-label="Next">
                                                    <span aria-hidden="true">&raquo;</span>
                                                    <span class="sr-only">Next</span>
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
                                    <div v-show="errorCategoria" class="form-group row div-error">
                                      <div class="text-center text-error">
                                        <div v-for="error in errorMostrarMsj" :key="error" v-text="error">

                                        </div>
                                      </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="text-center m-t-20">
                                                <button type="button" v-if="tipoAccion==1" class="btn btn-primary waves-effect waves-light m-r-10" @click="registrarCategoria()">Guardar
                                                </button>
                                                <button type="button" v-if="tipoAccion==2" class="btn btn-primary waves-effect waves-light m-r-10">Actualizar
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
            ca_nombre: '',
            ca_desc: '',
            arrayCategoria: [],
            modal:0,
            tituloModal: '',
            tipoAccion:0,
            erorCategoria: 0,
            errorMostrarMsj: []
        }
    },
    methods: {
        listarCategoria() {
            let me = this;
            axios.get('/categoria').then(function(response) {
                    me.arrayCategoria = response.data;
                })
                .catch(function(error) {
                    console.log(error);
                })
                .finally(function() {
                    // always executed
                });

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
                  me.listarCategoria();
                })
                .catch(function (response) {
                  console.log(error);
                });
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

                  }
                }
            }
          }

        }
    },
    mounted() {
        //  console.log('Component mounted.')
        this.listarCategoria();
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
  }
</style>
