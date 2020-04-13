@extends('principal')
@section('contenido')
  <template v-if="menu==0">
    <h1>Contenido 0</h1>
      </template>
  <template v-if="menu==1">
    <cliente></cliente>
  </template>
  <template v-if="menu==2">
    <proveedor></proveedor>
  </template>
  <template v-if="menu==3">
    <h1>Contenido 3</h1>
  </template>
  <template v-if="menu==4">
    <categoria></categoria>
  </template>
  <template v-if="menu==5">
    <marca></marca>
  </template>
  <template v-if="menu==6">
    <unidad></unidad>
  </template>
  <template v-if="menu==7">
    <tipo></tipo>
  </template>
  <template v-if="menu==8">
    <producto></producto>
  </template>
  <template v-if="menu==9">
    <lote></lote>
  </template>
  <template v-if="menu==10">
    <compra></compra>
  </template>
  <template v-if="menu==12">
    <usuario></usuario>
  </template>
@endsection
