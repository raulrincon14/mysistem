<div class="pcoded-main-container">
    <div class="pcoded-wrapper">


      <nav class="pcoded-navbar">
          <div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
          <div class="pcoded-inner-navbar main-menu">

              <div class="pcoded-navigation-label">Registros</div>

              <ul class="pcoded-item pcoded-left-item">
                <li @click="menu=0" class=" ">
                    <a href="#" class="waves-effect waves-dark">
                        <span class="pcoded-micon"><i class="fa fa-cogs"></i><b>F</b></span>
                        <span class="pcoded-mtext">Configuración</span>
                        <span class="pcoded-mcaret"></span>
                    </a>
                </li>
                <li @click="menu=1" class=" ">
                    <a href="#" class="waves-effect waves-dark">
                        <span class="pcoded-micon"><i class="zmdi zmdi-accounts-alt"></i><b>F</b></span>
                        <span class="pcoded-mtext">Clientes</span>
                        <span class="pcoded-mcaret"></span>
                    </a>
                </li>
                <li @click="menu=2" class=" ">
                    <a href="#" class="waves-effect waves-dark">
                        <span class="pcoded-micon"><i class="zmdi zmdi-truck"></i></i><b>F</b></span>
                        <span class="pcoded-mtext">Proveedores</span>
                        <span class="pcoded-mcaret"></span>
                    </a>
                </li>
                  <li class="pcoded-hasmenu">
                      <a href="javascript:void(0)" class="waves-effect waves-dark">
                          <span class="pcoded-micon"><i class="fa fa-cube"></i><b>BC</b></span>
                          <span class="pcoded-mtext">Productos</span>
                          <span class="pcoded-mcaret"></span>
                      </a>
                      <ul class="pcoded-submenu">
                          <li @click="menu=4" class=" ">
                              <a href="#" class="waves-effect waves-dark">
                                  <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                  <span class="pcoded-mtext">Categoría</span>
                                  <span class="pcoded-mcaret"></span>
                              </a>
                          </li>
                          <li class=" ">
                              <a href="./breadcrumb.html" class="waves-effect waves-dark">
                                  <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                  <span class="pcoded-mtext">Marca</span>
                                  <span class="pcoded-mcaret"></span>
                              </a>
                          </li>
                          <li class=" ">
                              <a href="./button.html" class="waves-effect waves-dark">
                                  <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                  <span class="pcoded-mtext">Unidad de Medida</span>
                                  <span class="pcoded-mcaret"></span>
                              </a>
                          </li>
                          <li class=" ">
                              <a href="./box-shadow.html" class="waves-effect waves-dark">
                                  <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                  <span class="pcoded-mtext">Tipo</span>
                                  <span class="pcoded-mcaret"></span>
                              </a>
                          </li>
                          <li class="">
                              <a href="./accordion.html" class="waves-effect waves-dark">
                                  <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                  <span class="pcoded-mtext">Producto</span>
                                  <span class="pcoded-mcaret"></span>
                              </a>
                          </li>
                      </ul>
                  </li>
              </ul>
              <div class="pcoded-navigation-label">Movimientos</div>
              <ul class="pcoded-item pcoded-left-item">
                  <li class="pcoded-hasmenu">
                      <a href="javascript:void(0)" class="waves-effect waves-dark">
                          <span class="pcoded-micon"><i class="ti-shopping-cart"></i><b>FC</b></span>
                          <span class="pcoded-mtext">Compras</span>
                          <span class="pcoded-mcaret"></span>
                      </a>
                      <ul class="pcoded-submenu">
                          <li class=" ">
                              <a href="./form-elements-component.html" class="waves-effect waves-dark">
                                  <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                  <span class="pcoded-mtext">Listado</span>
                                  <span class="pcoded-mcaret"></span>
                              </a>
                          </li>
                          <li class=" ">
                              <a href="./form-elements-add-on.html" class="waves-effect waves-dark">
                                  <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                  <span class="pcoded-mtext">Nueva</span>
                                  <span class="pcoded-mcaret"></span>
                              </a>
                          </li>
                      </ul>
                  </li>
                  <li class="pcoded-hasmenu">
                      <a href="javascript:void(0)" class="waves-effect waves-dark">
                          <span class="pcoded-micon"><i class="ti-tag"></i><b>FC</b></span>
                          <span class="pcoded-mtext">Ventas</span>
                          <span class="pcoded-mcaret"></span>
                      </a>
                      <ul class="pcoded-submenu">
                          <li class=" ">
                              <a href="./form-elements-component.html" class="waves-effect waves-dark">
                                  <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                  <span class="pcoded-mtext">Listado</span>
                                  <span class="pcoded-mcaret"></span>
                              </a>
                          </li>
                          <li class=" ">
                              <a href="./form-elements-add-on.html" class="waves-effect waves-dark">
                                  <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                  <span class="pcoded-mtext">Nueva</span>
                                  <span class="pcoded-mcaret"></span>
                              </a>
                          </li>
                      </ul>
                  </li>
                  <li class="pcoded-hasmenu">
                      <a href="javascript:void(0)" class="waves-effect waves-dark">
                          <span class="pcoded-micon"><i class="fa fa-cubes"></i><b>FC</b></span>
                          <span class="pcoded-mtext">Inventario</span>
                          <span class="pcoded-mcaret"></span>
                      </a>
                      <ul class="pcoded-submenu">
                          <li class=" ">
                              <a href="./form-elements-component.html" class="waves-effect waves-dark">
                                  <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                  <span class="pcoded-mtext">Distribución</span>
                                  <span class="pcoded-mcaret"></span>
                              </a>
                          </li>
                          <li class=" ">
                              <a href="./form-elements-add-on.html" class="waves-effect waves-dark">
                                  <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                  <span class="pcoded-mtext">Reporte Kardex</span>
                                  <span class="pcoded-mcaret"></span>
                              </a>
                          </li>
                          <li class=" ">
                              <a href="./form-elements-advance.html" class="waves-effect waves-dark">
                                  <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                  <span class="pcoded-mtext">Reporte Inventario</span>
                                  <span class="pcoded-mcaret"></span>
                              </a>
                          </li>
                      </ul>
                  </li>
      </ul>
                  </li>
              </ul>

          <div class="pcoded-navigation-label">Support</div>
              <ul class="pcoded-item pcoded-left-item">
                  <li class="">
                      <a href="#" target="_blank" class="waves-effect waves-dark">
                          <span class="pcoded-micon"><i class="ti-file"></i><b>D</b></span>
                          <span class="pcoded-mtext">Documentation</span>
                          <span class="pcoded-mcaret"></span>
                      </a>
                  </li>
                  <li class="">
                      <a href="#" target="_blank" class="waves-effect waves-dark">
                          <span class="pcoded-micon"><i class="ti-layout-list-post"></i><b>SI</b></span>
                          <span class="pcoded-mtext">Need Support ?</span>
                          <span class="pcoded-mcaret"></span>
                      </a>
                  </li>
              </ul>
          </div>
      </nav>


      @yield('contenido')
        <!-- Warning Section Starts -->
        <div id="styleSelector">

        </div>
    </div>
</div>
