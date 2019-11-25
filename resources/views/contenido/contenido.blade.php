@extends('principal')
@section('contenido')
  <template v-if="menu==0">
    <h1>Contenido 0</h1>
      </template>
  <template v-if="menu==1">
    <h1>Contenido 1</h1>
  </template>
  <template v-if="menu==2">
    <h1>Contenido 2</h1>
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
@endsection
