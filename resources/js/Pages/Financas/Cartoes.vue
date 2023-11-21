<template>
    <div class="container">
        <div class="col-sm-12">
            <div class="row">
                <div class="col-sm-12">
                    <h2>Cartões</h2>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-4">
                    <button  @click="this.cartao.frente == true">Nubank</button>
                </div>

                <div class="col-sm-4">
                    <button>Inter</button>
                </div>

                <div class="col-sm-4">
                    <button>Adicionar</button>
                </div>
            </div>

            <div class="row mt-5">
                <!-- Cartão frente -->
                <div v-if="cartao.frente == true" class="row d-flex align-items-center justify-content-center">
                    <div class="col-sm-6">
                        <div class="card-body justify-content-center mb-5"
                            style="height: 250px;  background-color: #E0D56E;">
                            <div class="row mb-5">
                                <div class="col-sm-12">
                                    <div class="fs-3 row justify-content-center">
                                        Nubank
                                    </div>

                                    <div class="row fs-4 justify-content-center">
                                        0000 0000 0000 0000
                                    </div>

                                    <div class="row fs-5 justify-content-center">
                                        00/00
                                    </div>

                                    <div class="row fs-5 justify-content-center">
                                        Lorem Ipsum Lorem
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="col-sm-12 justify-content-center d-flex align-items-center">
                        <button class="btn" @click="virarCartao">
                            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor"
                                class="bi bi-arrow-repeat" viewBox="0 0 16 16">
                                <path
                                    d="M11.534 7h3.932a.25.25 0 0 1 .192.41l-1.966 2.36a.25.25 0 0 1-.384 0l-1.966-2.36a.25.25 0 0 1 .192-.41zm-11 2h3.932a.25.25 0 0 0 .192-.41L2.692 6.23a.25.25 0 0 0-.384 0L.342 8.59A.25.25 0 0 0 .534 9z" />
                                <path fill-rule="evenodd"
                                    d="M8 3c-1.552 0-2.94.707-3.857 1.818a.5.5 0 1 1-.771-.636A6.002 6.002 0 0 1 13.917 7H12.9A5.002 5.002 0 0 0 8 3zM3.1 9a5.002 5.002 0 0 0 8.757 2.182.5.5 0 1 1 .771.636A6.002 6.002 0 0 1 2.083 9H3.1z" />
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Cartão verso -->
                <div v-if="cartao.verso" class="row d-flex align-items-center justify-content-center">
                    <div class="col-sm-6">
                        <div class="card-body justify-content-center mb-5"
                            style="height: 250px; background-color: #E0D56E;">
                            <div class="row mb-5">
                                <div class="col-sm-12">
                                    <div class="row justify-content-center fs-3">
                                        Nubank
                                    </div>

                                    <div class="row justify-content-center">
                                        <div class="col-sm-12 p-2 mb-5 mt-4" style="background-color: #E0C76E;">
                                            <span class="invisible">
                                                a
                                            </span>
                                        </div>

                                        <div class="col-sm-12 fs-4">
                                            000
                                        </div>
                                    </div>


                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="col-sm-12 justify-content-center d-flex align-items-center">
                        <button class="btn" @click="virarCartao">
                            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor"
                                class="bi bi-arrow-repeat" viewBox="0 0 16 16">
                                <path
                                    d="M11.534 7h3.932a.25.25 0 0 1 .192.41l-1.966 2.36a.25.25 0 0 1-.384 0l-1.966-2.36a.25.25 0 0 1 .192-.41zm-11 2h3.932a.25.25 0 0 0 .192-.41L2.692 6.23a.25.25 0 0 0-.384 0L.342 8.59A.25.25 0 0 0 .534 9z" />
                                <path fill-rule="evenodd"
                                    d="M8 3c-1.552 0-2.94.707-3.857 1.818a.5.5 0 1 1-.771-.636A6.002 6.002 0 0 1 13.917 7H12.9A5.002 5.002 0 0 0 8 3zM3.1 9a5.002 5.002 0 0 0 8.757 2.182.5.5 0 1 1 .771.636A6.002 6.002 0 0 1 2.083 9H3.1z" />
                            </svg>
                        </button>
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

    components: {
        AppLayout,
    },
    methods: {

        mostrarCartao(){
            this.cartao.frente == true;
        },

        virarCartao() {

            if (this.cartao.frente == true) {
                this.cartao.frente = false;
                this.cartao.verso = true;
            } else if (this.cartao.verso == true) {
                this.cartao.frente = true;
                this.cartao.verso = false;
            }
        },
    },
    data() {
        return {
            cartao: {
                frente: false,
                verso: false
            }
        }
    },

});

</script>