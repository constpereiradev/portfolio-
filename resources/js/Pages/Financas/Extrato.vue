<template>

    <div class="container">
        <div class="col-sm-12">
            <div class="row">
                <div class="col-sm-12">
                    <h2>Extrato</h2>
                </div>
            </div>

            <div class="row bg-yellow rounded p-3">
                <div class="col-sm-6">
                    <div class="row">Lorem Ipsum</div>
                    <div class="row">5 de Out 2023</div>
                </div>

                <div class="col-sm-6">
                    <div class="row">
                        + R$ 100,00
                    </div>
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