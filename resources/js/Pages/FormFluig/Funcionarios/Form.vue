<template>
    <app-layout title="Formulario Funcionarios">
        <template #header>
            <h2 class="h4 font-weight-bold">Formulario Funcionarios</h2>
        </template>
        <div class="container col-sm-12" id="app">
            <div class="card-container row">
                <form>
                    <div class="mb-3">
                        <label for="nomefuncionario" class="form-label">Nome</label>
                        <input type="text" id="nomefuncionario" class="form-control" placeholder="Nome do funcionário" v-model="form.nomefuncionario">
                    </div>
                    <div class="mb-3">
                        <label for="matriculafuncionario" class="form-label">Matricula</label>
                        <input type="text" id="matriculafuncionario" class="form-control" placeholder="Matrícula do funcionário" v-model="matriculafuncionario">
                    </div>
                    <div class="mb-3">
                        <label for="funcaofuncionario" class="form-label">Função</label>
                        <input type="text" id="funcaofuncionario" class="form-control" placeholder="Função do funcionário"  v-model="form.funcaofuncionario">
                    </div>

                    <button type="submit" class="btn btn-primary" @click="submit">Cadastrar</button>
                </form>
            </div>
        </div>
    </app-layout>
</template>

<script>
import { defineComponent } from "vue";
import AppLayout from "@/Layouts/AppLayout.vue";

export default defineComponent({


    components: {  
        AppLayout,

    },
    methods: {
        submit(){

            if(this.$inertia.post(route('rota', this.form))){
                console.log('Sucesso na requisição.');
            }else {
                console.log('Erro na requisição.')
            }

        }, 

    },
    props: {

    },
    data (){
        return {
            form: {
                nomefuncionario: null,
                matriculafuncionario: null,
                funcaofuncionario: null,
            }
        }
    }


})

</script>