<template>


<div style="background:#fff;padding:30px;" >


  <div class="overflow-auto" >

 <b-col lg="6" class="my-1">
        <b-form-group
          label="Filtro"
          label-for="filter-input"
          label-cols-sm="3"
          label-align-sm="right"
          label-size="sm"
          class="mb-0"
        >
          <b-input-group size="sm">
            <b-form-input
              id="filter-input"
              v-model="filter"
              type="search"
              placeholder="Escribe tu búsqueda"
            ></b-form-input>

            <b-input-group-append>
              <b-button :disabled="!filter" @click="filter = ''">Limpiar</b-button>
            </b-input-group-append>
          </b-input-group>
        </b-form-group>
      </b-col>

      <b-col lg="12" class="my-1">
        <b-form-group
          label="Buscar en"
          description=""
          label-cols-sm="3"
          label-align-sm="right"
          label-size="sm"
          class="mb-0"
          lg="12"
          v-slot="{ ariaDescribedby }"
        >
          <b-form-checkbox-group
            v-model="filterOn"
            :aria-describedby="ariaDescribedby"
            lg="12"
            class="mt-1 d-inline"
          >
            <b-form-checkbox class="filterCheck" value="NoCliente"> No. Cliente</b-form-checkbox>
            <b-form-checkbox class="filterCheck" value="numeroEstadoCuenta"> No. Estado de Cuenta</b-form-checkbox>
            <b-form-checkbox class="filterCheck" value="nombre"> Nombre</b-form-checkbox>
            <b-form-checkbox class="filterCheck" value="apellido1"> Apellido paterno</b-form-checkbox>
            <b-form-checkbox class="filterCheck" value="apellido2"> Apellido materno</b-form-checkbox>
            <b-form-checkbox class="filterCheck" value="cp">CP</b-form-checkbox>
            <b-form-checkbox class="filterCheck" value="delMunicipio"> Municipio</b-form-checkbox>
          </b-form-checkbox-group>
        </b-form-group>
      </b-col>
      <b-col lg="12" class="mt-2">
        <p class="text-muted mb-0">Sin seleccionar busca en toda la información</p>
      </b-col>


    <div class="col-xs-12 my-3">
            <a  class="btn btn-primary" :href="'/home'" > <b-icon icon="arrow-left" aria-hidden="true"></b-icon>
            Regresar
          </a> 
</div>

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
      :filter="filter"
      :filter-included-fields="filterOn"
      @filtered="onFiltered"
      show-empty
    >
      <template #cell(actions)="datos" >
            <a class="btn btn-success my-2" :href="`/datos-cortes/`+datos.item.NoCliente.trim()" >
            Ver corte
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

        filter: null,
        filterOn: [],

        datos:[]
  
      }
      
    },
    computed: {
      rows() {
        return this.datos.length
      },
      sortOptions() {
        // Create an options list from our fields
        return this.fields
          .filter(f => f.sortable)
          .map(f => {
            return { text: f.label, value: f.key }
          })
      }
    },
    methods:{

             traerDatos(){

                axios.get('/todos-clientes')
                    .then( res => {
                        this.datos = res.data;
                        console.log(datos.index);
                    })
                    .catch( error => {
                        console.log(error.response);
                    })
             },onFiltered(filteredItems) {
        // Trigger pagination to update the number of buttons/pages due to filtering
        this.totalRows = filteredItems.length
        this.currentPage = 1
      }
        
        
    },
    mounted(){
          
        this.traerDatos();
    }
  }

</script>

