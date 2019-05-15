<template>
    <div class="container search-container">
        <div class="row">
            <div class="col-sm-12 col-lg-4 search-container__form">
                <h2>Busca tu actividad</h2>
                <div class="form-group">
                    <label for="usersInput">Introduce el número de personas</label>
                    <input type="number" class="form-control" id="usersInput" placeholder="Número de personas" v-model="users">
                </div>
                <div class="form-group">
                    <label for="dateInput">Introduce la fecha de la actividad</label>
                    <input type="date" class="form-control" id="dateInput" placeholder="start_date" v-model="date"
                    @change="compareDates">
                </div>
                <div class="container">
                    <div class="row justify-content-md-center">
                        <div class="col-lg-10">
                            <button class="btn btn-primary" @click="getActivities"
                            :disabled="this.users <= 0 || !this.correctDate">Buscar</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-lg-8 search-list">
                <search-item v-for="activity in activities" :key="activity.id" :activity="activity" :users="users" :date="date"/>
            </div>
        </div>
    </div>
</template>

<script>

    import axios from 'axios';
    import SearchItem from "./search-item";

    export default {
        name: "ActivitiesBrowser",
        components: {SearchItem},
        data(){
            return{
                activities:[],
                date: (new Date()).toISOString().split('T')[0],
                users:1,
                correctDate:true
            }
        },
        mounted(){
            this.getActivities()
        },
        methods:{
            getActivities(){
                if(this.users > 0 && this.correctDate) {
                    axios.post('activities', {
                        date: this.date,
                        numberOfUsers: this.users,
                    }).then((response) => {
                        this.activities = response.data;
                    })
                }
            },
            compareDates(){
                let selectedDate = new Date(this.date)
                let today = new Date()
                selectedDate.setHours(0,0,0,0)
                today.setHours(0,0,0,0)
                this.correctDate = selectedDate >= today
            }
        }

    }
</script>
