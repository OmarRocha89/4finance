<template>



<div style="background:#fff;padding:30px;" v-loading="loading" >

  <div>

    <div v-if="!loading" class="py-3">
      <h3>Loading</h3>
      <p>Loading can show the loading state icon.</p>
    </div>
    <b-loading :show="loading"></b-loading>
  </div>
  

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
                  <a class="btn btn-secondary my-2" :href="`/descargar/`+datos.item.Id" >
            Descargar
          </a> <br>

          <template v-if=" datos.item.Status == 'active'">
          <a class="btn btn-danger" :href="`/cancelar/`+datos.item.Id"  > Cancelar</a>
          </template>
          <template v-else-if="datos.item.Status == 'canceled'">
            <a class="btn btn-info" :href="'/acuse/'+datos.item.Id" > Info Acuse</a>
          </template>

          
      </template>
      <!--<template >
         <tr v-for="item in datos" v-bind:key="item.id" ><td>  {{ item.NoCliente }}</td></tr>
      </template>-->
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
        sortBy: 'Status',
        sortDesc: false,
        fields: [
          { key: 'actions', label: 'Actions' },
          { key: 'Status', sortable: true },
          { key: 'Id', sortable: true },
          { key: 'CfdiType', sortable: true },
          { key: 'Type', sortable: true },
          { key: 'Folio', sortable: true},
          { key: 'Serie', sortable: true },
          { key: 'TaxName', sortable: true },
          { key: 'Rfc', sortable: true },
          { key: 'RfcIssuer', sortable: true },
          { key: 'Date', sortable: true },
          { key: 'Subtotal', sortable: true },
          { key: 'Total', sortable: true },
          { key: 'Uuid', sortable: true },
          { key: 'IsActive', sortable: true },
          { key: 'PaymentMethod', sortable: true },

        ],perPage: 800,
        currentPage: 1,
        loading:true,
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

              
                axios.get('/todas-facturas')
                    .then( res => {
                        this.datos = res.data;
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

