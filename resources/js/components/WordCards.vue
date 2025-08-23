<template>
  <div>
    <div v-if="shuffledWords.length === 0" class="text-center p-6">
      <h2 class="text-2xl font-bold">👏 همه لغات این مرحله تمام شد!</h2>
      <button @click="restartStage" class="mt-4 px-4 py-2 bg-green-600 text-white rounded">
        تکرار مرحله
      </button>
    </div>

    <div v-else class="grid grid-cols-2 md:grid-cols-3 gap-4">
      <div
        v-for="(word, index) in shuffledWords"
        :key="word.id"
        class="p-4 border rounded shadow bg-white"
      >
        <img
          :src="word.image_url"
          alt="word image"
          class="w-full h-32 object-cover rounded mb-2"
        />
        <h2 class="font-bold text-lg mb-2">{{ word.word_en }}</h2>

        <div v-if="!word.showMeaning">
          <button
            @click="word.showMeaning = true"
            class="px-3 py-1 bg-blue-500 text-white rounded"
          >
            نمایش معنی
          </button>
        </div>

        <div v-else>
          <p class="text-gray-600 mb-2">{{ word.meaning_fa }}</p>
          <button
            @click="markKnown(index)"
            class="px-3 py-1 bg-green-500 text-white rounded mr-2"
          >
            بلدم
          </button>
          <button
            @click="markUnknown(word)"
            class="px-3 py-1 bg-red-500 text-white rounded"
          >
            بلد نبودم
          </button>
        </div>
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
      shuffledWords: this.words.map((w) => ({ ...w, showMeaning: false })),
      repeatCount: 1,
    };
  },
  methods: {
    shuffle() {
      this.shuffledWords = [...this.shuffledWords].sort(() => Math.random() - 0.5);
    },
    markKnown(index) {
      this.shuffledWords.splice(index, 1);
      if (this.shuffledWords.length === 0) {
        this.repeatCount++;
      }
    },
    markUnknown(word) {
      word.showMeaning = false; // مخفی کردن معنی دوباره
      this.shuffle();
    },
    restartStage() {
      if (this.repeatCount <= 3) {
        this.shuffledWords = this.words.map((w) => ({
          ...w,
          showMeaning: false,
        }));
        this.shuffle();
      } else {
        alert("🎉 تبریک! برو مرحله بعد!");
        // اینجا بعداً فراخوانی API لاراول برای ذخیره در user_progress میاد
      }
    },
  },
  mounted() {
    this.shuffle();
  },
};
</script>
