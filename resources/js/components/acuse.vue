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
          <a :href="`/operaciones/`+datos.item.idFactura" > <b-icon icon="file-earmark" aria-hidden="true"></b-icon>
           Descargar acuse
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
.filterCheck{
  position: relative; float: left; margin:0px 5px;
}
.filterCheck > input{ margin-right:5px;}

</style>


<script>
  export default {
       props: ['id'],
    data() {
      return {
        sortBy: 'idFactura',
        sortDesc: false,
        fields: [
          { key: 'actions', label: 'Actions' },
          //{ key: 'id', sortable: true },
          { key: 'idFactura', sortable: true },
          { key: 'Status', sortable: true},
          { key: 'Message', sortable: true },
          { key: 'IsCancelable', sortable: true },
          { key: 'Uuid', sortable: true },
          { key: 'RequestDate', sortable: true },
          { key: 'ExpirationDate', sortable: true },
          { key: 'AcuseXmlBase64', sortable: true },
          { key: 'urlAcuse', sortable: true },
          { key: 'CancelationDate', sortable: true },
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
        console.log(this.id);
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


                axios.get('/info-acuse'+'/'+this.id)
                    .then( res => {
                        this.datos = [res.data];
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
        console.log(this.id);
    }
  }

</script>

