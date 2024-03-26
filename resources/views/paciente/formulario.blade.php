<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js"></script>
    <title>Formulário de paciente</title>
</head>
<body>
    
    <div class="container" id="app">
        <div class="col-sm-12">

            <div class="card mt-5">
                <div class="card-header">
                    <h5><i class="bi bi-person-vcard"></i> Cadastro de paciente</h5> 
                </div>
                <div class="card-body m-3">
                  
                    <form @submit.prevent="submit">
                        <div class="row">
                            <div class="col sm-2">
                                <label for="nome" class="form-label fw-bold mt-2">Nome</label>
                                <input type="nome" name="nome" id="nome" class="form-control" v-model="nome">
                            </div>
        
                            <div class="col sm-2">
                                <label for="sobrenome" class="form-label fw-bold mt-2 ">Sobrenome</label>
                                <input type="sobrenome" name="sobrenome" id="sobrenome" class="form-control" v-model="sobrenome">
                            </div>
                        </div>
    
                        <div class="row">
                            <div class="col sm-1">
                                <label for="telefone" class="form-label fw-bold mt-2">Telefone</label>
                                <input type="telefone" name="telefone" id="telefone" class="form-control" v-model="telefone">
                            </div>
                            <div class="col sm-1">
                                <label for="idade" class="form-label fw-bold mt-2">Idade</label>
                                <input type="idade" name="idade" id="idade" class="form-control" v-model="idade">
                            </div>
                            <div class="col sm-1">
                                <label for="sexo" class="form-label fw-bold mt-2">Sexo</label>
                                <input type="sexo" name="sexo" id="sexo" class="form-control" placeholder="Ex: F" v-model="sexo">
                            </div>
                            <div class="col sm-1">
                                <label for="dataconsulta" class="form-label fw-bold mt-2">Data da consulta</label>
                                <input type="date" name="dataconsulta" id="dataconsulta" class="form-control" v-model="dataconsulta">
                            </div>
                            
                        </div>
                        
                        <div class="row mb-2">
                            <div class="col sm-2">
                                <label for="email" class="form-label fw-bold mt-2">Email</label>
                                <input type="email" name="email" id="email" class="form-control" v-model="email">
                            </div>
    
                            <div class="col sm-2">
                                <label for="botao" class="form-label text-white">.</label>
                                <button type="button" class="btn btn-primary form-" id="botao" @click="cadastrar"><i class="bi bi-person-add"></i> Enviar</button>
                            </div>
                        </div>
                    </form>

                </div>
                
        </div>
    </div>

    <script type="module">

        import { router } from './vue.js'

        export default {
            data() {
                return {
                    form: {
                        nome: null,
                        sobrenome: null,
                        telefone: null,
                        idade: null,
                        sexo: null,
                        dataconsulta: null,
                        email: null, 
                    },
                }
            },

            methods: {
                cadastrar() {
                    router.post('/pacientes', this.form)
                },
            },
        }

        const vm = new Vue({

            el: '#app',
            data: {},
            methods: {
                cadastrar(){
                    alert('ok');
                }
            }
        })
    </script>

</body>
</html>