<template>
  <div>
    <button @click="shuffle" class="mb-4 px-4 py-2 bg-blue-600 text-white rounded">
      🔀 جابجا کردن کلمات
    </button>

    <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
      <div v-for="word in shuffledWords" :key="word.id" class="p-4 border rounded shadow bg-white">
        <img :src="word.image_url" alt="word image" class="w-full h-32 object-cover rounded mb-2" />
        <h2 class="font-bold text-lg">{{ word.word_en }}</h2>
        <p class="text-gray-600">{{ word.meaning_fa }}</p>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    words: {
      type: Array,
      required: true,
    },
  },
  data() {
    return {
      shuffledWords: [...this.words],
    };
  },
  methods: {
    shuffle() {
      this.shuffledWords = [...this.shuffledWords].sort(() => Math.random() - 0.5);
    },
  },
  mounted() {
    this.shuffle();
  },
};
</script>
