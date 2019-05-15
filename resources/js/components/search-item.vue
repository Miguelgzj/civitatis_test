<template>
    <div class="container search-item">
        <div class="row search-item__container ">
            <div class="col-sm-12 col-md-9 ">
                <h3>{{activity.title}}</h3>
                <p>{{activity.description}}</p>
            </div>
            <div v-if="!booked" class="col-sm-12 col-md-3 search-item__price">
                <h3>{{activity.total_price}}€</h3>
                <button class="btn btn-primary" @click="book">Comprar</button>
            </div>
            <div v-else class="col-sm-12 col-md-3">
                <h3 class="search-item__success"><i class="fas fa-check"></i> Reserva aceptada</h3>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "search-item",
        props:['activity', 'users', 'date'],
        data(){
          return {
              booked:false
          }
        },
        methods:{

            book(){
                axios.post('book', {
                    number_of_users:this.users,
                    activity_id:this.activity.id,
                    booking_price:this.activity.total_price,
                    start_date:this.date
                }).then((response) => {
                    this.booked = true;
                })
            }
        }
    }
</script>
