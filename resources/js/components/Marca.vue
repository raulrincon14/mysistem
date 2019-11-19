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
                        <li class="breadcrumb-item"><a href="#!">Marca</a>
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
                                    <h5>Marcas</h5>
                                    <span>Agregar, editar y desactivar.</span>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="botona">
                                    <button type="button" @click="abrirModal('marca','registrar')"  class="btn btn-outline-primary btn-sm"><i class="icofont icofont-ui-add"></i>Nuevo</button>
                                    <!-- <button type="button" @click="abrirModal('categoria','registrar')" class="btn btn-outline-primary btn-sm"><i class="icofont icofont-ui-add"></i>Nuevo</button> -->
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
                                            <tr v-for="marca in arrayMarca" :key="marca.idmarca">
                                                <td v-text="marca.idmarca"></td>
                                                <td v-text="marca.ma_nombre"></td>
                                                <td v-text="marca.ma_desc"></td>
                                                <td>
                                                    <div v-if="marca.ma_estado">
                                                        <label class="label label-inverse-success">Activo</label>
                                                    </div>
                                                    <div v-else="marca.ma_estado">
                                                        <label class="label label-inverse-danger">Desactivado</label>
                                                    </div>
                                                </td>
                                                <td>
                                                  <button type="button" @click="abrirModal('marca','actualizar',marca)" class="btn waves-effect waves-dark btn-warning btn-outline-warning btn-iconr">
                                                        <i class="ti-marker-alt"></i>
                                                    </button>&nbsp;
                                                    <button type="button" class="btn waves-effect waves-dark btn-danger btn-outline-danger btn-iconr">
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
                    <!-- <div class="modal fade" id="large-Modal" :class="{'mostrar':modal}" tabindex="-1" role="dialog"> -->
                    <div class="modal fade" id="large-Modal"  tabindex="-1" :class="{'mostrar': modal}" role="dialog">
                        <div class="modal-dialog modal-md" role="document">
                          <div class="modal-content">
                            <div class="card">
                                <div class="card-header">
                                    <h5 v-text="tituloModal"></h5>
                                </div>
                                <div class="card-block">
                                    <form action="" method="post" enctype="multipart/form-data">
                                    <!-- <form action="" method="post" enctype="multipart/form-data"> -->
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Nombre (*)</label>
                                        <div class="col-sm-9">
                                            <input type="text" v-model="ma_nombre" autocomplete="off" placeholder="Nombre de marca" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Descripción</label>
                                        <div class="col-sm-9">
                                            <input type="text" v-model="ma_desc" class="form-control" placeholder="Breve descripción" />
                                            <!-- <input type="text" v-model="desc" class="form-control" placeholder="Breve descripción" /> -->
                                        </div>
                                    </div>
                                    </form>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="text-center m-t-20">
                                                <button type="button" v-if="tipoAccion==1"  class="btn btn-primary waves-effect waves-light m-r-10" @click="registrarMarca()" >Guardar
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
    data(){
      return{
        ma_nombre: '',
        ma_desc: '',
        arrayMarca: [],
        modal: 0,
        tituloModal: '',
        tipoAccion : 0
      }
    },
    methods:{
      listarMarca(){
        let me=this;
      // Make a request for a user with a given ID
      axios.get('/marca').then(function (response) {
          // handle success
          me.arrayMarca = response.data;
        })
        .catch(function (error) {
          // handle error
          console.log(error);
        })
        .finally(function () {
          // always executed
        });
      },
      registrarMarca(){
        let me= this;

        axios.post('/marca/registrar', {
           'ma_nombre': this.ma_nombre,
           'ma_desc': this.ma_desc
         })
         .then(function (response) {
            console.log(response);
           me.cerrarModal();
           me.listarMarca();
         })
         .catch(function (error) {
           // console.log(error);
           console.log(error.message);
         });
      },
      cerrarModal(){
        this.modal = 0;
        this.tituloModal = '';
        this.ma_nombre = '';
        this.ma_desc = '';
      },
      abrirModal(modelo, accion, data = []){
        switch (modelo) {
          case 'marca':
              switch (accion) {
                case 'registrar':
                    this.modal = 1;
                    this.tituloModal = 'Registrar Marca';
                    this.ma_nombre = '';
                    this.ma_desc = '';
                    this.tipoAccion = 1;
                  break;
                case 'actualizar':

                break;
                default:

              }

            break;
          default:

        }
      }
    },
    mounted(){
        // console.log('Componente mounted');
        this.listarMarca();
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
</style>
