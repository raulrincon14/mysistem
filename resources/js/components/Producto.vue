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
                        <li class="breadcrumb-item"><a href="#!">Producto</a>
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
                                    <h5>Producto</h5>
                                    <span>Agregar, editar y desactivar.</span>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="botona">
                                    <button type="button" @click="abrirModal('producto','registrar')" class="btn btn-outline-primary btn-sm"><i class="icofont icofont-ui-add"></i>Nuevo</button>
                                </div>
                            </div>
                        </div>

                        <div class="card-block icon-btn">
                          <div class="form-group row">
                              <label class="col-sm-2 col-form-label"></label>
                              <div class="col-sm-4">
                                  <input type="text" autocomplete="off" v-model="buscar" @keyup.enter="listarProducto(1,buscar)" placeholder="Texto a buscar" class="form-control" />
                              </div>
                              <div class="col-sm-4">
                                  <button type="submit" class="btn btn-outline-primary btn-sm"  @click="listarProducto(1,buscar)"><i class="fa fa-search"></i> Buscar </button>
                              </div>
                          </div>
                            <div class="dt-responsive table-responsive">
                                <div class="table-responsive">
                                    <table class="table table-xs">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Nombre</th>
                                                <th>Descripcion</th>
                                                <th>Precio C</th>
                                                <th>Precio V</th>
                                                <th>Estado</th>
                                                <th>Codigo Barras</th>
                                                <th>Stock min</th>
                                                <th>Medida</th>
                                                <th>Categoria</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="producto in arrayProducto" :key="producto.idproducto">
                                                <th v-text="producto.idproducto"></th>
                                                <td v-text="producto.pr_nombre"></td>
                                                <td v-text="producto.pr_desc"></td>
                                                <td v-text="producto.pr_precioc"></td>
                                                <td v-text="producto.pr_preciov"></td>
                                                <td>
                                                    <div v-if="producto.pr_estado">
                                                        <label class="label label-inverse-success">Activo</label>
                                                    </div>
                                                    <div v-else="producto.pr_estado">
                                                        <label class="label label-inverse-danger">Desactivado</label>
                                                    </div>
                                                </td>
                                                <td v-text="producto.pr_cb"></td>
                                                <td v-text="producto.pr_stkmin"></td>
                                                <td v-text="producto.pr_medida"></td>
                                                <td v-text="producto.ca_nombre"></td>
                                                <td>
                                                  <button type="button" @click="abrirModal('producto','actualizar',producto)" class="btn waves-effect waves-dark btn-warning btn-outline-warning btn-iconr">
                                                        <i class="ti-marker-alt"></i>
                                                    </button>&nbsp;
                                                    <template v-if="producto.pr_estado">
                                                      <button type="button" class="btn waves-effect waves-dark btn-danger btn-outline-danger btn-iconr" @click="desactivarProducto(producto.idproducto)">
                                                          <i class="fa fa-trash"></i>
                                                      </button>
                                                    </template>
                                                    <template v-else="producto.pr_estado">
                                                      <button type="button" class="btn waves-effect waves-dark btn-info btn-outline-info btn-iconr" @click="activarProducto(producto.idproducto)">
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
                                            <div class="col-sm-4 m-b-3">
                                                <div class="form-group form-primary">
                                                  <label class="col-sm col-form-label">Nombre (*)</label>
                                                  <div class="col-sm">
                                                      <input type="text" v-model="pr_nombre" autocomplete="off" placeholder="Nombre del Producto" class="form-control" />
                                                  </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-4 m-b-5">
                                                <div class="form-group form-primary">
                                                  <label class="col-sm col-form-label">Descripcion</label>
                                                  <div class="col-sm">
                                                      <input type="text" v-model="pr_desc" autocomplete="off" placeholder="Breve descripción" class="form-control" />
                                                  </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-4 m-b-5 border-checkbox-section justify-content-center align-items-center">
                                              <div class="border-checkbox-group border-checkbox-group-primary">
                                                  <input class="border-checkbox" type="checkbox" id="checkbox1"  v-model="pr_igv"/>
                                                  <label class="border-checkbox-label" for="checkbox1">No tiene lote</label>
                                              </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-4 m-b-5">
                                              <div class="form-group form-primary">
                                                <label class="col-sm col-form-label">Precio Compra </label>
                                                <div class="col-sm">
                                                    <input type="number" v-model="pr_precioc" autocomplete="off" placeholder="Numero entero o decimal" class="form-control" />
                                                </div>
                                              </div>
                                            </div>
                                            <div class="col-sm-4 m-b-5">
                                              <div class="form-group form-primary">
                                                <label class="col-sm col-form-label">Precio Venta (*)</label>
                                                <div class="col-sm">
                                                    <input type="number" v-model="pr_preciov" autocomplete="off" placeholder="Numero entero o decimal" class="form-control" />
                                                </div>
                                              </div>
                                            </div>
                                            <div class="col-sm-4 m-b-5">
                                              <div class="form-group form-primary">
                                                <label class="col-sm col-form-label">Codigo de Barra</label>
                                                <div class="col-sm">
                                                    <input type="text" v-model="pr_cb" autocomplete="off" placeholder="Codigo de Barra" class="form-control" />
                                                </div>
                                              </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                          <div class="col-sm-4 m-b-5">
                                            <div class="form-group form-primary">
                                              <label class="col-sm col-form-label">Categoria (*)</label>
                                              <div class="col-sm">
                                                <select name="select" class="form-control" v-model="idcategoria">
                                                    <option value="0" disabled>Seleccionar</option>
                                                    <option v-for="categoria in arrayCategoria" :key="categoria.idcategoria" :value="categoria.idcategoria" v-text="categoria.ca_nombre"></option>
                                                </select>
                                              </div>
                                            </div>
                                          </div>
                                          <div class="col-sm-4 m-b-5">
                                            <div class="form-group form-primary">
                                              <label class="col-sm col-form-label">Marca (*)</label>
                                              <div class="col-sm">
                                                <select name="select" class="form-control" v-model="idmarca">
                                                    <option value="0" disabled>Seleccionar</option>
                                                    <option v-for="marca in arrayMarca" :key="marca.idmarca" :value="marca.idmarca" v-text="marca.ma_nombre"></option>
                                                </select>
                                              </div>
                                            </div>
                                          </div>
                                          <div class="col-sm-4 m-b-5">
                                            <div class="form-group form-primary">
                                              <label class="col-sm col-form-label">Tipo (*)</label>
                                              <div class="col-sm">
                                                <select name="select" class="form-control" v-model="idtipo">
                                                    <option value="0" disabled>Seleccionar</option>
                                                    <option v-for="tipo in arrayTipo" :key="tipo.idtipo" :value="tipo.idtipo" v-text="tipo.ti_nombre"></option>
                                                </select>
                                              </div>
                                            </div>
                                          </div>

                                        </div>
                                        <div class="row">
                                          <div class="col-sm-4 m-b-5">
                                            <div class="form-group form-primary">
                                              <label class="col-sm col-form-label">Stock Minimo</label>
                                              <div class="col-sm">
                                                  <input type="number" v-model="pr_stkmin" autocomplete="off" placeholder="Nombre del Producto" class="form-control" />
                                              </div>
                                            </div>
                                          </div>
                                          <div class="col-sm-4 m-b-5">
                                            <div class="form-group form-primary">
                                              <label class="col-sm col-form-label">Unidad de Medida (*)</label>
                                              <div class="col-sm">
                                                  <input type="number" v-model="pr_medida" autocomplete="off" placeholder="Ejemplo: 1 , solo número" class="form-control" />
                                              </div>
                                            </div>
                                          </div>
                                          <div class="col-sm-4 m-b-5">
                                            <div class="form-group form-primary">
                                              <label class="col-sm col-form-label">Seleccione Unidad (*)</label>
                                              <div class="col-sm">
                                                <select name="select" class="form-control" v-model="idunidad">
                                                    <option value="0" disabled>Seleccionar</option>
                                                    <option v-for="unidad in arrayUnidad" :key="unidad.idunidad" :value="unidad.idunidad" v-text="unidad.u_nombre"></option>
                                                </select>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                    </form>
                                    <div class="form-group row">
                                      <div v-show="errorProducto" class="div-error col-sm-12">
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
                                            <button type="button" v-if="tipoAccion==1" class="btn btn-primary waves-effect waves-light m-r-10" @click="registrarProducto()">Guardar
                                            </button>
                                            <button type="button" v-if="tipoAccion==2" class="btn btn-primary waves-effect waves-light m-r-10" @click="actualizarProducto()">Actualizar
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
            producto_id:0,
            idcategoria:0,
            idmarca:0,
            idtipo:0,
            idunidad:0,
            ca_nombre: '',
            ca_desc: '',
            pr_nombre: '',
            pr_desc: '',
            pr_precioc: '',
            pr_preciov: '',
            pr_estado: '',
            pr_stkmin: '',
            pr_medida: '',
            pr_igv: '',
            pr_cb: '',
            arrayProducto: [],
            modal:0,
            tituloModal: '',
            tipoAccion:0,
            errorProducto: 0,
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
            buscar: '',
            arrayCategoria : [],
            arrayTipo : [],
            arrayMarca : [],
            arrayUnidad : []
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
        listarProducto(page, buscar) {
            let me = this;
            var url='/producto?page=' + page + '&buscar=' + buscar;
            axios.get(url).then(function(response) {
                    var respuesta = response.data;
                    me.arrayProducto = respuesta.producto.data;
                    me.pagination = respuesta.pagination;
                })
                .catch(function(error) {
                    console.log(error);
                })
                .finally(function() {
                    // always executed
                });

        },
        selectCategoria(){
          let me = this;
          var url='/categoria/selectcategoria';
          axios.get(url).then(function(response) {
           // console.log(response);
                  var respuesta = response.data;
                  me.arrayCategoria = respuesta.categoria;
              })
              .catch(function(error) {
                  console.log(error);
              })
              .finally(function() {
                  // always executed
              });
        },
        selectMarca(){
          let me = this;
          var url='/marca/selectmarca';
          axios.get(url).then(function(response) {
           // console.log(response);
                  var respuesta = response.data;
                  me.arrayMarca = respuesta.marca;
              })
              .catch(function(error) {
                  console.log(error);
              })
              .finally(function() {
                  // always executed
              });
        },
        selectTipo(){
          let me = this;
          var url='/tipo/selecttipo';
          axios.get(url).then(function(response) {
           // console.log(response);
                  var respuesta = response.data;
                  me.arrayTipo = respuesta.tipo;
              })
              .catch(function(error) {
                  console.log(error);
              })
              .finally(function() {
                  // always executed
              });
        },
        selectUnidad(){
          let me = this;
          var url='/unidad/selectunidad';
          axios.get(url).then(function(response) {
           // console.log(response);
                  var respuesta = response.data;
                  me.arrayUnidad = respuesta.unidad;
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
          me.listarProducto(page, buscar);
        },
        registrarProducto(){
            if (this.validarProducto()) {
              return;
            }

          let me=this;

              axios.post('/producto/registrar',{
                'pr_nombre' : this.pr_nombre,
                'pr_desc': this.pr_desc,
                'pr_precioc': this.pr_precioc,
                'pr_preciov' : this.pr_preciov,
                'pr_stkmin' : this.pr_stkmin,
                'pr_igv' : this.pr_igv,
                'pr_cb' : this.pr_cb,
                'pr_medida':this.pr_medida,
                'idmarca' : this.idmarca,
                'idtipo' : this.idtipo,
                'idunidad' : this.idunidad,
                'idcategoria' : this.idcategoria

                }).then(function (response) {
                  // console.log(response);
                  me.cerrarModal();
                  me.listarProducto(1,'');
                })
                .catch(function (response) {
                  console.log(error);
                });
        },
        actualizarProducto(){
          if (this.validarProducto()) {
            return;
          }

          let me=this;

            axios.put('/producto/actualizar',{
              'pr_nombre' : this.pr_nombre,
              'pr_desc': this.pr_desc,
              'pr_precioc': this.pr_precioc,
              'pr_preciov' : this.pr_preciov,
              'pr_stkmin' : this.pr_stkmin,
              'pr_igv' : this.pr_igv,
              'pr_cb' : this.pr_cb,
              'pr_medida':this.pr_medida,
              'idmarca' : this.idmarca,
              'idtipo' : this.idtipo,
              'idunidad' : this.idunidad,
              'idcategoria' : this.idcategoria,
              'idproducto' : this.producto_id
                }).then(function (response) {
                me.cerrarModal();
                me.listarProducto(1,'');
              })
              .catch(function (response) {
                console.log(error);
              });
        },
        desactivarProducto(id){
          const swalWithBootstrapButtons = Swal.mixin({
              customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
              },
              buttonsStyling: false
            })

            swalWithBootstrapButtons.fire({
              title: 'Está seguro de desactivar este producto?',
              icon: 'warning',
              showCancelButton: true,
              confirmButtonText: 'Aceptar!',
              cancelButtonText: 'Cancelar',
              reverseButtons: true
            }).then((result) => {
              if (result.value) {
                let me=this;

                  axios.put('/producto/desactivar',{
                    'idproducto': id
                    }).then(function (response) {
                      me.listarProducto(1,'');
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
        activarProducto(id){
          const swalWithBootstrapButtons = Swal.mixin({
              customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
              },
              buttonsStyling: false
            })

            swalWithBootstrapButtons.fire({
              title: 'Está seguro de activar este producto?',
              icon: 'warning',
              showCancelButton: true,
              confirmButtonText: 'Aceptar!',
              cancelButtonText: 'Cancelar',
              reverseButtons: true
            }).then((result) => {
              if (result.value) {
                let me=this;

                  axios.put('/producto/activar',{
                    'idproducto': id
                    }).then(function (response) {
                      me.listarProducto(1,'');
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
        validarProducto(){
          this.errorProducto=0;
          this.errorMostrarMsj=[];
          if (!this.pr_nombre) this.errorMostrarMsj.push("El nombre del producto no puede estar vacio.");
          if (!this.pr_venta) this.errorMostrarMsj.push("LLenar precio venta.");
          if (!this.idcategoria) this.errorMostrarMsj.push("Seleccionar Categoria.");
          if (!this.idmarca) this.errorMostrarMsj.push("Seleccionar Marca.");
          if (!this.idtipo) this.errorMostrarMsj.push("Seleccionar Tipo.");
          if (!this.idunidad) this.errorMostrarMsj.push("Seleccionar Unidad de Medida.");
          if (!this.pr_medida) this.errorMostrarMsj.push("Seleccionar Unidad de Medida.");
          if(this.errorMostrarMsj.length) this.errorProducto = 1;
            return this.errorProducto;
        },
        cerrarModal(){
          this.modal=0;
          this.tituloModal='';
          this.ca_nombre= '';
          this.ca_desc= '';
          this.pr_nombre= '';
          this.pr_desc= '';
          this.pr_precioc= '';
          this.pr_preciov= '';
          this.pr_estado= '';
          this.pr_stkmin= '';
          this.pr_medida= '';
          this.pr_igv= '';
          this.pr_cb= '';
          this.errorProducto = 0;
          this.idcategoria=0,
          this.idmarca=0,
          this.idtipo=0,
          this.idunidad=0
        },
        abrirModal(modelo, accion, data = []){
          switch (modelo) {
            case "producto":{
                switch (accion) {
                  case 'registrar':{
                    this.modal = 1;
                    this.tipoAccion=1;
                    this.tituloModal = 'Nuevo Producto'
                    this.ca_nombre= '';
                    this.ca_desc= '';
                    this.pr_nombre= '';
                    this.pr_desc= '';
                    this.pr_precioc= '';
                    this.pr_preciov= '';
                    this.pr_estado= '';
                    this.pr_stkmin= '';
                    this.pr_medida= '';
                    this.pr_igv= '';
                    this.pr_cb= '';
                    break;
                  }
                  case 'actualizar':{
                     // console.log(data);
                    this.modal = 1;  this.tipoAccion=2;
                    this.tituloModal ='Actualizar Producto';
                    this.producto_id = data['idproducto'];
                    this.pr_nombre= data['pr_nombre'];
                    this.pr_nombre= data['pr_nombre'];
                    this.pr_desc= data['pr_desc'];
                    this.pr_precioc= data['pr_precioc'];
                    this.pr_preciov= data['pr_preciov'];
                    this.pr_stkmin= data['pr_stkmin'];
                    this.pr_medida= data['pr_medida'];
                    this.pr_igv= data['pr_igv'];
                    this.pr_cb= data['pr_cb'];
                    this.idcategoria= data['idcategoria'];
                    this.idmarca= data['idmarca'];
                    this.idtipo= data['idtipo'];
                    this.idunidad= data['idunidad'];
                    break;
                  }
                }
            }
          }
          this.selectCategoria();
          this.selectMarca();
          this.selectTipo();
          this.selectUnidad();
        }
    },
    mounted() {
        //  console.log('Component mounted.')
        this.listarProducto(1, this.buscar);
    }
}
</script>
<style media="screen">
.modal-content{
  width: 100% !important;
  height: 100% !important;
  position: absolute !important;
  border: 0px !important;
  /* overflow-y: auto !important; */
}
  .mostrar{
    display: list-item !important;
    opacity: 1 !important;
    /* position: absolute !important; */
    background-color: #3c29297a !important;
  }
  .div-error{
    color: red !important;
    font-weight: bold;
    height: 10px;
  }
</style>
