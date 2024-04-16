<template>
    <div class="test">
        <div class="headerDashboard container-mf pb-1">
            <span class="fw-bold h5 text-dark">Admin / <span class="text-secondary">Dashboard</span> </span>
        </div>
        <hr>
        <section class="cardStatic container-mf ">
          <CardsStatics/>
        </section>
        <hr>
        <section class="container-mf ">
          
          <div class="row pt-3">
            <div class="col-md-6">
              <h5 class="text-secondary">Number Of Post Created / Month</h5>
              <PlanetChart/>
            </div>
            <div class="col-md-6">
              <h5 class="text-secondary">Number Of User Registred / Month</h5>
              <PlanetChartUser/>
            </div>
        </div>
        </section>
       
    </div>
</template>
<script>
import PlanetChart from './AppChart.vue'
import PlanetChartUser from './AppChartUser.vue'
import CardsStatics from './AppCardsStatique.vue'

export default {
  components: {
    PlanetChart,
    PlanetChartUser,
    CardsStatics
  }
}
</script>