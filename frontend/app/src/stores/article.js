import { defineStore } from 'pinia'
import { carAPI } from '@/services/api.js'

export const useArticleStore = defineStore({
    id: 'article',
    state: () => {
        return {
            articles: []
        }
    },

    getters: {
        getArticles: (state) => state.articles,

    },

    actions: {
        async fetch () {
            this.articles = await articleAPI.getAll()
        },

        async add (article) {
            const response = await articleAPI.saveNew(article)
            if (response.success) {
                const article_id = response.data.id
                this.articles.push({...article})
                return article_id;
            }
            return false
        },

        delete (id) {
            this.articles = this.articles.filter((article) => {
                return article.id != id
            })
        }
    }
})