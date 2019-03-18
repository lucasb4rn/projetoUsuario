<template>
    
    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <li class="page-item" :class="{disabled : source.current_page == 1}">
                <a class="page-link" @click.prevent="nextPrev($event, source.current_page - 1)" href="#">Previous</a>
            </li> 

            <li v-for="page in pages" class="page-item">
                <a @click="navigate($event, page)" class="page-link" :class="{ active: source.current_page == page }" href="#">{{ page }}</a>
            </li>

             <li class="page-item">
                <a class="page-link" @click.prevent="nextPrev($event, source.current_page + 1)" :class="{disabled : source.last_page == source.last_page}" href="#">Next</a>
            </li> 
       </ul>
    </nav>

</template>

<script>

import {range} from 'lodash'

export default {
    
    props: ['source'],


data() {

    return {
        
        pages: []
    }


},


methods: {

    navigate(ev, page) {

        ev.preventDefault()

        this.$emit('navigate', page)

    },


    
    nextPrev(ev, page) {

        if(page == 0 || page == this.source.last_page + 1)  {

            return;

        }

      this.navigate(ev, page);

    }


},

watch: {

        source() {

            this.pages = range(1, this.source.last_page + 1)

            window.console.log(this.pages)

        }

    }

}




</script>

