<template>
    <section class="mt-20">
        <div class="pt-5">
            <div class="mx-auto mt-6 max-w-2xl sm:px-6 lg:grid lg:max-w-7xl lg:grid-cols-2 lg:gap-x-8 lg:px-8">
                <div class="aspect-w-3 aspect-h-2 overflow-hidden rounded-lg">
                    <p v-if="article.image.length > 0"><img v-bind:src="'http://localhost/article_images/' + article.image" 
                        class="h-full w-full object-cover object-center">
                    </p>
                </div>
                <div>
                    <h1 class="text-2xl font-bold tracking-tight text-gray-900">{{ article.title }}</h1>
                    <div class="mt-4">
                        <ul role="list" class="list-disc space-y-2 pl-4 text-sm">
                            <li class="text-gray-400"><span class="text-gray-600">Description: {{ article.description }}</span></li>
                            <li class="text-gray-400"><span class="text-gray-600">View: {{ article.view_count }}</span></li>
                        </ul>
                    </div>
                    <div>
                        <div v-if="auth.role === 'staff'">
                            <button @click="goToEditArticle" class="mt-2 flex items-center justify-center rounded-md border border-transparent bg-indigo-600 py-1 px-5 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Edit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
import Axios from 'axios'
import { useAuthStore } from '@/stores/auth.js'
export default {
    setup() {
        const auth_store = useAuthStore()
        return { auth_store }
    },
    data() {
        return {
            title: "Article Details",
            error: null,
            article: null,
            auth: null
        }
    },
    async created() {
        const id = this.$route.params.id;
        const url = `http://localhost/api/articles/${id}`;

        try {
            const reponse = await Axios.get(url);
            if (reponse.status == 200) {
                this.article = reponse.data.data;
                console.table(this.article);
            }
        } catch (error) {
            console.log(error);
            this.error = error.message;
        }
    },
    methods: { 
        goToEditArticle() {
            this.$router.push(`/articles/edit/${this.article.id}`);
        },
    },
    watch: {
            auth_store: {
                immediate: true,
                deep: true,
                handler(newValue, oldValue) {
                    console.log(newValue.getAuth)
                    this.auth = this.auth_store.getAuth
                }
            }
        },
        mounted() {
            if (this.auth_store.isAuthen) {
                this.auth = this.auth_store.getAuth
            } else {
                this.auth = null
            }
        },
}
</script>