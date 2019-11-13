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
                              <button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#large-Modal"><i class="icofont icofont-ui-add"></i>Nuevo</button>
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
                                                              <td><button class="btn waves-effect waves-dark btn-warning btn-outline-warning btn-iconr">
                                                                    <i class="ti-marker-alt"></i>
                                                                  </button>&nbsp;
                                                                  <button class="btn waves-effect waves-dark btn-danger btn-outline-danger btn-iconr">
                                                                    <i class="fa fa-trash"></i>
                                                                  </button></td>

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


                      <div class="modal fade" id="large-Modal" tabindex="-1" role="dialog">
                          <div class="modal-dialog modal-md" role="document">
                            <div class="card">
                                                      <div class="card-header">
                                                          <h5>Basic Form Inputs</h5>
                                                          <span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>
                                                      </div>
                                                      <div class="card-block">
                                                          <h4 class="sub-title">Basic Inputs</h4>
                                                          <form />
                                                              <div class="form-group row">
                                                                  <label class="col-sm-2 col-form-label">Simple Input</label>
                                                                  <div class="col-sm-10">
                                                                      <input type="text" class="form-control" />
                                                                  </div>
                                                              </div>
                                                              <div class="form-group row">
                                                                  <label class="col-sm-2 col-form-label">Placeholder</label>
                                                                  <div class="col-sm-10">
                                                                      <input type="text" class="form-control" placeholder="Type your title in Placeholder" />
                                                                  </div>
                                                              </div>
                                                              <div class="form-group row">
                                                                  <label class="col-sm-2 col-form-label">Password</label>
                                                                  <div class="col-sm-10">
                                                                      <input type="password" class="form-control" placeholder="Password input" />
                                                                  </div>
                                                              </div>
                                                              <div class="form-group row">
                                                                  <label class="col-sm-2 col-form-label">Read only</label>
                                                                  <div class="col-sm-10">
                                                                      <input type="text" class="form-control" placeholder="You can't change me" readonly="" />
                                                                  </div>
                                                              </div>
                                                              <div class="form-group row">
                                                                  <label class="col-sm-2 col-form-label">Disable Input</label>
                                                                  <div class="col-sm-10">
                                                                      <input type="text" class="form-control" placeholder="Disabled text" disabled="" />
                                                                  </div>
                                                              </div>
                                                              <div class="form-group row">
                                                                  <label class="col-sm-2 col-form-label">Predefine
                                                                      Input</label>
                                                                      <div class="col-sm-10">
                                                                          <input type="text" class="form-control" value="Enter yout content after me" />
                                                                      </div>
                                                                  </div>
                                                                  <div class="form-group row">
                                                                      <label class="col-sm-2 col-form-label">Select Box</label>
                                                                      <div class="col-sm-10">
                                                                          <select name="select" class="form-control">
                                                                              <option value="opt1" />Select One Value Only
                                                                              <option value="opt2" />Type 2
                                                                              <option value="opt3" />Type 3
                                                                              <option value="opt4" />Type 4
                                                                              <option value="opt5" />Type 5
                                                                              <option value="opt6" />Type 6
                                                                              <option value="opt7" />Type 7
                                                                              <option value="opt8" />Type 8
                                                                          </select>
                                                                      </div>
                                                                  </div>
                                                                  <div class="form-group row">
                                                                      <label class="col-sm-2 col-form-label">Round Input</label>
                                                                      <div class="col-sm-10">
                                                                          <input type="text" class="form-control form-control-round" placeholder=".form-control-round" />
                                                                      </div>
                                                                  </div>
                                                                  <div class="form-group row">
                                                                      <label class="col-sm-2 col-form-label">Maximum
                                                                          Length</label>
                                                                          <div class="col-sm-10">
                                                                              <input type="text" class="form-control" placeholder="Content must be in 6 characters" maxlength="6" />
                                                                          </div>
                                                                      </div>
                                                                      <div class="form-group row">
                                                                          <label class="col-sm-2 col-form-label">Disable
                                                                              Autocomplete</label>
                                                                              <div class="col-sm-10">
                                                                                  <input type="text" class="form-control" placeholder="Autocomplete Off" autocomplete="off" />
                                                                              </div>
                                                                          </div>
                                                                          <div class="form-group row">
                                                                              <label class="col-sm-2 col-form-label">Static Text</label>
                                                                              <div class="col-sm-10">
                                                                                  <div class="form-control-static">Hello !... This is
                                                                                      static text
                                                                                  </div>
                                                                              </div>
                                                                          </div>
                                                                          <div class="form-group row">
                                                                              <label class="col-sm-2 col-form-label">Color</label>
                                                                              <div class="col-sm-10">
                                                                                  <input type="color" class="form-control" />
                                                                              </div>
                                                                          </div>
                                                                          <div class="form-group row">
                                                                              <label class="col-sm-2 col-form-label">Upload File</label>
                                                                              <div class="col-sm-10">
                                                                                  <input type="file" class="form-control" />
                                                                              </div>
                                                                          </div>
                                                                          <div class="form-group row">
                                                                              <label class="col-sm-2 col-form-label">Textarea</label>
                                                                              <div class="col-sm-10">
                                                                                  <textarea rows="5" cols="5" class="form-control" placeholder="Default textarea"></textarea>
                                                                              </div>
                                                                          </div>
                                                                      </form>
                                                                      <div class="row">
                                                                          <div class="col-sm-6">
                                                                              <h4 class="sub-title">Input Sizes</h4>
                                                                              <form />
                                                                                  <div class="form-group row">
                                                                                      <div class="col-sm-12">
                                                                                          <input type="text" class="form-control form-control-lg" placeholder=".form-control-lg" />
                                                                                      </div>
                                                                                  </div>
                                                                                  <div class="form-group row">
                                                                                      <div class="col-sm-10">
                                                                                          <input type="text" class="form-control" placeholder=".form-control" />
                                                                                      </div>
                                                                                  </div>
                                                                                  <div class="form-group row">
                                                                                      <div class="col-sm-8">
                                                                                          <input type="text" class="form-control form-control-sm" placeholder=".form-control-sm" />
                                                                                      </div>
                                                                                  </div>
                                                                              </form>
                                                                          </div>
                                                                          <div class="col-sm-6 mobile-inputs">
                                                                              <h4 class="sub-title">Color Inputs</h4>
                                                                              <form />
                                                                                  <div class="form-group">
                                                                                      <input type="text" class="form-control form-control-primary" placeholder=".form-control-primary" />
                                                                                  </div>
                                                                                  <div class="form-group row">
                                                                                      <div class="col-sm-6">
                                                                                          <input type="text" class="form-control form-control-warning" placeholder=".form-control-warning" />
                                                                                      </div>
                                                                                      <div class="col-sm-6">
                                                                                          <input type="text" class="form-control form-control-default" placeholder=".form-control-default" />
                                                                                      </div>
                                                                                  </div>
                                                                                  <div class="form-group row">
                                                                                      <div class="col-sm-6">
                                                                                          <input type="text" class="form-control form-control-danger" placeholder=".form-control-danger" />
                                                                                      </div>
                                                                                      <div class="col-sm-6">
                                                                                          <input type="text" class="form-control form-control-success" placeholder=".form-control-success" />
                                                                                      </div>
                                                                                  </div>
                                                                                  <div class="form-group row">
                                                                                      <div class="col-sm-6">
                                                                                          <input type="text" class="form-control form-control-inverse" placeholder=".form-control-inverse" />
                                                                                      </div>
                                                                                      <div class="col-sm-6">
                                                                                          <input type="text" class="form-control form-control-info" placeholder=".form-control-info" />
                                                                                      </div>
                                                                                  </div>
                                                                              </form>
                                                                          </div>
                                                                      </div>
                                                                      <div class="row">
                                                                          <div class="col-sm-6 mobile-inputs">
                                                                              <h4 class="sub-title">Text-color</h4>
                                                                              <form />
                                                                                  <div class="form-group">
                                                                                      <input type="text" class="form-control form-txt-primary" placeholder=".form-txt-primary" />
                                                                                  </div>
                                                                                  <div class="form-group row">
                                                                                      <div class="col-sm-6">
                                                                                          <input type="text" class="form-control form-txt-warning" placeholder=".form-txt-warning" />
                                                                                      </div>
                                                                                      <div class="col-sm-6">
                                                                                          <input type="text" class="form-control form-txt-default" placeholder=".form-txt-default" />
                                                                                      </div>
                                                                                  </div>
                                                                                  <div class="form-group row">
                                                                                      <div class="col-sm-6">
                                                                                          <input type="text" class="form-control form-txt-danger" placeholder=".form-txt-danger" />
                                                                                      </div>
                                                                                      <div class="col-sm-6">
                                                                                          <input type="text" class="form-control form-txt-success" placeholder=".form-txt-success" />
                                                                                      </div>
                                                                                  </div>
                                                                                  <div class="row">
                                                                                      <div class="col-sm-6">
                                                                                          <input type="text" class="form-control form-txt-inverse" placeholder=".form-txt-inverse" />
                                                                                      </div>
                                                                                      <div class="col-sm-6">
                                                                                          <input type="text" class="form-control form-txt-info" placeholder=".form-txt-info" />
                                                                                      </div>
                                                                                  </div>
                                                                              </form>
                                                                          </div>
                                                                          <div class="col-sm-6 mobile-inputs">
                                                                              <h4 class="sub-title">Background-color</h4>
                                                                              <form />
                                                                                  <div class="form-group">
                                                                                      <input type="text" class="form-control form-bg-primary" placeholder=".form-bg-primary" />
                                                                                  </div>
                                                                                  <div class="form-group row">
                                                                                      <div class="col-sm-6">
                                                                                          <input type="text" class="form-control form-bg-warning" placeholder=".form-bg-warning" />
                                                                                      </div>
                                                                                      <div class="col-sm-6">
                                                                                          <input type="text" class="form-control form-bg-default" placeholder=".form-bg-default" />
                                                                                      </div>
                                                                                  </div>
                                                                                  <div class="form-group row">
                                                                                      <div class="col-sm-6">
                                                                                          <input type="text" class="form-control form-bg-danger" placeholder=".form-bg-danger" />
                                                                                      </div>
                                                                                      <div class="col-sm-6">
                                                                                          <input type="text" class="form-control form-bg-success" placeholder=".form-bg-success" />
                                                                                      </div>
                                                                                  </div>
                                                                                  <div class="row">
                                                                                      <div class="col-sm-6">
                                                                                          <input type="text" class="form-control form-bg-inverse" placeholder=".form-bg-inverse" />
                                                                                      </div>
                                                                                      <div class="col-sm-6">
                                                                                          <input type="text" class="form-control form-bg-info" placeholder=".form-bg-info" />
                                                                                      </div>
                                                                                  </div>
                                                                              </form>
                                                                          </div>
                                                                      </div>
                                                                  </div>
                                                              </div>
                                                              <!-- Basic Form Inputs card end -->
                                                              <!-- Input Grid card start -->
                                                              <div class="card">
                                                                  <div class="card-header">
                                                                      <h5>Input Grid</h5>
                                                                      <span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>

                                                                  </div>
                                                                  <div class="card-block">
                                                                      <h4 class="sub-title">Basic Inputs</h4>
                                                                      <form />
                                                                          <div class="form-group row">
                                                                              <div class="col-sm-1">
                                                                                  <input type="text" class="form-control" placeholder="col-sm-1" />
                                                                              </div>
                                                                              <div class="col-sm-11">
                                                                                  <input type="text" class="form-control" placeholder="col-sm-11" />
                                                                              </div>
                                                                          </div>
                                                                          <div class="form-group row">
                                                                              <div class="col-sm-2">
                                                                                  <input type="text" class="form-control" placeholder="col-sm-2" />
                                                                              </div>
                                                                              <div class="col-sm-10">
                                                                                  <input type="text" class="form-control" placeholder="col-sm-10" />
                                                                              </div>
                                                                          </div>
                                                                          <div class="form-group row">
                                                                              <div class="col-sm-3">
                                                                                  <input type="text" class="form-control" placeholder="col-sm-3" />
                                                                              </div>
                                                                              <div class="col-sm-9">
                                                                                  <input type="text" class="form-control" placeholder="col-sm-9" />
                                                                              </div>
                                                                          </div>
                                                                          <div class="form-group row">
                                                                              <div class="col-sm-4">
                                                                                  <input type="text" class="form-control" placeholder="col-sm-4" />
                                                                              </div>
                                                                              <div class="col-sm-8">
                                                                                  <input type="text" class="form-control" placeholder="col-sm-8" />
                                                                              </div>
                                                                          </div>
                                                                          <div class="form-group row">
                                                                              <div class="col-sm-5">
                                                                                  <input type="text" class="form-control" placeholder="col-sm-5" />
                                                                              </div>
                                                                              <div class="col-sm-7">
                                                                                  <input type="text" class="form-control" placeholder="col-sm-7" />
                                                                              </div>
                                                                          </div>
                                                                          <div class="form-group row">
                                                                              <div class="col-sm-6">
                                                                                  <input type="text" class="form-control" placeholder="col-sm-6" />
                                                                              </div>
                                                                              <div class="col-sm-6">
                                                                                  <input type="text" class="form-control" placeholder="col-sm-6" />
                                                                              </div>
                                                                          </div>
                                                                          <div class="form-group row">
                                                                              <div class="col-sm-12">
                                                                                  <input type="text" class="form-control" placeholder="col-sm-12" />
                                                                              </div>
                                                                          </div>
                                                                      </form>
                                                                      <h4 class="sub-title">Flex Inputs</h4>
                                                                      <form />
                                                                          <div class="form-group row">
                                                                              <div class="col">
                                                                                  <input type="text" class="form-control" placeholder="col" />
                                                                              </div>
                                                                              <div class="col-sm-4">
                                                                                  <input type="text" class="form-control" placeholder="col-sm-4" />
                                                                              </div>
                                                                              <div class="col">
                                                                                  <input type="text" class="form-control" placeholder="col" />
                                                                              </div>
                                                                          </div>
                                                                          <div class="form-group row">
                                                                              <div class="col">
                                                                                  <input type="text" class="form-control" placeholder="col" />
                                                                              </div>
                                                                              <div class="col-sm-6">
                                                                                  <input type="text" class="form-control" placeholder="col-sm-6" />
                                                                              </div>
                                                                              <div class="col">
                                                                                  <input type="text" class="form-control" placeholder="col" />
                                                                              </div>
                                                                          </div>
                                                                          <div class="form-group row">
                                                                              <div class="col-sm-8">
                                                                                  <input type="text" class="form-control" placeholder="col-sm-8" />
                                                                              </div>
                                                                              <div class="col">
                                                                                  <input type="text" class="form-control" placeholder="col" />
                                                                              </div>
                                                                              <div class="col">
                                                                                  <input type="text" class="form-control" placeholder="col" />
                                                                              </div>
                                                                          </div>
                                                                          <div class="form-group row">
                                                                              <div class="col">
                                                                                  <input type="text" class="form-control" placeholder="col" />
                                                                              </div>
                                                                              <div class="col-sm-10">
                                                                                  <input type="text" class="form-control" placeholder="col-sm-10" />
                                                                              </div>
                                                                              <div class="col">
                                                                                  <input type="text" class="form-control" placeholder="col" />
                                                                              </div>
                                                                          </div>
                                                                      </form>
                                                                  </div>
                                                              </div>
                                                              <!-- Input Grid card end -->
                                                              <!-- Input Validation card start -->
                                                              <div class="card">
                                                                  <div class="card-header">
                                                                      <h5>Input Validation</h5>
                                                                      <span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>
                                                                  </div>
                                                                  <div class="card-block">
                                                                      <h4 class="sub-title">Input Validation</h4>
                                                                      <div class="form-group has-success row">
                                                                          <div class="col-sm-2">
                                                                              <label class="col-form-label" for="inputSuccess1">Input with
                                                                                  success</label>
                                                                              </div>
                                                                              <div class="col-sm-10">
                                                                                  <input type="text" class="form-control form-control-success" id="inputSuccess1" />
                                                                                  <div class="col-form-label">Success! You've done it.</div>
                                                                              </div>
                                                                          </div>
                                                                          <div class="form-group has-warning row">
                                                                              <div class="col-sm-2">
                                                                                  <label class="col-form-label" for="inputWarning1">Input with
                                                                                      warning</label>
                                                                                  </div>
                                                                                  <div class="col-sm-10">
                                                                                      <input type="text" class="form-control form-control-warning" id="inputWarning1" />
                                                                                      <div class="col-form-label">Shucks, check the formatting of that
                                                                                          and try again.
                                                                                      </div>
                                                                                  </div>
                                                                              </div>
                                                                              <div class="form-group has-danger row">
                                                                                  <div class="col-sm-2">
                                                                                      <label class="col-form-label" for="inputDanger1">Input with
                                                                                          danger</label>
                                                                                      </div>
                                                                                      <div class="col-sm-10">
                                                                                          <input type="text" class="form-control form-control-danger" id="inputDanger1" />
                                                                                          <div class="col-form-label">Sorry, that username's taken. Try
                                                                                              another?
                                                                                          </div>
                                                                                      </div>
                                                                                  </div>
                                                                              </div>
                                                                          </div>
                                                                          <!-- Input Validation card end -->
                                                                          <!-- Input Alignment card start -->
                                                                          <div class="card">
                                                                              <div class="card-header">
                                                                                  <h5>Input Alignment</h5>
                                                                                  <span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>
                                                                              </div>
                                                                              <div class="card-block">
                                                                                  <form />
                                                                                      <div class="form-group row">
                                                                                          <label class="col-sm-2 col-form-label">Normal Text</label>
                                                                                          <div class="col-sm-10">
                                                                                              <input type="text" class="form-control form-control-normal" placeholder=".form-control-normal" />
                                                                                          </div>
                                                                                      </div>
                                                                                      <div class="form-group row">
                                                                                          <label class="col-sm-2 col-form-label">Bold Text</label>
                                                                                          <div class="col-sm-10">
                                                                                              <input type="text" class="form-control form-control-bold" placeholder=".form-control-bold" />
                                                                                          </div>
                                                                                      </div>
                                                                                      <div class="form-group row">
                                                                                          <label class="col-sm-2 col-form-label">Capitalize Text</label>
                                                                                          <div class="col-sm-10">
                                                                                              <input type="text" class="form-control form-control-capitalize" placeholder=".form-control-capitalize" />
                                                                                          </div>
                                                                                      </div>
                                                                                      <div class="form-group row">
                                                                                          <label class="col-sm-2 col-form-label">Uppercase Text</label>
                                                                                          <div class="col-sm-10">
                                                                                              <input type="text" class="form-control form-control-uppercase" placeholder=".form-control-uppercase" />
                                                                                          </div>
                                                                                      </div>
                                                                                      <div class="form-group row">
                                                                                          <label class="col-sm-2 col-form-label">Lowercase Text</label>
                                                                                          <div class="col-sm-10">
                                                                                              <input type="text" class="form-control form-control-lowercase" placeholder=".form-control-lowercase" />
                                                                                          </div>
                                                                                      </div>
                                                                                      <div class="form-group row">
                                                                                          <label class="col-sm-2 col-form-label">Varient Text</label>
                                                                                          <div class="col-sm-10">
                                                                                              <input type="text" class="form-control form-control-variant" placeholder=".form-control-variant" />
                                                                                          </div>
                                                                                      </div>
                                                                                      <div class="form-group row">
                                                                                          <label class="col-sm-2 col-form-label">Left-Align Text</label>
                                                                                          <div class="col-sm-10">
                                                                                              <input type="text" class="form-control form-control-left" placeholder=".form-control-left" />
                                                                                          </div>
                                                                                      </div>
                                                                                      <div class="form-group row">
                                                                                          <label class="col-sm-2 col-form-label">Center-Align Text</label>
                                                                                          <div class="col-sm-10">
                                                                                              <input type="text" class="form-control form-control-center" placeholder=".form-control-center" />
                                                                                          </div>
                                                                                      </div>
                                                                                      <div class="form-group row">
                                                                                          <label class="col-sm-2 col-form-label">Right-Align Text</label>
                                                                                          <div class="col-sm-10">
                                                                                              <input type="text" class="form-control form-control-right" placeholder=".form-control-right" />
                                                                                          </div>
                                                                                      </div>
                                                                                      <div class="form-group row">
                                                                                          <label class="col-sm-2 col-form-label">RTL Text</label>
                                                                                          <div class="col-sm-10">
                                                                                              <input type="text" class="form-control form-control-rtl" placeholder=".form-control-rtl" />
                                                                                          </div>
                                                                                      </div>
                                                                                  </form>
                                                                              </div>
                                                                          </div>
                                                                          <!-- Input Alignment card end -->
                                                                      </div>
                                                                  </div>
                                                              </div>
                                                              <!-- Page body end -->
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
          nombre:'',
          descripcion:'',
          arrayCategoria:[]
        }
      },
      methods :{
        listarCategoria(){
          let me=this;
          axios.get('/categoria').then(function (response) {
            me.arrayCategoria = response.data;
          })
          .catch(function (error) {
            console.log(error);
          })
          .finally(function () {
    // always executed
          });

        }
      },
        mounted() {
          //  console.log('Component mounted.')
          this.listarCategoria();
        }
    }
</script>
