<template>
  <app-layout title="Dashboard" :darkMode="$page.props.user.dark_mode">
    <template #header>
    </template>

    <div class="row dashboard-mt">
      <div class="container">
        <div class="row mb-3">
          <div class="col-md-3">
            <div class="text-center btn-dash">
              <Link :href="route('codigo.barras.index')">
              <div class="card-links shadow-sm p-4 mb-1">
                <h1><i class="bi bi-upc-scan"></i></h1>
                <h5>Gerador cod. de barras</h5>
                
              </div>
              </Link>
            </div>
          </div>
          <div class="col-md-3">
            <div class="text-center btn-dash">
              <Link :href="route('qrcode.index')">
              <div class="card-links shadow-sm p-4 mb-1">
                <h1><i class="bi bi-qr-code-scan"></i></h1>
                <h5>Gerador de QR code</h5>
              </div>
              </Link>
            </div>
          </div>
          <div class="col-md-3">
            <div class="text-center btn-dash">
              <Link :href="route('colaborador.index')">
              <div class="card-links shadow-sm p-4 mb-1">
                <h1><i class="bi bi-database-fill-add"></i></h1>
                <h5>CRUD</h5>
              </div>
              </Link>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card-body bg-white shadow-sm border-bottom rounded-top table-responsive">
          <div class="row">
            <div class="col-md-12 text-center">
              <Link :href="route('profile.show')" v-if="$page.props.controllersAccess.formsView == 1">
              <img v-if="$page.props.user.profile_photo_path" class="rounded-circle" width="100" height="100"
                :src="'https://192.168.254.74/bomixsmp/storage/' + $page.props.user.profile_photo_path"
                :alt="$page.props.user.name" style="margin-right: 10px;">
              <img v-else class="rounded-circle" width="100" height="100" :src="$page.props.user.profile_photo_url
                " :alt="$page.props.user.name" style="margin-right: 10px;">
              </Link>
            </div>
            <div class="col-md-12 text-center mt-4">
              <h5>{{ $page.props.user.name }}</h5>
            </div>
            <div class="col-md-6 text-center mt-2">
              <b>Coligada:</b>
              {{ $page.props.user.coligada }}
            </div>
            <div class="col-md-6 text-center mt-2">
              <b>Filial:</b>
              {{ $page.props.user.filial }}
            </div>

          </div>
        </div>

        <div class="text-center btn-dash mt-3">
          <Link :href="route('forms.dashboard')" v-if="$page.props.controllersAccess.formsView == 1">
          <div class="card-links shadow-sm p-4 mb-1">
            <h1><i class="bi bi-card-checklist"></i></h1>
            <h5>Requisições</h5>
          </div>
          </Link>
        </div>

        <!-- <div class="accordion shadow-sm" id="menuAcordeon">
          <div class="accordion-item" v-if="$page.props.controllersAccess.formsView == 1">
            <h2 class="accordion-header">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#collapseItemdois" aria-expanded="false" aria-controls="collapseItemdois">
                <i class="bi bi-people-fill"></i> Formulários SMP
              </button>
            </h2>
            <div id="collapseItemdois" class="accordion-collapse collapse" data-bs-parent="#menuAcordeon">
              <div class="accordion-body bg-white">
                <ul class="list-group">
                  <li class="list-group-item" v-if="$page.props.controllersAccess.formAdmissaoAdd == 1">
                    <Link :href="route('form.Admissao.index')">
                    <i class="bi bi-person-plus"></i> Admissão
                    </Link>
                  </li>
                  <li class="list-group-item" v-if="$page.props.controllersAccess.formDemissaoAdd == 1">
                    <Link :href="route('form.Demissao.index')">
                    <i class="bi bi-person-dash"></i> Demissão
                    </Link>
                  </li>
                  <li class="list-group-item" v-if="$page.props.controllersAccess.formMudancaFuncaoAdd == 1">
                    <Link :href="route('form.MudancaFuncao.index')">
                    <i class="bi bi-people-fill"></i> Mudança de função
                    </Link>
                  </li>
                  <li class="list-group-item" v-if="$page.props.controllersAccess.formPromocaoAdd == 1">
                    <Link :href="route('form.Promocao.index')">
                    <i class="bi bi-person-check"></i> Promoção
                    </Link>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div> -->

      </div>

      <div class="col-md-6">
        <!-- quando não tiver nada a exibir -->
        <div v-if="opemForms.length == 0 && $page.props.notifications.length == 0" class="text-center w-100"
          style="color: #8f8f8f;">
          <h1><i class="bi bi-emoji-smile"></i></h1>
          <h5>HElloo World</h5>
        </div>
        <!-- quando não tiver nada a exibir -->

        <!-- formulários abertos -->
        <section class="px-3">
          <ul class="timeline-with-icons">
            <li class="card card-timeline bg-white shadow-sm timeline-item mb-3" v-for="notification in opemForms">
              <span class="timeline-icon">
                <button class="btn" @click="goForm(notification.id)">
                  <div class="ico-notification bg-warning">
                    <i class="bi bi-card-checklist"></i>
                  </div>
                </button>
              </span>
              <p class="timeline-notification-moni-title ">Aguardando sua aprovação:</p>
              <h5 class="fw-bold">{{ notification.form.name }} - {{ notification.id }}</h5>
              <p class="text-muted mb-2">{{ dateTask(notification.created_at) }}</p>
              <p>
                {{ notification.task }}
              </p>
            </li>

          </ul>
        </section>
        <!-- formulários abertos -->

        <!-- notificações -->
        <section class="px-3">
          <ul class="timeline-with-icons">
            <li class="card card-timeline bg-white shadow-sm timeline-item mb-3"
              v-for="notification in $page.props.notifications">

              <span class="timeline-icon">
                <button class="btn" @click="goForm(notification.form_number)">
                  <div :class="{
                    'ico-notification': notification.status == 1,
                    'ico-notification-lida': notification.status == 2
                  }">
                    <i class="bi bi-envelope-check"></i>
                  </div>
                </button>
              </span>

              <h5 class="fw-bold">{{ notification.title }}</h5>
              <p class="text-muted mb-2">{{ dateTask(notification.created_at) }}</p>
              <p>
                {{ notification.message }}
              </p>
            </li>

          </ul>
        </section>
        <!-- notificações -->




      </div>

    </div>

  </app-layout>
</template>

<script>
import { defineComponent } from "vue"
import AppLayout from "@/Layouts/AppLayout.vue"
import Welcome from "@/Jetstream/Welcome.vue"
import { Link } from '@inertiajs/inertia-vue3'

export default defineComponent({
  components: {
    AppLayout,
    Welcome,
    Link
  },
  mounted() {
    this.opemTask();
    //this.aniversariantes();

  },
  methods: {
    mesAni(mes) {
      let retorno = '';
      (mes == '1') ? retorno = 'Jan' : '';
      (mes == '2') ? retorno = 'Fev' : '';
      (mes == '3') ? retorno = 'Mar' : '';
      (mes == '4') ? retorno = 'Abr' : '';
      (mes == '5') ? retorno = 'Mai' : '';
      (mes == '6') ? retorno = 'Jun' : '';
      (mes == '7') ? retorno = 'Jul' : '';
      (mes == '8') ? retorno = 'Ago' : '';
      (mes == '9') ? retorno = 'Set' : '';
      (mes == '10') ? retorno = 'Out' : '';
      (mes == '11') ? retorno = 'Nov' : '';
      (mes == '12') ? retorno = 'Dez' : '';

      return retorno
    },
    exibeLinks() {
      (this.links == false) ? this.links = true : this.links = false
      console.log(this.links)
    },
    async opemTask() {
      this.loadingNotifications = true
      await axios.get(route('notifications.opemTask'))
        .then(response => {
          this.opemForms = response.data;
          this.loadingNotifications = false;
        }).catch(function (error) {
          console.error(error);
          this.loadingNotifications = false
        })
    },
    async aniversariantes() {
      this.loadingNotifications = true
      await axios.get(route('API.utei.birthday'))
        .then(response => {
          this.birthDays = response.data;
          this.loadingNotifications = false;
        }).catch(function (error) {
          console.error(error);
          this.loadingNotifications = false
        })
    },
    goForm(formNumber) {
      this.$inertia.get(route('form.view', formNumber), {
        preserveState: false
      })
    },
    async deleteNotification(id) {
      this.loadingNotifications = true
      await axios.get(route('notifications.delet', id))
        .then(response => {
          this.allNotification();
          this.loadingNotifications = false;
        }).catch(function (error) {
          console.error(error);
          this.loadingNotifications = false
        })
    },
    dateTask(dateIni) {
      var date = new Date(dateIni);
      var mes = '';
      (date.getMonth() == 0) ? mes = 'Jan' : '';
      (date.getMonth() == 1) ? mes = 'Fev' : '';
      (date.getMonth() == 2) ? mes = 'Mar' : '';
      (date.getMonth() == 3) ? mes = 'Abr' : '';
      (date.getMonth() == 4) ? mes = 'Mai' : '';
      (date.getMonth() == 5) ? mes = 'Jun' : '';
      (date.getMonth() == 6) ? mes = 'Jul' : '';
      (date.getMonth() == 7) ? mes = 'Ago' : '';
      (date.getMonth() == 8) ? mes = 'Set' : '';
      (date.getMonth() == 9) ? mes = 'Out' : '';
      (date.getMonth() == 10) ? mes = 'Nov' : '';
      (date.getMonth() == 11) ? mes = 'Dez' : '';

      var retorno = date.getDate() + ' ' + mes +
        ', ' + date.getFullYear() +
        ' ' + (date.getHours() + 3) +
        ':' + (date.getMinutes() < 10 ? '0' + date.getMinutes() : date.getMinutes()) + '';

      return retorno;
    },
  },
  props: ['asset'],
  data() {
    return {
      links: false,
      opemForms: [],
      birthDays: [],
    };
  },
});
</script>