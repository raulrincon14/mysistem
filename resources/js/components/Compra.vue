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
                        <li class="breadcrumb-item"><a href="#!">Compra</a>
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
                  <div class="row">
                  <div class="col-xl-8 col-md-12">
                    <div class="card table-card">
                      <div class="card-header">
                          <h5>Nueva Compra</h5>
                      </div>
                      <div class="card-block">
                        <div class="container-fluid">
                          <div class="row text-right">
                            <div class="col-sm-4 text-right">
                              <label class="text-primary">Buscar / Escanear producto:</label>
                            </div>
                            <div class="col-sm-7">
                              <input list="browsers" id="myBrowser" v-model="buscar" name="myBrowser" class="form-control form-control-primary" v-on:keyup="listarProducto(1,buscar)" @keyup.enter="buscarProducto()" />
                            </div>
                          </div>
                        </div>
                          <datalist id="browsers">
                            <option v-for="producto in arrayProducto" :key="producto.idproducto" :value="producto.idproducto" v-text="producto.pr_nombre +' '+producto.pr_medida+' '+producto.u_abre"></option>
                          </datalist>
                          <div class="caja">
                          <div class="table-responsive">
                            <table class="table table-condensed">
                            <!-- <table class="table table-hover"> -->
                              <thead>
                                <tr>
                                  <th>Código</th>
                                  <th>Producto</th>
                                  <th>Precio S/</th>
                                  <th width="20%">Cantidad</th>
                                  <th>Subtotal S/</th>
                                  <th></th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr v-for="(compra , index) in arrayCompra.slice().reverse()">
                                    <th v-text="compra.idproducto"></th>
                                    <td v-text="compra.pr_nombre"></td>
                                    <td v-text="compra.pr_preciov"></td>
                                    <td align="center">
                                      <input type="number" name="" v-model="compra.cantidad" style="width: 60px;"  v-on:click="calcularTotal()">
                                    </td>
                                    <td>{{  Math.round(compra.pr_preciov * compra.cantidad * 100) / 100  }}
                                      <!-- <template>

                                      </template> -->
                                    </td>
                                    <td>
                                      <button type="button" class="btn waves-effect waves-dark btn-danger btn-outline-danger btn-iconr"  @click="eliminarItem(index)">
                                          <i class="fa fa-trash"></i>
                                      </button>
                                    </td>
                                    <!-- <td v-text="lote.lote_ven"></td> -->

                                </tr>
                              </tbody>
                            </table>
                          </div>
                        </div>
                        </div>
                      </div>
                    </div>

                    <div class="col-xl-4 col-md-12">
                      <div class="card ">
                        <div class="card-block">
                          <div class="row">
                            <div class="col-sm-8">
                                <label class="text-primary">Seleccione Proveedor:</label>
                            </div>
                            <div class="col-sm-4">
                              <button type="primary" slot="append" class="btn btn-info btn-sm" :loading="true"  @click="mostrarDato()" :disabled='estadob'>
                                S/
                                </button>
                            </div>
                          </div>
                          <!-- <div class=""> -->

                            <v-select

                              @search="selectProveedor"
                              label="pro_nombre"
                              :options="arrayProveedor"
                              placeholder="Buscar proveedores..."
                              @input="getDatosProveedor"

                            >

                            </v-select>
                            <!-- <v-select multiple v-model="selep" :options="['Canada','United States']" /> -->
                          <!-- </div> -->
                          <label class="text-primary">Seleccione Lote:</label><p>
                            <v-select
                              @search="selectLote"
                              label="lote_nombre"
                              :options="arrayLote"
                              placeholder="Escribe o seleciona lote"
                              @input="getDatosLote"
                            >
                          </v-select>
                            <div class="">
                                <label class="text-primary">Comprobante:</label>
                                <select class="" name="" class="form-control">
                                  <option value="1">Boleta Electronica</option>
                                  <option value="2">Factura Electronica</option>
                                  <option value="3">Guia</option>
                                </select>
                            </div>
                            <div class="">
                                <label class="text-primary">Número:</label>
                                <input type="text" name="" v-model="ncompro" value="" placeholder="Ejemplo: F001-0002" class="form-control form-control-primary">
                            </div>
                            <div class="row">
                              <div class="col-sm-12"><p></p>
                                <table class="table table-responsive invoice-table invoice-total">
                                  <tbody>
                                    <tr class="text-info">
                                      <td>
                                        <hr />
                                        <h5 class="text-primary">Total :</h5>
                                      </td>
                                      <td>
                                        <hr />
                                        <h5 class="text-primary"> {{'S/ ' + this.totalcompra}}</h5>
                                      </td>
                                    </tr>
                                  </tbody>
                                </table>
                                <div class="row">
                                  <div class="text-center m-t-1 col-sm-12">
                                      <button type="button" class="btn btn-primary waves-effect waves-light m-r-10" @click="registrarCompra()">Guardar
                                      </button>
                                      <button type="button" @click="cerrarModal()" class="btn btn-warning waves-effect waves-light">Cerrar
                                      </button>
                                  </div>
                                </div>
                              </div>

                            </div>

                          <!-- <div class="text-center">
                            <a href="#!" class="b-b-primary text-primary">View all Projects</a>
                          </div> -->
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
            <!-- Main-body end -->
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
import vSelect from 'vue-select';
export default {
    data() {
        return {

            categoria_id:0,
            lote_id:0,
            proveedor_id:0,
            selep: '',
            ca_nombre: '',
            ncompro:'',
            ca_desc: '',
            estadob:'',
            totalcompra: 0,
            arrayProducto: [],
            arrayProveedor: [],
            arrayLote: [],
            canti: 0,
            arrayCompra:[],
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
    components: {
            vSelect
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
          var url='/productov?page=' + page + '&buscar=' + buscar;
          axios.get(url).then(function(response) {
            // console.log(response);
                  var respuesta = response.data;
                  // console.log(respuesta);
                  me.arrayProducto = respuesta.producto.data;
                  // me.pagination = respuesta.pagination;
    //               reversedArr() {
    //   return this.items.slice().reverse()
    // }
              })
              .catch(function(error) {
                  console.log(error);
              })
              .finally(function() {
                  // always executed
              });

      },
      buscarProducto() {
        if (this.buscar=='') {
          // mensaje('warning','Ingrese el número a buscar');
          return
        }

          let me = this;
          var buscarp = me.buscar;
          var prr='';
          var url='/productov/buscar/'+ buscarp;
          axios.get(url).then(function(response) {
            // console.log(response);
                  var respuesta = response.data;
                  // console.log(respuesta.data);
                  prr = respuesta.data;
                  let respuestac = respuesta.producto.idproducto
                // const index = me.arrayCompra.findIndex(fruit => fruit === respuesta.producto.idproducto);
                // mensaje('warning','este es primero '+ index);
                if (me.arrayCompra.find(item=>item.idproducto == respuestac)) {
                  var as = 0.6;
                  var ad = 3;
                  var tr = 3 * 0.6;
                   var total = parseFloat(tr)
                  var ttt= Math.round(tr,2);
                   var uu  = Math.round(tr * 100) / 100 ;

                  mensaje('warning',uu);
                  const index = me.arrayCompra.findIndex(fruit => fruit.idproducto === respuestac);
                  // mensaje('warning','este es primero '+ index);
                  let hj = parseInt(me.arrayCompra[index].cantidad);
                  // mensaje('success',hj);
                  me.arrayCompra[index].cantidad = hj + 1;
                  me.buscar='';
                }else {
                  var produ = {idproducto:respuesta.producto.idproducto,
                    pr_nombre:respuesta.producto.pr_nombre +' '+respuesta.producto.pr_medida+' '+respuesta.producto.u_abre,
                  pr_preciov:respuesta.producto.pr_preciov,cantidad:'1'} //creamos la variable personas, con la variable nombre y apellidos
                  me.arrayCompra.push(produ);
                  me.buscar='';
                  // console.log(respuesta.producto.idproducto);
                  // console.log(respuesta.producto.pr_nombre);
                }
                me.calcularTotal();

              })
              .catch(function(error) {
                  console.log(error);
              })
              .finally(function() {
                  // always executed
              });

      },

      selectProveedor(search, loading){
                let me=this;
                // loading = true;
                loading(true);

                var url= '/proveedor/selectProveedor?filtro='+search;
                // var url= '/proveedor/selectProveedor';
                axios.get(url).then(function (response) {
                    let respuesta = response.data;
                    // console.log(respuesta);
                    // console.log(respuesta.proveedores);
                    q: search
                    me.arrayProveedor=respuesta.proveedores;
                    // console.log(arrayProveedor);
                    loading(false);
                    // loading = false;
                })
                .catch(function (error) {
                    console.log(error);
                });
      },
      getDatosProveedor(val1){
        let me = this;
        me.loading = true;
        me.proveedor_id = val1.idproveedor;
      },
      selectLote(search, loading){
                let me=this;
                // loading = true;
                loading(true);

                var url= '/lote/selectLote?filtro='+search;
                axios.get(url).then(function (response) {
                    let respuesta = response.data;
                    // console.log(respuesta);
                    // console.log(respuesta.lotes);
                    q: search
                    me.arrayLote=respuesta.lotes;
                    // console.log(arrayProveedor);
                    loading(false);
                    // loading = false;
                })
                .catch(function (error) {
                    console.log(error);
                });
      },
      getDatosLote(val1){
        let me = this;
        me.loading = true;
        me.lote_id = val1.idlote;
      },
      calcularTotal(){
                  let me = this;
                  let ttal= 0;
                  // var miArray = [ 2, 4, 6, 8, 10 ];
            for (var i = 0; i < me.arrayCompra.length; i+=1) {
              let pp = parseInt(me.arrayCompra[i].cantidad);
              let oo = parseFloat(me.arrayCompra[i].pr_preciov);
              // console.log(oo);
              let klk = pp * oo;
              let gjj=Math.round(klk * 100) / 100 ;
              ttal = ttal + gjj;
              ttal=Math.round(ttal * 100) / 100 ;
              // console.log("Este seria el Total" + miArray[i]);
            }
          // console.log(ttal);
          me.totalcompra = ttal;
      },  eliminarItem(index) {
                let indexdi = this.arrayCompra.length;
                let nitem= indexdi-1-index
                this.arrayCompra.splice(nitem, 1)
                this.calcularTotal();
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
        validarCompra(){
          // this.errorCategoria=0;
          // this.proveedor_id=0;
          // this.lote_id=0;
          this.errorMostrarMsj=[];
          if (!this.ncompro)   mensaje('error','Ingrese Número de comprobante');
          if (this.lote_id == 0)   mensaje('error','Digite o seleccione Lote');          
          if (this.proveedor_id == 0)   mensaje('error','Seleccione proveedor');
          if (this.arrayCompra.length<=0) mensaje('error','Debe agregar productos');


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
        registrarCompra(){
          this.validarCompra();
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
        this.listarProducto(1, this.buscar);
        // this.selectProveedor();
        // this.getDatosProveedor();
    }
}
</script>
<style media="screen">
  .caja{
    width:98%;
    margin: 4%;
    height: 400px;
    overflow-y: scroll;
    display: inline-block;
  }
</style>
