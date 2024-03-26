<template>
    <app-layout title="Meu Perfil">
        <template #header>
            <h2 class="h4 font-weight-bold"></h2>
        </template>
        <div class="container-fluid">
            <div class="row mb-3">
                <div class="card">
                    <div class="card-body table-responsive">
                        
                    </div>
                </div>
            </div>

            
        </div>

    </app-layout>
</template>
  
<script>
import { defineComponent } from 'vue';
import AppLayout from '@/Layouts/AppLayout.vue';
import { Link } from '@inertiajs/inertia-vue3';

export default defineComponent({
    props: [''],

    components: {
        AppLayout,
        Link

    },
    methods: {
       
    },
    data() {
        return {
            
        }
    }
})
</script>
  