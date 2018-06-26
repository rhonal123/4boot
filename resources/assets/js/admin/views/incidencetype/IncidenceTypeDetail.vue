<template>
<div class="card">
  <div class="card-header">
    <router-link class="btn btn-sm btn-primary" :to="{ name: 'incidenceType'}">
      <i class="fa fa-arrow-left"></i>
    </router-link>
    Tipo de Incidencia  
  </div>

  <div class="card-body">
    <p class="font-weight-bold">Tipo Incidencia : {{ item.data.type }}</p>
  </div>
</div>
</template>

<script>
import AddComponent from '../../components/AddComponent.vue'

const item = {
  data: { 
    type: {}
  }
};

export default{
  name: 'incidence-type-detail',
  components: { AddComponent },
  data () {
    return {
      item: item,
    }
  },
  mounted () {
    axios
      .get('http://localhost:8000/api/incidence-type/'+ this.$route.params.id )
      .then(response => {
        this.item = response.data 
      });
  }

}
</script>