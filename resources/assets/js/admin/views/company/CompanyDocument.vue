<template>
<div class="card">
  <div class="card-header">
    <router-link class="btn btn-sm btn-primary" :to="{ name: 'companies-news'}">
      <i class="fa fa-arrow-left"></i>
    </router-link>
    Empresa  
  </div>
  <div class="card-body">

    <b-tabs card>
      <b-tab title="Empresa" active>
        <div class="card-body">
          <div class="col-md-6" v-if="item">
            <p class="font-weight-bold">Nombre : {{ item.name }}</p>
            <p class="font-weight-bold">Identidad : {{ item.identity }}</p>
            <p class="font-weight-bold">Direcciòn : {{ item.address }}</p>
            <p class="font-weight-bold">Telefono : {{ item.phone }}</p>
            <p class="font-weight-bold">Correo : {{ item.email }}</p>
            <p class="font-weight-bold" v-if="item.company_type">Tipo : {{ item.company_type.type }}</p>
            <p class="font-weight-bold">Estado : {{ item.status }}</p>
            <p v-if="item.status == 'ESPERA'">
              <button class="btn btn-danger" v-on:click="rechazar" type="button">Reprobar</button>
              <button class="btn btn-primary" v-on:click="aprobar" type="button">Aprobar</button>
            </p>
          </div>
          <div class="col-md-6">
            <embed  v-bind:src="item.catalogo_path" width="100%" height="500px" type='application/pdf'>
          </div>
        </div>
      </b-tab>
      <b-tab title="Documentos" >
           <b-tabs pills card vertical nav-wrapper-class="w-25">
            <b-tab :title="`Tab ${i.name}`" v-for="i in item.company_type.requeriments" :key="i.id">
              <div class="pb-2" v-for="d in item.documents" :key="d.id">
                <div v-if="d.requeriment.id == i.id" style="margin-bottom: 2px;border-bottom: 2px solid;">
                <b-btn v-b-modal.modal-center class="mb-2" v-if="d.status !== 'RECHAZADO'">Agregar Incidencia</b-btn> 
                <label class="p-2 mb-2 bg-danger text-white pull-right" role="alert" v-if="d.status === 'RECHAZADO'"> Documento Rechazado </label>
                <b-modal id="modal-center" ref="modal" centered title="Registrar incidencia" ok-only ok-title="guardar"  @ok="guardar($event,i)" v-if="d.status !== 'RECHAZADO'">
                  <form @submit="sendForm" novalidate class="mt-1">
                        <div class="form-group">
                          <label for="type">Incidencias</label>
                          <textarea class="form-control type" v-model="incidencia.description"> </textarea>
                          <div class="invalid-feedback">
                            {{errors}}
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="type">Tipo Incidencias</label>
                          <select  class="form-control type" v-model="incidencia.tipo">
                            <option v-for="option in incidencias" v-bind:value="option.id" :key="option.id">
                              {{ option.type }}
                            </option>
                          </select>
                          <div class="invalid-feedback">
                            {{errors}}
                          </div>
                        </div>
                  </form>
                </b-modal>
                <embed  v-bind:src="d.file_path" width="100%" height="500px" type='application/pdf'>
                </div>
              </div>
            </b-tab>
          </b-tabs>
       </b-tab>
        <b-tab title="Aprobaciones" >
        </b-tab>
    </b-tabs>
  </div>
</div>
</template>

<script>
import AddComponent from '../../components/AddComponent.vue'
const service = require('./../../service/company-service');
const serviceIncidence = require('./../../service/incidence-type-service');

export default{
  name: 'comprany-type-detail',
  components: { AddComponent },
  data () {
    return {
      item: {
        documents: [],
        company_type: { requeriments: [] }
      },
      fields: [
      ],
      errors: [],
      incidencias: [],
      incidencia: {
        description: ''
      }
    }
  },
  methods:{
    guardar: function(event, i){
      event.preventDefault();
      console.log(i, this.incidencia);
      serviceIncidence.save(i.incidence_path, i.id , this.incidencia).then(r => {
          console.log(r);
      });
      this.$refs.modal[0].hide();
    },
    aprobar: function(element){
      if (confirm('Esta seguro de aprobar esta empresa ')) {
        service.procesar(this.item).then(r => {
          this.item = r.data.data;
        });
      }
    },
    rechazar: function(element){
      if (confirm('Esta seguro de reprobar esta empresa ')) {
        service.reprobar(this.item).then(r => {
          this.item = r.data.data;
        });
      }
    },
    sendForm: function(form) {
      form.preventDefault();
      form.stopPropagation();
    }
  },
  mounted () {
    service.getByIdFull(this.$route.params.id)
    .then(response => {
      this.item = response.data.data
    });

    serviceIncidence.indexAll()
    .then( (data)=>{
      this.incidencias = data.data;
    });

  }

}
</script>