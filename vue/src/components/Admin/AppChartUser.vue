<template>
  <div>
    <canvas ref="chart"></canvas>
  </div>
</template>

<script>
import Chart from 'chart.js';
import axios from 'axios';
import { useStore } from '../../store';
import planetChartData from '../../planet-dataUser';

export default {
  name: 'PlanetChartUser',
  data() {
    return {
      planetChartData: planetChartData,
      chart: null
    }
  },
  mounted() {
    this.updateChart();
  },
  methods: {
    async updateChart() {
      const store = useStore();
      await axios.get(`${store.URL}statiqueAdmin`,{
        headers: { 'Authorization': `Bearer ${store.token}` }
      })
      .then(response => {
        this.planetChartData.data.datasets[0].data = response.data.statisticsUser;
        if (this.chart) {
          this.chart.update();
        } else {
          const ctx = this.$refs.chart.getContext('2d');
          this.chart = new Chart(ctx, this.planetChartData);
        }
      })
      .catch(error => {
        console.log(error);
      });
    }
  }
}
</script>