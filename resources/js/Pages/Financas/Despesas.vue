<template>

    <div class="container">
        <div class="col-sm-12">
            <div class="row">
                <div class="col-sm-12">
                    <h2>Despesas</h2>
                </div>
            </div>

           <div class="row">
                <div class="col-sm-3">
                    <button class="btn btn-primary">
                        R$ 100,00
                    </button>
                </div>

                <div class="col-sm-3">
                    <button class="btn btn-primary">
                        R$ 75,00
                    </button>
                </div>

                <div class="col-sm-3">
                    <button class="btn btn-primary">
                        Adicionar
                    </button>
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