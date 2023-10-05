import { defineStore } from 'pinia'
import { carAPI } from '@/services/api.js'

export const useCarStore = defineStore({
    id: 'car',
    state: () => {
        return {
            cars: []
        }
    },

    getters: {
        getCars: (state) => state.cars,

        sortByPrice (state) {
            const sortable = [...state.cars]
            return sortable.sort((a, b) => {
                return a.price - b.price
            })
        },

        sortByCarCode (state) {
            const sortable = [...state.cars]
            return sortable.sort((a, b) => {
                return (a.car_code).localeCompare(b.car_code)
            })
        }
    },

    actions: {
        async fetch () {
            this.cars = await carAPI.getAll()
        },

        async add (car) {
            const response = await carAPI.saveNew(car)
            if (response.success) {
                const car_id = response.data.id
                this.cars.push({...car})
                return car_id
            }
            return false
        },

        delete (id) {
            this.cars = this.cars.filter((car) => {
                return car.id != id
            })
        }
    }
})