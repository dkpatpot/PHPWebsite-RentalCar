<template>
  <div class="mt-20 container">
    <Bar :chart-data="chartData" />
  </div>
</template>
  
  <script>
  import { Bar } from 'vue-chartjs'
  import { Chart as ChartJS, Title, Tooltip, Legend, BarElement, CategoryScale, LinearScale } from 'chart.js'
  import axios from 'axios'

  ChartJS.register(Title, Tooltip, Legend, BarElement, CategoryScale, LinearScale)
  
  export default {
    name: 'BarChart',
    components: { Bar },
    data() {
      return {
        cars: null,
        chartData: {
          labels: [ 'Sold', 'Available', 'Delivered'],
          datasets: [
            {
              label: 'Car',
              backgroundColor: '#f87979',
              data: [0, 0, 0]
            }
          ],
        error: null,
        }
      }
    },
    async mounted() {
        console.log("mounted");
        this.error = null;
        const url = "http://localhost/api/cars";
        try {
            const reponse = await axios.get(url);
            if (reponse.status === 200) {
                this.cars = reponse.data.data;
                this.chartData.datasets[0].data[0] = this.cars.filter(car => car.status === "sold").length;
                this.chartData.datasets[0].data[1] = this.cars.filter(car => car.status === "available").length;
                this.chartData.datasets[0].data[2] = this.cars.filter(car => car.status === "deliver").length;
                console.log(reponse.data.data);
            } else {
                console.error(reponse.status);
            }
        } catch (error) {
            this.error = error.message;
            console.error(error.message);
        }
    },
  }
  </script>