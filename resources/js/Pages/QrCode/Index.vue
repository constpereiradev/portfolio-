<template>
    <app-layout title="Meu Perfil">
        <template #header>
            <h2 class="h4 font-weight-bold"></h2>
        </template>
        <div class="container-fluid">
            <div class="row mb-3">
                <div class="card">
                    <div class="card-body table-responsive">
                        <!--
                        <div class="row">
                            <div class="col-mb-12 mt-4 mb-4">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <p class="text-secondary">Preencha os dados e gere o QRCode</p>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-11">
                                        <input id="buscar" type="text" v-model="formQrCode" placeholder="Seu texto..."
                                            class="form-control" />
                                    </div>
                                    <div class="col-sm-1 justify-content-end d-flex">
                                        <button @click="gerarQrCode" class="btn btn-success">
                                            <i class="bi bi-qr-code"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        -->
                    </div>
                </div>
            </div>

            <!-- testes qrcode-->
            <template>
                <qrcode-vue :value="this.value" :size="this.size" level="H" />
            </template>
        </div>

    </app-layout>
</template>
  
<script>
import { defineComponent } from 'vue'
import axios from 'axios';
import AppLayout from '@/Layouts/AppLayout.vue'
import { Link } from '@inertiajs/inertia-vue3';
import QrcodeVue from 'qrcode.vue'

export default defineComponent({
    props: [''],

    components: {
        AppLayout,
        Link,
        QrcodeVue,

    },
    methods: {
        gerarQrCode() {
            axios.get(route('qrcode.gerar', {
                qrCode: this.formQrCode
            }))
                .then((response => {
                }))
        }
    },
    data() {
        return {
            value: 'https://example.com',
            size: 300,
        }
    }
})
</script>
  