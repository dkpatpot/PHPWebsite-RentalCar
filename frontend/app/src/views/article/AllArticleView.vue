<template>
    <section class="mt-10">
        <div v-if="error != null">
            {{ error }}
        </div>
        <div class="bg-white border-2 rounded-lg">
            <div class="mx-auto max-w-2xl py-16 px-4 sm:py-24 sm:px-6 lg:max-w-7xl lg:px-8">
                <h2 class="text-2xl font-bold tracking-tight text-gray-900">Articles</h2>
                <div class="mt-6 grid grid-cols-1 gap-y-10 gap-x-6 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
                    <div v-for="article in articles" v-bind:key="article.id">
                        <div>
                            <div class="min-h-80 aspect-w-1 aspect-h-1 w-full overflow-hidden rounded-md bg-white group-hover:opacity-75 lg:aspect-none lg:h-auto" 
                            style="height: 150px; max-width: 300px;">
                                <p v-if="article.image.length > 0"><img v-bind:src="'http://localhost/article_images/' + article.image" 
                                    class="h-full w-full object-fill object-center lg:h-full lg:w-full" v-on:click="goToDetailView(article)"></p>
                            </div>
                            <div class="mt-4 flex justify-between">
                                <div>
                                    <h3 class="text-m text-gray-700">{{ article.title }}</h3>
                                    <p class="text-sm text-gray-500">Description: {{ article.description }}</p>
                                    <p class="text-sm text-gray-500">View: {{ article.view_count }}</p>
                                </div>    
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
import axios from 'axios'

export default {
    data() {
        return {
            title: "Article List",
            selected: null,
            articles: null,
            error: null
        }
    },
    methods: {
        goToDetailView(article) {
            this.$router.push(`/articles/${article.id}`);
        },
    },
    async mounted() {
        console.log("mounted");
        this.error = null;
        const url = "http://localhost/api/articles";
        try {
            const reponse = await axios.get(url);
            if (reponse.status === 200) {
                this.articles = reponse.data.data;
                console.log(reponse.data.data);
            } else {
                console.error(reponse.status);
            }
        } catch (error) {
            this.error = error.message;
            console.error(error.message);
        }
    }
}
</script>