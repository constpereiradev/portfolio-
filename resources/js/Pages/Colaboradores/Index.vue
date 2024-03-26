<template>
    <app-layout title="Colaboradores" :darkMode="$page.props.user.dark_mode">
        <template #header>
        </template>

        <div class="container-fluid">
            <!-- Modal de registro de novo colaborador -->
            <div class="row mb-3">
                <div class="col-md-3" data-bs-toggle="modal" data-bs-target="#novoColaboradorModal">
                    <div class="text-center btn-dash">
                        <div class="card-links shadow-sm p-4 mb-1">
                            <h1><i class="bi bi-person-plus-fill"></i></h1>
                            <h5>Novo cadastro</h5>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal de registro de novo colaborador -->
            <div class="row">
                <div class="modal fade" id="novoColaboradorModal" tabindex="-1"
                    aria-labelledby="novoColaboradorModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel"></h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row mb-3">
                                    <div class="col-sm-12">
                                        <label class="form-label fw-bold">Nome</label>
                                        <input class="form-control" type="text" name="" id=""
                                            v-model="novoColaborador.nome">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-6">
                                        <label class="form-label fw-bold">Cargo</label>
                                        <input class="form-control" type="text" name="" id=""
                                            v-model="novoColaborador.cargo">
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="form-label fw-bold">Setor</label>
                                        <input class="form-control" type="text" name="" id=""
                                            v-model="novoColaborador.setor">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-6">
                                        <label class="form-label fw-bold">Salário</label>
                                        <input class="form-control" type="text" name="" id=""
                                            v-model="novoColaborador.salario">
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="form-label fw-bold">Status</label>
                                        <VueMultiselect v-model="novoColaborador.status"
                                            :placeholder="'Escolha uma opção'" :selectedLabel="'Selecionado'"
                                            :deselectLabel="'Remover'" :selectLabel="'Selecionar'" :options="status">
                                        </VueMultiselect>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                <button @click="cadastrarColaborador" type="button" data-bs-dismiss="modal"
                                    class="btn btn-primary">Cadastrar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="card-body bg-white shadow-sm">
                    <div class="row mb-3">
                        <div class="col-sm-4">
                            <input v-model="this.formColaborador.nome" @keyup="pesquisarColaborador" placeholder="Nome"
                                class="form-control" type="text" name="" id="">
                        </div>
                        <div class="col-sm-4">
                            <input v-model="this.formColaborador.setor" @keyup="pesquisarColaborador"
                                placeholder="Setor" class="form-control" type="text" name="" id="">
                        </div>
                        <div class="col-sm-3">
                            <VueMultiselect v-model="this.formColaborador.status" :placeholder="'Status'"
                                :selectedLabel="'Selecionado'" :deselectLabel="'Remover'" :selectLabel="'Selecionar'"
                                :options="status">
                            </VueMultiselect>
                        </div>
                        <div class="col-sm-1 justify-content-end d-flex">
                            <button @click="pesquisarColaborador" class="btn btn-success">
                                <h5s><i class="bi bi-search"></i></h5s>
                            </button>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-12">
                            <div class="table table-striped table-responsive table-padrao">
                                <table class="table align-middle">
                                    <thead>
                                        <tr>
                                            <th scope="col">Id</th>
                                            <th scope="col">Nome</th>
                                            <th scope="col">Setor</th>
                                            <th scope="col">Cargo</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Visualizar</th>
                                            <th scope="col">Editar</th>
                                            <th scope="col">Deletar</th>
                                        </tr>
                                    </thead>
                                    <tbody v-if="!loading">
                                        <tr v-for="colaborador in colaboradores">
                                            <td>{{ colaborador.id }}</td>
                                            <td>{{ colaborador.nome }}</td>
                                            <td>{{ colaborador.setor }}</td>
                                            <td>{{ colaborador.cargo }}</td>
                                            <td>{{ colaborador.status }}</td>
                                            <td>
                                                <!-- Visualizar -->
                                                <button @click="visualizarColaborador(colaborador.id)"
                                                    class="btn btn-primary btn-icone">
                                                    <h5><i class="bi bi-eye-fill justify-content-center d-flex"></i>
                                                    </h5>
                                                </button>
                                            </td>
                                            <td>
                                                <!-- Editar -->
                                                <button @click="limparCampos(colaborador)" data-bs-toggle="modal"
                                                    data-bs-target="#editarColaboradorModal"
                                                    class="btn btn-primary btn-icone">
                                                    <h5><i
                                                            class="bi bi-pencil-square justify-content-center d-flex"></i>
                                                    </h5>
                                                </button>
                                            </td>
                                            <td>
                                                <!-- Apagar -->
                                                <button data-bs-toggle="modal" data-bs-target="#deletarColaboradorModal"
                                                    class="btn btn-danger btn-icone">
                                                    <h5><i class="bi bi-trash3 justify-content-center d-flex"></i></h5>
                                                </button>
                                            </td>

                                            <!-- Modal apagar -->
                                            <div class="modal fade" id="deletarColaboradorModal" tabindex="-1"
                                                aria-labelledby="deletarColaboradorModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel"></h1>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row mb-3">
                                                                <div class="col-sm-12 text-center">
                                                                    <h1><i class="bi bi-exclamation-triangle"></i></h1>
                                                                </div>
                                                            </div>
                                                            <div class="row mb-3">
                                                                <div class="col-sm-12 text-center">
                                                                    <h4 class="fw-bold">Tem certeza que deseja deletar o
                                                                        funcionário?</h4>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Cancelar</button>
                                                            <button @click="deletarColaborador(colaborador.id)"
                                                                data-bs-dismiss="modal" type="button"
                                                                class="btn btn-danger">Deletar</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Modal editar -->
                                            <div class="modal fade" id="editarColaboradorModal" tabindex="-1"
                                                aria-labelledby="editarColaboradorModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel"></h1>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row mb-3">
                                                                <div class="col-sm-12">
                                                                    <label class="form-label fw-bold">Nome</label>
                                                                    <input class="form-control" type="text" name=""
                                                                        id="" v-model="this.colaborador.nome">
                                                                </div>
                                                            </div>
                                                            <div class="row mb-3">
                                                                <div class="col-sm-6">
                                                                    <label class="form-label fw-bold">Cargo</label>
                                                                    <input class="form-control" type="text" name=""
                                                                        id="" v-model="this.colaborador.cargo">
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <label class="form-label fw-bold">Setor</label>
                                                                    <input class="form-control" type="text" name=""
                                                                        id="" v-model="this.colaborador.setor">
                                                                </div>
                                                            </div>
                                                            <div class="row mb-3">
                                                                <div class="col-sm-6">
                                                                    <label class="form-label fw-bold">Salário</label>
                                                                    <input class="form-control" type="text" name=""
                                                                        id="" v-model="this.colaborador.salario">
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <label class="form-label fw-bold">Status</label>
                                                                    <VueMultiselect v-model="this.colaborador.status"
                                                                        :placeholder="'Escolha uma opção'"
                                                                        :selectedLabel="'Selecionado'"
                                                                        :deselectLabel="'Remover'"
                                                                        :selectLabel="'Selecionar'" :options="status">
                                                                    </VueMultiselect>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Cancelar</button>
                                                            <button @click="editarColaborador(colaborador.id)"
                                                                type="button" class="btn btn-primary">Editar</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </tr>
                                    </tbody>
                                    <tbody v-else>
                                        <tr>
                                            <td colspan="9">
                                                <div class="d-flex justify-content-center">
                                                    <div class="spinner-border text-primary"
                                                        style="width: 3rem; height: 3rem;" role="status">
                                                        <span class="visually-hidden">Loading...</span>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </app-layout>
</template>

<script>
import { defineComponent } from "vue"
import AppLayout from "@/Layouts/AppLayout.vue"
import { Link } from '@inertiajs/inertia-vue3'
import VueMultiselect from 'vue-multiselect';
import axios from "axios";

export default defineComponent({
    components: {
        AppLayout,
        Link,
        VueMultiselect,
        axios
    },
    mounted() {
        this.pesquisarColaborador();
    },
    methods: {
        async pesquisarColaborador() {
            this.loading = true;
            await axios.post(route('colaborador.pesquisar', {
                setor: this.formColaborador.setor,
                nome: this.formColaborador.nome,
                cargo: this.formColaborador.cargo,
                status: this.formColaborador.status,
            }))
                .then((response => {
                    this.loading = false;
                    this.colaboradores = response.data.colaboradores;
                    console.log(response);
                }))


        },
        cadastrarColaborador() {
            axios.post(route('colaborador.store', {
                nome: this.novoColaborador.nome,
                cargo: this.novoColaborador.cargo,
                setor: this.novoColaborador.setor,
                salario: this.novoColaborador.salario,
                status: this.novoColaborador.status,
            })).then(this.pesquisarColaborador(),
                this.novoColaborador = '',
            )
        },
        visualizarColaborador(id) {
            this.$inertia.get(route('colaborador.show', { id }));
        },
        editarColaborador(id) {
            axios.post(route('colaborador.update', {
                id: id,
                nome: this.colaborador.nome,
                cargo: this.colaborador.cargo,
                setor: this.colaborador.setor,
                salario: this.colaborador.salario,
                status: this.colaborador.status,
            }))
                .then((response => {
                    console.log(response);
                }))
        },
        deletarColaborador(id) {
            axios.post(route('colaborador.delete', { id }))
                .then(
                    this.pesquisarColaborador()
                )
        },
        limparCampos(colaborador) {
            this.colaborador.nome = colaborador.nome;
            this.colaborador.cargo = colaborador.cargo;
            this.colaborador.setor = colaborador.setor;
            this.colaborador.salario = colaborador.salario;
            this.colaborador.status = colaborador.status;
        }
    },
    props: [],
    data() {
        return {
            formColaborador: {
                nome: '',
                cargo: '',
                setor: '',
                salario: '',
                status: '',
            },
            colaboradores: [''],
            novoColaborador: {
                nome: '',
                cargo: '',
                setor: '',
                salario: '',
                status: ''
            },
            colaborador: {
                nome: '',
                cargo: '',
                setor: '',
                salario: '',
                status: ''
            },
            status: [
                'Ativo',
                'Férias',
                'Atestado',
                'Desligado',
            ],
            loading: false,
        };
    },
});
</script>

<style src="vue-multiselect/dist/vue-multiselect.css"></style>