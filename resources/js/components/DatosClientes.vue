<template>


<div style="background:#fff;padding:30px;" >


  <div class="overflow-auto" >


    <div class="col-xs-12 pull-right">

        <div class="mt-3 mb-3 text-right">Página actual: <b>{{ currentPage }}</b> | Total de registros: <b> {{ rows }}</b></div>
        <b-pagination
        v-model="currentPage"
        :total-rows="rows"
        :per-page="perPage"
        aria-controls="my-table"
        class="mt-0"
        >
        <template #first-text><span>Primero</span></template>
        <template #prev-text><span>Anterior</span></template>
        <template #next-text><span>Siguiente</span></template>
        <template #last-text><span>Último</span></template>
        </b-pagination>
    </div>


    <b-table
      :items="datos"
      :fields="fields"
      :sort-by.sync="sortBy"
      :sort-desc.sync="sortDesc"
      sort-icon-left
      responsive="sm"
      :per-page="perPage"
      :current-page="currentPage"
      label-sort-asc=""
      label-sort-desc=""
      label-sort-clear=""
      class="tabla table-striped col-xs-12 table-light"
      sticky-header
    >
      <template #cell(actions)="datos" >
          <a :href="`/clientes/`+datos.item.NoCliente.trim()" > <b-icon icon="file-earmark" aria-hidden="true"></b-icon>
            Regresar
          </a>
      </template>
    </b-table>


    <div class="mx-0 my-3 col-12 base">
      Sorting By: <b>{{ sortBy }}</b>, Sort Direction:
      <b>{{ sortDesc ? 'Descending' : 'Ascending' }}</b>
    </div>

    <div class="col-xs-12 pull-right">

        <b-pagination
        v-model="currentPage"
        :total-rows="rows"
        :per-page="perPage"
        aria-controls="my-table"
        class="mt-0"
        >
        <template #first-text><span>Primero</span></template>
        <template #prev-text><span>Anterior</span></template>
        <template #next-text><span>Siguiente</span></template>
        <template #last-text><span>Último</span></template>
        </b-pagination>
    </div>


  </div>


</div>
</template>

<style>
.tabla table th,.tabla table tr td{
 min-width: 200px;
    text-align: center;
}
</style>


<script>
  export default {
    props: ['id'],
    data() {
      return {
        sortBy: 'NoCliente',
        sortDesc: false,
        fields: [
          { key: 'actions', label: 'Actions' },
          { key: 'id', sortable: true },
          { key: 'NoCliente', sortable: true },
          { key: 'numeroEstadoCuenta', sortable: true, label: 'Estados de Cuenta' },
          { key: 'nombre', sortable: true},
          { key: 'apellido1', sortable: true },
          { key: 'apellido2', sortable: true },
          { key: 'calle', sortable: true },
          { key: 'numeroExterior', sortable: true },
          { key: 'numeroInterior', sortable: true },
          { key: 'colonia', sortable: true },
          { key: 'delMunicipio', sortable: true, label:'Municipio' },
          { key: 'estado', sortable: true },
          { key: 'cp', sortable: true },
          { key: 'created_at', sortable: true, label:'Creado' },
          { key: 'updated_at', sortable: true, label: 'Actualizado' }
        ],perPage: 50,
        currentPage: 1,


        datos:[]
  
      }
      
    },
    computed: {
      rows() {
        return this.datos.length
      }

    },
    methods:{

             traerDatos(){

                axios.get('/datos-clientes'+'/'+this.id)
                    .then( res => {
                        this.datos = [res.data];
                        console.log(datos.index);
                    })
                    .catch( error => {
                        console.log(error.response);
                    })
             }
        
    },
    mounted(){
          
        this.traerDatos();
    }
  }

</script>

