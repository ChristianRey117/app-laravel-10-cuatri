<template>
    <div>
        <bootstrap-4-datatable :columns="columns" :data="rows" :filter="filter" :per-page="perPage">

        </bootstrap-4-datatable>

        <bootstrap-4-datatable-pager v-model="page" type="abbreviated"></bootstrap-4-datatable-pager>
    </div>
</template>

<script>

export default{
    data(){
        return{
            columns: [{
                label:'id',
                field: 'id',
            },
            {
                label:'nombre',
                field: 'nombre',
            },
            {
                label:'poblacion',
                field: 'poblacion',
            },
            {
                label:'Codigo',
                field: 'Codigo',
            }
        ],
        rows:[],
        page:1,
        filter:'',
        perPage:10
        }

    },
    methods:{
        showEstados:function(){
            axios.get('/estados/getEstados').then(function(response){
                this.rows = response.data;
            }.bind(this));
        }
    },
   created:function(){
    this.showEstados();
   }
}

</script>