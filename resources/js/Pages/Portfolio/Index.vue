<template style="font-family:Roboto">
    <div class="container-fluid">
        <div class="row">
            <nav class="navbar">
                <div class="container-fluid">
                    <div class="col-sm-6 ps-5 mt-5 ms-5">
                        <a class="navbar-brand" href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" fill="currentColor"
                                class="bi bi-braces" viewBox="0 0 16 16">
                                <path
                                    d="M2.114 8.063V7.9c1.005-.102 1.497-.615 1.497-1.6V4.503c0-1.094.39-1.538 1.354-1.538h.273V2h-.376C3.25 2 2.49 2.759 2.49 4.352v1.524c0 1.094-.376 1.456-1.49 1.456v1.299c1.114 0 1.49.362 1.49 1.456v1.524c0 1.593.759 2.352 2.372 2.352h.376v-.964h-.273c-.964 0-1.354-.444-1.354-1.538V9.663c0-.984-.492-1.497-1.497-1.6M13.886 7.9v.163c-1.005.103-1.497.616-1.497 1.6v1.798c0 1.094-.39 1.538-1.354 1.538h-.273v.964h.376c1.613 0 2.372-.759 2.372-2.352v-1.524c0-1.094.376-1.456 1.49-1.456V7.332c-1.114 0-1.49-.362-1.49-1.456V4.352C13.51 2.759 12.75 2 11.138 2h-.376v.964h.273c.964 0 1.354.444 1.354 1.538V6.3c0 .984.492 1.497 1.497 1.6" />
                            </svg>
                        </a>
                    </div>
                    <div class="col-sm-6 pe-5 justify-content-end d-flex">

                    </div>
                </div>
            </nav>
        </div>

        <!-- Main -->
        <div class="row mb-3 main" style="height: 100vh;">
            <div class="col-sm-12 align-self-center">
                <div class="row">
                    <div class="col-sm-6 align-self-center">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="row justify-content-center d-flex">
                                    <div class="col-sm-6 justify-content-end d-flex">
                                        <img style="width: 200px;" class="justify-content-center d-flex"
                                            src="https://ouch-cdn2.icons8.com/1QV4n0XVw5R9CmaO-gNNM0m90jBvOgt4Igeuil9FxrQ/rs:fit:368:486/czM6Ly9pY29uczgu/b3VjaC1wcm9kLmFz/c2V0cy9wbmcvNjc2/L2Q1NDRiYTQxLTk3/M2MtNGMwNi04Yjlh/LWQwZmI3YThjZDg5/NC5wbmc.png"
                                            alt="">
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <h1 class="fw-bold">Oi, eu sou Amanda Pereira</h1>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <h4 class="text-secondary">Eu desenvolvo Sistemas Web</h4>
                                            </div>
                                        </div>
                                        <div class="row mt-5">
                                            <div class="col-sm-12">
                                                <a href="#servicos">
                                                    <button id="btn-conhecer"
                                                        class="btn rounded fw-bold ps-5 pe-5 fs-4">Conhecer</button>
                                                </a>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="row justify-content-center d-flex">
                            <div class="col-sm-12 ">
                                <pre class="justify-content-start d-flex fw-bold"
                                    style="overflow-x: auto; width: 100%;white-space: pre-wrap;">
                            namespace AmandaPereira;

                            class About extends Me
                            {
                                public function getCurrentWorkplace()
                                {
                                    return [
                                        'workplace' => [
                                            'company' => 'Bomix',
                                            'position' => 'Jovem Aprendiz'   
                                            'since' => '04/09/2023'      
                                        ]
                                    ];
                                }

                                public function getDailyKnowledge()
                                {
                                    return [
                                        Php::class,
                                        Javascript::class,
                                        Laravel::class,
                                        Vuejs::class,
                                        Bootstrap::class
                                    ];
                                }

                                public function getCurrentCollege()
                                {
                                    return [
                                        'university' => 'UFMS',
                                        'semester' => '1°',
                                        'modality' => 'EaD'
                                    ];
                                }

                                public function getStatus()
                                {
                                    return 'Open to learn and work.';
                                }
                            }
                            
                                    </pre>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Serviços e tecnologias -->
        <div class="row mb-3 servicos p-5 bg-white text-black" id="servicos" style="height: 650px;">
            <div class="col-sm-12">
                <div class="row">
                    <div class="col-sm-6 justify-content-center d-flex">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="row">
                                    <div class="col-sm-12 fw-bold fs-1">
                                        Serviços
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-2 linha rounded border ms-3 border-danger fw-bold">

                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-12 fs-4 text-secondary">
                                        Precisa de um site pessoal, comercial ou uma landing page?
                                        <br>
                                        Entre em contato comigo!
                                    </div>
                                </div>
                                <div class="row mb-5" style="margin-top: 100px;">
                                    <div class="col-sm-12">
                                        <div class="row">
                                            <div @mouseover="this.laravel = true;" @mouseleave="this.laravel = false"
                                                class="col-sm-3">
                                                <img style="height: 60px"
                                                    src="https://static-00.iconduck.com/assets.00/laravel-icon-497x512-uwybstke.png"
                                                    alt="">
                                            </div>
                                            <div @mouseover="this.bootstrap = true;"
                                                @mouseleave="this.bootstrap = false" class="col-sm-3">
                                                <img style="height: 60px"
                                                    src="https://cdn-icons-png.flaticon.com/512/5968/5968672.png"
                                                    alt="">
                                            </div>
                                            <div @mouseover="this.vue = true;" @mouseleave="this.vue = false"
                                                class="col-sm-3">
                                                <img style="height: 60px"
                                                    src="https://static-00.iconduck.com/assets.00/vue-icon-512x439-f6q4zral.png"
                                                    alt="">
                                            </div>
                                            <div @mouseover="this.sql = true;" @mouseleave="this.sql = false"
                                                class="col-sm-3">
                                                <img style="height: 70px"
                                                    src="https://cdn-icons-png.flaticon.com/512/4492/4492311.png"
                                                    alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-5">
                                    <div v-if="this.laravel == false && this.bootstrap == false && this.vue == false && this.sql == false"
                                        class="col-sm-12">
                                        <div class="row justify-content-center d-flex">
                                            <div class="col-sm-12">
                                                <div class="row">
                                                    <div class="col-sm-12 justify-content-center d-flex"
                                                        style="margin-top: 5s0px;">
                                                        <svg width="100px" height="100px" viewBox="0 0 64 64"
                                                            xmlns="http://www.w3.org/2000/svg" fill="black"
                                                            stroke="#ffffff" transform="rotate(270)">
                                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                                stroke-linejoin="round">
                                                            </g>
                                                            <g id="SVGRepo_iconCarrier">
                                                                <rect x="16" y="8" width="32" height="48" rx="16">
                                                                </rect>
                                                                <line x1="32" y1="16" x2="32" y2="28"></line>
                                                            </g>
                                                        </svg>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12 fs-5 text-secondary">
                                                        Passe o mouse sob às tecnologias para ver a descrição de cada
                                                        uma.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="row mb-5 justify-content-center d-flex">
                            <div class="col-sm-5">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <h1><i class="bi bi-code"></i></h1>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 fw-bold fs-4">
                                        Desenvolvimento de sites
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 fs-5 text-secondary">
                                        Você me manda sua ideia e alinhamos a melhor solução.
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-5">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <h1><i class="bi bi-file-text"></i></h1>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 fw-bold fs-4">
                                        Documentação
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 fs-5 text-secondary">
                                        Documentação técnica e manuais do usuário atualizados.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-5 justify-content-center d-flex">
                            <div class="col-sm-5">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <h1><i class="bi bi-code"></i></h1>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 fw-bold fs-4">
                                        Landing Pages
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 fs-5 text-secondary">
                                        Sites simples de uma página só, ideais para conquistar clientes.
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-5">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <h1><i class="bi bi-cart3"></i></h1>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 fw-bold fs-4">
                                        ECommerce
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 fs-5 text-secondary">
                                        Aplicação para venda de produtos on-line.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div v-if="this.laravel" class="row mb-5 justify-content-center d-flex">
                            <div class="col-sm-10">
                                <div class="row justify-content-center d-flex">
                                    <div class="col-sm-12">
                                        <div class="row">
                                            <div class="col-sm-12 fs-4 fw-bold">
                                                Laravel
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12 fs-5 text-secondary">
                                                Laravel é um framework PHP gratuito e de código aberto,
                                                utilizado no desenvolvimento de sistemas para web. Algumas de suas
                                                principais características são permitir a escrita de um código mais
                                                simples e legível, e
                                                suporte a recursos avançados que agilizam o processo de desenvolvimento.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div v-if="this.bootstrap" class="row mb-5 justify-content-center d-flex">
                            <div class="col-sm-10">
                                <div class="row justify-content-center d-flex">
                                    <div class="col-sm-12">
                                        <div class="row">
                                            <div class="col-sm-12 fs-4 fw-bold">
                                                Bootstrap
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12 fs-5 text-secondary">
                                                Bootstrap é um framework front-end que fornece estruturas de CSS
                                                para a
                                                criação
                                                de sites e aplicações responsivas de forma rápida e simples.
                                                Além disso,
                                                pode
                                                lidar com sites de desktop e páginas de dispositivos móveis da
                                                mesma forma.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div v-if="this.sql" class="row mb-5 justify-content-center d-flex">
                            <div class="col-sm-10">
                                <div class="row justify-content-center d-flex">
                                    <div class="col-sm-12">
                                        <div class="row">
                                            <div class="col-sm-12 fs-4 fw-bold">
                                                Sql
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12 fs-5 text-secondary">
                                                A Linguagem de consulta estruturada (SQL) é uma linguagem de
                                                programação
                                                para
                                                armazenar e processar informações em um banco de dados
                                                relacional.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div v-if="this.vue" class="row mb-5 justify-content-center d-flex">
                            <div class="col-sm-10">
                                <div class="row justify-content-center d-flex">
                                    <div class="col-sm-12">
                                        <div class="row">
                                            <div class="col-sm-12 fs-4 fw-bold">
                                                Vue
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12 fs-5 text-secondary">
                                                O Vue. js é um framework JavaScript para construir interfaces de
                                                usuário.
                                                Ele
                                                utiliza HTML, CSS e JavaScript padrão e oferece um modelo de
                                                programação
                                                declarativo e baseado em componentes que auxilia no
                                                desenvolvimento
                                                eficiente de
                                                interfaces, independentemente de sua complexidade.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!-- Projetos -->
        <div class="row mb-3 pt-5 projetos">
            <div class="col-sm-12">
                <div class="row">
                    <h2 class="justify-content-center d-flex fw-bold">Portfólio</h2>
                </div>
                <div class="row">
                    <h3 class="justify-content-center d-flex">Projetos mais recentes</h3>
                </div>
                <div class="row p-5 justify-content-center d-flex">
                    <div class="col-sm-1 ustify-content-center d-flex align-items-center">
                        <button class="btn" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                            <h2><i class="bi bi-arrow-left"></i></h2>
                        </button>
                    </div>
                    <div class="col-sm-5">
                        <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <div class="card-body bg-white shadow-sm justify-content-center d-flex"
                                        style="height: 300px;">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="row mb-3">
                                                            <div class="col-sm-12 justify-content-center d-flex fs-4">
                                                                Projeto 1
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-12 justify-content-center d-flex">

                                                                <Link :href="route('portfolio.landing')">
                                                                <button id="projeto1"
                                                                    class="btn btn-secondary rounded ps-5 pe-5">Ver</button>
                                                                </Link>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div id="projeto2"
                                        class="card-body bg-white shadow-sm justify-content-center d-flex"
                                        style="height: 300px;">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <h4>Projeto 2</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div id="projeto3"
                                        class="card-body bg-white shadow-sm justify-content-center d-flex"
                                        style="height: 300px;">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <h4>Projeto 3</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-sm-1 ustify-content-center d-flex align-items-center">
                        <button class="btn" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                            <h2><i class="bi bi-arrow-right"></i></h2>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Contato -->
        <div class="row contato justify-content-center d-flex" style="margin-bottom:200px;margin-top:200px;">
            <div class="col-sm-6">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6 justify-content-end d-flex">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="row">
                                        <div class="col-sm-12 fw-bold fs-2">
                                            Quer fazer um novo projeto?
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-12 fs-5">
                                            Entre em contato e vamos desenvolver soluções!
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <button class="btn btn-success rounded fw-bold">Entre em
                                                contato</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="row">
                                <div class="col-sm-12  justify-content-end d-flex">
                                    <img style="height: 200px"
                                        src="https://ouch-cdn2.icons8.com/u3JhTHf6mnErMLmvrDB-5dlf89u-fNFLED5Q_mCgj-o/rs:fit:368:447/czM6Ly9pY29uczgu/b3VjaC1wcm9kLmFz/c2V0cy9wbmcvOTM1/LzAwYmFlMTQyLTM3/Y2EtNDlkNS04OTVk/LWNhOGZlNmE1MDg4/OS5wbmc.png"
                                        alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Experiências -->
        <div class="row mb-3 experiencias">
            <div class="col-sm-12">

            </div>
        </div>

        <!-- Informações acadêmicas -->
        <div class="row mb-5 informacoes-academicas">
            <div class="col-sm-12">

            </div>
        </div>

        <!-- Footer -->
        <div class="row mt-5 footer p-5 align-items-center d-flex" style="background-color: #0B1726;">
            <div class="col-sm-12 justify-content-center d-flex">
                <div class="row mb-3">
                    <div class="col-sm-12">
                        <div class="row">
                            <div class="col-sm-4 justify-content-center d-flex">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="white"
                                    class="bi bi-linkedin" viewBox="0 0 16 16">
                                    <path
                                        d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854zm4.943 12.248V6.169H2.542v7.225zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248S2.4 3.226 2.4 3.934c0 .694.521 1.248 1.327 1.248zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016l.016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225z" />
                                </svg>
                            </div>
                            <div class="col-sm-4 justify-content-center d-flex">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="white"
                                    class="bi bi-github" viewBox="0 0 16 16">
                                    <path
                                        d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27s1.36.09 2 .27c1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.01 8.01 0 0 0 16 8c0-4.42-3.58-8-8-8" />
                                </svg>
                            </div>
                            <div class="col-sm-4 justify-content-center d-flex">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="white"
                                    class="bi bi-envelope" viewBox="0 0 16 16">
                                    <path
                                        d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1zm13 2.383-4.708 2.825L15 11.105zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741M1 11.105l4.708-2.897L1 5.383z" />
                                </svg>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { Link } from '@inertiajs/inertia-vue3';
import { defineComponent } from 'vue';


export default defineComponent({
    components: {
        Link,
    },
    mounted() {

    },
    methods: {
    },
    props: {},
    data() {
        return {
            laravel: false,
            bootstrap: false,
            vue: false,
            sql: false,

        };
    },
});
</script>

<style>
#btn-conhecer {
    background-color: white;
    color: black;
}

#btn-conhecer:hover {
    background-color: rgb(197, 196, 196);
    transition: 3s;
}

.servicos {
    scroll-behavior: smooth;
    overflow-y: scroll;
}
</style>
