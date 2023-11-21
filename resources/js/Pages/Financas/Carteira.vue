<template>

    <div class="container">
        <div class="col-sm-12">
            <div class="row">
                <div class="col-sm-12">
                    <h2>Carteira</h2>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-3">
                    R$ 100,00 
                </div>

                <div class="col-sm-9">
                    <i class="bi bi-pencil-square"></i>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-4">
                    <button>Extrato</button>
                </div>

                <div class="col-sm-4">
                    <button>Despesas</button>
                </div>

                <div class="col-sm-4">
                    <button>Cartões</button>
                </div>
            </div>
        </div>
    </div>  

</template>

<script>

import { defineComponent } from 'vue';
import AppLayout from "@/Layouts/AppLayout.vue"

export default defineComponent({

   components:{
       AppLayout,
   },
   methods: {

   },
   data(){
       return{

       }
   },

});

</script>