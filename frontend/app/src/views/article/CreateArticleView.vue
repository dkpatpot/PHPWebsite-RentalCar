<template>
    <section class="m-8 min-h-full py-12 px-4 sm:px-6 lg:px-8 grid md:mt-10 overflow-hidden">
        <div>
            <h1 class="mt-6 text-2xl font-bold tracking-tight text-gray-900 text-center">Create New Article</h1>
            <div>
                <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Title</label>
                <input type="text" id="title" v-model="article.title" required
                class="relative block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
            </div>
            <div class="mt-5">
                <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Description</label>
                <textarea id="description" name="about" v-model="article.description" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" 
                style="height: 130px;" />
            </div>
            <div class="mt-5">
                <input type="file" @change="onFileSelected">
                <button @click="createArticle()"
                    class="px-4 py-2 rounded-lg bg-blue-500">
                    Create
                </button>
            </div>
        </div>
    </section>
</template>

<script>
import axios from 'axios'
import { useArticleStore } from '@/stores/article.js';

export default {
    setup() {
        const article_store = useArticleStore()
        return { article_store }
    },
    
    data() {
        return {
            article: {
                title: "",
                description: "",
            },
            preview_code: "Article Code",
            image: null,
            error: null
        }
    },
    methods: {
        async createArticle() {
            const url = "http://localhost/api/articles";
            this.error = null;
            const fd = new FormData();
            fd.append('image', this.image);
            fd.append('title', this.article.title);
            fd.append('description', this.article.description);

            try {
                const response = await axios.post(url, fd);
                if (response.status === 201) {
                    let article_id = response.data.article_id;
                    this.$router.push({
                        name: 'article.details',
                        params: { id: article_id }
                    });
                }
            } catch (error) {
                this.error = error.message;
                console.log(error);
            }
            this.$router.push(`/articles`);
        },
        onFileSelected(event) {
            this.image = event.target.files[0];
        },
    }
}
</script>