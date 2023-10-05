<template>
    <section class="m-8 min-h-full py-12 px-4 sm:px-6 lg:px-8 grid md:mt-10 overflow-hidden">
        <div>
            <h1 class="mt-6 text-2xl font-bold tracking-tight text-gray-900 text-center">Edit Article<hr></h1>
            <div>
                <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300 mt-5">Title</label>
                <input type="text" id="title" v-model="article.title" required
                class="relative block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
            </div>
            <div class="mt-5">
                <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Description</label>
                <textarea id="description" name="about" v-model="article.description" rows="3" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" 
                style="height: 130px;" />
            </div>
            <div class="mt-5">
                <button @click="saveArticle()" class="mt-2 flex items-center justify-center rounded-md border border-transparent bg-indigo-600 py-1 px-5 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                    Save
                </button>
            </div>
        </div>
    </section>
</template>

<script>
import Axios from 'axios'
export default {
    data() {
        return {
            title: "Article Edit",
            error: null,
            article: null
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
        async saveArticle() {
            this.error = null;
            const url = `http://localhost/api/articles/${this.article.id}`;
            // const data = {
            //     title: this.article.title,
            //     description: this.article.description,
            //     article:{title: this.article.title,description: this.article.description, }
            // };
            try {
                const reponse = await Axios.put(url, this.article);
                if (reponse.status == 200) {
                    this.$router.push(`/articles/${this.article.id}`);
                }
            } catch (error) {
                console.log(error);
                this.error = error.message;
            }
            this.$router.push(`/articles`);
        }
        

    }
}
</script>